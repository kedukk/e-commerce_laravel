<!DOCTYPE html>
<html lang="en" dir="ltr" >
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="{{asset('Login.css')}}" type="text/css" rel="stylesheet">

        <title>َLogin Admin | MakeUpBeauty</title>
<?php 
    if(isset($_GET['alert'])){
        $status = $_GET['alert'];

        if($status =="warning"){
            echo "<script>alert(\"SILAHKAN LOGIN TERLEBIH DAHULU\")</script>";
        }elseif($status =="wrong" ){
            echo "<script>alert(\"USERNAME ATAU PASSWORD SALAH!\")</script>";
        }
    }
    ?>
</head>
<body>
    <form method="POST" class="box" action="{{ route('admin.login.submit') }}">
        @csrf
        <h1>Login Admin</h1>
        <div id="Login">
                @include('flash-message')
                @yield('content')
        </div>
        <div id="login">
            <input id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus class="form-control @error('username') is-invalid @enderror" placeholder="Username" />
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"/>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <input type="submit" name="login" value="Login"></input>
    </form>
</body>
