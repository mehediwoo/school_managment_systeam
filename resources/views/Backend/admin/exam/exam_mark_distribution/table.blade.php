<style>
    input[type="text"] {
        border: 1px solid #000!important;
    }
</style>
<form action="{{ route('exam.mark.distribution.update') }}" method="get">

    @csrf
    <input type="hidden" name="exam_id" value="{{ $exam->id }}">
    <input type="hidden" name="exam_id" value="{{ $exam->id }}">

    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Reg No</th>
                <th scope="col">Student Name</th>
                <th scope="col">Course</th>
                <th scope="col">Session</th>
                <th scope="col">isAbsent</th>
                <th scope="col">Marks</th>
                <th scope="col">Grade</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($exam_marks))
            @foreach ($exam_marks as $key => $iteam)
                @php
                    $get_marks  = App\Models\exam_subject::where('exam_id',$exam_id)->orderBy('id','desc')->first();
                    $obtainedMarks = $get_marks->total_marks;

                    if ($iteam->marks === null) {
                        
                        $totalMarks = 0;

                    }else{
                        $totalMarks = $iteam->marks;
                    }

                    echo $percentage = ($totalMarks / $obtainedMarks) * 100;
                    

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

                @endphp
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $iteam->student->st_course_reg }}</td>
                    <td>{{ $iteam->student->st_name }}</td>
                    <td>{{ $iteam->student->course->course_name }}</td>
                    <td>{{ $iteam->student->session->session_name }}</td>
                    
                    @if ($iteam->is_absent == 1)
                        <td><input type="checkbox" name="is_absent[{{ $iteam->id }}]" value="1" id="isAbsent" absentId="{{ $iteam->id }}" checked></td>
                    @else
                        <td><input type="checkbox" name="is_absent[{{ $iteam->id }}]" value="0" id="isAbsent" absentId="{{ $iteam->id }}"></td>
                    @endif
                    <td><input type="text" name="marks" value="{{ $iteam->marks }}" mark-id="{{ $iteam->id }}" id="marks"></td>
                    <td>
                        {{ $grade }}
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</form>




