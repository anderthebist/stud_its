@extends('layout.all')

@section('title',"Auth");

@section('styles')
    <link rel="stylesheet" href={{ asset("/css/auth.css") }}>
@endsection

@section('content')
<div class="auth_block">
    <form method="POST" class="auth_form" action="{{ route('login') }}">
        @csrf
        
        <h3 class="auth_title">
            Авторизация
        </h3>
        @if (!$errors->isEmpty())
            <div class="auth_error">
                {{ $errors->all()[0] }}
            </div>
        @endif

        <input id="email" type="text" class="auth_field" name="email" value="{{ old('email') }}" placeholder="Адрес электроной почты" 
        autocomplete="email" autofocus>
        <input id="password" type="password" class="auth_field" name="password" value="" placeholder="Пароль" autocomplete="current-password">
        <input type="checkbox" name="remember" id="remember" checked style="display: none">

        <div class="auth_input">
            <button type="submit" class="auth_btn">
                Войти
            </button>
        </div>
    </form>
</div>

@endsection
