@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('content')
<div class="content-stamp">
    @foreach($username as $user)
    <div class="stamp-form_title">
        {{ $user }}さんお疲れ様です！
    </div>
    @endforeach
    <div class="stamp-form_wrapper">
        <div class="stamp-form">
            <form class="stamp-form_item" action="/stamp/work" method="get">
                @csrf
                <button class="stamp-form_item-button">勤務開始</button>
            </form>
            <form class="stamp-form_item" action="/stamp/break" method="post">
                @csrf
                <button class="stamp-form_item-button">勤務終了</button>
            </form>
            <form class="stamp-form_item" action="/stamp/break" method="get">
                @csrf
                <button class="stamp-form_item-button">休憩開始</button>
            </form>
            <form class="stamp-form_item" action="/stamp/work" method="post">
                @csrf
                <button class="stamp-form_item-button">休憩終了</button>
            </form>
        </div>
    </div>
</div>
@endsection