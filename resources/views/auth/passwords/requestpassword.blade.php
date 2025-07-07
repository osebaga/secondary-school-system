@extends('layouts.auth')

@section('title-content')
    <title>{{ config('app.name-short') }} | Password Recovery</title>
@endsection

@section('content')
     
                 <div class="form-horizontal m-t-10  card-box" style="width: 30rem;">
                    <div class="text-center">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-12 col-form-label text-md-center">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email"
                                           class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" placeholder="Enter your registered email" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        {{ __('Send Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
           
        </div>
    </div>
@endsection
