<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>
    body {
      font-family: Arial, sans-serif; /* Set the default font */
      /* margin: 0;
      padding: 0; */
    }
    .table-bordered{
        border: 1px solid black !important;
    }
    .border {
        border: 1px solid black !important;
        width: 100%;
    }
    .logo1{
        height: 70px;
        width: 70px;
        margin: 0 19px;
    }
    .logo2{
        height: 70px;
        width: 70px;
        margin: 0 19px;
    }
    #institute{
        line-height: 10px;
    }
    #session{
        line-height: 5px;
    }
    .date{
        margin: 17px 114px;
    }
    h1{
        font-weight: bold;
        color: black;
        font-size: 30px;
    }
    h5{
        font-weight: 700;
        color: black;
        font-size: 20px;

    }

    @page {
        size: A4;
        margin: 5mm;
    }


    @media print {
        tr td{
            font-size: 13px !important;
        }
        body{
            margin: 5px !important;
        }
        #institute{
            margin: 5px !important;
        }
        #session{
            margin: 5px !important;
        }
    }
  </style>
  <body>

    @php
        $chunks = $student->chunk(20);
    @endphp

    @foreach ($chunks as $chunk)
    <section class="header text-center mt-3">
        <div class="container-fluid">
            <div class="d-flex justify-content-center" style="padding: 10px">
                <img class="logo1" src="{{ asset('static/btssd.png') }}">
                <div class="text-center">
                    <small>Approved by the government of the People's republic of Bangladesh</small>
                    <h2 style="font-size: 20px; font-weight:800">Bangladesh Tecnical Skill's Development</h2>
                    <p>Momenbag, Matuail, Jatrabari, Dhaka - 1362</p>
                </div>
                <img class="logo2" src="{{ asset('static/gov_logo.png') }}">
            </div>
        </div>
    </section>

    <section class="border mt-2"></section>
    <section class="mt-2">

        <div class="d-flex mb-3">
            <div class="me-auto" id="institute">
                <p style="font-size: 20px">{{ $institute_name->name }} ({{ $institute_name->branch->registration_id }})</p>
                <p style="line-height: 20px">{{ $institute_name->branch->address }}</p>
            </div>
            <div class="date">Date: <span></span></div>
        </div>
        <p id="session" style="text-decoration: underline;">
            Session: 
            @php
                echo $groupByStudent = App\Models\Student::selectRaw('session_id, MIN(eduyear_id) as eduYear_id')
                ->where('created_by', $institute_name->id)
                ->whereIn('session_id', $exam_session_array)
                ->where('status', 'registered')
                ->groupBy('session_id')
                ->get();
            @endphp
            {{-- @foreach ($groupByStudent as $value)
                {{ $value->session->session_name }}- {{ $value->eduyear->eduyear_name }},
            @endforeach --}}
        </p>

    </section>

    <section class="data_section mt-3">
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-xl-12 ">
                    <p style="text-decoration: underline double; text-align:center">ATTEND THE EXAM HALL</p>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Reg No</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Course</th>
                            <th scope="col">Student Signature</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (!empty($chunk) && $student->count() > 0)
                            @foreach ($chunk as $key => $iteam)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $iteam->st_course_reg }}</td>
                                <td>{{ $iteam->st_name }}</td>
                                <td>{{ $iteam->course->course_name }} ({{ $iteam->course->course_code }})</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                      </table>
                </div>
            </div>

        </div>
    </section>
    @endforeach

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
  </body>
</html>