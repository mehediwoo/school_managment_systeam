<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Certificate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap" rel="stylesheet">
    <style>
        /* Ensure full height and reset margins */
        @font-face {
            font-family: 'Lucida Calligraphy';
            src: url('{{ asset('fonts/LucidaCalligraphyFont.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        .pinyon-script-regular {
            font-family: "Pinyon Script", serif;
            font-weight: 400;
            font-style: normal;
        }

        body, html {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* A4 page size container */
        .a4-page {
            width: 297mm; /* A4 width */
            height: 210mm; /* A4 height */
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            background-color: #fff;
            page-break-after: always; /* Ensure each card starts on a new page */
        }

        /* Ensure SVG is centered and properly sized */
        .svg-container {
            width: calc(297mm - 20mm); /* Full width minus left and right margins (12.7mm each) */
            height: calc(210mm - 3mm);  /* Full height minus top and bottom margins (5.5mm each) */
            margin: 5mm 6mm;       /* Set the top-bottom and left-right margins */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: transparent; /* Ensure no background is set */
        }

        /* Remove extra margins and adjust print layout */
        @page {
            size: A4 landscape;
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
    @foreach ($allData as $data)
    @php
        $get_marks  = App\Models\exam_subject::where('exam_id',$data->exam_id)->orderBy('id','desc')->first();
        $obtainedMarks = $get_marks->total_marks;

        if ($data->marks === null) {
                        
            $totalMarks = 0;

        }else{
            $totalMarks = $data->marks;
        }

        $percentage = ($totalMarks / $obtainedMarks) * 100;
        if ($percentage >=0 && $percentage <=32) {
            $grade = 'F';
        }elseif ($percentage >=33 && $percentage <=39) {
            $grade = 'D';
        }elseif ($percentage >=40 && $percentage <=49) {
            $grade = 'C';
        }elseif ($percentage >=50 && $percentage <=59) {
            $grade = 'B';
        }elseif ($percentage >=60 && $percentage <=69) {
            $grade = 'A-';
        }elseif ($percentage >=70 && $percentage <=79) {
            $grade = 'A';
        }elseif ($percentage >=80 && $percentage <=100) {
            $grade = 'A+';
        }

        // get student serial number
        $serial = App\Models\certificate_serial_number::where('student_id',$data->student_id)->first();

    @endphp
    <div class="a4-page">
        <div class="svg-container">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 297mm 210mm" width="300mm" height="210mm">
                <!-- Background Image -->
                <image href="{{ asset('Backend/image/certificate_tamplate.svg') }}" x="-42" y="0" width="299mm" height="209mm"/>

                <!-- Registration number -->
                <text x="905" y="225" text-anchor="start" font-size="16" font-family="Lucida Calligraphy" fill="black" font-weight="500">
                    {{ $data->reg_no }}
                </text>

                <!-- Session -->
                <text x="838" y="254" text-anchor="start" font-size="15" font-family="Lucida Calligraphy" fill="black" font-weight="500">
                    {{ $data->session->session_name.' '.$data->student->updated_at->format('Y') }}
                </text>


                <!-- issue date -->
                <text x="885" y="281" text-anchor="start" font-size="16" font-family="Lucida Calligraphy" fill="black" font-weight="500">
                    {{ $issue_date }}
                </text>

                <!-- Card serial number -->
                <text x="365" y="280" text-anchor="start" font-size="19" font-family="Lucida Calligraphy" fill="black" font-weight="900">
                    {{ $serial->serial_number }}
                </text>

                <!-- student name -->
                <text x="515" y="335" text-anchor="start" font-size="31" font-family="Pinyon Script" fill="black" font-weight="500">
                    {{ ucwords(strtolower($data->student->st_name)) }}
                </text>

                <!-- Father name -->
                <text x="515" y="368" text-anchor="start" font-size="31" font-family="Pinyon Script" fill="black" font-weight="500">
                    {{ ucwords(strtolower($data->student->f_name)) }}
                </text>

                <!-- Mother name -->
                <text x="515" y="400" text-anchor="start" font-size="31" font-family="Pinyon Script" fill="black" font-weight="500">
                    {{ ucwords(strtolower($data->student->m_name)) }}
                </text>


                <!-- institute name -->
                <text x="340" y="428" text-anchor="start" font-size="19" font-family="Lucida Calligraphy" fill="black" font-weight="500">
                    {{ ucwords(strtolower($data->institute->name)) }}
                </text>

                <!-- institute Code Number -->
                <text x="870" y="428" text-anchor="start" font-size="19" font-family="Lucida Calligraphy" fill="black" font-weight="500">
                    {{ $data->institute->branch->registration_id }}
                </text>

                <!-- Course Duration -->
                <text x="570" y="458" text-anchor="start" font-size="19" font-family="Lucida Calligraphy" fill="black" font-weight="500">
                    {{ $data->student->course->course_duration }}
                </text>

                <!-- Course name -->
                <text x="515" y="485" text-anchor="start" font-size="19" font-family="Lucida Calligraphy" fill="black" font-weight="500">
                    {{ ucwords(strtolower($data->student->course->course_name)) }}
                </text>

                <!-- held from like exam name -->
                <text x="410" y="520" text-anchor="start" font-size="18" font-family="Lucida Calligraphy" fill="black" font-weight="500">
                    {{ $data->session->session_name.' '.$data->student->updated_at->format('Y') }}
                </text>

                <!-- held from like exam name -->
                <text x="890" y="518" text-anchor="start" font-size="20" font-family="Lucida Calligraphy" fill="black" font-weight="900">
                    “{{ $grade ?? '' }}”
                </text>

                <!-- exam publish date -->
                <text x="240" y="707" text-anchor="start" font-size="15" font-family="Lucida Calligraphy" fill="black" font-weight="900">
                    {{ $publish_date->publish_date ?? 'null' }}
                </text>

                <!-- exam controller signature  -->
                <image x="380" y="610" height="100" width="120" href="{{ asset($signature->controller_signature) }}" />

                <!--  Chairman signature  -->
                <image x="840" y="610" height="100" width="120" href="{{ asset($signature->chairman_signature) }}" />

            </svg>
        </div>
    </div>
    @endforeach
</body>
<script>
    window.onload = function() {
        window.print();
    }
</script>
</html>
