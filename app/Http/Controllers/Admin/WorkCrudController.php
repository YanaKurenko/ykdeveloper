<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WorkRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

// /
//  * Class WorkCrudController
//  * @package App\Http\Controllers\Admin
//  * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
//  */
class WorkCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    
    //  * Configure the CrudPanel object. Apply settings to all operations.
    //  *
    //  @return void
    //  
    public function setup()
    {
        CRUD::setModel(\App\Models\Work::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/work');
        CRUD::setEntityNameStrings('work', 'works');
    }

    // /
    //  * Define what happens when the List operation is loaded.
    //  *
    //  * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
    //  * @return void
    //  */
    protected function setupListOperation()
    {
        CRUD::column('categoryId')->label('Category name');
        CRUD::column('name');
        CRUD::column('desc');
        CRUD::column('shortDesc');
        CRUD::column('purepose')->label('Purpose');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        // /
        //  * Columns can be defined using the fluent syntax or array syntax:
        //  * - CRUD::column('price')->type('number');
        //  * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
        //  */
    }

    // /
    //  * Define what happens when the Create operation is loaded.
    //  *
    //  * @see https://backpackforlaravel.com/docs/crud-operation-create
    //  * @return void
    //  */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(WorkRequest::class);

        CRUD::field('categoryId')->label('Category name')
        ->type('select')
        ->options(function ($query) {
            return $query->select('id', 'name')->from('category')->get();
        })->model('App\Models\Category')->attribute('name')->default(1);
    CRUD::field('name');
    CRUD::field('desc');
    CRUD::field('shortDesc');
    CRUD::field('purepose')->label('Purpose');

        // /
        //  * Fields can be defined using the fluent syntax or array syntax:
        //  * - CRUD::field('price')->type('number');
        //  * - CRUD::addField(['name' => 'price', 'type' => 'number']));
        //  */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}