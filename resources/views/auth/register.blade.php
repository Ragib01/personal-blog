@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="col-md-6">
        <div class="card mx-2">
            <div class="card-block p-2">
                <h1>Register</h1>
                <p class="text-muted">Create your account</p>
                {!! Form::open(['url' => route('register'), 'method' => 'post']) !!}
                <div class="input-group mb-1">
                    <span class="input-group-addon"><i class="icon-user"></i></span>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="You Name">
                </div>
                @if ($errors->has('name'))
                    <p class="text-danger"><strong>{{ $errors->first('name') }}</strong></p>
                @endif

                <div class="input-group mb-1">
                    <span class="input-group-addon">@</span>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">
                </div>
                @if ($errors->has('email'))
                    <p class="text-danger"><strong>{{ $errors->first('email') }}</strong></p>
                @endif

                <div class="input-group mb-1">
                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                </div>
                @if ($errors->has('password'))
                    <p class="text-danger"><strong>{{ $errors->first('password') }}</strong></p>
                @endif

                <div class="input-group mb-2">
                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                </div>
                @if ($errors->has('password_confirmation'))
                    <p class="text-danger"><strong>{{ $errors->first('password_confirmation') }}</strong></p>
                @endif

                <button href="{{ route('register') }}" type="submit" class="btn btn-block btn-success">Create Account</button>
                {!! Form::close() !!}
            </div>
            <div class="card-footer p-2">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('login') }}" class="btn btn-block btn-primary">Login Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
