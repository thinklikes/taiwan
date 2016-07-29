@extends('layouts.app')

@section('sidebar')

<div class="panel panel-default">
    <div class="panel-heading">搜尋</div>

    <div class="panel-body">
        <form action="" method="GET">
            <table>
                <tr>
                    <td>公司名稱</td>
                </tr>
                <tr>
                    <td><input type="text" name="name" size="15"></td>
                </tr>
                <tr>
                    <td>地址</td>
                <tr>
                    <td><input type="text" name="address" size="15"></td>
                </tr>
            </table>
            <button>搜尋</button>
        </form>
    </div>
</div>

@endsection

@section('content')

    <!-- Bootstrap 樣板... -->
<table width="100%">
    <thead>
        <tr>
            <th>公司名稱</th>
            <th>聯絡人</th>
            <th>電話</th>
            <th>地址</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($company as $value)
        <tr>
            <td><a href="{{ url("/company/".$value->auto_id) }}">{{ $value->company_name }}</a></td>
            <td>{{ $value->company_contact }}</td>
            <td>{{ $value->company_tel }}</td>
            <td>{{ $value->company_add }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div align="center">{!! $company->render() !!}</div>
<br>
<a href="company/create">新增客戶</a>
@endsection