<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Route;

class ProductControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.product.index",[
            'products'=>Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.product.create",[
            'categories'=>Category::all(),
            'brands'=>Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $path = $request->file('image')->storeAs(
            'public/image', $request->file('image')->getClientOriginalName()
        );
        Product::query()->create([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
            'brand_id'=>$request->get('brand_id'),
            'cost'=>$request->get('cost'),
            'description'=>$request->get('description'),
            'slug'=>$request->get('slug'),
            'image'=>$path
        ]);
        return redirect(route("product.index"));
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
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("admin.product.edit",[
            'products'=>$product,
            'categories'=>Category::all(),
            'brands'=>Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */

    public function update(UpdateProductsRequest $request,Product $product){
        $slugisuesd=Product::query()->where('slug',$request->get('slug'))->
            where('id','!=',$product->id)->
            exists();
        if ($slugisuesd){
            return back()->withErrors(['slug'=>'this slug already has token']);
        }

        $path=$product->image;
        if ($request->hasFile('image')){
            $path=$request->file('image')->storeAs('public/products',$request->file('image')->getClientOriginalName());
        }
        $product->update([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
            'brand_id'=>$request->get('brand_id'),
            'cost'=>$request->get('cost'),
            'description'=>$request->get('description'),
            'slug'=>$request->get('slug'),
            'image'=>$path
        ]);
        return redirect(route("product.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       $product->delete();
       return redirect(Route("product.index"));
    }
}
