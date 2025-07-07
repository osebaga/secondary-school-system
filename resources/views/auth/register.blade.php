@extends('layouts.auth')

@section('title-content')
    <title>{{ config('app.name-short') }} | Register</title>
@endsection

@section('content')
    <div class=" card-box">
{{session('errors')}}
        <div class="text-center">
            <a href="" class="logo-lg"><img src="{{asset('assets/uploads/logo/logo.png')}}" height="75" class="img-responsive"> </a>
        </div>

        <form class="form-horizontal m-t-20" method="POST"  action="{{route('register')}}" aria-label="{{ __('Register') }}">
            @csrf
            <div class="form-group row">

                <div class="col-12">
                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required autofocus>

                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">

                <div class="col-12">
                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required autofocus>

                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                             <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                        </div>
                        <input name="username" class="form-control" type="text" required="" placeholder="Username">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                             <span class="input-group-text"><i class="mdi mdi-key"></i></span>
                        </div>
                        <input name="password" class="form-control" type="password" required="" placeholder="Password">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox-signup" type="checkbox" checked="checked">
                             <label for="checkbox-signup">
                            I accept <a href="#">Terms and Conditions</a>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group text-right m-t-20">
                <div class="col-xs-12">
                     <button class="btn btn-primary btn-custom waves-effect waves-light w-md" type="submit">Register</button>
                </div>
            </div>

            <div class="form-group row m-t-30">
                <div class="col-12 text-center">
                     <a href="{{route('login')}}" class="text-muted">Already have account?</a>
                </div>
            </div>
        </form>
    </div>
@endsection

