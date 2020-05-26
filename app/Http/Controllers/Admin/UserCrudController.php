<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Role;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\User');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/user');
        $this->crud->setEntityNameStrings('user', 'users');
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            ['name' => 'name', 'label' => 'Ім\'я користувача'],
            ['name' => 'email', 'label' => 'Електронна пошта'],
            ['name'      => 'roles',
             'label'     => 'Ролі користувача',
             'entity'    => 'roles',
             'attribute' => 'name',
             'model'     => "App\Role",
             'pivot'     => true
            ],
            ['name'      => 'games',
             'label'     => 'Ігри користувача (id)',
             'entity'    => 'games',
             'type'      => 'select',
             'attribute' => 'id',
             'model'     => "App\Game",
             'pivot'     => true
            ]
        ]);

        // Filter for user names
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'name',
            'label' => 'Ім\'я користувача'
            ], 
            false, 
            function($value) {
                $this->crud->addClause('where', 'name', 'LIKE', "%$value%");
            });
        
        // Filter for user email
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'email',
            'label' => 'Електронна пошта користувача'
            ], 
            false, 
            function($value) {
                $this->crud->addClause('where', 'email', 'LIKE', "%$value%");
            });

        // Filter for roles
        $this->crud->addFilter([
            'name'  => 'types',
            'type'  => 'select2_multiple',
            'label' => 'Ролі користувача'
            ], function() {
                return Role::all()->pluck('name', 'id')->toArray();
            }, function($values) {
                foreach (json_decode($values) as $key => $value) {
                    $this->crud->query = $this->crud->query->whereHas('roles', function ($query) use ($value) {
                        $query->where('role_id', $value);
                    });
                }
            });
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(UserRequest::class);

        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Ім\'я користувача']);
        $this->crud->addField(['name' => 'email', 'type' => 'email', 'label' => 'Електронна пошта']);
        $this->crud->addField([ 'name'      => 'roles',
                                'label'     => 'Ролі користувача',
                                'type'      => 'checklist',
                                'entity'    => 'roles',
                                'attribute' => 'name',
                                'model'     => "App\Role",
                                'pivot'     => true,
                            ]);
        $this->crud->addField([ 'name'      => 'games',
                                'label'     => 'Ігри користувача',
                                'type'      => 'select2_multiple',
                                'entity'    => 'games',
                                'attribute' => 'name',
                                'model'     => "App\Game",
                                'pivot'     => true
                            ]);
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
