<?php
    $fullname = $_POST['fullname'];
    $date = $_POST['date'];
    $sex = $_POST['sex'];
    $number = $_POST['number'];

    $password = $_POST['password'];
    $username = $_POST['username'];

    
    $conn = mysqli_connect("localhost","root","","shopthoitrang");
    
    $sql = "SELECT * From nhanvien where HoTen ='$fullname' and DienThoai = '$number'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        echo'<div class="alert alert-dark">
                <strong>Thất bại!</strong> Thêm thất bại ! Tên đăng nhập hoặc số điện thoại đã tồn tại.
            </div>';
    }
    else
    {
        //INSERT INTO `nhanvien`(`MaNhanVien`, `HoTen`, `TenDangNhap`, `MatKhau`, `NgaySinh`, `GioiTinh`, `DienThoai`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
        $sql = "INSERT INTO `nhanvien`(`HoTen`, `TenDangNhap`, `MatKhau`, `NgaySinh`, `GioiTinh`, `DienThoai`) 
            VALUES ('$fullname','$username','$password','$date','$sex','$number')";
        $result = mysqli_query($conn,$sql);
        // echo '<div class="alert">
        //             <strong>Thành công</strong> Thêm thành công.
        //         </div>';
        echo "<script>location='account.php';</script>";
    }
    $conn ->close();
?>

