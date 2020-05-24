<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GameRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

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

    public function setup()
    {
        $this->crud->setModel('App\Models\Game');
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
                                 ['name' => 'description', 'label' => 'Опис гри'],
                                ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(GameRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Назва гри']);
        $this->crud->addField(['name' => 'price', 'type' => 'number', 'label' => 'Ціна гри']);
        $this->crud->addField(['name' => 'developer', 'type' => 'text', 'label' => 'Розробник']);
        $this->crud->addField(['name' => 'publisher', 'type' => 'text', 'label' => 'Видавець']);
        $this->crud->addField(['name' => 'release_date', 'type' => 'date', 'label' => 'Дата релізу']);
        $this->crud->addField(['name' => 'description', 'type' => 'text', 'label' => 'Опис гри']);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
