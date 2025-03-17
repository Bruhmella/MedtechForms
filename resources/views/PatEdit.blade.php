<!DOCTYPE html>
<html>
<head>
    <title>Edit Patient Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    h1, h2{
    font-family: Cambria;
    }
    a {
    font-family: Calibri;
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
    <h1>Edit Patient Data</h1>
    <!---manage patient data---->
<a href="{{ route('PatDataManage')}}"><button>Back</button></a>

    <form action="{{ route('update_patient', ['id' => $patient->id]) }}" method="POST">
        @csrf
        <label>Patient Name:</label>
        <input type="text" name="Pname" value="{{ $patient->Pname }}" required><br>

        <label>Age:</label>
        <input type="number" name="Page" value="{{ $patient->Page }}" required><br>

        <label>Sex:</label>
        <select name="Psex">
            <option value="M" {{ $patient->Psex == 'M' ? 'selected' : '' }}>Male</option>
            <option value="F" {{ $patient->Psex == 'F' ? 'selected' : '' }}>Female</option>
        </select><br>

        <button type="submit">Update</button>
    </form>
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
