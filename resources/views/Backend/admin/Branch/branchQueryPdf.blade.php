<!DOCTYPE html>
<html>
<head>
    <title>Query Send</title>
    <style>
        body {
            font-family: Arial, 'NotoSansBangla', sans-serif;
            margin-top: 0;
        }

        .table-container {
            width: 100%;
            display: inline-block;
            page-break-inside: avoid;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            width: 50%;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        caption {
            font-size: 1.5em;
            margin: 10px 0;
        }
        table, th, td {
            border: 2px solid #ddd;
        }
        @font-face {
            font-family: "NotoSansBengali";
            src: url({{ storage_path('fonts/NotoSansBengali.ttf') }}) format('truetype');
        }
        @media print {
            .table-container {
                width: 50%; /* Two tables per row */
                float: left;
            }
            .table-container:nth-child(4n+1) {
                page-break-before: always;
            }
        }
    </style>
</head>
<body>
    @foreach($branches as $item)
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>From,</th>
                    <th>To,</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $admin = App\Models\BackendSettings::first();
                @endphp
                <tr>
                    <td>Name: {{$admin->sub_title}}</td>
                    <td>{{ $item->Propietor_Name }}</td>
                </tr>
                <tr>
                    <td>Address: {{$admin->address}}</td>
                    <td>{{ $item->address }}</td>
                </tr>
                <tr>
                    <td>Cell No: {{$admin->phone}}</td>
                    <td>{{ $item->mobile_number }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach
</body>
</html>
