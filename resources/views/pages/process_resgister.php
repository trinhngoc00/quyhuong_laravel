<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = null;
$db = "quyhuong_cake2";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Không thể kết nối database");

$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
$name = addslashes($_POST['name']);
$address = addslashes($_POST['address']);
$phone = addslashes($_POST['phone']);

if (!$username || !$password || !$name || !$address || !$phone) {
	echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
	exit;
}
//kiem tra co trung username va sodienthoai khong
include('connectDB.php');
$query = mysqli_query($conn, "SELECT username FROM customer WHERE username='$username'");
$query1 = mysqli_query($conn, "SELECT phone FROM customer WHERE phone='$phone'");
if (mysqli_num_rows($query) != 0) {
	echo "Tên đăng nhập đã tồn tại";
	exit;
}
if (mysqli_num_rows($query1) != 0) {
	echo "Số điện thoại đã tồn tại";
	exit;
}

$post1 = "insert into customer (id, username, password, name, address, phone, created_at, updated_at) VALUE (NULL, '{$username}', '{$password}', '{$name}', '{$address}', '{$phone}', current_timestamp(), current_timestamp())";
$addmember = mysqli_query($conn, $post1);

if ($addmember){
	echo "Đăng ký thành công. <a href='login.php'>Đăng nhập</a>";
	exit;
}
else
	echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='resgister.php'>Thử lại</a>";
?>