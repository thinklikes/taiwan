@extends('layouts.app')
{{--
@section('sidebar')
    @parent

    <p>這邊會附加在主要的側邊欄。</p>
@endsection
--}}
@section('content')

        <table width="100%">
            <tr>
                <th>倉庫代號</th>
                <td>{{ $warehouse->code }}</td>
            </tr>
            <tr>
                <th>倉庫說明</th>
                <td>{{ $warehouse->comment }}</td>
            </tr>
        </table>
        <a href="{{ url("/warehouse/$id/edit") }}" class="btn btn-default">維護倉庫資料</a>
        <form action="{{ url("/warehouse/$id") }}" class="form_of_delete" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">刪除倉庫</button>
        </form>
@endsection