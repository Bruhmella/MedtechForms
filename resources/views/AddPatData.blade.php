<!DOCTYPE html>
<html>
<head>
    <title>Add Patient Data</title>
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
<h1>Add Patient Data</h1>

<form action="{{ route('store_patient') }}" method="POST">
    @csrf

    <p>Full Name: </p>
    <input type="text" name="Pname" placeholder="Enter name here" required>

    <p>Age: </p>
    <input type="number" name="Page" placeholder="Enter age here" required>

    <p>Sex: </p>
<select name="Psex" required>
    <option value="">Select</option>
    <option value="M">Male (M)</option>
    <option value="F">Female (F)</option>
</select>


    <br><br>
    <button type="submit">Submit</button>
</form>
    <a href="{{ route('home')}}"><button>Back</button></a>
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
