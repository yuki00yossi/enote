@extends('base')
@section('title', 'register')
@section('somehead')
<link rel="stylesheet" href="/css/form-style.css">
@endsection
@section('contents')
<div class="text-center">
    <h2>設定 - Settings -</h2>
</div>

<!-- password setting -->
<form class="form" method="POST" action="{{ route('password.update') }}" style="padding-top: .5rem;">
    @csrf
    @method('put')
    <h3>Update Password</h3>
    <p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>    
    @if (session('status') === 'password-updated')
    <p><small>You have been changed password successfuly.</small></p>
    @endif
    <div>
        <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
        <input id="current_password" type="password" name="current_password" required>
        <ul class="err-word">
            @foreach ($errors->updatePassword->get('current_password') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <label for="password" class="form-label">{{ __('New Password') }}</label>
        <input id="password" type="password" name="password" required>
        <ul class="err-word">
            @foreach ($errors->updatePassword->get('password') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
        <ul class="err-word">
            @foreach ($errors->updatePassword->get('password_confirmation') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <button type="submit">{{ __('Save') }}</button>
</form>
@endsection