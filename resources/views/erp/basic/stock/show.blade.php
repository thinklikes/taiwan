@extends('layouts.app')

@inject('BarcodeGenerator', 'Picqer\Barcode\BarcodeGeneratorJPG')

@include('erp.show_button_group', [
    'printBarcode_enabled' => true,
    'print_enabled'        => false,
    'delete_enabled'       => true,
    'edit_enabled'         => true,
    'chname'               => '料品',
    'route_name'           => 'stock',
    'code'                 => $stock->id
])

@section('sidebar')

<div class="panel panel-default">
    <div class="panel-heading">庫存情形</div>

    <div class="panel-body">
    <table width="100%">
        <thead>
            <tr>
                <th>倉庫</th>
                <th>庫存量</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($stock->stocks_warehouses as $values)
        @if ($values->warehouse)
            <tr>
                <td>{{ $values->warehouse->code or null }} {{ $values->warehouse->comment or null}}</td>
                <td align="right">{{ $values->inventory or null}}</td>
            </tr>
        @endif
    @endforeach
        </tbody>

    </table>
    </div>
</div>
@endsection

@section('content')
        <div style="float:right; margin-bottom:10px;">
            <img class="barcode" src="data:image/png;base64, {{
                base64_encode(
                    $BarcodeGenerator->getBarcode(
                        $stock->code, $BarcodeGenerator::TYPE_CODE_128))
            }}">
        </div>
        <table width="100%" class="table">
            <tr>
                <th>料品代號</th>
                <td>{{ $stock->code }}</td>
            </tr>
            <tr>
                <th>料品名稱</th>
                <td>{{ $stock->name }}</td>
            </tr>
            <tr>
                <th>淨重</th>
                <td>{{ $stock->net_weight }}</td>
            </tr>
            <tr>
                <th>毛重</th>
                <td>{{ $stock->gross_weight }}</td>
            </tr>
            <tr>
                <th>料品類別</th>
                <td>
                    {{ 
                        ($stock->stock_class) 
                            ? $stock->stock_class->code.' '.$stock->stock_class->comment 
                            : ""
                    }}
                </td>
            </tr>
            <tr>
                <th>料品單位</th>
                <td>
                    {{ 
                        ($stock->unit) 
                            ? $stock->unit->code.' '.$stock->unit->comment 
                            : ""
                    }}
                </td>
            </tr>
            <tr>
                <th>進貨價格</th>
                <td>{{ $stock->no_tax_price_of_purchased }}</td>
            </tr>
            <tr>
                <th>銷貨價格</th>
                <td>{{ $stock->no_tax_price_of_sold }}</td>
            </tr>
        </table>
    {{-- 資料檢視頁的按鈕群組 --}}
    @yield('show_button_group')
@endsection