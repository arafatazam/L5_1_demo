@extends('app')

@section('title')
    Product | {{$product['name']}}
@stop

@section('content')
    <h1>Product Details</h1>
    <table class="table">
        <tr>
            <th class="col-xs-3">Name</th>
            <td>{{$product['name']}}</td>
        </tr>
        <tr>
            <th class="col-xs-3">Model</th>
            <td>{{$product['model']}}</td>
        </tr>
        <tr>
            <th class="col-xs-3">Categories</th>
            <td>
                @foreach($product['categories'] as $category)
                    {{$category['title']}} |
                @endforeach
            </td>
        </tr>
        <tr>
            <th class="col-xs-3">Photo</th>
            <td><img class="img-thumbnail" src="{{url('product_photos/'.$product['photo'])}}" alt="Image of {{$product['name']}}"/></td>
        </tr>
    </table>
@stop