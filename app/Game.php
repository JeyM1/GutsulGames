<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use ZipArchive;

class Game extends Model
{ 
    use CrudTrait;

    protected $fillable = [
        'name', 'price', 'developer', 'publisher', 'release_date', 'description', 'image_path', 'game_path'
    ];

    public function types() {
        return $this->belongsToMany('App\Type');
    }

    public function is_online() {
        return $this->types()->where('name', 'online')->first() ? true : false;
    }

    public function setImagePathAttribute($value) {
        $attribute_name = "image_path";
        // Also setting here game path (test)
        //$this->attributes['game_path'] = "/".$this->types()->where('name', 'online')->first() ? "online" : "offline".$this->id;
        $disk = 'games_images';
        $gameid = $this->id ?? DB::select("SHOW TABLE STATUS LIKE 'games'")[0]->Auto_increment;

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store path in the db
        if (Str::startsWith($value, 'data:image')) {
            // 0. Make the image
            $image = Image::make($value)->encode('jpg', 90);

            // 1. Generate a filename.
            // $filename = md5($value.time()).'.jpg';
            $filename = $gameid.'.jpg';

            // 2. Store the image on disk.
            Storage::disk($disk)->put($filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            Storage::disk($disk)->delete($this->{$attribute_name});

            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it 
            // from the root folder; that way, what gets saved in the db
            // is the public URL (everything that comes after the domain name)
            //$public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = "/images/games/".$filename;
        }
    }

    public function setGamePathAttribute($value) {
        $types = request()->get('types');

        $attribute_name = "game_path";
        $disk = 'games';
        $gameid = $this->id ?? DB::select("SHOW TABLE STATUS LIKE 'games'")[0]->Auto_increment;
        
        $isgameonline = collect($types)->contains(Type::where('name', 'online')->first()->id);
        $subfolder = $isgameonline ? "online" : "offline";
        
        $destination_path = "$subfolder/$gameid";
        

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
        
        // TODO if folder not empty - delete old zip

        if($isgameonline) {
            $fl = $this->attributes[$attribute_name];
            $zipfilename = public_path("games/$fl");
            $zip = new ZipArchive();
            $zip->open($zipfilename);
            $zip->extractTo(public_path("$disk/$destination_path").'/Build');
            $zip->close();
        }
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            Storage::disk('games_images')->delete(explode('/images/games', "$obj->image_path"));
            if($obj->game_path) {
                $gamepath = explode('/', "$obj->game_path");
                Storage::disk('games')->delete($obj->game_path);
                Storage::disk('games')->deleteDirectory($gamepath[0].'/'.$gamepath[1]);
            }
        });
    }
}
