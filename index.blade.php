<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../customer/style.css"/>
	<link rel="stylesheet" type="text/css" href="../customer/slide.css"/>
	<script src="https://kit.fontawesome.com/6e8637ff15.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div id="header">
		<div class="login">
			<p>{{Session::get('userName')}}</p>
			@if (!Session::has('userName'))  
			<p>BEICONIC</p>
			<p id="log"><a href="{{url('customer/login')}}"><i class="fa-solid fa-user" style="color: #000000;"></i>Account</a></p>
			@else
			<p id="log"><a href="{{url('customer/logout')}}">Log out</a></p>
			@endif
		</div>
		<h1><a href="{{url('customer/index')}}">MOS</a></h1>	
		<div class="menu-wrapper menu-gold">
			<ul class="menu">
			  <li><a href=""> TOP<i class="fa-solid fa-bars" style="color: #000000;"></i></a>
				<ul>
					@foreach ($cat as $c) 
					  <li><a href="{{url('customer/collections')}}\{{$c->catID}}">{{$c->catName}}</li></a>
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
	<div class="slider">
        <div class="list">
            <div class="item">
                <img src="../../public/img/home1.png" alt="">
            </div>
            <div class="item">
                <img src="../../public/img/home2.png" alt="">
            </div>
            <div class="item">
                <img src="../../public/img/home3.png" alt="">
            </div>
            <div class="item">
                <img src="../../public/img/home4.png" alt="">
            </div>
            <div class="item">
                <img src="../../public/img/home5.png" alt="">
            </div>
        </div>
        <div class="buttons">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
	<div id="body">
		<h2>PRODUCT</h2>
		<div>
			<ul class="productlist">
				@foreach ($pro as $p)
					<li>
						<a href="#">
						<img src="{{'../../public/img/'. $p -> productImage}}">
						<p> {{$p->productName}} </p>
						<p> {{$p->productPrice}}đ</p>
						</a>
					</li>
				@endforeach
			</ul>
		</div>
	</div>

	<div id="footer">
		<div class="contact">
			<div>
		 		 <h3 data_temp_dwid="1"><em class="fa-regular fa-envelope" style="color: #000000;" data_temp_dwid="2"></em> Contact here</h3>
			</div>	
			<div class="econtact">
				<input type="email" class="emailcontact" name="contact[email]" value="" placeholder="Input your email" required="" aria-label="Email Address">
				<button type="submit" class="newsletter__btn"><i class="fa-solid fa-phone" style="color: #000000;"></i></button>
			</div>
		</div>
		<div class="footer">
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
			<p>Copyright © 2023</p>
		</div>	
	</div>
	</div>
	<script src="../customer/app.js"></script>
</body>
</html>
