<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/post');
        CRUD::setEntityNameStrings('post', 'posts');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title')->label('Title');
        CRUD::column('category_id')->label('Category');
        CRUD::column('author_id')->label('Author');
        CRUD::column('image')->type('text')->label('Image URL');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PostRequest::class);

        CRUD::addField([
            'name' => 'title',
            'type' => 'text',
            'label' => 'Title',
        ]);

        CRUD::addField([
            'name' => 'content',
            'type' => 'textarea',
            'label' => 'Content',
        ]);

        CRUD::addField([
            'name' => 'image',
            'type' => 'upload',
            'label' => 'Image',
            'upload' => true,
            'disk' => 'public', // Assuming you are storing the images in the public disk
        ]);

        CRUD::addField([
            'name' => 'category_id',
            'type' => 'select',
            'label' => 'Category',
            'entity' => 'category',
            'model' => 'App\Models\Category',
            'attribute' => 'name',
        ]);

        CRUD::addField([
            'name' => 'author_id',
            'type' => 'select',
            'label' => 'Author',
            'entity' => 'author',
            'model' => 'App\Models\Author',
            'attribute' => 'name',
        ]);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(PostRequest::class); // Use PostRequest for validation
        $this->setupCreateOperation();
    }
}
