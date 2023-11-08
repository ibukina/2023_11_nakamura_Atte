@extends('layouts.before')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="content-register">
    <div class="register-form_title">会員登録</div>
    <div class="register-form_wrapper">
        <form class="register-form" action="">
            <label class="register-form_item">
                <input type="text" class="register-form_item-input">
            </label>
            <label class="register-form_item">
                <input type="text" class="register-form_item-input">
            </label>
            <label class="register-form_item">
                <input type="text" class="register-form_item-input">
            </label>
            <label class="register-form_item">
                <input type="text" class="register-form_item-input">
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