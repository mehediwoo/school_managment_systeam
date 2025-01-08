@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admit Card</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        @page {
            size: A4; /* Ensure A4 paper size */
            margin: 0; /* Remove default margins */
        }

        .page {
            width: 210mm; /* A4 width */
            height: 297mm; /* A4 height */
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: space-around; /* Space between cards */
            align-items: center;
            page-break-after: always;
        }

        .admit-card {
            width: 200mm; /* Adjust width to avoid overflow */
            height: 145mm; /* Ensure two cards fit vertically */
            position: relative;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        svg {
            display: block;
            width: 100%; /* Ensure SVG scales with container */
            height: 100%; /* Maintain proportional height */
        }

        @media print {
            body {
                background-color: white;
            }

            .page {
                margin: 0;
                page-break-after: always;
            }

            .admit-card {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

    @foreach ($students->chunk(2) as $chunk)
    <div class="page">

        @foreach ($chunk as $student)

        @php
            $user  = (string)$student->created_by;
            $exam  = App\Models\ExamSetup::whereJsonContains('branch_id',$user)->where('status','publish')->first();

            if ($exam) {
                $exam_date = Carbon::parse($exam->exam_date)->format('d-m-Y');
            }

            $user_id = App\Models\User::where('id',$user)->first();
            $user_branch = $user_id->branch_id;
            $branch = App\Models\Branch::where('id', $user_branch)->first();
        @endphp
        <div class="admit-card">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 816 500">
                <!-- Full Background Image -->
                <image href="{{ asset('Backend/image/admit.svg') }}" x="7.5" y="-12" width="800" height="528" />

                <!-- Red Background Rectangle for "Admit Card" -->
                <rect x="310" y="140" width="200" height="30" fill="red" />

                <!-- "Admit Card" Text Centered -->

                <!-- "Admit Card" Text Centered -->
                <text x="408" y="160" font-size="20" font-family="Arial" fill="#fff" font-weight="bold" text-anchor="middle">
                    Admit Card
                </text>


                <!-- Student's Image Placeholder on the Left -->
                <rect x="660" y="150" width="70" height="70"  fill="none" stroke="#000" stroke-width="0.5" />
                <image href="{{ asset($student->student_photo) }}"  x="660" y="150" width="70" height="70" />
                <!-- Text Fields for Student's Information -->
                <text x="53" y="210" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Institute Name</tspan>
                    <tspan dx="20" text-anchor="start">:  {{ $student->user->name }}</tspan>
                </text>
                <text x="53" y="240" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Examinee Name</tspan>
                    <tspan dx="10" text-anchor="start">:  {{ ucfirst($student->st_name) }}</tspan>
                </text>
                <text x="53" y="270" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Father's Name</tspan>
                    <tspan dx="20" text-anchor="start">:  {{ ucfirst($student->f_name) }}</tspan>
                </text>
                <text x="53" y="300" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Mother's Name</tspan>
                    <tspan dx="16" text-anchor="start">:  {{ ucfirst($student->m_name) }}</tspan>
                </text>
                <text x="53" y="330" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Course Name</tspan>
                    <tspan dx="24" text-anchor="start">:  {{ $student->course->course_name }} ({{ $student->course->course_code }})</tspan>
                </text>



                <text x="460" y="208" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Roll No</tspan>
                    <tspan dx="40" text-anchor="start">:  {{ $student->id}}</tspan>
                </text>
                <text x="460" y="238" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Reg. No.</tspan>
                    <tspan dx="33" text-anchor="start">:  {{ $student->st_course_reg}}</tspan>
                </text>
                <text x="460" y="268" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Session</tspan>
                    <tspan dx="35" text-anchor="start">:  {{ $student->session->session_name }}</tspan>
                </text>

                <text x="460" y="298" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Exam Center</tspan>
                    {{-- @if ($exam == true && $exam->center_id != null)
                    <tspan dx="8" text-anchor="start">: {{ $exam_setup->exam_center->center_name ??  ''  }} ({{ $exam_setup->exam_center->center_code ?? '' }})</tspan>
                    @else
                    <tspan dx="8" text-anchor="start">:  {{ $student->user->name }} ({{ $branch->registration_id }})</tspan>
                    @endif --}}
                    @if (Auth::user()->admin_role=='superadmin' && !empty($exam))
                    <tspan dx="8" text-anchor="start">: {{ $exam->exam_center->center_name ??  ''  }} ({{ $exam->exam_center->center_code ?? '' }})</tspan>
                    @elseif(Auth::user()->admin_role=='superadmin' && $exam == null)
                    <tspan dx="8" text-anchor="start">: {{ substr($branch->institute_name,0,37)  }}</tspan>
                    @else
                    <tspan dx="8" text-anchor="start">: {{ $exam_setup->exam_center->center_name ??  ''  }} ({{ $exam_setup->exam_center->center_code ?? '' }})</tspan>
                    @endif
                </text>

                <!-- Rectangle (Border) for the Date -->
                <rect x="552" y="313" width="100" height="25" fill="none" stroke="#000" stroke-width="1" rx="5" ry="5" />
                <text x="460" y="330" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    <tspan text-anchor="start">Exam Date</tspan>
                    @if (Auth::user()->admin_role=='superadmin')
                    <tspan dx="21" text-anchor="start">: <tspan dx="3" text-anchor="start"> {{ $exam ? $exam->exam_date: $exam_date }}</tspan></tspan>
                    @else
                    <tspan dx="21" text-anchor="start">: <tspan dx="3" text-anchor="start"> {{ $exam_setup->exam_date ?? '' }}</tspan></tspan>
                    @endif
                </text>

                <!-- Footer Information -->
                <text x="100" y="395" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    Controller of Center
                </text>

                <image href="{{ asset($signature->examination_signature_img) }}"  x="533" y="337" width="140" height="40" />
                <text x="520" y="380" font-size="12" font-family="Arial" fill="#000" font-weight="bold">
                    Controller of Examinations
                    <tspan x="440" dy="1.2em">BTSSD - Bangladesh Technical Skills Development </tspan>
                </text>

                <!-- "Serial No" Text -->
                <text x="78" y="468" font-size="14" font-family="Arial" fill="#000" >
                    <tspan style="font-weight: bold">Print Date :{{$manual_date }}</tspan>
                </text>

                <!-- "Serial No" Text -->
                <text x="580" y="468" font-size="14" font-family="Arial" fill="#000" >
                    <tspan style="font-weight: bold">Serial No:{{ $serialNumbers[$student->id] ?? '' }}</tspan>
                </text>
            </svg>
        </div>


        @endforeach
    </div>
    @endforeach

    <script>
       window.print();

    </script>
</body>
</html>
