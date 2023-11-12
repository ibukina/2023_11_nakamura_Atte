@extends('layouts.before')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="content-login">
    <div class="login-form_title">ログイン</div>
    <div class="login-form_wrapper">
        <form class="login-form" action="/login" method="post">
            @csrf
            <label class="login-form_item">
                <input type="text" name="email" class="login-form_item-input" placeholder="メールアドレス">
            </label>
            <label class="login-form_item">
                <input type="password" name="password" class="login-form_item-input" placeholder="パスワード">
            </label>
            <label class="login-form_item">
                <button class="login-form_item-button" type="submit">ログイン</button>
            </label>
        </form>
    </div>
    <p class="login-form_text">アカウントをお持ちでない方はこちらから</p>
    <p class="login-form_text">
        <a class="login-form_text-link" href="/register">会員登録</a>
    </p>
</div>
@endsection