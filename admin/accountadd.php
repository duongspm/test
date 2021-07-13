<?php

    //include "../admin/include/header_admin.php";


    // if(isset($_GET["id"]))
    // {
    //     $xoaDuLieu="DELETE FROM admin  WHERE id='".$_GET["id"]."'";
    //     if(mysqli_query($conn,$xoaDuLieu))
    //     {
    //         echo "<script>alert('Xóa tài khoản thành công !')</script>";
    //     }
    //     else
    //     {
    //         echo "<script>alert('Đã xảy ra lỗi !')</script>";
    //     }
    // }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Thêm tài khoản admin</title>
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
                        <h1 class="mt-4">Tài khoản admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Tài khoản admin</li>
                            <li class="breadcrumb-item"><a href="accountadd.php">Thêm tài khoản</a></li>
                        </ol>
                        <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Thông tin tài khoản
                            </div>
                            <div class="card mb-4">
                            <div class="card-body">
                                <form method="POST" >
                                    <table >
                                        <tr>
                                            <td width="167">Họ và Tên</td>
                                                <td width="423">
                                                <input type="text" id="fullname" name="fullname" class="fullname" /> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ngày sinh</td>
                                            <td><input type="date" name="date" class="date"/></td>
                                        </tr>
                                        <tr>
                                            <td>Giới tính</td>
                                            <td>
                                                <input type="radio" checked id="sex"  name="sex" class="sex" value="M" > Nam
                                                <input type="radio" id="sex" name="sex" class="sex" value="F" > Nữ
                                                <input type="radio" id="sex" name="sex" class="sex" value="K" > Khác
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SĐT</td>
                                            <td><input type="number" name="number" class="number"/></td>
                                        </tr>
                                        <tr>
                                            <td>Tài khoản</td>
                                            <td><input type="text" name="username" class="username"/></td>
                                        </tr>
                                        <tr>
                                            <td>Mặt khẩu</td>
                                            <td><input type="password" name="password"  class="password"/></td>
                                        </tr>
                                        <tr>
                                            <td>Nhập lại mặt khẩu</td>
                                            <td><input type="password" name="password_again" class="password_again"/></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="Luu" type="submit" value="Lưu" class="btn btn-success button_insert Luu">
                                            </td>
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
                    var $fullname = $('#fullname').val();
                    var $date = $('#date').val();
                    var $sex = $('#sex').val();
                   
                   
                    var $username = $('#username').val();
                    var $password = $('#password').val();
                    var $password_again = $('#password_again').val();

                    if ($fullName == '') {
                        alert('Vui lòng nhập họ và tên');
                        return false;
                    }
                    var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
                    var $number = $('.number').val();
                    if (vnf_regex.test($number) == false) 
                        {
                            alert('Số điện thoại không đúng định dạng!');
                            return false;
                        }

                    // Kiểm tra đã nhập chưa
                    if ($username == '') {
                        alert('Vui lòng tên đăng nhập');
                        return false;
                    }

                    // Kiểm tra đã nhập chưa
                    if ($password == '') {
                        alert('Vui lòng nhập mặt khẩu');
                        return false;
                    }
                    if ($password != $password_again) {
                        alert('Mặt khẩu không trùng khớp');
                        return false;
                    }

                    // Kiểm tra đã nhập chưa
                    if ($date == '') {
                        alert('Vui lòng nhập ngày sinh');
                        return false;
                    }
                    // $.ajax
                    // ({
                    //     url: 'accountaddAjax.php',
                    //     type: 'post', //post và get
                    //     dataType: 'html',
                    //     data: {
                    //         fullname : $fullname,
                    //         date : $date,
                    //         sex : $sex,
                    //         username : $username,
                    //         password : $password,
                    //         number  :$number,
                    //     }
                    // }).done(function(ketqua)
                    // {
                    //     $('.result').html(ketqua);
                    // });
                });
            });
        </script>

    </body>
</html>
