<?php

    include "../admin/include/header_admin.php";
    global $conn;

    if(!isset($_GET["MaNhanVien"]))
        echo "<script>location='account.php';</script>";
    
    $layDuLieu="SELECT * FROM nhanvien WHERE MaNhanVien='".$_GET["MaNhanVien"]."'";
    $truyvan_layDuLieu=mysqli_query($conn,$layDuLieu);
    if(mysqli_num_rows($truyvan_layDuLieu)>0)
    {
        $cot=mysqli_fetch_array($truyvan_layDuLieu);
    }
    else
    {
        echo "<script>location='account.php';</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sửa tài khoản admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar -->
        <?php include 'include/navbaradmin.php'?>
        <!-- Navbar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include 'include/layoutSidenav_nav.php'?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Sửa khoản admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Sửa khoản admin</li>
                            <li class="breadcrumb-item"><a href="account.php">Danh sách tài khoản</a></li>
                        </ol>
                        <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Thông tin tài khoản
                            </div>
                            <div class="card mb-4">
                            <div class="card-body">
                                <form method="POST" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                                    <table >
                                        <tr>
                                            <td width="167">Họ và Tên</td>
                                                <td width="423">
                                                <input type="text" id="hoten" name="hoten" class="hoten" value="<?php echo $cot["HoTen"]; ?>"/> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ngày sinh</td>
                                            <td><input type="date" name="ngaysinh" class="ngaysinh" value="<?php echo $cot["NgaySinh"]; ?>"/></td>
                                        </tr>
                                        <tr>
                                        <th>Giới tính</th>
                                            <td>
                                                <?php if(trim($cot["GioiTinh"])=="M") { ?>
                                                    <input type="radio" checked class="gioitinh" id="gioitinh" name="gioitinh" value="M" > Nam
                                                    <input type="radio" class="gioitinh" id="gioitinh"  name="gioitinh" value="F" > Nữ
                                                    <input type="radio" class="gioitinh" id="gioitinh"  name="gioitinh" value="K" > Khác
                                                <?php }else if(trim($cot["GioiTinh"])=="F"){ ?>
                                                    <input type="radio" class="gioitinh" id="gioitinh"  name="gioitinh" value="M" > Nam
                                                    <input type="radio" class="gioitinh" id="gioitinh" checked  name="gioitinh" value="F" > Nữ
                                                    <input type="radio" class="gioitinh" id="gioitinh"  name="gioitinh" value="K" > Khác
                                                <?php } else {?>
                                                    <input type="radio" class="gioitinh" id="gioitinh" name="gioitinh" value="M" > Nam
                                                    <input type="radio" class="gioitinh" id="gioitinh" name="gioitinh" value="F" > Nữ
                                                    <input type="radio" class="gioitinh" id="gioitinh" checked name="gioitinh" value="K" > Khác
                                                <?php }?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SĐT</td>
                                            <td><input type="number" id="dienthoai" name="dienthoai" class="dienthoai" value="<?php echo $cot["DienThoai"]; ?>"/></td>
                                        </tr>
                                   
                                        <tr>
                                            <td>Tài khoản</td>
                                            <td><input type="text" name="tendangnhap" class="tendangnhap" class="tendangnhap" value="<?php echo $cot["TenDangNhap"]; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td>Mặt khẩu</td>
                                            <td><input type="password" id="matkhau" name="matkhau"  class="matkhau" value="<?php echo $cot["MatKhau"]; ?>"/></td>
                                        </tr>
                                        <tr>
                                            <td>Nhập lại mặt khẩu</td>
                                            <td><input type="password" id="password_again" name="password_again" class="password_again"/></td>
                                        </tr>
                                        <tr>
                                            <td><input name="Luu" type="submit" value="Save" class="btn btn-success button_insert Luu "></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <div class="result"></div>
                        </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
        <?php include 'include/footeradmin.php' ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
            $(document).ready(function(){
                $('#Luu').click(function(e){
                    e.preventDefault(); 
                    var $hoten = $('#hoten').val();
                    var $tendangnhap = $('.tendangnhap').val();
                    var $matkhau = $('#matkhau').val();
                    //number=$('#number').val();
                    var $ngaysinh = $('#ngaysinh').val();
                    var $gioitinh = $('#gioitinh').val();
                  
                    var $password_again = $('#password_again').val();

                    if ($hoten == '') {
                        alert('Vui lòng nhập họ và tên');
                        return false;
                    }
                    var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
                    var $dienthoai = $('.dienthoai').val();
                    if (vnf_regex.test($dienthoai) == false) 
                        {
                            alert('Số điện thoại không đúng định dạng!');
                            return false;
                        }

                    // Kiểm tra đã nhập chưa
                    if ($tendangnhap == '') {
                        alert('Vui lòng tên đăng nhập');
                        return false;
                    }

                    // Kiểm tra đã nhập chưa
                    if ($matkhau == '') {
                        alert('Vui lòng nhập mặt khẩu');
                        return false;
                    }
                    if ($matkhau != $password_again) {
                        alert('Mặt khẩu không trùng khớp');
                        return false;
                    }

                    // Kiểm tra đã nhập chưa
                    if ($ngaysinh == '') {
                        alert('Vui lòng nhập ngày sinh');
                        return false;
                    }
                });
            });
        </script>
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST") {
            $hoten=$_POST["hoten"];
            $tendangnhap=$_POST["tendangnhap"];
            $matkhau=$_POST["matkhau"];
            $ngaysinh=$_POST["ngaysinh"];
            $gioitinh=$_POST["gioitinh"];
            $dienthoai=$_POST["dienthoai"];

            $ktTonTai="SELECT * FROM nhanvien WHERE TenDangNhap='".$tendangnhap."' AND MaNhanVien!='".$_GET["MaNhanVien"]."'";
            $truyvan_ktTonTai=mysqli_query($conn,$ktTonTai);
            if(mysqli_num_rows($truyvan_ktTonTai)>0 && $tendangnhap!=$ten)
            {
                echo "<script>alert('Tên đăng nhập đã tồn tại !')</script>";
            }
            else
            {
                $suaDuLieu = "UPDATE nhanvien SET HoTen='" . $hoten . "', TenDangNhap='" . $tendangnhap . "', MatKhau='" . $matkhau . "',
                NgaySinh='" . $ngaysinh . "', GioiTinh='" . $gioitinh . "', DienThoai='" . $dienthoai . "' WHERE MaNhanVien='" . $_GET["MaNhanVien"] . "'";
                if (mysqli_query($conn,$suaDuLieu)) {
                    echo "<script>window.location='accountedit.php'</script>";
                } else {
                    echo "<script>alert('Đã xảy ra lỗi !')</script>";
                }
            }
            echo "<script>location='accountedit.php?MaNhanVien=".$_GET["MaNhanVien"]."';</script>";
            }
        ?>
    </body>
</html>
