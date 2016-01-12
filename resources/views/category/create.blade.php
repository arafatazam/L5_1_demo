@extends('app')

@section('title')
    Add New Category
@stop

@section('content')
    <h1>New Category</h1>
    {!! Form::open(array('route' => 'categories.store'))!!}
        <div class="form-group">
            {!! Form::label('title','Title') !!}
            {!! Form::text('title',null,array('class'=>'form-control','placeholder'=>'Give A Title')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('parent','Parent') !!}
            {!! Form::select('parent', $categories,null,array('class'=>'form-control')); !!}
        </div>
    {!! Form::submit('Add Category',array('class'=>'btn btn-large btn-primary')) !!}
    {!! Form::close() !!}

@stop