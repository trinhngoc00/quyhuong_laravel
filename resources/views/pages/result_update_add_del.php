
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include "layouts/header_admin.php" ?>
	<?php
	function message(){
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = null;
		$db = "quyhuong_cake2";
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Không thể kết nối database");

	//get input->value
		if(isset($_POST['id_type']) && isset($_POST['name']) && isset($_POST['amount']) && isset($_POST['price']) && isset($_POST['price_sale']) && isset($_POST['description']) ){
			$id_type = $_POST['id_type'];
			$name = $_POST['name'];
			$amount = $_POST['amount'];
			$price = $_POST['price'];
			$price_sale = $_POST['price_sale'];
			$description = $_POST['description'];
		}

		if (isset($_FILES['image_up'])) {
			$image_up = $_FILES['image_up']['name'];
			$target = "img/".basename($image_up);
		}

//update_product
		if (isset($_POST['update'])) {
			$id = $_POST['id'];

			if (!$name || !$amount || !$price || !$image_up) {
				return "Vui lòng nhập đầy đủ thông tin về: tên sản phẩm, số lượng, giá tiền, hình ảnh.";
			}
			$post1 = "UPDATE product 
			SET id_type='{$id_type}', name='{$name}', amount='{$amount}', price = '{$price}', price_sale='{$price_sale}', image='{$image_up}', description='{$description}'
			WHERE id = $id";
			$update_pr = mysqli_query($conn, $post1);

			if ($update_pr){
				return "Cập nhật sản phẩm thành công.";
			}
			else
				return "Có lỗi xảy ra.";
		}

//add_product
		if(isset($_POST['btn_add'])) {
			if (!$name || !$price || !$image_up) {
				return "Vui lòng nhập đầy đủ thông tin về: tên sản phẩm, giá tiền, hình ảnh. ";
			}

			$find_name=mysqli_query($conn, "SELECT name FROM product WHERE name = '$name'");
			if (mysqli_num_rows($find_name) != 0) {
				return "Sản phẩm đã tồn tại";
			}

			$sql = "INSERT INTO product (id,id_type,name,amount,price,price_sale,image,description)
			VALUES (null, '{$id_type}', '{$name}','{$amount}', '{$price}', '{$price_sale}', '{$image_up}', '{$description}')";
			$add_pr = mysqli_query($conn, $sql);

			if ($add_pr){
				return "Đã thêm sản phẩm thành công.";
			}
			else
				return "Có lỗi xảy ra.";
		}
//add type
		if (isset($_POST['add_type'])) {
			if (isset($_POST['name'])) {
				$name = $_POST['name'];
				if (!$name) {
					echo "Vui lòng nhập đầy đủ thông tin loại sản phẩm. <a href='javascript: history.go(-1)'>Trở lại</a>";
				}
				$find_name=mysqli_query($conn, "SELECT name FROM type WHERE name = '$name'");
				if (mysqli_num_rows($find_name) != 0) {
					echo "Loại sản phẩm đã tồn tại";
				}
				$sql = "INSERT INTO type (id,name) VALUES (null, '{$name}')";
				$add_pr = mysqli_query($conn, $sql);
				if ($add_pr){
					echo "Thêm loại sản phẩm thành công.";
				}
				else
					echo "Có lỗi xảy ra.";
			}
		}
//update type
		if (isset($_POST['update_type'])) {
			if (isset($_POST['id']) && isset($_POST['name'])){
				$id = $_POST['id'];
				$name = $_POST['name'];
				if (!$name) {
					return "Vui lòng nhập đầy đủ thông tin về: tên loại sản phẩm";
				}
				$find_name=mysqli_query($conn, "SELECT name FROM type WHERE name = '$name'");
				if (mysqli_num_rows($find_name) != 0) {
					return "Loại sản phẩm đã tồn tại";
				}

				$post1 = "UPDATE type SET name='{$name}' WHERE id = $id";
				$update = mysqli_query($conn, $post1);

				if ($update){
					return "Cập nhật loại sản phẩm thành công.";
				}
				else
					return "Có lỗi xảy ra.";
			}
		}
	//delete type., product
		if (isset($_GET['id']) && isset($_GET['flag'])) {
			$id = $_GET['id'];
			$flag = $_GET['flag'];

			if ($flag === 'product') {
				$sql = "DELETE FROM product WHERE id = $id";
				$result = mysqli_query($conn,$sql);

				if ($result) {
					return "Đã xoá sản phẩm thành công.";
				}
				else{
					return "Có lỗi xảy ra.";
				}
			}
			if ($flag === 'type') {
				$sql = "DELETE FROM type WHERE id = $id";
				$result = mysqli_query($conn,$sql);

				if ($result) {
					return "Đã xoá loại sản phẩm thành công.";
				}
				else{
					return "Có lỗi xảy ra.";
				}
			}
		}
	//update user 
		if (isset($_POST['update_user'])) {
			if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone'])) {
				$id = $_POST['id'];
				$name = $_POST['name'];
				$address = $_POST['address'];
				$phone = $_POST['phone'];
				if (!$name || !$address || !$phone) {
					return "Vui lòng nhập đầy đủ thông tin về: họ tên, địa chỉ, số điện thoại.";
				}
				// $find_phone=mysqli_query($conn, "SELECT phone FROM customer WHERE phone = '$phone'");
				// if (mysqli_num_rows($find_phone) != 0) {
				// 	return "Số điện thoại đã tồn tại";
				// }
				$post1 = "UPDATE customer SET name='{$name}', address='{$address}', phone='{$phone}'  WHERE id = $id";
				$update = mysqli_query($conn, $post1);

				if ($update){
					return "Cập nhật tài khoản người dùng thành công.";
				}
				else
					return "Có lỗi xảy ra.";
			}
		}
	}
	?>
	<div class="container-fluid ad_content">
		<div class="row">
			<?php include "layouts/admin_menu.php" ?>
			<div class="col-10 ad_conntent" >
				<h3 style="margin-top: 20px;">Kết quả</h3>
				<div class="alert alert-success message_alert" role="alert">
					<?php echo message(); ?>
				</div>
				<a href='admin.php' style="font-size: 14px; font-weight: bold; margin-right: 30px;">Về trang chủ</a>
			</div>
		</div>
	</div>
<?php include 'layouts/scripts.php'; ?>

</body>
</html>