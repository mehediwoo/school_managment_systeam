
@extends('layouts.master')
@section('title','Dashboard')
@section('styles')
@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Institute Dashboard</h1>
</div>
<!-- PAGE-HEADER END -->

                            <!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-primary img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        @if (!empty($total_students))
                        <h2 class="mb-0 number-font">{{ number_format($total_students)  }}</h2>
                        @else
                        <h2 class="mb-0 number-font">0</h2>
                        @endif
                        <p class="text-white mb-0">Total Student's
                        </p>
                    </div>
                    <div class="ms-auto">
                        <i class="fa fa-user text-white fs-30 me-2 mt-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-secondary img-card box-secondary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        @if (!empty($all_admited_student))
                        <h2 class="mb-0 number-font">{{ number_format($all_admited_student) }}</h2>
                        @else
                        <h2 class="mb-0 number-font">0</h2>
                        @endif
                        <p class="text-white mb-0">Admited Student</p>
                    </div>
                    <div class="ms-auto">
                        <i class="fa fa-bar-chart text-white fs-30 me-2 mt-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card  bg-success img-card box-success-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        @if (!empty($all_register_student))
                        <h2 class="mb-0 number-font">{{ number_format($all_register_student) }}</h2>
                        @else
                        <h2 class="mb-0 number-font">0</h2>
                        @endif

                        <p class="text-white mb-0">Total Registerd Students</p>
                    </div>
                    <div class="ms-auto">
                        <i class="fa fa-graduation-cap text-white fs-30 me-2 mt-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-info img-card box-info-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        @if (!empty($blance) && $blance->count() > 0)
                        <h2 class="mb-0 number-font">{{ number_format($blance->total_earn) }} TK</h2>
                        @else
                         <h2 class="mb-0 number-font">0 TK</h2>
                        @endif
                        <p class="text-white mb-0">Total Blance</p>
                    </div>
                    <div class="ms-auto">
                        <i class="fa fa-money text-white fs-30 me-2 mt-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->

<!-- ROW-2 OPEN -->
<div class="row">

    <input type="hidden" id="jan" value="{{ $jan }}">
    <input type="hidden" id="feb" value="{{ $feb }}">
    <input type="hidden" id="mar" value="{{ $mar }}">
    <input type="hidden" id="apr" value="{{ $apr }}">
    <input type="hidden" id="may" value="{{ $may }}">
    <input type="hidden" id="jun" value="{{ $jun }}">
    <input type="hidden" id="july" value="{{ $july }}">
    <input type="hidden" id="aug" value="{{ $aug }}">
    <input type="hidden" id="sep" value="{{ $sep }}">
    <input type="hidden" id="oct" value="{{ $oct }}">
    <input type="hidden" id="nov" value="{{ $nov }}">
    <input type="hidden" id="dec" value="{{ $dec }}">

    <input type="hidden" id="reg_jan" value="{{ $reg_jan }}">
    <input type="hidden" id="reg_feb" value="{{ $reg_feb }}">
    <input type="hidden" id="reg_mar" value="{{ $reg_mar }}">
    <input type="hidden" id="reg_apr" value="{{ $reg_apr }}">
    <input type="hidden" id="reg_may" value="{{ $reg_may }}">
    <input type="hidden" id="reg_jun" value="{{ $reg_jun }}">
    <input type="hidden" id="reg_july" value="{{ $reg_july }}">
    <input type="hidden" id="reg_aug" value="{{ $reg_aug }}">
    <input type="hidden" id="reg_sep" value="{{ $reg_sep }}">
    <input type="hidden" id="reg_oct" value="{{ $reg_oct }}">
    <input type="hidden" id="reg_nov" value="{{ $reg_nov }}">
    <input type="hidden" id="reg_dec" value="{{ $reg_dec }}">


    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Monthly Student Graph</h3>
            </div>
            <div class="card-body">
                <div class="chart-wrapper ">
                    <canvas id="revenue" class="areaChart chart-dropshadow"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
</div>
<!-- ROW-2 CLOSED -->

<!-- ROW-3 OPEN -->
<div class="row row-cards">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Students</h3>
            </div>
            <div class="card-body">
                <div class="Order-Status-chart my-4 chart-wrapper">
                    <div class="Order-Status-inner text-center">
                        <h4 class="fs-42 mb-0 op-6">{{ number_format($total_students) }}</h4>
                        <div class="text-muted op-7">Total Student's</div>

                        <input type="hidden" id="male" value="{{ $maleStudent }}">
                        <input type="hidden" id="female" value="{{ $femaleStudent }}">
                        <input type="hidden" id="others" value="{{ $other_student }}">
                    </div>
                    <div id="Order-Status" class="Order-Status overflow-hidden mx-auto"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title">Recent students</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Id / Reg No</th>
                                <th>Photo</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Session</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($myStudent != NULL)
                            @foreach ($myStudent as $key=>$row)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if ($row->status=='Admited')
                                    {{ $row->id }}
                                    @elseif ($row->status=='registered')
                                    {{ $row->st_course_reg }}
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ asset($row->student_photo) }}" alt="" style="height: 40px;width:40px">
                                </td>
                                <td>{{ $row->st_name }}</td>
                                <td>{{ $row->course->course_name }}</td>
                                <td>{{ $row->session->session_name }}</td>
                                <td>{{ ucfirst($row->status) }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
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
        @vite('resources/assets/js/index2.js')



        <script>

            // for chart
            let jan = parseInt($('#jan').val())  || 0;
            let feb = parseInt($('#feb').val())  || 0;
            let mar = parseInt($('#mar').val())  || 0;
            let apr = parseInt($('#apr').val())  || 0;
            let may = parseInt($('#may').val())  || 0;
            let jun = parseInt($('#jun').val())  || 0;
            let july = parseInt($('#july').val()) || 0;
            let aug = parseInt($('#aug').val())  || 0;
            let sep = parseInt($('#sept').val()) || 0;
            let oct = parseInt($('#oct').val())  || 0;
            let nov = parseInt($('#nov').val())  || 0;
            let dec = parseInt($('#dec').val())  || 0;


            let reg_jan = parseInt($('#reg_jan').val())  || 0;
            let reg_feb = parseInt($('#reg_feb').val())  || 0;
            let reg_mar = parseInt($('#reg_mar').val())  || 0;
            let reg_apr = parseInt($('#reg_apr').val())  || 0;
            let reg_may = parseInt($('#reg_may').val())  || 0;
            let reg_jun = parseInt($('#reg_jun').val())  || 0;
            let reg_july = parseInt($('#reg_july').val()) || 0;
            let reg_aug = parseInt($('#reg_aug').val())  || 0;
            let reg_sep = parseInt($('#reg_sept').val()) || 0;
            let reg_oct = parseInt($('#reg_oct').val())  || 0;
            let reg_nov = parseInt($('#reg_nov').val())  || 0;
            let reg_dec = parseInt($('#reg_dec').val())  || 0;

            // For pi chart
            let male = parseInt( $('#male').val() ) || 0;
            let female = parseInt( $('#female').val() ) || 0;
            let others = parseInt( $('#others').val() ) || 0;


        </script>

@endsection
