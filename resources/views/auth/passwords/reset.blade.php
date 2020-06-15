<!DOCTYPE html>
    <html lang="en" dir="ltr" >
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="{{asset('login.css')}}" type="text/css" rel="stylesheet">
        <title>َReset Password</title>
    </head>
    <body>
        <div class="container box">
            <form method="POST" class="box" action="{{ route('password.update') }}">
                @csrf
                <h2>Reset Password</h2>
                <input type="hidden" name="token" value="{{ $token }}">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Your Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype Password">
                <div>
                    <input type="submit" name="submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </body>
    </html>
