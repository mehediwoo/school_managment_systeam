<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Cards</title>
    <style>
        /* Ensure full height and reset margins */
        body, html {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* A4 page size container */
        .a4-page {
            width: 210mm; /* A4 width */
            height: 297mm; /* A4 height */
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            background-color: #fff;
            page-break-after: always; /* Ensure each card starts on a new page */
        }

        /* Ensure SVG is centered and properly sized */
        .svg-container {
    width: calc(210mm - 20mm); /* Full width minus left and right margins (12.7mm each) */
    height: calc(297mm - 3mm);  /* Full height minus top and bottom margins (5.5mm each) */
    margin: 5mm 6mm;       /* Set the top-bottom and left-right margins */
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: transparent; /* Ensure no background is set */
}

        /* Remove extra margins and adjust print layout */
        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            body {
                background-color: #fff; /* Optional for print */
            }
            .a4-page {
                box-shadow: none; /* Remove shadow in print */
            }
        }
    </style>
</head>
<body>
    @foreach ($students as $student)
    @php
      $user=App\Models\Student::where('created_by',$student->created_by)->first();
      $user_id=App\Models\User::where('id',$user->created_by)->first();
      $user_branch=$user_id->branch_id;
      $branch=App\Models\Branch::where('id', $user_branch)->first();
      $serialNumbers = App\Models\RegistrationCardSerialNumber::where('student_id',$student->id)->first();
    @endphp
    {{-- @dd( $branch) --}}
    <div class="a4-page">
        <div class="svg-container">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 190mm 281mm" width="190mm" height="281mm">
                <!-- Background Image -->
                <image href="{{ asset('Backend/image/registration.svg') }}" x="0" y="0" width="190mm" height="281mm"/>

                <!-- Header Section -->
                <text x="50" y="200" text-anchor="start" font-size="17" font-family="Roboto" fill="black" font-weight="bold">
                    Serial No: {{ $serialNumbers->serial_number }}
                </text>

                <text x="95mm" y="240" text-anchor="middle" font-size="20" font-family="Arial" fill="black" font-weight="bold">
                    {{ $student->course->course_name }} Course
                </text>

                <!-- Placeholder for Photo -->
                <rect x="140mm" y="260" width="30mm" height="30mm" fill="none" stroke="#000" stroke-width="1" />
                <image href="{{ asset($student->student_photo) }}"  x="140mm" y="260" width="29.5mm" height="29.5mm" />

                <text x="20mm" y="280" font-size="15" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Student Name</tspan>
                    <tspan dx="68" text-anchor="start">:  {{strtoupper($student->st_name)}}</tspan>
                </text>



                <text  x="20mm" y="330" font-size="15" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start"> Father's Name</tspan>
                    <tspan dx="66" text-anchor="start">:  {{ strtoupper($student->f_name) }}</tspan>
                </text>

                <text  x="20mm" y="370"font-size="15" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start"> Mother's Name</tspan>
                    <tspan dx="63" text-anchor="start">:  {{ strtoupper($student->m_name) }}</tspan>
                </text>


                <text  x="20mm" y="420" font-size="15" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">  Gender</tspan>
                    <tspan dx="118" text-anchor="start">:  {{ ucfirst($student->gender) }}</tspan>
                </text>


                <text x="20mm" y="470" font-size="15" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">   Institute Name & Code</tspan>
                    <tspan dx="10" text-anchor="start">:  {{ $student->user->name }} ({{ $branch->registration_id }})</tspan>
                </text>


                <text x="20mm" y="520" font-size="15" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Address</tspan>
                    <tspan dx="109" text-anchor="start">:  Post Office: {{ $branch->post_office }}-{{ $branch->post_code }},Thana/Upozilla:{{ $branch->sub_district }},</tspan>
                </text>

                <text x="20mm" y="540" font-size="15" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start"> </tspan>
                    <tspan dx="180" text-anchor="start">  District: {{ $branch->district->district_name }}</tspan>
                </text>

                <text x="20mm" y="590"  font-size="15" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">    Registration Number</tspan>
                    <tspan dx="20" text-anchor="start" font-size="18">:  {{ $student->st_course_reg }}</tspan>
                </text>

                <text x="20mm" y="640"  font-size="15" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Course</tspan>
                    <tspan dx="117" text-anchor="start">:  {{ $student->course->course_name }} ({{ $student->course->course_code }})</tspan>
                </text>

                <text x="20mm" y="690"  font-size="15" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Session</tspan>
                    <tspan dx="111" text-anchor="start">:  {{ $student->session->session_name }}, {{ $current_year->education_year }}</tspan>
                </text>

                <image href="{{ asset($signature->examination_signature_img) }}"  x="135mm" y="785" width="30mm" height="30mm" />

                <text x="478" y="1010" font-size="14" font-family="Arial" fill="#000">
                    <tspan style="font-weight: bold">Print Date :{{$manual_date }}</tspan>
                </text>

            </svg>
        </div>
    </div>
    @endforeach
</body>
<script>
    window.print();
</script>
</html>
