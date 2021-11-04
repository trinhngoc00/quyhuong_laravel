
<!DOCTYPE html>
<html>
<head>
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include 'layouts/header.php'; ?>
	
	<div class="container">
		<h2 align="center" style="margin-top: 20px;">Đăng ký tài khoản</h2>

		<div class="formLogin">
			<form method="post" action="process_resgister.php">
				<table class="" border="0" cellpadding="0" cellspacing="0" style="margin: auto;">
					<tr>
						<td><label>Tên người dùng:</label></td>
						<td><input class="input_info" type="text" name="username" id="user" value="" placeholder="trinhngoc00"></td>
					</tr>
					<tr>
						<td><label>Mật khẩu:</label></td>
						<td><input class="input_info" type="password" name="password" id="pass" value=""></td>
					</tr>
					<tr>
						<td><label>Họ tên:</label></td>
						<td><input class="input_info" type="text" name="name" id="" value="" placeholder="Trịnh Hồng Ngọc"></td>
					</tr>
					<tr>
						<td><label>Địa chỉ:</label></td>
						<td><input class="input_info" type="text" name="address" id="" value="" placeholder="162 Đường Phan Đình Phùng"></td>
					</tr>
					<tr>
						<td><label>Số điện thoại:</label></td>
						<td><input class="input_info" type="text" name="phone" id="" value="" placeholder="0123456789"></td>
					</tr>
					<tr>
						<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
						<td><input class="input_btn btn btn-success" type="submit" value="Đăng ký" id="btn_resgister" name="resgister"></td>
					</tr>
				</table>
			</form>
		</div>

	</div>
	<?php include 'layouts/footer.php'; ?>
	<?php include 'layouts/scripts.php'; ?>
</body>
</html>