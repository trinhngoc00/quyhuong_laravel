<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include "layouts/header_admin.php" ?>

	<?php
	$id = $_GET['id'];
	$flag = $_GET['flag'];
	?>

	<div class="container-fluid ad_content">
		<div class="row">
			<?php include "layouts/admin_menu.php" ?>
			<div class="col-10 ad_conntent" >
				<h2>Loại sản phẩm</h2>
				<div align="center">
					<h3>Xác nhận xoá loại sản phẩm.</h3>
					<a type="button" class="btn btn-success" href="result_update_add_del.php?id=<?php echo $id?>&flag=<?php echo $flag?>" style="border-radius: 0.25rem;">Có</a>
					<a type="button" class="btn btn-secondary" href="admin.php">Không</a>
				</div>
			</div>
		</div>
	</div>
<?php include 'layouts/scripts.php'; ?>

</body>
</html>