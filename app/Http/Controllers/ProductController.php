<?php

namespace App\Http\Controllers;

use App\category;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\saveproductsRequest;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $title=$request->get('search');
         return view('products.index',
         ['products'=>Product::title($title)
         ->with('category')
         ->latest()->paginate(6),'deletedProducts'=>Product::onlyTrashed()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $product = new Product);
        return view('products.create', [
            'products'=> $product,
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
        $this->authorize('create', $product);
        $product->image= $request->file('image')->store('images');
        $product->save();

        $image = Image::make(Storage::get($product->image))
            ->widen(600)
            ->encode();
            Storage::put($product->image, $image);
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
        $this->authorize('update', $product);
        return view('products.edit',
        [ 'products'=>$product, 'categories'=>category::pluck('name', 'id')]);
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
        $this->authorize('update', $product);
        if($request->hasFile('image')){
            Storage::delete($product->image);
            $product->fill($request->validated());
            $product->image=$request->file('image')->store('images');
            $product->save();
            $image = Image::make(Storage::get($product->image))
            ->widen(600)
            ->encode();

            Storage::put($product->image, $image);
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
        $this->authorize('delete', $product);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function restore($productUrl)
    {
        $product=Product::withTrashed()->whereUrl($productUrl)->firstOrFail();
        $product->restore();
        return redirect()->route('products.index')
       ->with('status', 'El producto fue Habilitado');
    }

    public function forceDelete($productUrl)
    {
       $product=Product::withTrashed()->whereUrl($productUrl)->firstOrFail();
       Storage::delete($product->image);
       $product->forceDelete();
       return redirect()->route('products.index')
       ->with('status', 'El producto fue eliminado');
    }

    public function recycling()
    {
        return view('products.recycling',
         ['deletedProducts'=>Product::onlyTrashed()->get()]);

    }
}
