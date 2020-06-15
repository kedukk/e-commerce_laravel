<!DOCTYPE html>
<html lang="en" dir="ltr" >
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{asset('login.css')}}" type="text/css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/User/images/shirt.png')}}" type="image/x-icon">
    <title>َLogin | MakeUpBeauty</title>
</head>
<div class="container box">
    <form class="box" method="post" action="{{ route('login') }}">
        <h3 align="center">LOGIN</h3><br />
        @csrf
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
        <h6>Belum memiliki akun?
            <a class="up" href="{{ route('register') }}">Registrasi</a>
        </h6>
        <div>
            <input type="submit" name="login" value="Login" />
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
    </form>
</div>
</html>
