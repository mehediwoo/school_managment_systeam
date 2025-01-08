@if ($student !== null)
    @foreach ($student as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->id }}</td>
            <td><img src="{{ asset($row->student_photo) }}" alt="Photo of {{ $row->st_name }}" class="avatar avatar-lg me-2 avatar-rounded"></td>
            <td>{{ $row->st_name }}</td>
            <td>{{$row->course->course_name}}</td>
            <td>{{$row->session->session_name.', '.$row->eduyear->education_year}}</td>
            <td>{{ $row->f_name }}</td>
            <td>{{ $row->created_at->format('Y-m-d h:m:s') }}</td>
            <td>{{ $row->status }}</td>

        </tr>
    @endforeach
@endif
