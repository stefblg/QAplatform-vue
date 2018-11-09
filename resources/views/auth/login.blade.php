
@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

        <img src="images/logo.png" alt="" class="mb-3 centered">
    </div>
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="" style="width:100%;">

                <div class="card-body">
                    {{--<form >--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="email">E-mail</label>--}}
                            {{--<input type="email" id="email" class="form-control" placeholder="user@example.com" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="password">Password</label>--}}
                            {{--<input type="password" id="password" class="form-control"  required>--}}
                        {{--</div>--}}

                        {{--<button type="submit" class="btn btn-default">Uloguj se--}}
                        {{--</button>--}}

                    {{--</form>--}}

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>




    </div>


@endsection
