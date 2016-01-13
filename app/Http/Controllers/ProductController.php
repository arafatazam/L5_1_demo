<?php

namespace App\Http\Controllers;

use Image;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(\App\Product $productModel)
    {
        $products = $productModel->all()->toArray();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(\App\Category $categoryModel)
    {
        $categories = $categoryModel->all()->lists('title','id');
        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,\App\Product $productModel)
    {
        $image_name = $productModel->generateUniqueImageName();
        $this->saveImage($request->get('image'),$image_name);

        $newProduct = $productModel->newInstance($request->all());
        $newProduct->photo = $image_name;
        $newProduct->save();
        $newProduct->categories()->sync($request->get('categories'));

        return redirect(route('products.index'));
    }

    protected function saveImage($img_data,$img_name){
        $uri = substr($img_data,strpos($img_data,",")+1);
        $img = Image::make($uri);
        $img->save(public_path('product_photos/'.$img_name));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
