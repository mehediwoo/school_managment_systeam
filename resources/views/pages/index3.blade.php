@extends('layouts.master')
@section('title','Dashboard')
@section('styles')

@endsection

@section('content')

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Admin Institute</h1>

                            </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW-1 OPEN -->
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card bg-primary img-card box-primary-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h2 class="mb-0 number-font">{{ $studentCount }}</h2>
                                                    <p class="text-white mb-0">Total Student</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-user text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">

                                    <div  class="card bg-secondary img-card box-secondary-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h2 class="mb-0 number-font">{{ $studentRegCount}}</h2>
                                                    <p class="text-white mb-0">Registered Student</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-graduation-cap text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">

                                    <div   class="card  bg-success img-card box-success-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">


                                                    <h2 class="mb-0 number-font"> {{ number_format($monthlyIncome['total_income'], 2) }}৳

                                                    </h2>
                                                    <p class="text-white mb-0">Monthly Income</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-money text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div  class="card bg-info img-card box-info-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">

                                                 <input type="hidden" id="month1" value="{{$months[0]->total_revenue}}">
                                                 <input type="hidden" id="month2" value="{{$months[1]->total_revenue}}">
                                                 <input type="hidden" id="month3" value="{{$months[2]->total_revenue}}">
                                                 <input type="hidden" id="month4" value="{{$months[3]->total_revenue}}">
                                                 <input type="hidden" id="month5" value="{{$months[4]->total_revenue}}">
                                                 <input type="hidden" id="month6" value="{{$months[5]->total_revenue}}">
                                                 <input type="hidden" id="month7" value="{{$months[6]->total_revenue}}">
                                                 <input type="hidden" id="month8" value="{{$months[7]->total_revenue}}">
                                                 <input type="hidden" id="month9" value="{{$months[8]->total_revenue}}">
                                                 <input type="hidden" id="month10" value="{{$months[9]->total_revenue}}">
                                                 <input type="hidden" id="month11" value="{{$months[10]->total_revenue}}">
                                                 <input type="hidden" id="month12" value="{{$months[11]->total_revenue}}">



                                                 <input type="hidden" id="reg_st" value="{{$studentRegCount}}">
                                                 <input type="hidden" id="adm_st" value="{{$admitStudentCount}}">
                                                 <input type="hidden" id="gra_st" value="{{$graduatedStudentCount}}">

                                                    <h2 class="mb-0 number-font"> {{ number_format($yearlyIncome['total_income'], 2) }}৳

                                                    </h2>
                                                    <p class="text-white mb-0">Yearly Income</p>
                                                </div>
                                                <div class="ms-auto"> <i class="fa fa-money text-white fs-30 me-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                            </div>
                            <!-- ROW-1 CLOSED -->

                            <!-- ROW-2 OPEN -->
                            <div class="row">

                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Revenue Vs Support Cost</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-wrapper ">
                                                <canvas id="revenue" class="areaChart chart-dropshadow">

                                                </canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                            </div>
                            <!-- ROW-2 CLOSED -->

                            <!-- ROW-3 OPEN -->
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Customer satisfaction</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="Order-Status-chart my-4 chart-wrapper">
                                                <div class="Order-Status-inner text-center">
                                                    <h4 class="fs-42 mb-0 op-6">{{$studentCount}}</h4>
                                                    <div class="text-muted op-7">Total Student</div>
                                                </div>
                                                <div id="Order-Status" class="Order-Status overflow-hidden mx-auto">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->

                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                                    <div class="card">
                                        <div class="card-header ">
                                            <h3 class="card-title">Recent Institute Student Add</h3>
                                        </div>
                                        <div class="card-body rating-record">
                                            <div class="card-body">

                            <!-- Row -->
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card">

                                                <form action="{{ route('admin.dashboard.filter') }}" method="get">
                                                <div class="card-body pt-0">
                                                    <div class="form-group">

                                                        <div class="row g-3">
                                                            <div class="col-sm-3">
                                                                <label for="" class="mt-2">Start Date</label>
                                                                <input type="date" class="form-control" name="start_date" aria-label="City">
                                                            </div>
                                                            <div class="col-sm">
                                                                <label for="" class="mt-2">Ending Date</label>
                                                                <input type="date" class="form-control" name="end_date" aria-label="State">
                                                            </div>
                                                            <div class="col-sm">
                                                              <button class="btn btn-primary" style="margin-top:14%"> Filter</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>


                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                                                 <thead>
                                                         <tr>
                                                        <th>#</th>
                                                        <th>Branch Name</th>
                                                        <th>Registered Students</th>
                                                        <th>Admitted Students</th>
                                                        <th>Recent Student Add Date</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                         @foreach ($branches as $branch)
                                                         @php
                                                          $registerStudent=App\Models\Student::where('status','registered')->where('created_by',$branch['user']->id)->count();
                                                          $Admited=App\Models\Student::where('status','Admited')->where('created_by',$branch['user']->id)->count();
                                                         @endphp
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $branch['user']->name }}</td> <!-- Branch name -->
                                                            <td>{{    $registerStudent }}</td>
                                                            <td>{{ $Admited}}</td>
                                                            <td>{{ $branch['last_student_added_time']->format('Y-m-d H:i:s') }}</td>
                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                </table>

                                                {{-- <table>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Branch Name</th>
                                                        <th>Registered Students</th>
                                                        <th>Admitted Students</th>
                                                        <th>Student List</th>
                                                    </tr>
                                                    @foreach ($branches as $branch)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $branch['user']->name }}</td> <!-- Branch name -->
                                                            <td>{{ $branch['registered_count'] }}</td> <!-- Registered count -->
                                                            <td>{{ $branch['admitted_count'] }}</td> <!-- Admitted count -->
                                                            <td>
                                                                <ul>
                                                                    @foreach ($branch['students'] as $student)
                                                                        <li>{{ $student->name }} - {{ $student->status }} - {{ $student->created_at->format('Y-m-d') }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Row -->


                                            </div>


                                        </div>
                                    </div>
                                </div><!-- COL END -->
                            </div>
                            <!-- ROW-3 CLOSED -->

@endsection

@section('scripts')

		<!-- C3.JS CHART JS -->
		<script src="{{asset('build/assets/plugins/charts-c3/d3.v5.min.js')}}"></script>
		<script src="{{asset('build/assets/plugins/charts-c3/c3-chart.js')}}"></script>

		<!-- CHARTJS CHART JS -->
		<script src="{{asset('build/assets/plugins/chart/Chart.bundle.js')}}"></script>
		<script src="{{asset('build/assets/plugins/chart/utils.js')}}"></script>

		<!-- Apex Charts JS -->
		@vite('resources/assets/js/apexcharts.js')

		<!-- INDEX JS -->
		@vite('resources/assets/js/index3.js')

        <script>
         var jan=document.getElementById('month1').value;
         var feb=document.getElementById('month2').value;
         var mar=document.getElementById('month3').value;
         var apr=document.getElementById('month4').value;
         var may=document.getElementById('month5').value;
         var june=document.getElementById('month6').value;
         var july=document.getElementById('month7').value;
         var aug=document.getElementById('month8').value;
         var sep=document.getElementById('month9').value;
         var oct=document.getElementById('month10').value;
         var nov=document.getElementById('month11').value;

         var dec=document.getElementById('month12').value;
        </script>

        <script>
               var reg_st=parseInt(document.getElementById('reg_st').value);

                var adm_st=parseInt(document.getElementById('adm_st').value);
                var gra_st=parseInt(document.getElementById('gra_st').value);
        </script>

@endsection
