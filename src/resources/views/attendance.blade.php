@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="content-attendance">
    <div class="attendance-list_date"></div>
    <table class="attendance-list_table">
        <tr class="table-row">
            <th class="table-header">名前</th>
            <th class="table-header">勤務開始</th>
            <th class="table-header">勤務終了</th>
            <th class="table-header">休憩時間</th>
            <th class="table-header">勤務時間</th>
        </tr>
        <tr class="table-row">
            <td class="table-data"></td>
            <td class="table-data"></td>
            <td class="table-data"></td>
            <td class="table-data"></td>
            <td class="table-data"></td>
        </tr>
    </table>
    <div class="attendance-list_page"></div>
</div>
@endsection