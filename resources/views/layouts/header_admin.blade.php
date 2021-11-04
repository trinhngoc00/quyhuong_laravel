<div class="container-fluid">
	<?php 
	if(!isset($_SESSION)) { 
		session_start(); 
	}  
	if (isset($_SESSION['username']) && $_SESSION['username']){
		echo '<p align="right" style="margin-bottom: 0;">
		Tên người dùng: '.$_SESSION['username'].'<a href="logout.php" style="margin-left: 20px;">Đăng xuất</a></p>';
	}
	else{
		echo '<p align="right" style="margin-bottom: 0;">Bạn chưa đăng nhập.</p>';
		exit();
	}
	?>
</div>
<?php include 'connectDB.php'; 
?>
<div class="container-fluid ad_head">
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link active" href="admin.php">Trang quản trị Admin</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="index.php">Trang chủ</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href='admin.php'>Sản phẩm</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href='admin_type.php'>Loại sản phẩm</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href='admin_user.php'>Người dùng</a>
		</li>
	</ul>
</div>