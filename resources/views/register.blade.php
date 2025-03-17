<!DOCTYPE html>
<html>
<head>
	<title>Forms Registration</title>
    <style>
	body {
	background-color:#5690e8;
	background: url({{ asset('img/19373.jpg') }});
	background-repeat: no-repeat;
	background-size: 100% 1000px;
	}
	h1 {
	font-family: arial;
	font-size: 100%;
	text-align: center;
	}
	p {
	font-family: arial;
	font-size: 100%;
	}
	.border {
	border-radius: 10px;
	padding: 10px 0;
	margin: auto;
	width: 400px;
	border: 1px solid black;
	text-align: center;
	background-color:rgb(242, 247, 225);
	}
	.outerborder {
	width: 400px;
  	height: 400px;
	margin: auto;
	margin-top: 200px;
 	display: flex;
	align-items: center;
	justify-content: center;
	}
	</style>
</head>
<body>
<div class="outerborder">
<div class="border">
<form action="{{url('upload')}}" method="POST" enctype="multipart/form-data">

	@csrf

<h1>REGISTRATION</h1>
<p>First name: </p><input type="text" name="fname" placeholder="Enter first name here">
<p>Last name: </p> <input type="text" name="lname" placeholder="Enter last name here">
<p>Position:</p>
<select name="Pos" required>
    <option value="">Select</option>
    <option value="MT">Medical Technologist</option>
    <option value="P">Pathologist</option>
</select>
<p>License Number: </p> <input type="number" name="LicNo" placeholder="Enter License Number here">
<p>Email: </p> <input type="email" name="email" placeholder="Enter email here">
<p>Password: </p> <input type="password" name="pword" placeholder="Enter password here">
<br>
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<input type="submit">
</form>
</div>
</div>
</body>
</html>