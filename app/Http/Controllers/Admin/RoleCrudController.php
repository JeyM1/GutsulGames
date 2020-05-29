<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RoleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RoleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Role');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/role');
        $this->crud->setEntityNameStrings('role', 'roles');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setColumns([
            ['name' => 'name', 'label' => 'Назва ролі'],
            ['name' => 'permissions', 'label' => 'Повноваження']
           ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(RoleRequest::class);

        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Назва ролі']);
        $this->crud->addField(['name' => 'permissions', 'type' => 'number', 'label' => 'Повноваження']);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
