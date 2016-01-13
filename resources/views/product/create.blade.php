@extends('app')

@section('title')
    Create New Product
@stop

@section('content')

    <h1>New Product</h1>
    {!! Form::open(array('route' => 'products.store','id'=>'product-form'))!!}
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Give A Name','required')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('model','Model') !!}
        {!! Form::text('model',null,array('class'=>'form-control','placeholder'=>'Product Model','required')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('categories','Select Categories') !!}
        {!! Form::select('categories[]', $categories, null, ['id'=>'categories','multiple','required','class'=>'form-control'] ) !!}
    </div>
    <div class="form-group">
        <style>
            .cropit-image-preview {
                /* You can specify preview size in CSS */
                height: 300px;
                width: 300px;
                border: 2px dashed #aaa;
            }
            input.cropit-image-input {
                visibility: hidden;
            }
            .cropit-image-preview{
                margin: 0 auto;
                cursor:move;
            }
            .cropit-image-zoom-input {
                margin-top: 15px;
            }
        </style>
        <div id="image-cropper">
            <div class="cropit-image-preview-container">
                <div class="cropit-image-preview"></div>
            </div>
            <div class="form-group">
                <input type="range" class="cropit-image-zoom-input" />
            </div>
            <input type="file" class="cropit-image-input" />
            <input class="image-input form-control" name="image" type="hidden" />
            <div class="text-center">
                <div class="btn btn-info image-btn">Select a product photo</div>
            </div>
        </div><!--image cropper-->
    </div>
    {!! Form::submit('Create',array('class'=>'btn btn-large btn-primary')) !!}
    <a class="btn btn-large btn-default" href="{{route('categories.index')}}">Cancel</a>
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