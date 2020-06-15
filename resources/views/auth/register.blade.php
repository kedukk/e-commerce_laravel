<!DOCTYPE html>
<html>
<head>
    <html lang="en" dir="ltr" >
    <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{asset('login.css')}}" type="text/css" rel="stylesheet">
    <title>َRegistrasi User</title>
</head>
<body>
    <div class="container box">
        <form method="POST" class="box2" action="{{ route('register') }}" enctype="multipart/form-data">@csrf
            <h3 align="center">REGISTER</h3><br />
            <div id="login">
                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" title="Password minimal 8 Karakter">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="password-confirm" placeholder="Retype Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <h6>Sudah memiliki akun? <a href="{{ route('login') }}">Login </a>
                    <input type="submit" name="submit" class="btn btn-primary" />
                </h6>
            </div>
        </form>
    </div>
</body>
</html>
