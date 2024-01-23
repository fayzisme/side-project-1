@extends('layouts.app')

@section('content')
<main class="py-4 h-screen flex items-center justify-center">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('home.index') }}"><b>Sistem Pakar</b></a>
        </div>
    
        <div class="card">
            <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to manage apps</p>
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="input-group mb-3">
                <input placeholder= "E-Mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
    
                <div class="input-group mb-3">
                <input placeholder= "Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
    
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                 </div>
                </div>
    
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block text-white bg-blue-700 hover:bg-blue-800 ">Sign In</button>
            </div>
    
        </div>
    </form>
    
    <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
    </p>
    <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
    </p>
    </div>
    
    </div>
    </div>
</main>
@endsection