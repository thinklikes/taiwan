@extends('layouts.app')

@section('content')

        <form action="{{ url("/tax_rates/$id") }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <table width="100%">
                <tr>
                    <th>稅別代號</th>
                    <td><input type="text" name="tax_rate[code]" id="code" value="{{ $tax_rate['code'] }}"></td>
                </tr>
                <tr>
                    <th>稅別說明</th>
                    <td><input type="text" name="tax_rate[comment]" id="comment" value="{{ $tax_rate['comment'] }}"></td>
                </tr>
                <tr>
                    <th>稅率</th>
                    <td><input type="text" name="tax_rate[rate]" id="rate" value="{{ $tax_rate['rate'] }}"></td>
                </tr>
            </table>
            <button>確認送出</button>
        </form>

@endsection