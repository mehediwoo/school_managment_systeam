@if ($student !== null)
    @foreach ($student as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$row->course->course_name}}</td>
            <td>{{ $row->session->session_name }}, {{ $current_year->education_year }}</td>
            <td>{{ $row->student_count }}</td>

        </tr>
    @endforeach
@endif
