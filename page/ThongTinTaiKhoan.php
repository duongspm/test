<?php

include("../layout/header.php");

if(!isset($_SESSION["tendangnhap"]))
    echo "<script>location='SanPham.php';</script>";

global $conn;

$layThongTin="SELECT * FROM thanhvien WHERE TenDangNhap='".$_SESSION["tendangnhap"]."'";
$truyvanlayThongTin=mysqli_query($conn,$layThongTin);
$cot=mysqli_fetch_array($truyvanlayThongTin);

?>

<!--end-breadcrumbs-->
<!--start-account-->
<div class="account">
    <div class="container">
        <div class="account-bottom">
            <div class="col-md-6 account-left">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <div class="account-top heading">
                        <h3>Thông tin tài khoản </h3>
                    </div>
                    <br>
                    <div class="card">
                        <img class="card-img-top" src="../images/img_avatar1.png" alt="Card image" style="width: 200px;">
                        <hr>
                        <div class="address">
                            <h2><?php echo $cot["HoTen"]; ?></h2>
                        </div>
                        <hr>
                        <div class="address">
                            <h3>Tên đăng nhập</h3>
                            <input readonly id="tendangnhap" type="hidden" value="<?php echo $cot["TenDangNhap"]; ?>">
                            <p><?php echo $cot["TenDangNhap"]; ?></p>
                        </div>
                        <div class="address">
                            <h3>Mật khẩu</h3>
                            <input type="password" readonly class="form-control" value="<?php echo $cot["MatKhau"]; ?>">
                        </div>
                        <div class="address">
                            <h3>Ngày sinh</h3>
                            <p></p>
                            <input readonly class="form-control" value="<?php echo date("d/m/Y",strtotime($cot["NgaySinh"])); ?>">
                        </div>
                        <div class="address">
                            <h3>Giới tính</h3>
                            <input readonly class="form-control" value=" <?php
                                if($cot["GioiTinh"]=="F")
                                    echo "Nữ";
                                else
                                    echo "Nam";
                        ?>">
                        </div>
                        <div class="address">
                            <h3>Địa chỉ</h3>
                            <input readonly class="form-control" value="<?php echo $cot["DiaChi"]; ?>">
                        </div>
                        <div class="address">
                            <h3>Điện thoại</h3>
                            <input readonly class="form-control" value="<?php echo $cot["DienThoai"]; ?>">
                        </div>
                        <div class="address">
                            <h3>Email</h3>
                            <input readonly class="form-control" value="<?php echo $cot["Email"]; ?>">
                        </div>
                        <hr>
                        <div class="account-top heading">
                            <a class="button" href="#" id="a_doimatkhau">Đổi mật khẩu</a>
                            <hr/>
                            <a class="button" href="#" id="a_doithongtin">Thay thông tin tài khoản</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6 account-left div_doimatkhau" style="display: none">
                    <div class="account-top heading">
                        <h3>Đổi mật khẩu</h3>
                    </div>
                    <div class="address">
                        <span>Mật khẩu cũ</span>
                        <input id="matkhaucu" type="password">
                    </div>
                    <div class="address">
                        <span>Mật khẩu mới</span>
                        <input id="matkhaumoi" type="password">
                    </div>
                    <div class="address">
                        <span>Nhập lại mật khẩu mới</span>
                        <input id="nlmatkhaumoi" type="password">
                    </div>
                    <div class="address">
                        <div class="alert alert-primary">
                            <strong>Thông báo!<span style="color: red;" id="dmk_thongbao"></span></strong>
                        </div>
                        
                        <input id="doimatkhau" type="submit" value="Đổi mật khẩu">
                    </div>
            </div>

            <div class="col-md-6 account-left div_doithongtin" style="display: none">
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <input name="tendangnhap" type="hidden" value="<?php echo $cot["TenDangNhap"]; ?>">
                    <div class="account-top heading">
                        <h3>Thay đổi thông tin tài khoản</h3>
                    </div>
                    <div class="address">
                        <span>Họ tên</span>
                        <input id="hoten" name="hoten" type="text" value="<?php echo $cot["HoTen"] ?>">
                    </div>
                    <div class="address">
                        <span>Ngày sinh</span>
                        <input id="ngaysinh" name="ngaysinh" type="date" value="<?php echo $cot["NgaySinh"] ?>">
                    </div>
                    <div class="address">
                        <span>Giới tính</span>
                        <?php
                        if($cot["GioiTinh"]=="F") {
                            ?>

                            <input name="gioitinh" type="radio" value="M"> Nam <input name="gioitinh" type="radio" value="F" checked> Nữ

                        <?php
                        }else{
                           ?>

                        <input name="gioitinh" type="radio" value="M" checked > Nam <input name="gioitinh" type="radio" value="F" > Nữ

                        <?php } ?>
                    </div>
                    <div class="address">
                        <span>Địa chỉ</span>
                        <input id="diachi" name="diachi" type="text" value="<?php echo $cot["DiaChi"] ?>">
                    </div>
                    <div class="address">
                        <span>Điện thoại</span>
                        <input id="dienthoai" name="dienthoai" type="text" value="<?php echo $cot["DienThoai"] ?>" >
                    </div>
                    <div class="address">
                        <span>Email</span>
                        <input id="email" name="email" type="text" value="<?php echo $cot["Email"] ?>">
                        <div class="input-group-append">
                            <span class="input-group-text">@example.com</span>
                        </div>
                    </div>
                    <div class="address">
                        <div class="alert alert-info">
                            <strong>Thông báo!</strong><span style="color: red;" id="thongbao"></span>
                        </div>
                        
                    </div>
                    <div class="address new">
                        <input id="doithongtin" type="submit" value="Submit">
                    </div>
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<script src="../script/jsNguoiDung/jsNguoiDung.js"></script>

