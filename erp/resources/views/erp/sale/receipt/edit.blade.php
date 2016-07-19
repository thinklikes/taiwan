@extends('layouts.app')

@inject('PublicPresenter', 'App\Presenters\PublicPresenter')

@section('content')

        <script type="text/javascript" src="{{ asset('assets/js/sale/bindCompanyAutocomplete.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/bindDatePicker.js') }}"></script>
        <script type="text/javascript">
            //客戶自動完成所需資訊
            var company_url = '/company/json';
            var triggered_by = {
                autocomplete: 'input.company_autocomplete',
                scan: 'input.company_code'
            };
            var auto_fill = {
                id: 'input.company_id',
                code :'input.company_code',
                name : 'input.company_autocomplete'
            };
            var after_triggering = {
                scan: function () {
                    if ($('input.stock_code:first').length > 0) {
                        $('input.stock_code:first').focus();
                    }
                }
            };
            var companyAutocompleter = new CompanyAutocompleter(company_url, triggered_by, auto_fill, after_triggering);
            $(function () {
                companyAutocompleter.eventBind();
            });
        </script>
        <form action="{{ url("/receipt/".$receipt['code']) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
           <table id="master" width="100%">
                <tr>
                    <th>建立日期</th>
                    <td>{{ $PublicPresenter->getNewDate() }}</td>
                    <th>收款日期</th>
                    <td><input type="text" name="receipt[receive_date]" class="datepicker" size="10" value="{{ $receipt['receive_date'] }}"></td>
                </tr>
                <tr>
                    <th>是否沖銷</th>
                    <td>{{ $receipt->isWrittenOff == 1 ? '是' : '否' }}</td>
                    <th>收款單號</th>
                    <td><input type="text" id="code" value="{{ $receipt['code'] }}" readonly=""></td>

                </tr>
                <tr>
                    <th>客戶</th>
                    <td colspan="5">
                        <input type="hidden" name="receipt[company_id]" class="company_id" value="{{ $receipt['company_id'] }}"  size="10">
                        {{-- <input type="text" name="receipt[company_code]" class="company_code" value="{{ $receipt['company_code'] }}"  size="10"> --}}
                        <input type="text" name="receipt[company_name]" class="company_autocomplete" value="{{ $receipt['company_name'] }}">
                    </td>
                </tr>
                <tr>
                    <th>收款方式</th>
                    <td colspan="5">
                        <input type="radio" name="receipt[type]" value="cash"
                            onclick="$('div#check_contents').find('input').attr('disabled', true);"
                            {{ $receipt['type'] == "cash" || $receipt['type'] == '' ? 'checked=""' : ''}}>現金
                        <input type="radio" name="receipt[type]" value="check"
                            onclick="$('div#check_contents').find('input').attr('disabled', false);"
                            {{ $receipt['type'] == "check" ? 'checked=""' : ''}}>票據
                    </td>
                </tr>
                <tr>
                    <th>收款單備註</th>
                    <td colspan="5">
                        <input type="text" name="receipt[note]" id="master_note" value="{{ $receipt['note'] }}" size="50">
                    </td>
                </tr>
            </table>
            <hr>
            <div id="check_contents">
                <table width="100%">
                    <tr>
                        <td>票據號碼</td>
                        <td>
                            <input type="text" name="receipt[check_code]"
                                {{ $receipt['type'] == "cash" || $receipt['type'] == '' ? 'disabled=""' : ''}}
                                value="{{ isset($receipt['check_code']) ? $receipt['check_code'] : '' }}">
                        </td>
                    </tr>
                    <tr>
                        <td>到期日</td>
                        <td>
                            <input type="text" class="datepicker" name="receipt[expiry_date]" size="10"
                                {{ $receipt['type'] == "cash" || $receipt['type'] == '' ? 'disabled=""' : ''}}
                                value="{{ isset($receipt['expiry_date']) ? $receipt['expiry_date'] : '' }}">
                        </td>
                    </tr>
                    <tr>
                        <td>銀行帳號</td>
                        <td>
                            <input type="text" name="receipt[bank_account]"
                                {{ $receipt['type'] == "cash" || $receipt['type'] == '' ? 'disabled=""' : '' }}
                                value="{{ isset($receipt['bank_account']) ? $receipt['bank_account'] : '' }}">
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <table width="100%">
                    <tr>
                        <td>收款金額</td>
                        <td>
                            <input type="text" name="receipt[amount]" style="text-align:right;"
                                value="{{ $receipt['amount'] }}">
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
    @if ($receipt->isWrittenOff == 0)
            <button type="submit">確認送出</button>
        </form>
    @endif
@endsection