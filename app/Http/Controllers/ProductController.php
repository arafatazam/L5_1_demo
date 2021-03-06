<?php

namespace App\Http\Controllers;

use Image;
use Gate;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct(){
        switch(request()->route()->getName()){
            case 'products.index':
            case 'products.show':
                if(Gate::denies('view')){
                    abort(403,'Access Denied');
                }
                break;
            default:
                if(Gate::denies('administer')){
                    abort(403,'Access Denied');
                }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(\App\Product $productModel,\App\Category $categoryModel)
    {
        $category_id = request('cat');
        $categories = $categoryModel->all()->lists('title','id');
        if($category_id){
            $categoryModel->findOrFail($category_id);
            $products = $productModel->whereHas('categories',function($query) use($category_id){
                $query->where('category_id',$category_id);
            })->get()->toArray();
        }else{
            $products = $productModel->all()->toArray();
        }
        return view('product.index',compact('products','categories','category_id'));
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
    public function store(Request $request,\App\Product $productModel,\App\Category $categoryModel)
    {
        $image_name = $productModel->generateUniqueImageName();
        $this->saveImage($request->get('image'),$image_name);

        $newProduct = $productModel->newInstance($request->all());
        $newProduct->photo = $image_name;
        $newProduct->save();

        $completeCategories = $categoryModel->getFullCategoryList($request->get('categories'));
        $newProduct->categories()->sync($completeCategories);

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
    public function show($id,\App\Product $productModel)
    {
        $product = $productModel->with('categories')->findOrFail($id)->toArray();
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,\App\Product $productModel,\App\Category $categoryModel)
    {
        $product = $productModel->with('categories')->findOrFail($id);
        $selected_categories = $product->categories->lists('id')->toArray();
        $categories = $categoryModel->all()->lists('title','id');
        return view('product.edit',compact('product','categories','selected_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, \App\Product $productModel,\App\Category $categoryModel)
    {
        $product = $productModel->findOrFail($id);

        if($request->get('image')){
            $image_name = $product->photo;
            $this->saveImage($request->get('image'),$image_name);
        }

        $product->update($request->all());
        $completeCategories = $categoryModel->getFullCategoryList($request->get('categories'));
        $product->categories()->sync($completeCategories);

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,\App\Product $productModel)
    {
        $product = $productModel->findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
