@if ($student !== null)
    @foreach ($student as $row)
        <tr>
            <td>
                <div class="form-check">
                    <input type="checkbox" name="St_reg[{{$row->id}}]" value="{{$row->id}}" class="form-check-input branch-checkbox">
                </div>
            </td>
            <td>
                @if ($row->status=='registered')
                    {{ $row->st_course_reg }}
                @else
                    {{ $row->id }}
                @endif
            </td>
            <td><img src="{{ asset($row->student_photo) }}" alt="Photo of {{ $row->st_name }}" class="avatar avatar-lg me-2 avatar-rounded"></td>
            <td>{{$row->st_name}}</td>
            <td>{{$row->f_name}}</td>
            <td>{{$row->gender}}</td>
            <td>{{$row->course->course_name}}</td>
            <td>{{$row->session->session_name.', '.$row->eduyear->education_year}}</td>
            <td>{{ $row->status }}</td>

            <td name="bstable-actions">
                <div class="btn-list">

                    @if (Auth::user()->admin_role=='instituteadmin' && $row->status=='registered')
                    <a href="{{ route('cancle.registration',$row->id) }}" id="bEdit" type="button" class="btn btn-sm btn-danger">
                        Cancel
                    </a>
                    <a href="{{ route('student.info',$row->id) }}" id="bEdit" type="button" class="btn btn-sm btn-info">
                        <span class="fe fe-eye"> </span>
                    </a>
                    @else
                    <a href="{{ route('student.info',$row->id) }}" id="bEdit" type="button" class="btn btn-sm btn-info">
                        <span class="fe fe-eye"> </span>
                    </a>

                    <a href="{{ route('student.edit',$row->id) }}" id="bEdit" type="button" class="btn btn-sm btn-primary">
                        <span class="fe fe-edit"> </span>
                    </a>

                    <a href="{{ route('student.delete',$row->id) }}" id="bDel" type="button" class="btn  btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this iteam?')">
                        <span class="fe fe-trash-2"> </span>
                    </a>
                    @endif
                </div>
            </td>

        </tr>
    @endforeach
@endif
