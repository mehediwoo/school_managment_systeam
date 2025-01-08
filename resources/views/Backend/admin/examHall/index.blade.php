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
                                <div class="col-md-12 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Hall Setup</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ url('ExamHallSetup/insert') }}" method="Post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="">
                                                    <div class="mb-4">
                                                        <label class="form-label">Branch</label>
                                                        <select name="branch_id" id="select-countries" class="form-control custom-select select2">
                                                            <option value="br" data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}" selected>Select Branch</option>
                                                            @foreach ($branch as  $branch)
                                                            <option value={{ $branch->id }} data-data="{&quot;image&quot;: &quot;{{asset('build/assets/images/flags/br.svg')}}&quot;}">{{ $branch->institute_name }}</option>
                                                            @endforeach

                                                        </select>
                                                        @if ($errors->has('branch_id'))
                                                        <div class="error" style="color:red;">{{ $errors->first('branch_id') }}</div>
                                                    @endif

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="form-label">Hall Name</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="hall_name" placeholder="Enter Hall Name" autocomplete="username">
                                                        @if ($errors->has('hall_name'))
                                                        <div class="error" style="color:red;">{{ $errors->first('hall_name') }}</div>
                                                    @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1" class="form-label">Examiner Name</label>
                                                        <input type="text" name="examiner_name" class="form-control" id="exampleInputPassword1" placeholder="Examiner Name" >
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
                                <div class="col-md-12 col-xl-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Exam Hall List</h4>
                                        </div>
                                        <div class="card-body">



                                     <div class="table-responsive mt-2" style="padding:2%;">
                                     <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">



                                    <thead>

                                    <tr>
                                        <th>

                                            Sl
                                        </th>
                                        <th>Branch Name</th>
                                        <th>Hall Name</th>
                                        <th>Examiner Name</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($examHall as $examHall)
                                        <tr>
                                            <td>

                                                    <label class="form-check-label">{{$loop->iteration}}</label>

                                            </td>

                                            <td>{{ $examHall->branch->institute_name }}</td>
                                            <td>{{ $examHall->hall_name}}</td>
                                            <td>{{$examHall->Examiner_name}}</td>



                                            <td style="display: flex">


                                                <a href="{{url('ExamHallSetup/edit',$examHall->id)}}" class="btn btn-info btn-lg" style="font-size:15px;margin-right:4%;height:100%"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <form action="{{url('ExamHallSetup/delete',$examHall->id)}}"  method="post"  style="margin-left:4%">
                                                    @csrf
                                                 <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete this item?')" style="font-size:15px"><i class="fa fa-trash"></i></button>
                                             </form>








                                          </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>




@endsection

@section('scripts')

		<!-- INTERNAL SELECT2 JS -->
		<script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
		@vite('resources/assets/js/select2.js')

@endsection



