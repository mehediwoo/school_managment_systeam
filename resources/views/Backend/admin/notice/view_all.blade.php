@extends('layouts.master')
@section('title','All Notice')
@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">All Notice</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('institute.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">All important notice</li>
        </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    @if (!empty($notice) && $notice->count() > 0)
    @foreach ($notice as $iteam)
    <!-- COL-OPEN -->
    <div class="col-xl-3 col-md-6 col-lg-6 mt-3">
        <a href="{{ route('notice.details',$iteam->id) }}">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset($iteam->image) }}" alt="" class="avatar avatar-xxl bradius">
                    <h4 class="h4 mb-0 mt-3">{{ $iteam->title }}</h4>
                    <p class="card-text">{{ date('Y-m-d, H:m',strtotime($iteam->date)) }}</p>
                    <p>{{ substr(strip_tags($iteam->description),0,100) }}</p>
                </div>
            </div>
        </a>
    </div>
    <!-- COL-END -->
    @endforeach
    @endif
    {{ $notice->links() }}
</div>
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')


@endsection
