<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Admin TKShop</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<!-- css files -->
<link rel="stylesheet" href="../public/login/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="../public/login/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->

<!-- js -->
<script type="text/javascript" src="../public/login/js/jquery-2.1.4.min.js"></script>
<!-- //js -->

<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Oleo+Script:400,700&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>
<script src="../public/login/js/jquery.vide.min.js"></script>
	<!-- main -->
	<div data-vide-bg="../public/login/video/Ipad">
		<div class="center-container">
			<!--header-->
			<div class="header-w3l">
				<h1>Admin Login</h1>
			</div>
			<!--//header-->
			<div class="main-content-agile">
				<div class="sub-main-w3">	
					<div class="wthree-pro">
						<h2>Login Here</h2>
					</div>
					<form action="c_admin.php?action=login" method="post">
						<input placeholder="Username or E-mail" name="userName" class="user" type="email" required="">
						<span class="icon1"><i style="margin-top: 15px;" class="fa fa-user" aria-hidden="true"></i></span><br><br>
						
						<input  placeholder="Password" name="Password" class="pass" type="password" required="">
						<span class="icon2"><i style="margin-top: 30px;" class="fa fa-unlock" aria-hidden="true"></i></span><br/>
						<?php 
							if (isset($mes)) {
								?>
								<div style="color: red;" class="mes"><?=$mes.'!'?></div>
								<?php
							}
						?>
						<div class="sub-w3l">
							<!-- <h6><a href="#">Forgot Password?</a></h6> -->
							<div class="right-w3l">
								<input type="submit" value="Login" name="login">
							</div>
						</div>
					</form>
				</div>
			</div>
			<!--//main-->

			<!--footer-->
			<div class="footer">
				<p>&copy; 2019 Login Form. All rights reserved | Design by <a href="https://www.facebook.com/boypoornt" target="_blank">Nhutkhangit</a></p>
			</div>
			<!--//footer-->
		</div>
	</div>

</body>
</html>