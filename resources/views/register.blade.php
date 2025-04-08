<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<title>Forms Registration</title>
    <style>
	body {
	background-color:#5690e8;
	background: url({{ asset('img/19373.jpg') }});
	background-repeat: no-repeat;
	background-size: 100% 1000px;
	}
	h1 {
	font-family: Verdana;
	font-size: 100%;
	text-align: center;
	}
	p {
	font-family: Verdana;
	font-size: 100%;
	}
	.border {
	border-radius: 10px;
	padding: 10px 0;
	margin: auto;
	width: 600px;
	border: 1px solid black;
	text-align: center;
	background-color:rgb(225, 247, 230);
	}
	.outerborder {
	border-radius: 10px;
	width: 600px;
  	height: auto;
	margin: auto;
	margin-top: 150px;
 	display: flex;
	align-items: center;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	justify-content: center;
	}
	</style>
</head>
<body>
<div class="outerborder">
	<div class="border">
	<form action="{{url('upload')}}" method="POST" enctype="multipart/form-data">

		@csrf

	<h1 style="font-size:20px;">REGISTRATION</h1>
	<p>First name: </p><input type="text" name="fname" placeholder="Enter first name here" style="min-width: 100px; height: 25px; padding: 10px 15px; border-radius: 5px; font-family: Verdana;">
	<p>Last name: </p> <input type="text" name="lname" placeholder="Enter last name here" style="min-width: 100px; height: 25px; padding: 10px 15px; border-radius: 5px; font-family: Verdana;">
	<p>Position:</p>
	<select name="Pos" required>
		<option value="">Select</option>
		<option value="MT">Medical Technologist</option>
		<option value="P">Pathologist</option>
	</select>
	<p>License Number: </p> <input type="number" name="LicNo" placeholder="Enter License Number here" style="min-width: 100px; height: 25px; padding: 10px 15px; border-radius: 5px; font-family: Verdana;">
	<p>Email: </p> <input type="email" name="email" placeholder="Enter email here" style="min-width: 100px; height: 25px; padding: 10px 15px; border-radius: 5px; font-family: Verdana;">
	<p>Password: </p> <input type="password" name="pword" placeholder="Enter password here" style="min-width: 100px; height: 25px; padding: 10px 15px; border-radius: 5px; font-family: Verdana;">
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
	<br>
	<input type="submit">
	</form>
	</div>
</div>
</body>
</html>