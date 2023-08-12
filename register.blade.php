<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../customer/login.css">
	<title>Document</title>
</head>
<body>

	<div class="login">
		<div class="title">Hello!</div>
		<div class="des">
			Wellcome back you've <br> beeb missed!
		</div>
		<form class="pt-3" action="{{route('registerProcess')}}" method="POST">
			@if (Session::has('success'))
		  <div class="alert alert-success" role="alert">
			  {{Session::get('success')}}
		  </div>
		  @endif
		  @csrf
		<div class="group">
			<input type="text" placeholder="Enter name" name="user_name">
		</div>
		<div class="group">
			<input type="file" placeholder="Enter Telephone" name="user_image">
		</div>
        <div class="group">
			<input type="text" placeholder="Enter Address" name="user_address">
		</div>
        <div class="group">
			<input type="text" placeholder="Enter Telephone" name="user_phone">
		</div>
		<div class="group">
			<input type="password" id="inputPassword" placeholder="Password" name="user_password">
			<span id="showPassword">
				<ion-icon name="eye-outline"></ion-icon>
				<ion-icon name="eye-off-outline"></ion-icon>
			</span>
		</div>
		<div class="signIn">
			<button>Create Account</button>
		</div>
	</div>
	<script src="script.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>