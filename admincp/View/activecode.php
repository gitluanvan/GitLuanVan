<?php include"../include-top.php";?>
<div id="wrapper">
<?php include"../menu.php"; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
          <h1>System Apriori</h1>
          <hr>
        </div>
        <div class="container-fluid">
        	<div><h4 style="text-align: center;">Mã code đã được gửi về Email của Admin, vui lòng nhập đúng code để Update Hệ Thống Gợi Ý Mới cho Website</h4></div>
          <form method="post" action="c_admin.php?action=verifycode" class="edit-form">
          	<label>Enter Active Code</label><br>
          	<input class="input-code" type="text" name="activecode"><br/>
          	<button type="submit" name="submitcode" class="btn btn-success btn-code">Submit</button>
          </form>
          <?php
          	if (isset($mess)) {
          		?>
          		<div><?=$mess?></div>
          		<?php
          	}
          ?>
        </div>
    </div>
    <style type="text/css">
    	.edit-form {
    		margin-top: 10%;
    		box-shadow: 10px 5px 10px 500px #888888;
    		border-radius: 5px;
    		text-align: center;
    	}
    	.input-code, .btn-code {
    		margin: 10px 5px 10px 5px;
    	}
    </style>
</div>
<?php include"../include-bot.php";?>


