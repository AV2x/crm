<?php

namespace App\Http\Controllers;

use App\Helpers\StorageHelper;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $storage;
    public function __construct(Request  $request)
    {
        view()->composer('crm.layouts.link', function ($view){
            $view->with(['active_name' => 'categories']);
        });
        $category_id = $request->route('category');
        $this->storage = new StorageHelper('image', $request->file('file'), Category::find($category_id));
    }

    public function index()
    {
        $categories = Category::all();
        return view('crm.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crm.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $this->storage->saveImage();
        Category::create([
            'name' => $request->input('name'),
            'image' => $name,
        ]);
        return response()->redirectTo('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('crm.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $name = $this->storage->saveImage();
        $category->name = $request->input('name');
        $category->image = $name;
        $category->save();
        return response()->redirectTo('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->storage->destroyImage();
        $category->delete();
        return response()->redirectTo('/category');
    }
}
