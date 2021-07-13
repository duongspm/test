<?php
session_start();
$servername = "MYSQL5047.site4now.net";
$username = "a77512_tranvan";
$password = "shop_nhom3";
$dbname = "db_a77512_tranvan";
$conn = mysqli_connect($servername, $username, $password, $dbname);
	
if(!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
mysqli_query($conn,"set names utf8");

$ktTonTai="SELECT * FROM thanhvien where MatKhau='".$_POST["matkhaucu"]."'";
$truyvanktTonTai=mysqli_query($conn,$ktTonTai);
if(mysqli_num_rows($truyvanktTonTai) > 0)
{
    $thaydoiMatKhau="UPDATE thanhvien SET MatKhau='".$_POST["matkhaumoi"]."'WHERE TenDangNhap='".$_POST["tendangnhap"]."'";
    if(mysqli_query($conn,$thaydoiMatKhau))
        echo "Đổi mật khẩu thành công";
    else
        echo "Xảy ra lỗi";
}
else
{
    echo "Mật khẩu không chính xác" ;
}

?>