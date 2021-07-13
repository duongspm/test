<?php

include("../layout/header.php");

?>
<!--end-breadcrumbs-->
<!--start-account-->
<div class="account">
    <div class="container">
        <div class="account-bottom">
            <div class="col-md-12 account-left">
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <input type="hidden" name="tranghientai" value="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="account-top heading">
                        <h3>Lấy lại mật khẩu</h3>
                    </div>
                    <div class="address">
                        <span>Tên đăng nhập</span>
                        <input id="tendangnhap" name="tendangnhap" type="text">
                        <span>Email</span>
                        <input id="email" name="email" type="email">
                        <br>
                        <hr>
                        <span>Mặt khẩu mới</span>
                        <input type="password" id="matkhaumoi" name="matkhaumoi" type="text">
                        <span>Xác nhận mặt khẩu</span>
                        <input type="password" id="matkhauxacnhan" name="matkhauxacnhan" type="text">
                        <hr>
                        <div class="alert alert-success">
                            <strong>Thông báo!</strong>
                            <span style="color: red;" id="thongbao">
                                Bạn còn nhớ tên đăng nhập và email tạo tài khoản của mình chứ ??
                            </span>
                        </div>
                        
                    </div>
                    <div class="address">
                        <input id="laymk" type="submit" value="Lấy lại mật khẩu">
                    </div>
                    <div id="formFooter">
                        <a class="underlineHover" name="forget" href="" onclick="alert('Chắc bạn tuyệt vọng lắm mới bấm vào tôi \nGọi điện thoại tới thằng chủ dùm minh. OK?');">Hết cách !</a>
                    </div>
            </div>
            </form>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<?php
global $conn;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $tendangnhap=$_POST["tendangnhap"];
    $email=$_POST["email"];
    $ktTaiKhoan="SELECT * FROM thanhvien WHERE TenDangNhap='".$tendangnhap."' and Email='".$email."'";
    $truyvankyTaiKhoan=mysqli_query($conn,$ktTaiKhoan);

    if(mysqli_num_rows($truyvankyTaiKhoan) > 0)
    {
        // //$cot=mysqli_fetch_array($truyvankyTaiKhoan);
        // echo "<script> $('#thongbao').text('Đã có lỗi xảy ra');</script>";
        $thaydoiMatKhau="UPDATE thanhvien SET MatKhau='".$_POST["matkhaumoi"]."'WHERE TenDangNhap='".$_POST["tendangnhap"]."'";
        if(mysqli_query($conn,$thaydoiMatKhau))
     
            echo "<script> $('#thongbao').text('Lấy lại mật khẩu thành công');</script>";
        else
            echo "<script> $('#thongbao').text('Đã có lỗi xảy ra');</script>";
    }
    else
    {
        echo "<script> $('#thongbao').text('Tài khoản không tồn tại');</script>";
    }
}
?>

<script>
    $(document).ready(function(){
        $('#laymk').click(function(){
            tendangnhap=$('#tendangnhap').val();
            matkhaumoi=$('#matkhaumoi').val();
            matkhauxacnhan=$('#matkhauxacnhan').val();

            loi=0;
            if(tendangnhap=="")
            {
                loi++;
                $('#thongbao').text("Hãy nhập tên đăng nhập");
            }
            if(matkhaumoi=="")
            {
                loi++;
                $('#thongbao').text("Hãy nhập mật khẩu mới của bạn");
            }
            if(matkhauxacnhan=="")
            {
                loi++;
                $('#thongbao').text("Bạn chưa xác nhận mật khẩu");
            }
            if(matkhaumoi != matkhauxacnhan)
            {
                loi++;
                $('#thongbao').text("Mật khẩu không trùng khớp");
            }

            if(loi!=0)
            {
                return false;
            }
        });

    });
</script>

<?php
include("../layout/footer.php");
?>

