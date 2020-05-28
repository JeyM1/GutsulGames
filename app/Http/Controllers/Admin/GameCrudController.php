<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GameRequest;
use App\Type;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Log;
use ZipArchive;

/**
 * Class GameCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GameCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    //use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }

    public function setup()
    {
        $this->crud->setModel('App\Game');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/game');
        $this->crud->setEntityNameStrings('game', 'games');
    }

    protected function setupListOperation()
    {
        // TODO: game tags
        $this->crud->setColumns([
                                 ['name' => 'name', 'label' => 'Назва гри'],
                                 ['name' => 'price', 'label' => 'Ціна гри'],
                                 ['name' => 'developer', 'label' => 'Розробник'],
                                 ['name' => 'publisher', 'label' => 'Видавець'],
                                 ['name' => 'release_date', 'label' => 'Дата релізу'],
                                 ['name'      => 'types',
                                  'label'     => 'Ігрові теги',
                                  'entity'    => 'types',
                                  'attribute' => 'name',
                                  'model'     => "App\Type",
                                  'pivot'     => true
                                 ],
                                 //['name' => 'description', 'label' => 'Опис гри'],
        ]);
        
        // Filter for game names
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'name',
            'label' => 'Назва гри'
            ], 
            false, 
            function($value) {
                $this->crud->addClause('where', 'name', 'LIKE', "%$value%");
            });
        // Filter for prices
        $this->crud->addFilter([
            'name'       => 'price',
            'type'       => 'range',
            'label'      => 'Ціновий діапазон',
            'label_from' => 'Мінімальна ціна',
            'label_to'   => 'Максимальна ціна'
          ],
          false,
          function($value) { // if the filter is active
              $range = json_decode($value);
              if ($range->from) {
                  $this->crud->addClause('where', 'price', '>=', (float) $range->from);
              }
              if ($range->to) {
                  $this->crud->addClause('where', 'price', '<=', (float) $range->to);
              }
          });
        // Filter for game types
        $this->crud->addFilter([
            'name'  => 'types',
            'type'  => 'select2_multiple',
            'label' => 'Ігрові теги'
            ], function() {
                return Type::all()->pluck('name', 'id')->toArray();
            }, function($values) {
                foreach (json_decode($values) as $key => $value) {
                    $this->crud->query = $this->crud->query->whereHas('types', function ($query) use ($value) {
                        $query->where('type_id', $value);
                    });
                }
            });
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(GameRequest::class);

        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Назва гри']);
        $this->crud->addField(['name' => 'price', 'type' => 'number', 'label' => 'Ціна гри']);
        $this->crud->addField(['name' => 'developer', 'type' => 'text', 'label' => 'Розробник']);
        $this->crud->addField(['name' => 'publisher', 'type' => 'text', 'label' => 'Видавець']);
        $this->crud->addField(['name'      => 'types',
                               'label'     => 'Ігрові теги',
                               'type'      => 'select2_multiple',
                               'entity'    => 'types',
                               'attribute' => 'name',
                               'model'     => "App\Type",
                               'pivot'     => true
        ]);
        $this->crud->addField(['name' => 'release_date', 'type' => 'date', 'label' => 'Дата релізу']);
        $this->crud->addField([ 'name'          => 'image_path', 
                                'type'          => 'image', 
                                'label'         => 'Обкладинка гри',
                                'upload'        => true,
                                'crop'          => true, // set to true to allow cropping, false to disable
                                'aspect_ratio'  => 0, // ommit or set to 0 to allow any aspect ratio
                                //'disk'          => 'games_images',
                                //'prefix'        => ''
        ]);
        $this->crud->addField(['name'       => 'description',
                               'type'       => 'tinymce', 
                               'label'      => 'Опис гри', 
                               'options'    => [ 'selector' => 'textarea.tinymce', 'plugins' => 'image,link,media,anchor', 'height' => 500 ]
        
        ]);
        $this->crud->addField(['name'       => 'game_path',
                               'type'       => 'upload', 
                               'label'      => 'Файли гри у архіві .zip',
                               'upload'    => true,
                               'disk'      => 'games',
                               ''
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
        $this->crud->addColumn(['name'      => 'image_path',
                                'label'     => 'Обкладинка гри', 
                                'type'      => 'image',
                                'height' => '350px',
                                'width'  => '200px',
                                //'disk'   => 'games_images'
        ]);
        $this->crud->addColumn(['name'       => 'description',
                               'type'       => 'markdown', 
                               'label'      => 'Опис гри', 
                               //'options'    => [ 'selector' => 'textarea.tinymce', 'plugins' => 'image,link,media,anchor', 'height' => 500 ]
        ]);
        $this->crud->addColumn(['name'      => 'game_path',
                                'label'     => 'Путь до гри на сервері', 
                                'type'      => 'text',
                                'disk'   => 'games'
        ]);
    }
}
