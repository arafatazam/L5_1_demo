@extends('app')

@section('title')
    Sign Up
@stop

@section('content')
    <div class="row">
        <div class="col-xs-offset-3 col-xs-6">
            <h2>Sign Up</h2>
            <form method="POST" action="{{route('auth.register')}}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" autocomplete="off" class="form-control" type="text" name="name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" autocomplete="off" class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" autocomplete="off" class="form-control" type="password" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" autocomplete="off" class="form-control" type="password" name="password_confirmation">
                </div>

                <div>
                    <button class="btn btn-lg btn-success" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
@stop