<?php include"../include-top.php";?>
<div id="wrapper">
<?php include"../menu.php"; ?>
    <div id="content-wrapper">
        <div class="container-fluid">
          <h1>All User</h1>
          <hr>
        </div>
        <div class="container-fluid">
          
        	<div class="table-users">
   <div class="header">Users</div>
   
   <table cellspacing="0">
      <tr>
         <th>Avatar</th>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         <th width="230">Role</th>
         <th>Setting</th>
      </tr>
      <?php
      	foreach ($users as $value) {
      		?>
      			<tr>
			     <td><img src="../../public/images/avatar/<?php if($value['Avatar']!=null) {echo $value['Avatar'];}else{echo 'anh-avatar-dep-den-chat-cap-cho-facebook-tuong-doc-dao-nhat21.jpg';} ?>" alt="" /></td>
			     <td><?=$value['HoTen'] ?></td>
			     <td><?=$value['Email'] ?></td>
			     <td><?=$value['SDT'] ?></td>
			     <td><?=$value['Active'] ?></td>
			     <td>
			     	<button>Disable</button><button class="btn btn-success">Enablesh</button>
			     </td>
			  </tr>
      		<?php
      	}
       ?>
   </table>
</div>

        </div>
    </div>
</div>
<?php include"../include-bot.php";?>

