@extends('app')

@section('title')
    Products
@stop

@section('content')

    <h1>Products</h1>
    <a class="btn btn-large btn-success" href="{{route('products.create')}}">Add New</a>
    <div class="row" style="margin-top: 2em">
        @foreach($products as $product)
            <div class="col-xs-4 col-sm-3">
                <div class="img-thumbnail">
                    <a href="{{route('products.show',[$product['id']])}}">
                        <img class="img-responsive" src="{{url('product_photos/'.$product['photo'])}}" alt="{{$product['name']}}"/>
                        <h4>{{$product['name']}}</h4>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

@stop