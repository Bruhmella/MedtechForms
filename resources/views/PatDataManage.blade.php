<!DOCTYPE html>
<html>
<head>
    <title>Manage Patient Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    h1, h2{
    font-family: Cambria;
    }
    a {
    font-family: Calibri;
    }
    .outerborder {
    height: 30px;
    width: auto;
    align-items: center;
    display: flex;
    }
    .border {
    height: 30px;
    width: auto;
    margin-top: 10px;
    margin-bottom: 10px;
    }
    .borderRight {
    height: 30px;
    width: auto;
    position: absolute;
    right: 0px;
    }
    .patient-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    min-width: 800px;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .patient-table thead tr{
    border-radius: 5px;
    background-color: teal;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
    }
    .patient-table th, .patient-table td {
    padding: 12px 15px;
    }
    .patient-table tbody tr {
    border-bottom: 1px solid #dddddd;
    }
    .patient-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
    }
    .patient-table tbody tr:last-of-type {
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
    <h1>Manage Patient Data</h1>
    <div class="outerborder">
        <div class="border">
        <a href="{{ route('AddPatData') }}"><button>Add Patient Data</button></a>
        <a href="{{ route('Parchives') }}"><button>View Archived Patients</button></a>
        </div>
        <div class="borderRight">
            <form action="{{ route('search.patient') }}" method="GET">
                <input type="text" name="query" placeholder="Search by name, age, or account number" required>
                <button type="submit">Search</button>
                <a href="{{ route('PatDataManage')}}"><button>Clear Search Criteria</button></a>
            </form>
        </div>
    </div>
    <!-- Search Bar -->
    <form action="{{ route('search.patient') }}" method="GET">
        <input type="text" name="query" placeholder="Search by name, age, or account number" required>
        <button type="submit">Search</button>
    </form>
    <a href="{{ route('PatDataManage') }}"><button>Clear Search Criteria</button></a>
    <br>
    <!-- Sorting Buttons -->
    <div>
        <b>Sort by Name:</b>
        <a href="{{ route('PatDataManage', ['sort' => 'name_asc']) }}"><button>A-Z</button></a>
        <a href="{{ route('PatDataManage', ['sort' => 'name_desc']) }}"><button>Z-A</button></a>
        
        <b>Sort by Age:</b>
        <a href="{{ route('PatDataManage', ['sort' => 'age_asc']) }}"><button>Ascending</button></a>
        <a href="{{ route('PatDataManage', ['sort' => 'age_desc']) }}"><button>Descending</button></a>
    </div>

    <h2>Patient List</h2>
    <div>
    <table class="patient-table">
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
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->Pname }}</td>
                    <td>{{ $patient->Page }}</td>
                    <td>{{ $patient->Psex }}</td>
                    <td>{{ $patient->Poc }}</td>
                    <td>
                        <a href="{{ route('edit_patient', ['id' => $patient->id]) }}">
                            <button>Edit</button>
                        </a>
                        <form action="{{ route('archive_patient', ['id' => $patient->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to archive this patient?')">Archive</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
</body>
</html>
