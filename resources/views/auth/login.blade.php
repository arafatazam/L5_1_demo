@extends('app')

@section('title')
    Sign In
@stop

@section('content')
    <div class="row">
        <div class="col-xs-offset-3 col-xs-6">
            <h2>Sign In</h2>
            {!! Form::open(array('route'=>'auth.login')) !!}
                <div class="form-group">
                    {!! Form::label('email','Email') !!}
                    {!! Form::text('email',null,['placeholder'=>'youremail@yourdomain.com','autocomplete'=>'off','class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password','Password') !!}
                    {!! Form::password('password',['placeholder'=>'password','autocomplete'=>'off','class'=>'form-control']) !!}
                </div>
                {!! Form::submit('Sign In',['class'=>'btn btn-lg btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop