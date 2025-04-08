<!DOCTYPE html>
<html>
<head>
	<title>Forms Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<style>
	body {
	background-color:#5690e8;
	background: url({{ asset('img/19373.jpg') }});
	background-repeat: no-repeat;
	background-size: 100% 1000px;
	overscroll-behavior: none;
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
	.border1 {
	border-top-left-radius: 10px;
	border-bottom-left-radius: 10px;
	padding: 30px 0;
	margin: auto;
	width: 350px;
	height: 400px;
	border: 1px solid black;
	text-align: center;
	background-color:rgb(225, 247, 230);
	}
	.border2 {
	border-top-right-radius: 10px;
	border-bottom-right-radius: 10px;
	padding: 30px 0;
	margin: auto;
	width: 450px;
	height: 400px;
	border: 1px solid black;
	text-align: center;
	background-color:rgb(225, 247, 230);
	}
	.outerborder {
	border-radius: 10px;
	width: 800px;
  	height: 400px;
	margin: auto;
	margin-top: 200px;
 	display: flex;
	align-items: center;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	justify-content: center;
	}
	</style>
</head>
<body>
<div class="outerborder">
	<div class="border1">
	<img src="{{ asset('img/medtech.png') }}" style="scale: 100%;width: 350px; justify-content: center;">
	</div>
	<div class="border2">
	<form method="POST" action="{{ route('login.submit') }}">
    	@csrf
		<h1 style="font-size: 30px;">LOGIN</h1>
		<p>Email: </p><input type="email" name="email" placeholder="Enter Email here" style="min-width: 100px; height: 25px; padding: 10px 15px; border-radius: 5px; font-family: Verdana;">
		<p>Password: </p> <input type="password" name="password" placeholder="Enter password here" style="min-width: 100px; height: 25px; padding: 10px 15px; border-radius: 5px; font-family: Verdana;">

<br>
<br>
<button type="submit" class="btn btn-primary">LOGIN</button>

</form>
<br>
<a href="{{ route('register')}}"><button type="button" class="btn btn-primary">REGISTER</button></a>
</div>
</div>
</body>
</html>