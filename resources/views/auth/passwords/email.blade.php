@extends('layouts.app')
@section('content')
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
<form method="POST" form class="box" action="{{ route('password.email') }}">
    @csrf
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
        @endif
    </div>
    <h2>Reset Password</h2>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your email">
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <div><input type="submit" name="submit" class="btn btn-primary" /></div>
</form>
</div>
</body>
</html>
@endsection
