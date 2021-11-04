<!DOCTYPE html>
<html>
<head>
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php if(!isset($_SESSION)) {
		session_start();
	}
	
	if (isset($_POST['login'])) {
		include('connectDB.php');
		$username = addslashes($_POST['username']);
		$password = addslashes($_POST['password']);
		$_SESSION['permission'] = 0;

		if (!$username || !$password) {
			echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
			exit;
		}
    //Kiểm tra tên đăng nhập có tồn tại không
		$query = mysqli_query($conn, "SELECT username, password, permission FROM customer WHERE username='$username'");
		if (mysqli_num_rows($query) == 0) {
			echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
			exit;
		}

    //check admin
		$row = mysqli_fetch_array($query);
		// if ($password == $row['password'] && $row['permission'] == 10) {
		// 	$_SESSION['permission'] = $row['permission'];
		// 	$_SESSION['username'] = $username;
		// 	header("Location: admin.php");
		// 	exit;
		// }
    //So sánh 2 mật khẩu có trùng khớp hay không
		if ($password != $row['password']) {
			echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
			exit;
		}

    //Lưu tên đăng nhập
		$_SESSION['permission'] = $row['permission'];
		$_SESSION['username'] = $username;
		header("Location: index.php");
		die();
	}
	?>
	<?php include 'layouts/header.php'; ?>
	<div class="container">
		<h2 align="center" style="margin-top: 20px;">Đăng nhập tài khoản</h2>
		<div class="formLogin">
			<form method="post" action="login.php">
				<table class="" border="0" cellpadding="0" cellspacing="0" style="margin: auto;">
					<tr>
						<td><label>Tên đăng nhập:</label></td>
						<td><input class="input_info" id="user" type="text" name="username" value=""></td>
					</tr>
					<tr>
						<td><label>Mật khẩu:</label></td>
						<td><input class="input_info" type="password" name="password" id="pass" value=""></td>
					</tr>
					<tr>
						<td colspan="2"><input class="input_btn" type="submit" value="Đăng nhập" id="btn" name="login"></td>
					</tr>
				</table>
			</form>
		</div>

	</div>
	<?php include 'layouts/footer.php'; ?>
	<?php include 'layouts/scripts.php'; ?>
	<script type="text/javascript">
		function checkInput() {
			var get_user = document.getElementById("user").value;
			var get_pass = document.getElementById("pass").value;

			if (get_user=="" || get_pass=="") {
				document.getElementById("mess").innerHTML = "Tên đăng nhập và mật khẩu không thể trống.";
			}
			else{
				<?php echo "hiiiii";?>
			}
		}
	</script>
</body>
</html>