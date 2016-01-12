<div class="form-group">
    {!! Form::label('title','Title') !!}
    {!! Form::text('title',null,array('class'=>'form-control','placeholder'=>'Give A Title')) !!}
</div>
<div class="form-group">
    {!! Form::label('parent_id','Parent') !!}
    {!! Form::select('parent_id', $categories,null,array('class'=>'form-control')); !!}
</div>
{!! Form::submit($submitBtnText,array('class'=>'btn btn-large btn-primary')) !!}
<a class="btn btn-large btn-default" href="{{route('categories.index')}}">Cancel</a>