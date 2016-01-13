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
            <div class="btn btn-info image-btn">{{$photoSelectionText}}</div>
        </div>
    </div><!--image cropper-->
</div>
{!! Form::submit($submitText,array('class'=>'btn btn-large btn-primary')) !!}
<a class="btn btn-large btn-default" href="{{route('products.index')}}">Cancel</a>