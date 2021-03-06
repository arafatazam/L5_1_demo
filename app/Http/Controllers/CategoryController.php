<?php

namespace App\Http\Controllers;

use Gate;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct(){

        if(Gate::denies('administer')){
            abort(403,'Access Denied');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(\App\Category $categoryModel)
    {
        $categories = $categoryModel->all()->load('parent')->toArray();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(\App\Category $categoryModel)
    {
        $categories =[0=>''] + $categoryModel->all()->lists('title','id')->toArray();
        return view('category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,\App\Category $categoryModel)
    {
        $categoryModel->create($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,\App\Category $categoryModel)
    {
        $category = $categoryModel->findOrFail($id);
        $categories = $categoryModel->all()->except([$id])->lists('title','id')->toArray();
        return view('category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,\App\Category $categoryModel)
    {
        $category = $categoryModel->findOrFail($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,\App\Category $categoryModel)
    {
        $category = $categoryModel->findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
