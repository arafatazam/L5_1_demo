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
                        <div>
                            <a class="btn btn-primary btn-sm" href="{{route('products.edit',[$product['id']])}}">Edit</a>
                            {!! Form::open(array('route'=>array('products.destroy',$product['id']),'method' => 'delete','style'=>'display:inline')) !!}
                            {!! Form::submit('Delete',array('class'=>'btn btn-danger btn-sm')) !!}
                            {!! Form::close() !!}
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

@stop