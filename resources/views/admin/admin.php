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
				<h2 align="center">Sản phẩm</h2>
				<h4 align="center">
					<div class="alert alert-secondary" role="alert" style="display: inline-block;">
						<form method="post" action="search_admin.php" class="form_search">
							<input type="text" name="search" placeholder="Search" value="">
							<input type="submit" name="search_product" value="Tìm kiếm">
						</form>

						<!-- Button modal -->
						<button type="button" class="btn btn-primary btn_modal" data-toggle="modal" data-target="#modal_add">
							Thêm sản phẩm mới
						</button>

						<!-- Modal -->
						<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_add_label" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modal_add_label">Thêm sản phẩm mới</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="post" action="result_update_add_del.php" enctype="multipart/form-data">
											<table style="margin: auto;">
												<tr>
													<td><label>ID_loại:</label></td>
													<td><input class="input_info" type="text" name="id_type" value=""></td>
												</tr>
												<tr>
													<td><label>Tên sản phẩm:</label></td>
													<td><input class="input_info" type="text" name="name" value=""></td>
												</tr>
												<tr>
													<td><label>Số lượng:</label></td>
													<td><input class="input_info" type="text" name="amount" id="" value=""></td>
												</tr>
												<tr>
													<td><label>Đơn giá:</label></td>
													<td><input class="input_info" type="text" name="price" id="" value=""></td>
												</tr>
												<tr>
													<td><label>Giá khuyến mại:</label></td>
													<td><input class="input_info" type="text" name="price_sale" id="" value=""></td>
												</tr>
												<tr>
													<td><label>Ảnh:</label></td>
													<td><input type="file" name="image_up" style="width: 100%;"></td>
												</tr>
												<tr>
													<td><label>Mô tả:</label></td>
													<td><input class="input_info" type="text" name="description" id="" value=""></td>
												</tr>
												<tr>
													<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
													<td><input class="input_btn btn btn-success" type="submit" value="Thêm sản phẩm mới" id="btn_add" name="btn_add"></td>
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
						<th>ID_loại</th>
						<th>Tên sản phẩm</th>
						<th>Số lượng</th>
						<th>Đơn giá</th>
						<th>Giá khuyến mại</th>
						<th>Ảnh</th>
						<th>Mô tả</th>
						<th>Xoá</th>
						<th>Sửa</th>
					</tr>
					<?php 
					$get_pr = " select * from product";
					$result_pr = mysqli_query($conn,$get_pr); 
					foreach ($result_pr as $row): ?>
						<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['id_type'];?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['amount'];?></td>
							<td><?php echo $row['price'];?></td>
							<td><?php echo $row['price_sale'];?></td>
							<td><img src="img/<?php echo $row['image'];?>"><?php echo $row['image'];?></td>
							<td><?php echo $row['description'];?></td>
							<td>
								<a type="button" class="btn btn-secondary" href="delete_product.php?id=<?php echo $row['id'];?>&flag=product">Xoá</a>
							</td>
							<td>
								<a href="update.php?id=<?php echo $row['id'];?>&flag=product" type="button" class="btn btn-warning">Sửa</a>
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