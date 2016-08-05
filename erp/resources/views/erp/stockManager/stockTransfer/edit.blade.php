@extends('layouts.app')

{{-- 注入倉庫選項的檔案 --}}
@inject('WarehousePresenter', 'Warehouse\WarehousePresenter')

{{-- 引入表身的html 檔案 --}}
@include('erp.order_form_body', [
    'discount_enabled' => false
])

{{-- 引入表尾的html 檔案 --}}
@include('erp.order_form_foot', [
    'tax_enabled' => false
])


@section('content')
        <script type="text/javascript">
            var app_name     = 'stockTransfer';

            var _tax_rate       = {{ Config::get('system_configs')['purchase_tax_rate'] }};
            var _quantity_round_off      = {{ Config::get('system_configs')['quantity_round_off'] }};
            var _no_tax_price_round_off  = {{ Config::get('system_configs')['no_tax_price_round_off'] }};
            var _no_tax_amount_round_off = {{ Config::get('system_configs')['no_tax_amount_round_off'] }};
            var _tax_round_off           = {{ Config::get('system_configs')['tax_round_off'] }};
            var _total_amount_round_off  = {{ Config::get('system_configs')['total_amount_round_off'] }};
        </script>
        <script type="text/javascript" src="{{ asset('assets/js/stockManager/stockTransfer.js') }}"></script>
        <form action="{{ url("/stockTransfer/".${$headName}['code']) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div id="master_table" class="custom-table">
                <div class="tr">
                    <div class="td">開單日期</div>
                    <div class="td">
                        <input type="text" name="{{ $headName }}[date]" class="datepicker"
                            value="{{ ${$headName}['date'] }}">
                    </div>
                </div>
                <div class="tr">
                    <div class="td">轉倉單號</div>
                    <div class="td"><input type="text" value="{{ ${$headName}['code'] }}" readonly=""></div>
                </div>
                <div class="tr">
                    <div class="th">轉倉單備註</div>
                    <div class="td">
                        <textarea name="{{ $headName }}[note]">{{ ${$headName}['note'] }}</textarea>
                    </div>
                </div>
               <div class="tr">
                    <div class="th">調出倉庫</div>
                    <div class="td">
                        <select name="{{ $headName }}[from_warehouse_id]">
                            <option></option>
                            {!! $WarehousePresenter->renderOptions(${$headName}['from_warehouse_id']) !!}
                        </select>
                    </div>
                </div>
                <div class="tr">
                    <div class="th">調入倉庫</div>
                    <div class="td">
                        <select name="{{ $headName }}[to_warehouse_id]">
                            <option></option>
                            {!! $WarehousePresenter->renderOptions(${$headName}['to_warehouse_id']) !!}
                        </select>
                    </div>
                </div>
            </div>

    {{-- 置入表身項目 --}}
    @yield('form_body')
    {{-- 置入表尾項目 --}}
    @yield('form_foot')

            <button type="submit" class="btn btn-default">確認送出</button>
        </form>

@endsection