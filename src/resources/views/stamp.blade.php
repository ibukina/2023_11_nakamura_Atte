@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('js')
<script src="{{ mix('js/time.js') }}"></script>
@endsection

@section('content')
<div class="content-stamp">
    @foreach($users as $user)
    <div class="stamp-form_title">
        {{ $user }}さんお疲れ様です！
    </div>
    @endforeach
    <div class="stamp-form_wrapper">
        <div class="stamp-form">
            <form class="stamp-form_item" action="/work-start" method="post">
                @csrf
                <input type="hidden" name="clock_in" id="clock_in_time">
                <button class="stamp-form_item-button" id="button_clock_in">勤務開始</button>
            </form>
            <form class="stamp-form_item" action="/work-stop" method="post">
                @csrf
                <input type="hidden" name="clock_out" id="clock_out_time">
                <button class="stamp-form_item-button" id="button_clock_out">勤務終了</button>
            </form>
            <form class="stamp-form_item" action="/rest-start" method="post" >
                @csrf
                <input type="hidden" name="rest_start" id="rest_start_time">
                <button class="stamp-form_item-button" id="button_rest_start" >休憩開始</button>
            </form>
            <form class="stamp-form_item" action="/rest-stop" method="post">
                @csrf
                <input type="hidden" name="rest_stop" id="rest_stop_time">
                <button class="stamp-form_item-button" id="button_rest_stop">休憩終了</button>
            </form>
        </div>
    </div>
</div>
@endsection