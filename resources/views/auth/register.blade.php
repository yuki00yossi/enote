@extends('base')
@section('title', 'register')
@section('somehead')
<link rel="stylesheet" href="/css/form-style.css">
@endsection
@section('contents')
<div class="text-center">
    <h2>新規登録 - Registration -</h2>
</div>
<form class="form" method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <label for="name" class="form-label">{{ __('Name') }}</label>
        <input id="name" type="text" name="name" required autofocus placeholder="name">
        <ul class="err-word">
            @foreach ($errors->get('name') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <label for="email" class="form-label">{{ __('Email') }}</label>
        <input id="email" type="email" name="email" required placeholder="hoge@example.com">
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
        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
        <ul class="err-word">
            @foreach ($errors->get('password_confirmation') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <div>
        <a href="{{ route('login') }}"><small>{{ __('Already registered?') }}</small></a>
    </div>

    <button type="submit">{{ __('Register') }}</button>
</form>
@endsection