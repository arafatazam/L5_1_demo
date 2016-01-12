@extends('app')

@section('title')
    Edit | {{$category['title']}}
@stop

@section('content')
    <h1>Edit Category</h1>
    {!! Form::model($category, array('route' => array('categories.update',$category['id']),'method'=>'put'))!!}
    @include('category.partials.form',['submitBtnText'=>'Edit Category'])
    {!! Form::close() !!}

@stop