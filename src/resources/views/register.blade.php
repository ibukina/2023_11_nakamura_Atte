@extends('layouts.before')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="content-register">
    <div class="register-form_title">会員登録</div>
    <div class="register-form_wrapper">
        <form class="register-form" action="/register" method="post">
            @csrf
            <label class="register-form_item">
                <input type="text" name="username" class="register-form_item-input" placeholder="名前">
            </label>
            <label class="register-form_item">
                <input type="text" name="email" class="register-form_item-input" placeholder="メールアドレス">
            </label>
            <label class="register-form_item">
                <input type="password" name="password" class="register-form_item-input" placeholder="パスワード">
            </label>
            <label class="register-form_item">
                <input type="password" name="password_confirm" class="register-form_item-input" placeholder="確認用パスワード">
            </label>
            <label class="register-form_item">
                <button class="register-form_item-button" type="submit">会員登録</button>
            </label>
        </form>
    </div>
    <p class="register-form_text">アカウントをお持ちの方はこちらから</p>
    <p class="register-form_text">
        <a class="register-form_text-link" href="/login">ログイン</a>
    </p>
</div>
@endsection