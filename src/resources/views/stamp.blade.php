@extends('layouts.after')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('content')
<div class="content-stamp">
    <div class="stamp-form_title">
        さんお疲れ様です！
    </div>
    <div class="stamp-form_wrapper">
        <form class="stamp-form" action="">
            <div class="stamp-form_item">
                <button class="stamp-form_item-button">勤務開始</button>
            </div>
            <div class="stamp-form_item">
                <button class="stamp-form_item-button">勤務終了</button>
            </div>
            <div class="stamp-form_item">
                <button class="stamp-form_item-button">休憩開始</button>
            </div>
            <div class="stamp-form_item">
                <button class="stamp-form_item-button">休憩終了</button>
            </div>
        </form>
    </div>
</div>
@endsection