@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="content-attendance">
    <div class="attendance-list_date">
        <form class="date-form_back" action="/date-back" method="post">
            @csrf
            <input type="hidden" name="date" value="{{ $date }}">
            <button class="date-button" id="back"><</button>
        </form>
        <div class="date">{{ $date }}</div>
        <form class="date-form_next" action="/date-next" method="post">
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
        @if(!empty($users))
        @foreach($users as $user)
        <tr class="table-row">
            <td class="table-data">{{ $user->username }}</td>
            <td class="table-data">{{ $user->clock_in }}</td>
            <td class="table-data">{{ $user->clock_out }}</td>
            <td class="table-data">{{ $user->rest_time }}</td>
            <td class="table-data">{{ $user->work_time }}</td>
        </tr>
        @endforeach
        @endif
    </table>
    <div class="attendance-list_page">
        {{ $users->links() }}
    </div>
</div>
@endsection