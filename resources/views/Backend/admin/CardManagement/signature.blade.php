
@extends('layouts.master')
@section('title','Signature')
@section('styles')



@endsection

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Signature</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Signature Upload</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">

    <div class="col-xl-4">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Admit card signature</div>
            </div>
            <div class="card-body">

                <form action="{{ route('signature.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="">Signature Image</label>
                        <input type="file" name="signature_image" class="form-control">
                        @error('signature_image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <img src="{{ asset($signature->examination_signature_img) }}" style="height: 150px; width:200px">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-primary-gradient">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Certificate signature</div>
            </div>
            <div class="card-body">

                <form action="{{ route('certificate.signature') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="">Exam Controller Signature</label>
                                <input type="file" name="controller_signature" class="form-control">
                                @error('controller_signature')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <img src="{{ asset($certificate->controller_signature) }}" style="height: 150px; width:200px">
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="">Chairman Signature</label>
                                <input type="file" name="chairman_signature" class="form-control">
                                @error('chairman_signature')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <img src="{{ asset($certificate->chairman_signature) }}" style="height: 150px; width:200px">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-primary-gradient">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

    });
</script>

@endsection


