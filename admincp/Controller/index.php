<?php
	if (isset($_SESSION['userName'])) {
		?>
		<?php include"../include-top.php";?>
			<div id="wrapper">
			<?php include"../menu.php"; ?>
			    <div id="content-wrapper">
			        <div class="container-fluid">
			          <h1>Trang Chủ</h1>
			          <hr>
			        </div>
			        <div class="container-fluid">
			          <?php echo $_SESSION['userName']; ?>
			        </div>
			    </div>
			</div>
			<?php include"../include-bot.php";?>
		<?php
	}
	else {
		header('location:login.php');
	}
 ?>


