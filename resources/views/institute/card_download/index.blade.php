@extends('layouts.master')

@section('title','Download Admit or Registration Card')

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Download Admit & Registration Card</h1>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">

    {{-- <div class="col-xl-6">
        <div class="card custom-card">
            <a href="javascript:void(0);" class="card-anchor"></a>
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <span class="avatar avatar-md">
                            <img src="{{ asset('static/cloud.jpg') }}" alt="img">
                        </span>
                    </div>
                    <div>
                        <p class="card-text mb-0 fs-14 fw-medium">
                            <a href="{{ route('ins.admitCard.download') }}">Admit Card Download</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="col-xl-6">

        <div class="card custom-card">
            <a href="javascript:void(0);" class="card-anchor"></a>
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <span class="avatar avatar-md">
                            <img src="{{ asset('static/cloud.jpg') }}" alt="img">
                        </span>
                    </div>
                    <div>
                        <p class="card-text mb-0 fs-14 fw-medium">
                            <a href="{{ route('ins.registration.card.template') }}">Registration Card Download</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')



@endsection
