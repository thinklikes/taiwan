<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/printTag.css') }}">
<div class="tag_container">
@foreach($companies as $company)

        <div class="tag_content">
            <p class="mailbox">{{ $company->mailbox }}</p>
            <p class="address">{{ $company->company_add }}</p>
            <p class="company_name">{{ $company->company_code }} {{ $company->company_name }}</p>
            <p class="boss">{{ $company->boss }} {{ $company->company_tel }}</p>
        </div>

@endforeach
</div>