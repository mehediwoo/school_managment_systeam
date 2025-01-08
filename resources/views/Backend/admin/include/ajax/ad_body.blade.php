@if (!empty($latestStudent) && $latestStudent->count() > 0)
    @foreach ($latestStudent as $key=>$row)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $row->name }}</td>
            <td>{{ $row->student->count() }}</td>
            <td>{{ $row->created_at->format('d-M-Y') }}</td>
        </tr>
    @endforeach
@endif
