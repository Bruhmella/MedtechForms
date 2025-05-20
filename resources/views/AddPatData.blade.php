<!DOCTYPE html>
<html>
<head>
    <title>Add Patient Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/w3editable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
    body {
    overscroll-behavior: none;
    }
    h1, h2{
    font-family: Cambria;
    }
    a {
    font-family: Calibri;
    }
    .border {
    width: 600px;
    margin: auto;
    display: flex;
    justify-content: center;
    text-align: center;
    align-items: center;
    background-color: white;
    }
    .outerborder {
	width: 600px;
  	height: auto;
	margin: auto;
 	display: flex;
	align-items: center;
	justify-content: center;
	}
    .center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50px;
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
<h1 style="text-align: center;">Add Patient Data</h1>
<a href="{{ route('PatDataManage')}}"><button class="btn btn-primary">Back</button></a>
<div class="outerborder">
    <div class="border">
        <form action="{{ route('store_patient') }}" method="POST">
            @csrf
            <br>
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


            <br>
            <br>
            <div class="center">
            <button type="submit">Submit</button>
            </div>
        </form>
    </div>
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
