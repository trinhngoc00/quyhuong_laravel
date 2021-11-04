<!DOCTYPE html>
<html>
<head>
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include 'layouts/header.php'; ?>
	
	<?php
	include 'connectDB.php';
	$get = " select * from product ORDER BY RAND ( ) LIMIT 2";
	$result = mysqli_query($conn,$get);

	?>

	<div id="main_table" style="padding-top: 30px;">
		<div class="container">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th class ="maSP">Mã sản phẩm</th>
					<th>Ảnh</th>
					<th class ="tenSP">Tên sản phẩm</th>
					<th class="title">Số lượng</th>
					<th class="title">Giá</th>
					<th class="title">Tổng</th>
					<th class="title">Thao tác</th>
				</tr>
				<?php $x =  0;?>
				<?php foreach($result as $row): ?>
					<?php $x =  $x + 1*$row['price']?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><img src="img/<?php echo $row['image']; ?>"></td>
						<td><?php echo $row['name']; ?></td>
						<td><input type="text" value="1" name=""> cái</td>
						<td><?php echo $row['price']; ?> VND</td>
						<td>
							<?php echo 1*$row['price']; ?> VND</td>
						<td>Xoá</td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="7">

						<div id="col-L"><strong>Tổng: <?php echo $x; ?> VND</strong></div>
						<div id="col-R">
							<button class="btn btn-success">Cập nhật giỏ hàng</button>
							<button class="btn btn-success">Xóa giỏ hàng</button>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<form><div class="container">
		<h4 id="datHang_thanhToan">Đặt hàng và thanh toán</h4>
		<div class="form-group">
			<label>Họ và tên:</label>
			<input type="text" class="form-control" name="">
		</div>
		<div class="form-group">
			<label>Điện thoại:</label>
			<input type="text" class="form-control" name="">
		</div>
		<div class="form-group">
			<label>Địa chỉ:</label>
			<input type="text" class="form-control" name="">
		</div>
		<input type="submit" class="btn btn-success submit" value="Áp dụng">
	</div></form>
	

	<?php include 'layouts/footer.php'; ?>
	<?php include 'layouts/scripts.php'; ?>
</body>
</html>

