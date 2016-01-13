@extends('app')

@section('title')
    Edit | {{$product->name}}
@stop

@section('content')

    <h1>Edit Product</h1>
    {!! Form::model($product,array('route' => array('products.update',$product['id']),'id'=>'product-edit-form','method'=>'put'))!!}
        @include('product.partials.form',['photoSelectionText'=>'Select another photo (or leave blank)','submitText'=>'Edit'])
    {!! Form::close() !!}
@stop

@section('scripts')
    @parent
    <script type="text/javascript" src="{!! asset('js/jquery.cropit.js') !!}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image-cropper').cropit({
                imageBackground: false,
                smallImage: 'allow'
            });
            $('.image-btn').click(function() {
                $('.cropit-image-input').click();
            });

            $("#product-edit-form").submit(function(e) {

                var img_data = $('#image-cropper').cropit('export', {
                    type: 'image/jpeg',
                    quality: .5
                });

                $('.image-input').val(img_data);

                return true;

                /*var url = $("#product-edit-form").attr('action');
                var formData = $("#product-edit-form").serialize();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    success: function(data)
                    {
                        alert(data);
                    }
                });

                e.preventDefault();*/
            });

        });
    </script>
@endsection