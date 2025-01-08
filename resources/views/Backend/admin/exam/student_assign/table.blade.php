<form action="{{ route('exam.mark.distribution.store') }}" method="post">

    @csrf
    <input type="hidden" name="exam_id" value="{{ $exam_id }}">
    <input type="hidden" name="branch_id" value="{{ $branch }}">

    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th style="width:24px">
                    <div class="form-check">
                        <input type="checkbox" id="checkAll" class="form-check-input">
                        <label class="form-check-label">All</label>
                    </div>
                </th>
                <th scope="col">Reg No</th>
                <th scope="col">Student Name</th>
                <th scope="col">Course</th>
                <th scope="col">Session</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($all_students))
            @foreach ($all_students as $key => $iteam)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <input type="checkbox" name="student_id[]" value="{{ $iteam->id }}">
                    </td>
                    
                    <td>{{ $iteam->st_course_reg }}</td>
                    <td>{{ $iteam->st_name }}</td>
                    <td>{{ $iteam->course->course_name }}</td>
                    <td>{{ $iteam->session->session_name }}</td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <button type="submit" class="btn btn-sm btn-primary">Assign</button>
</form>
