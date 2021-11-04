<!DOCTYPE html>
<html>
<head>
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include 'layouts/header.php'; ?>
	<div class="container category">
		<h2 align="center" style="margin-top: 20px;">Kết quả tìm kiếm</h2>
		
			<?php if (isset($_REQUEST['submit_search'])): ?>
				<?php $search = $_POST['search'];
					if (empty($search)): ?>
					<?php echo "Cần nhập từ khoá tìm kiếm."; ?>
					<?php else: ?>
						<?php 
						$dbhost = "localhost";
						$dbuser = "root";
						$dbpass = null;
						$db = "quyhuong_cake2";
						$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Không thể kết nối database");
						$query = "select * from product where name like '%$search%' or price like '%$search%' ";

						$result_search = mysqli_query($conn,$query);

						$num = mysqli_num_rows($result_search);
						if ($num > 0 && $search != ""): ?>
							<p align="center">Tìm thấy <?php echo $num; ?> sản phẩm phù hợp</p>

							<div class="row justify-content-center" >
							<?php while ($row = mysqli_fetch_assoc($result_search)): ?>
								<div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
									<div class="card">
										<div class="box-img">
											<a href="">
												<img src="img/<?php echo $row['image']; ?>" class="card-img-top" alt="xa_lach">
											</a>
											<?php if ($row['price_sale'] != 0): ?>
												<div class="btn-sale">Sale</div>
											<?php endif; ?>
										</div>
										<div class="card-body">
											<a href="" class="card-name">
												<h5 class="card-title"><?php echo $row['name']; ?></h5>
											</a>
											<?php if ($row['price_sale'] != 0): ?>
												<p class="card-text" style="text-decoration: line-through; display: inline-block;"> <?php echo $row['price']; ?>VNĐ</p>
												<p class="card-text" style="display: inline-block;"><?php echo $row['price_sale']; ?> VNĐ</p>
												<?php else: ?>
													<p class="card-text"><?php echo $row['price']; ?> VNĐ</p>
												<?php endif; ?>
												<div>
													<a type="submit" href="javascript:" class="card-link" onclick="AddCart();">Thêm vào giỏ hàng</a>
												</div>
										</div>
									</div>			
								</div>
							<?php endwhile; ?>
							</div>
							<?php else: ?>
								<?php echo "Không tìm thấy kết quả phù hợp"; ?>	
							<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
	</div>
	<?php include 'layouts/footer.php'; ?>
	<?php include 'layouts/scripts.php'; ?>

</body>
</html>