@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="content-attendance">
    <div class="attendance-list_date">
        <form class="date-form_back" action="/date-back" method="get">
            @csrf
            <input type="hidden" name="date" value="{{ $date }}">
            <button class="date-button" id="back"><</button>
        </form>
        <div class="date">{{ $date }}</div>
        <form class="date-form_next" action="/date-next" method="get">
            @csrf
            <input type="hidden" name="date" value="{{ $date }}">
            <button class="date-button" id="next">></button>
        </form>
    </div>
    <table class="attendance-list_table">
        <tr class="table-row">
            <th class="table-header">名前</th>
            <th class="table-header">勤務開始</th>
            <th class="table-header">勤務終了</th>
            <th class="table-header">休憩時間</th>
            <th class="table-header">勤務時間</th>
        </tr>
        @if(!empty($works))
        @foreach($works as $work)
        <tr class="table-row">
            <td class="table-data">{{ $work->user->username }}</td>
            <td class="table-data">{{ date('H:i:s', strtotime($work->clock_in)) }}</td>
            <td class="table-data">{{ date('H:i:s', strtotime($work->clock_out)) }}</td>
            @foreach($work->rests as $rest)
            <td class="table-data">{{ $rest->rest_time }}</td>
            @endforeach
            <td class="table-data">{{ gmdate('H:i:s', strtotime($work->work_time) - strtotime($rest->rest_time)) }}</td>
        </tr>
        @endforeach
        @endif
    </table>
    <div class="attendance-list_page">
        {{ $works->appends(request()->query())->links() }}
    </div>
</div>
@endsection