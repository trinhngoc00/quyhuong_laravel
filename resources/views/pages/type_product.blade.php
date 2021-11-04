<!DOCTYPE html>
<html>
<head>
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include 'layouts/header.php'; ?>
	
	<?php
	include 'connectDB.php';
	$id_type = $_GET['id'];

	if ($id_type == 1) {
		$get_pr = " select * from product 
		where (id_type = 1 or id_type = 2 or id_type = 3 or id_type = 6)";
	}
	else {
		$get_pr = " select * from product where id_type = $id_type";
	}
	$result_pr = mysqli_query($conn,$get_pr);

	$num = mysqli_num_rows($result_pr);

	$get_type = "select * from type where id = $id_type";
	$result_type = mysqli_query($conn,$get_type);
	?>

	<div class="container category">
		<h2 style="text-align: center;">
			<?php foreach ($result_type as $row) {
				echo $row['name'];
			} 
			?>
		</h2>
		<h5 style="text-align: center;">Hiển thị <?php echo $num; ?> sản phẩm</h5>
		<div class="row justify-content-center" id="card_box">
			<?php foreach($result_pr as $row): ?>
				<form method="post" action="product_detail.php" class="col-lg-3 col-md-4 col-sm-6 col-12 ">
					<div class="card">
						<input type="text" name="id_pr" hidden="true" value="<?php echo $row['id']; ?>">
						<div class="box-img">
							<a href="product_detail.php?id=<?php echo $row['id'];?>" name="submit_pr">
								<img src="img/<?php echo $row['image']; ?>" class="card-img-top" alt="xa_lach">
							</a>
							<?php if ($row['price_sale'] != 0): ?>
								<div class="btn-sale">Sale</div>
							<?php endif; ?>
						</div>

						<div class="card-body">
							<a href="product_detail.php?id=<?php echo $row['id'];?>" class="card-name">
								<h5 class="card-title"><?php echo $row['name']; ?></h5>
							</a>
							<?php if ($row['price_sale'] != 0): ?>
								<p class="card-text" style="text-decoration: line-through; display: inline-block;"> <?php echo $row['price']; ?>VNĐ</p>
								<p class="card-text" style="display: inline-block;"><?php echo $row['price_sale']; ?> VNĐ</p>
								<?php else: ?>
									<p class="card-text"><?php echo $row['price']; ?> VNĐ</p>
								<?php endif; ?>
								<div style="padding-top: 10px;">
									<a class="btn btn-success add_to_cart" 
									href="cart.php?id=<?php echo $row['id'];?>">Thêm vào giỏ hàng</a>
								</div>
							</div>
						</div>			
					</form>
				<?php endforeach; ?>	
			</div>
			<br>
		</div>
		<?php include 'layouts/footer.php'; ?>
		<?php include 'layouts/scripts.php'; ?>
	</body>
	</html>