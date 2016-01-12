@extends('app')

@section('title')
    Add New Category
@stop

@section('content')
    <h1>New Category</h1>
    {!! Form::open(array('route' => 'categories.store'))!!}
        @include('category.partials.form',['submitBtnText'=>'Add Category'])
    {!! Form::close() !!}

@stop