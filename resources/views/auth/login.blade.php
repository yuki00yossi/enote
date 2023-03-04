@extends('base')
@section('title', 'login')
@section('somehead')
<link rel="stylesheet" href="/css/form-style.css">
@endsection
@section('contents')
<div class="text-center">
    <h2>ログイン - Login -</h2>
</div>
<form class="form" method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email" class="form-label">{{ __('Email') }}</label>
        <input id="email" type="email" name="email" required autofocus placeholder="hoge@example.com">
        <ul class="err-word">
            @foreach ($errors->get('email') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" required>
        <ul class="err-word">
            @foreach ($errors->get('password') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <a href="{{ route('login') }}"><small>{{ __('Forgot your password?') }}</small></a>
    </div>

    <button type="submit">{{ __('Log in') }}</button>
</form>
@endsection