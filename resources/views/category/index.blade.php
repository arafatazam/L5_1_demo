@extends('app')

@section('title')
    Categories
@stop

@section('content')
    <h1>Categories</h1>
    <a class="btn btn-large btn-success" href="#">Add New</a>
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
                    <a class="btn btn-warning" href="#">View</a>
                    <a class="btn btn-success" href="#">Edit</a>
                    <a class="btn btn-danger" href="#">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop