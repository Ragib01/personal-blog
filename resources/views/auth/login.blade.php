@extends('layouts.auth')

@section('content')
    <div class="animated fadeIn">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group mb-0">
                    <div class="card p-2">

                        <div class="row">
                            <div class="col-md-12">
                                @include('inc.notification')
                            </div>
                        </div>

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>

                            <div class="input-group mb-1 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}" required autofocus>


                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block" style="color: #9f191f">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                            <div class="input-group mb-2 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input id="password" type="password" placeholder="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-2">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-link px-0" href="{{ route('password.request') }}">Forgot password?</a>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%">
                        <div class="card-block text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p>If you are not registered <br>then register first.</p>
                                <a class="btn btn-primary active mt-1" href="{{ route('register') }}">Register Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
@endsection