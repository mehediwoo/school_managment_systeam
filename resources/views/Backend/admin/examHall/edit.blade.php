@extends('layouts.master')

@section('content')

@section('content')

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Exam Hall</h1>

                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- Row -->
                            <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Hall</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('ExamHallSetup/update',$examHall->id) }}" method="Post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="">
                                                <div class="mb-4">
                                                    <label class="form-label">Branch</label>
                                                    <select name="branch_id" id="select-countries" class="form-control custom-select select2">
                                                        <option value="br" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" selected>Select Branch</option>
                                                        @foreach ($branch as  $branch)
                                                        <option   {{ $branch->id == $examHall->branch_id ? 'selected' : '' }} value={{ $branch->id }} data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot; }}t('build/assets/images/flags/br.svg')}}&quot;}">{{ $branch->institute_name }}</option>
                                                        @endforeach

                                                    </select>
                                                    @if ($errors->has('branch_id'))
                                                    <div class="error" style="color:red;">{{ $errors->first('branch_id') }}</div>
                                                @endif

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="form-label">Hall Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" name="hall_name" value="{{ $examHall->hall_name }}" autocomplete="username">
                                                    @if ($errors->has('hall_name'))
                                                    <div class="error" style="color:red;">{{ $errors->first('hall_name') }}</div>
                                                @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1" class="form-label">Examiner Name</label>
                                                    <input type="text" name="examiner_name" class="form-control" id="exampleInputPassword1" value="{{ $examHall->Examiner_name }}" >
                                                </div>
                                                @if ($errors->has('examiner_name'))
                                                <div class="error" style="color:red;">{{ $errors->first('examiner_name') }}</div>
                                            @endif
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4 mb-0">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>





@endsection

@section('scripts')

		<!-- INTERNAL SELECT2 JS -->
		<script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
		@vite('resources/assets/js/select2.js')

@endsection



