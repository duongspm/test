<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head> 
<?php
    $fullName = $_POST['fullName'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $tendangnhap = $_POST['tendangnhap'];
    $password = $_POST['password'];
    $ngaysinh = $_POST['ngaysinh'];
    $gender = $_POST['gender'];
    
    $conn = mysqli_connect("MYSQL5047.site4now.net","a77512_tranvan","shop_nhom3","db_a77512_tranvan");

    $sql = "SELECT * From khachhang where TenDangNhapKH ='$tendangnhap' or SDTKH = '$phoneNumber' ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        echo'<div class="alert alert-dark">
                <strong>Thất bại!</strong> Thêm thất bại ! Tên đăng nhập hoặc số điện thoại đã tồn tại.
            </div>';
    }
    else
    {
        $sql = "INSERT INTO `khachhang`(`HoTenKH`, `DiaChiKH`, `SDTKH`, `TenDangNhapKH`, `MatKhauKH`, `NgaySinhKH`, `GioiTinhKH`, `EmailKH`, `HinhAnhKH`) 
            VALUES ('$fullName','$address','$phoneNumber','$tendangnhap','$password','$ngaysinh','$gender','$email','')";
        $result = mysqli_query($conn,$sql);
        echo "<script>window.location = 'login.php'</script>";
    }
    $conn ->close();
?>

