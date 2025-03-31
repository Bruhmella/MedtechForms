<!DOCTYPE html>
<html>
<head>
    <title>Patient Archives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
    h1, h2{
    font-family: Cambria;
    }
    a {
    font-family: Calibri;
    }
    .patient-archive-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    min-width: 800px;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-left: auto;
    margin-right: auto;
    }
    .patient-archive-table tr{
    border-radius: 5px;
    background-color: teal;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
    }
    .patient-archive-table th, .patient-archive-table td {
    padding: 12px 15px;
    }
    .patient-archive-table tbody tr {
    border-bottom: 1px solid #dddddd;
    }
    .patient-archive-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
    }
    .patient-archive-table tbody tr:last-of-type {
    border-bottom: 1px solid teal;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    }
    </style>
</head>
<body>
    <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
        <a href="{{ route('home')}}" class="w3-bar-item w3-button">Home</a>
    </div>
    <div class="w3-teal">
        <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
    </div>
    <h1>Archived Patient Data</h1>

    <table class="patient-archive-table">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Patient Account Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($archivedPatients as $patient)
                <tr>
                    <td>{{ $patient->Pname }}</td>
                    <td>{{ $patient->Page }}</td>
                    <td>{{ $patient->Psex }}</td>
                    <td>{{ $patient->Poc }}</td>
                    <td>
                        <!-- Restore button -->
                        <form action="{{ route('restore_patient', $patient->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-warning">Restore</button>
                        </form>

                        <!-- Permanent delete button -->
                        <form action="{{ route('permanent_delete_patient', $patient->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to permanently delete this record?')" class="btn btn-danger">Delete Permanently</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('PatDataManage') }}"><button>Back</button></a>
</body>
</html>
