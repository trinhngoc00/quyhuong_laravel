<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include "layouts/header_admin.php" ?>
	<div class="container-fluid ad_content">
		<div class="row">
			<?php include "layouts/admin_menu.php" ?>

			<div class="col-10 ad_conntent" >
				<h2 align="center">Người dùng</h2>
				<table style="margin: auto;">
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Họ tên</th>
						<th>Địa chỉ</th>
						<th>Điện thoại</th>
						<th>Sửa</th>
					</tr>
					<?php 
					$get_cus = " select * from customer";
					$result_cus = mysqli_query($conn,$get_cus); 
					foreach ($result_cus as $row): ?>
					<tr>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['username'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['address'];?></td>
						<td><?php echo $row['phone'];?></td>
						<td><a href="update.php?id=<?php echo $row['id'];?>&flag=user">Sửa</a></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
	<?php include 'layouts/scripts.php'; ?>

</body>
</html>