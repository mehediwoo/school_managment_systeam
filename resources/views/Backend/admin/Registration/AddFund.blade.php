@extends('layouts.master')
@section('title','Add Funds')
@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Fund Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('institute.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Fund Management</li>
        </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">All Student</div>
                <div class="">
                    <a href="{{ route('addmision.form') }}" class="btn btn-primary py-1 px-4">Add New Student</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive mt-2">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom ">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Session Name</th>
                                <th scope="col">Pay For</th>
                                <th scope="col">Ammount</th>
                                <th scope="col">Pay Status</th>
                                <th scope="col">Pay Online</th>
                                <th scope="col">Print Paid Voucher</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="body_id">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- ROW-1 CLOSED -->
@endsection

@section('scripts')

<script>
    function otherQualification() {
        var qualification=document.getElementById('edu_qualification').value;
        if( qualification=='others'){
            document.getElementById('other').style.display='block';

        }

        else{
            document.getElementById('other').style.display='none';
        }
    }
</script>

@endsection

