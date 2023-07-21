<?php
require_once 'admin/config/connectDB.php';

$conn = connectDB();

$sql = "select * from category";

$result = mysqli_query($conn, $sql);

$sql_all = "select * from category, product where category.cateId = product.proCateId order by product.proId desc";

$result_all = mysqli_query($conn, $sql_all);

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script src="https://kit.fontawesome.com/6e8637ff15.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div id="header">
		<div class="login">
			<p>BEICONIC</p>
			<p id="log"><a href="login/Login.html"><i class="fa-solid fa-user" style="color: #000000;"></i>LOGIN</a></p>
		</div>
		<h1><a href="homepage.php">MOS</a></h1>	
	<nav id="menu">
		<ul>
			<li><a href="#">TOP <i class="fa-solid fa-bars" style="color: #000000;"></i></a>
				 <ul>
					 <?php 
					 	while($row = mysqli_fetch_assoc($result)) {
							if($row['isShow'] != '0'){	
					 ?>
                 	<li><a href="Home.php?quanli=category&id=<?php echo $row['cateId']?>"><?php echo $row['cateName'] ?></a></li>
					<?php
						}}
					 ?>

                 </ul>
			</li>
			<li><a href="#">BOTTOM <i class="fa-solid fa-bars" style="color: #000000;"></i></a>
				<ul>
                 	<li><a href="#">Trouser</a></li>
                    <li><a href="#">Jeans</a></li>
                    <li><a href="#">Short</a></li>
                    <li><a href="#">Jogger</a></li>
                 </ul>
			</li>
			<li><a href="#">ACCESSORIES</a></li>
			<li><a href="#">SALE</a></li>
		</ul>
	</nav>
	<div class="imghome">
		<img src="uploads/home.PNG" width="102%" alt="">
	</div>
	</div>
	<div id="body">
		<h2>PRODUCT</h2>
		<div>
			<ul class="productlist">
				<?php
				while($row=mysqli_fetch_array($result_all)){
					if($row['isShow'] != '0'){
				?>
				<li>
					<a href="detail/Detail.php?quanli=product&id=<?php echo $row['proId']?>">
					<img src="uploads/<?php echo $row['proImage']?>">
					<p> <?php echo $row['proName']?> </p>
					<p> <?php echo number_format($row['proCost'])?>đ</p>
					</a>
				</li>
				<?php
				}}
				?>
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
</body>
</html>
