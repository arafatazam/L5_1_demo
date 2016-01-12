@extends('app')

@section('title')
    Categories
@stop

@section('content')
    <h1>Categories</h1>
    <a class="btn btn-large btn-success" href="{{route('categories.create')}}">Add New</a>
    <table class="table table-striped">
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
                    <a class="btn btn-danger" href="{{route('categories.destroy',[$category['id']])}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop