@section('show_button_group')
    @if (isset($printBarcode_enabled) && $printBarcode_enabled)
    <a href="{{ url("/{$route_name}/{$code}/printBarcode") }}"
        target="_blank" class="btn btn-default">
        列印{{ $chname }}條碼
    </a>
    @endif

    @if (isset($printTag_enabled) && $printTag_enabled)
    <a href="{{ url("/{$route_name}/{$code}/printTag") }}"
        target="_blank" class="btn btn-default">
        列印{{ $chname }}名條
    </a>
    @endif

    @if ($print_enabled)
        <a href="{{ url("/{$route_name}/{$code}/printing") }}"
            target="_blank" class="btn btn-default">
            列印{{ $chname }}
        </a>
    @endif

    @if ($edit_enabled)
        <a href="{{ url("/{$route_name}/{$code}/edit") }}"
            class="btn btn-default">維護{{ $chname }}</a>
    @endif

    <a href="{{ url("/{$route_name}/create") }}"
        class="btn btn-success">繼續新增{{ $chname }}</a>

    @if ($delete_enabled)
        <form action="{{ url("/{$route_name}/{$code}") }}"
            class="form_of_delete" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger" onclick="return confirm('確認刪除{{ $chname }}??');">
                刪除{{ $chname }}
            </button>
        </form>
    @endif
@endsection