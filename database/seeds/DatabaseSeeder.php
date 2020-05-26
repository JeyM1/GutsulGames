<?php

use App\Game;
use App\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // adding basic types
        DB::table('types')->insert(['name' => "bestseller"]);
        DB::table('types')->insert(['name' => "online"]);
        DB::table('types')->insert(['name' => "soon"]);

        DB::table('roles')->insert(['name' => "admin", 'permissions' => 999]);
        DB::table('roles')->insert(['name' => "moderator", 'permissions' => 500]);
        DB::table('roles')->insert(['name' => "publisher", 'permissions' => 111]);

        // adding test games
        factory(App\Game::class, 10)->create();
        
    }
}
