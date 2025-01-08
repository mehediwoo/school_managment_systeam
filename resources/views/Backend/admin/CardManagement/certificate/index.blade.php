
@extends('layouts.master')
@section('title','Exam Certificate')
@section('styles')

@endsection
@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Exam Certificate</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Exam Certificate</li>
    </ol>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                    <form action="{{ route('certificate.generate') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <label for="">Exams</label>
                                    <select name="exam" id="exam" class="form-control">
                                        <option value="">Select Exam</option>
                                        @if (isset($all_exam))
                                        @foreach ($all_exam as $iteam)
                                            <option value="{{ $iteam->id }}">{{ $iteam->exam_names->exam_name.' - ' }}({{ $iteam->exam_names->exam_code }})</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('exam')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="col-xl-3">
                                <div class="form-group">
                                    <label for="">Branch</label>
                                    <select name="branch" id="branch" class="form-control">
                                        
                                    </select>
                                    @error('branch')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xl-3">
                                <div class="form-group">
                                    <label for="">Issue Date</label>
                                    <input type="date" name="issue_date" class="form-control">
                                    @error('issue_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="col-xl-2">
                                <div class="form-group" style="margin-top: 27px;">
                                    <label for=""></label>
                                    <button id="filter" type="submit" class="btn btn-primary">Generate</button>
                                </div>
                            </div>
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
    $(document).ready(function() {
        // get branch wise exam
        $(document).on('change','#exam',function(){
            let branch = $(this).val();
            
            $.ajax({
                url: "{{ route('get.branch.wise.exam') }}",
                data: {branch:branch},
                success: function(data){
                    $('#branch').empty();
                    $.each(data, function(index, value) {
                        $('#branch').append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            });
            
        });

        // check mark all 
        
    });
</script>
@endsection
