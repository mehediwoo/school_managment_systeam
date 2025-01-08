
@extends('layouts.master')
@section('title','Card Time Setup')
@section('styles')



@endsection

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Card Time Setup</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Card Time Setup</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Create Card Time Setup</div>
            </div>
            <div class="card-body">

                <form action="{{ route('card.time.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" name="date" class="form-control">
                                @error('date')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="">Time</label>
                                <input type="time" name="time" class="form-control">
                                @error('time')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="">Card Type</label>
                                <select name="card_type" class="form-control">
                                    <option value="admit">Admit Card</option>
                                    <option value="registration">Registration Card</option>
                                    <option value="certificate">Certificate</option>
                                </select>
                                @error('card_type')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option value="enable">Enable</option>
                                    <option value="disable">Disable</option>
                                </select>
                                @error('status')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-primary-gradient">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<!-- ROW-1 CLOSED -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <div class="card-title">Card Time List</div>
            </div>
            <div class="card-body">

                <table id="basic-datatable" class="table table-striped table-bordered">

                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Card Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($card != NULL)
                        @foreach ($card as $iteam)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $iteam->date }}</td>
                            <td>{{ $iteam->time }}</td>
                            <td>{{ ucfirst($iteam->card_type) }}</td>
                            <td>{{ ucfirst($iteam->status) }}</td>
                            <td>
                                <a href="{{ route('card.time.destroy',$iteam->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

    });
</script>

@endsection


