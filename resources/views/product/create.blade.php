@extends('app')

@section('title')
    Create New Product
@stop

@section('content')

    <h1>New Product</h1>
    {!! Form::open(array('route' => 'products.store','id'=>'product-form'))!!}
        @include('product.partials.form',['photoSelectionText'=>'Select a product photo','submitText'=>'Create'])
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

            $("#product-form").submit(function(e) {

                var img_data = $('#image-cropper').cropit('export', {
                    type: 'image/jpeg',
                    quality: .5
                });

                if(!img_data){
                    alert('Please Select A Product Image');
                    return false;
                }

                $('.image-input').val(img_data);

                return true;

                /*var url = $("#product-form").attr('action');
                var formData = $("#product-form").serialize();

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