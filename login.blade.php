<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../customer/style.css"/>
	<link rel="stylesheet" type="text/css" href="../customer/login.css"/>
	<script src="https://kit.fontawesome.com/6e8637ff15.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<div class="login">
			<p>BEICONIC</p>
			<p id="log"><a href="{{url('customer/login')}}"><i class="fa-solid fa-user" style="color: #000000;"></i>LOGIN</a></p>
		</div>
		<h1><a href="{{url('customer/index')}}">MOS</a></h1>	
	</header>
	<div class="menu-wrapper menu-gold">
		<ul class="menu">
		  <li><a href=""> TOP<i class="fa-solid fa-bars" style="color: #000000;"></i></a>
			<ul>
				@foreach ($cat as $c)
				  <li><a href="">{{$c->catName}}</li></a>
				@endforeach
			</ul>
		  </li>
		  <li>
			<a href=""> BOTTOM<i class="fa-solid fa-bars" style="color: #000000;"></i></a>
			<ul>
			  <li><a href=""> Jeans</a></li>
			  <li><a href=""> Short</a></li>
			  <li><a href=""> Trouser</a></li>
			</ul>
		  </li>
		  <li><a href=""> Accessories</a></li>
		  <li>
			<a href="">Sale</a>
		  </li>
		</ul>
	  </div>
	<div class="uslog">
		<h2>Login</h2>
		<input required="" type="email" value="" name="customer[email]" id="customer_email" placeholder="Email" class="text">
		<input required="" type="password" value="" name="customer[password]" id="customer_password" placeholder="Password" class="text" size="16">
		<button type="submit">Submit</button>
	</div>
	<div class="contact">
		<div>
		 	<h3 data_temp_dwid="1"><em class="fa-regular fa-envelope" style="color: #000000;" data_temp_dwid="2"></em> Contact here</h3>
		</div>	
		<div class="econtact">
			<input type="email" class="emailcontact" name="contact[email]" value="" placeholder="Input your email" required="" aria-label="Email Address">
			<button type="submit" class="newsletter__btn"><i class="fa-solid fa-phone" style="color: #000000;"></i></button>
		</div>
	</div>
	<footer>
		<div>
			<ul class="wrapper">
				<li class="icon facebook">
					<span class="tooltip">Facebook</span>
					<span><i class="fab fa-facebook-f"></i></span>
				</li>
				<li class="icon youtube">
					<span class="tooltip">Youtube</span>
					<span><i class="fab fa-youtube"></i></span>
				</li>
				<li class="icon instagram">
					<span class="tooltip">Instagram</span>
					<span><i class="fab fa-instagram"></i></span>
				</li>
			</ul>
		</div>	
	</footer>
</body>
</html>
