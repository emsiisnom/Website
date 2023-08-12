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
		<div class="title">Hello Again!</div>
		<div class="des">
			Wellcome back you've <br> beeb missed!
		</div>
		<form class="pt-3" action="{{route('loginProcess')}}" method="POST">
			@if (Session::has('fail'))
		  <div class="alert alert-success" role="alert">
			  {{Session::get('fail')}}
			</div>
			@endif
			@if (Session::has('success'))
			<div class="alert alert-success" role="alert">
				{{Session::get('success')}}
			  </div>
			  @endif
			@csrf
		<div class="group">
			<input type="text" placeholder="Enter username" name="user_name">
		</div>
		<div class="group">
			<input type="password" id="inputPassword" placeholder="Password" name="user_password">
			<span id="showPassword">
				<ion-icon name="eye-outline"></ion-icon>
				<ion-icon name="eye-off-outline"></ion-icon>
			</span>
		</div>
		<div class="signIn">
			<button>Sign In</button>
		</div>
		</form>
		<div class="or">
			Or continue with
		</div>
		<div class="list">
			<div class="item">
				<img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png" alt="">
			</div>
			<div class="item">
				<img src="https://museumandgallery.org/wp-content/uploads/2020/03/Facebook-Icon-Facebook-Logo-Social-Media-Fb-Logo-Facebook-Logo-PNG-and-Vector-with-Transparent-Background-for-Free-Download.png" alt="">
			</div>
			<div class="item">
				<img src="https://www.iconpacks.net/icons/2/free-twitter-logo-icon-2429-thumb.png" alt="">
			</div>
		</div>
		<div class="register">
			Not a member? <a href="{{url('customer/register')}}">Register now</a>
		</div>

	</div>

	<script src="script.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>