@extends('app')

@section('title')
    Categories
@stop

@section('content')
    <h1>Categories</h1>
    <a class="btn btn-large btn-success" href="{{route('categories.create')}}">Add New</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Parent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category['title']}}</td>
                <td>{{$category['parent']['title'] or 'N/A'}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('categories.edit',[$category['id']])}}">Edit</a>
                    {!! Form::open(array('route'=>array('categories.destroy',$category['id']),'method' => 'delete','style'=>'display:inline')) !!}
                    {!! Form::submit('Delete',array('class'=>'btn btn-danger')) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop