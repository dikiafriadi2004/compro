@extends('auth.layouts')

@section('title')
    Login
@endsection

@section('content')
    <div class="auth-main">
        <div class="codex-authbox">
            <div class="auth-header">
                <div class="codex-brand"><a href="index.html"><img class="img-fluid light-logo"
                            src="{{ asset('backend/assets/images/logo/logo.png') }}" alt="" style="height: 35px; width: auto;"></a></div>
                <h3>welcome to CMS Konter Digital</h3>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input class="form-control @error('input_type') is-invalid @enderror" type="text" name="input_type" id="input_type"
                        required placeholder="Enter Username" value="{{ old('input_type') }}">
                    @error('input_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="Password">Password</label>
                    <div class="input-group group-input">
                        <input class="form-control showhide-password @error('password') is-invalid @enderror"
                            type="password" name="password" id="Password" placeholder="Enter Your Password"
                            required=""><span class="input-group-text toggle-show fa fa-eye"></span>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-0">
                    <div class="auth-remember">
                        <div class="form-check custom-chek">
                            <input class="form-check-input" id="agree" type="checkbox" name="remember" value="">
                            <label class="form-check-label" for="agree">Remember me</label>
                        </div><a class="text-primary f-pwd" href="forgot-password.html">Forgot your password?</a>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i> Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
