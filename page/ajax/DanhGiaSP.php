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

if($_POST["tendangnhap"]=="")
{
    echo "Bạn phải đăng nhập mới có thể đánh giá";
}
else
{
    $layDanhGia="SELECT * FROM danhgia WHERE MaSanPham='".$_POST["masanpham"]."' and TenDangNhap='".$_POST["tendangnhap"]."'";
    $truyvanlayDanhGia=mysqli_query($conn,$layDanhGia);
    if(mysqli_num_rows($truyvanlayDanhGia)>0)
    {
        echo "Bạn đã đánh giá sản phẩm này";
    }
    else
    {
        $themDanhGia="INSERT INTO danhgia VALUES ('".$_POST["masanpham"]."','".$_POST["tendangnhap"]."','".$_POST["noidung"]."')";
        if(mysqli_query($conn,$themDanhGia))
            echo "Đánh giá thành công";
        else
            echo "Thất bại";
    }
}

?>