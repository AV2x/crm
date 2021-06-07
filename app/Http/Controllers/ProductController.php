<?php

namespace App\Http\Controllers;

use App\Helpers\StorageHelper;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $storage;
    public function __construct(Request $request)
    {
        view()->composer('crm.layouts.link', function ($view){
            $view->with(['active_name' => 'products']);
        });
        $product_id = $request->route('product');
        $this->storage = new StorageHelper('image', $request->file('file'), Product::find($product_id));
    }

    public function index()
    {
        return view('crm.products.index', ['products' => Product::with('category')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crm.products.create', ['categories' => Category::get()]);
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
        Product::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'count' => $request->input('count'),
            'self_cost' => $request->input('self_cost'),
            'cost' => $request->input('cost'),
            'image' => $name
        ]);
        return response()->redirectTo('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('crm.products.edit', ['product' => $product, 'categories' => Category::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $name = $this->storage->saveImage();
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->count = $request->input('count');
        $product->self_cost = $request->input('self_cost');
        $product->image = $name;
        $product->save();
        return response()->redirectTo('/product');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->storage->destroyImage();
        $product->delete();
        return response()->redirectTo('/product');
    }
}
