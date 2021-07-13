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

$csBinhLuan="UPDATE binhluan SET NoiDung='".$_POST["noidung"]."' WHERE MaBinhLuan='".$_POST["mabinhluan"]."'";

    if(mysqli_query($conn,$csBinhLuan))
        echo "Chình sửa bình luận thành công";
    else
        echo "Đã xảy ra lỗi";
?>