<script>

    $('#a_doimatkhau').click(function(){
        $('.div_doimatkhau').show();
        $('.div_doithongtin').hide();
    });

    $('#a_doithongtin').click(function(){
        $('.div_doimatkhau').hide();
        $('.div_doithongtin').show();
    });

    $(document).ready(function(){
        $('#doimatkhau').click(function(){

            matkhaucu=$('#matkhaucu').val();
            matkhaumoi=$('#matkhaumoi').val();
            nhaplaimatkhaumoi=$('#nlmatkhaumoi').val();

            loi=0;
            if( matkhaucu=="" || matkhaumoi=="")
            {
                loi++;
                $('#dmk_thongbao').text("Mời bạn nhập mặt khẩu cũ và mặt khẩu mới");
            }

            if(matkhaumoi!=nhaplaimatkhaumoi)
            {
                loi++;
                $('#dmk_thongbao').text("Mật khẩu không trùng khớp");
            }

            if(loi!=0)
            {
                return false;
            }
            else
            {
                tendangnhap=$('#tendangnhap').val();
                $('#dmk_thongbao').text("");
                DoiMatKhau(tendangnhap,matkhaucu,matkhaumoi);
            }
        });

        $('#doithongtin').click(function(){
            hoten=$('#hoten').val();
            ngaysinh=$('#ngaysinh').val();
            diachi=$('#diachi').val();
            dienthoai=$('#dienthoai').val();
            email=$('#email').val();

            loi=0;
            if( hoten=="" || ngaysinh==""
            || diachi=="" || dienthoai=="" || email=="")
            {
                loi++;
                $('#thongbao').text("Hãy nhập đầy đủ thông tin");
            }

            if(isNaN(dienthoai))
            {
                loi++;
                $('#thongbao').text("Điện thoại phải là số");
            }

            if(loi!=0)
            {
                return false;
            }
        });
    });
</script>

<?php
	global $conn;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $tendangnhap=$_POST["tendangnhap"];
        $hoten=$_POST["hoten"];
        $ngaysinh=$_POST["ngaysinh"];
        $gioitinh=$_POST["gioitinh"];
        $diachi=$_POST["diachi"];
        $dienthoai=$_POST["dienthoai"];
        $email=$_POST["email"];

        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            echo "<script>alert('Email không hợp lệ');</script>";
        else {
            $capnhatThongTin="UPDATE thanhvien SET HoTen='".$hoten."' ,NgaySinh='".$ngaysinh."', GioiTinh='".$gioitinh."',
            DiaChi='".$diachi."', DienThoai='".$dienthoai ."', Email='".$email."' WHERE TenDangNhap='".$tendangnhap."'";
            if(mysqli_query($conn,$capnhatThongTin))
                echo "<script>alert('Thay đổi thành công');location='ThongTinTaiKhoan.php';</script>";
            else
                echo "<script>alert('Xảy ra lỗi');</script>";
        }
    }
?>

<?php
include("../layout/footer.php");
?>

