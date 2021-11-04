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
				<h2 align="center">Loại sản phẩm</h2>
				<h4 align="center">
					<div class="alert alert-secondary" role="alert" style="display: inline-block;">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary btn_modal" data-toggle="modal" data-target="#modal_add_type">
							Thêm loại sản phẩm mới
						</button>

						<!-- Modal -->
						<div class="modal fade" id="modal_add_type" tabindex="-1" role="dialog" aria-labelledby="modal_add_label" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modal_add_label">Thêm loại sản phẩm mới</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="post" action="result_update_add_del.php" enctype="multipart/form-data">
											<table style="margin: auto;">
												<tr>
													<td><label>Tên loại sản phẩm:</label></td>
													<td><input class="input_info" type="text" name="name" value=""></td>
												</tr>
												<tr>
													<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
													<td><input class="input_btn btn btn-success" type="submit" value="Thêm sản phẩm mới" id="btn_add" name="add_type"></td>
												</tr>
											</table>
										</form>
									</div>
								</div>
							</div>
						</div>

					</div>
				</h4>
				<table style="margin: auto;">
					<tr>
						<th>ID</th>
						<th>Tên loại sản phẩm</th>
						<th>Xoá</th>
						<th>Sửa</th>
					</tr>
					<?php 
					$get_type = " select * from type";
					$result_type = mysqli_query($conn,$get_type); 
					foreach ($result_type as $row): ?>
					<tr>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['name'];?></td>
						<td>
							<a type="button" class="btn btn-secondary" href="delete_type.php?id=<?php echo $row['id'];?>&flag=type">Xoá</a>
						</td>
						<td>
							<a href="update.php?id=<?php echo $row['id'];?>&flag=type" type="button" class="btn btn-warning">Sửa</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
	<?php include 'layouts/scripts.php'; ?>

</body>
</html>