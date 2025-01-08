
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List Print</title>

    <style>
        /* Default styling for the print page */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .print-container {


            font-size: 12px
        }

        @media print {
            .no-print {
                display: none; /* Hide elements with this class during print */
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
                font-size: 12px;
            }

            th {
                background-color: #f2f2f2;
                color: #333;
                font-size: 7px;
            }

            .header {
                text-align: center;
                margin-bottom: 20px;
            }
            .table_photo {
                width: 50px;
                height: 50px;
            }
            .date_and_title {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .date_and_title h4,
            .date_and_title p {
                margin: 0;
            }


            .footer {
                text-align: center;
                margin-top: 20px;
                font-size: 12px;
                color: #666;
            }
        }
    </style>
</head>
<body>

<div class="print-container">
    <div class="header">
        <h1>{{Auth::user()->branch->institute_name}}</h1>
    </div>

    <div class="date_and_title">
        <h4 class="title">Student List</h4>
        <p class="date">Date: {{ date('Y-m-d') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="table_cell" style="color:black;font-size:12px" ><b>Id / Regi No<br>
                @if (Auth::user()->admin_role=='superadmin')
                <th style="width:10%; vertical-align: middle;color:black;font-size:12px"><b>Institute</b></th>
                @endif
                <th style="width:10%; vertical-align: middle;color:black;font-size:12px"><b>Photo</b></th>
                <th class="table_cell" style="color:black;font-size:12px">Name</th>
                <th class="table_cell" style="color:black;font-size:12px">Father Name</th>
                <th class="table_cell"style="color:black;font-size:12px">Gender</th>
                <th class="table_cell"style="color:black;font-size:12px">Course</th>
                <th class="table_cell"style="color:black;font-size:12px">Session</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $row)
                <tr>
                    <td>
                        @if ($row->status=='registered')
                        {{ $row->st_course_reg }}
                        @else
                        {{ $row->id }}
                        @endif
                    </td>
                    @if (Auth::user()->admin_role=='superadmin')
                    <td>{{ $row->User->name }}</td>
                    @endif
                    <td><img src="{{ asset($row->student_photo) }}" alt="Photo of {{ $row->st_name }}" class="table_photo"></td>
                    <td width="15%" class="table_cell"><b>{{ $row->st_name }}</b><br></td>
                    <td width="15%" class="table_cell"><b>{{ $row->f_name }}</b><br></td>
                    <td class="table_cell"><b>{{ $row->gender }}</b><br></td>
                    <td class="table_cell"><b><b>{{ $row->course->course_name }}</b><br></b><br></td>
                    <td class="table_cell"><b><b>{{ $row->session->session_name.', '.$row->eduyear->education_year }}</b><br></b><br></td>
                </tr>
                @empty
                <tr>
                    <td>Data not found</td>
                </tr>
            @endforelse

        </tbody>
    </table>

    <div class="footer">
        <p>Printed by: {{ Auth::user()->name }}</p>
    </div>
</div>

<script>
    window.print();
</script>

</body>
</html>


