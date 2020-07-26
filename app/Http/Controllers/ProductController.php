<?php

namespace App\Http\Controllers;

use App\category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\saveproductsRequest;
use Illuminate\Support\Facades\Srorage;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('products.index', ['products'=>Product::latest()->paginate(5)]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'products'=> new Product,
            'categories'=>category::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saveProductsRequest $request)
    {
       $product = new Product($request->validated());

        $product->image= $request->file('image')->store('images');

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      return view('products.show', [
          'products'=>$product
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'products'=>$product,
            'categories'=>category::pluck('name', 'id')
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, saveProductsRequest $request)
    {
        if($request->hasFile('image')){
            Storage::delete($product->image);
            $product->fill($request->validated());
            $product->image=$request->file('image')->store('images');
            $product->save();
        } else{
            $product->update(array_filter($request->validated()));

        }

        return redirect()->route('products.show',$product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route('products.index');
    }
}
