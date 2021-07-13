<?php
    include '../classes/adminlogin.php';
?>

<?php
    $class = new adminlogin();//gọi lại class adminlogin() ở file adminlogin.php
    /**Kiểm tra */
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $adminUser = $_POST['adminUser'];
        $adminPass = $_POST['adminPass'];

        $login_check = $class->login_admin($adminUser,$adminPass); //gọi lại hàm login_admin()
        
    }
?>

<?php
    include 'include/headadmin.php';
?>

<!DOCTYPE html>
<html lang="en">

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Đăng Nhập</h3></div>
                                    <span>
                                        <?php
                                            if(isset($login_check))
                                            {
                                                echo $login_check;
                                            }
                                        ?>
                                    </span>
                                    <div class="card-body">
                                        <form action="login.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input name="adminUser" class="form-control" type="text" placeholder="Nhập tài khoản Admin" />
                                                <label for="inputEmail">Tài khoản</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="adminPass" class="form-control" type="password" placeholder="Nhập mật khẩu Admin" />
                                                <label for="inputPassword">Mật khẩu</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Nhớ mặt khẩu</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.php">Quên mật khẩu mắt tiu?</a>
                                                <!--a class="btn btn-primary" href="index.php">Đăng nhập</a-->
                                                <input class="btn btn-success" type="submit" value="Đăng nhập">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Chưa có tài khoản admin? Đăng ký!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <?php
                include 'include/footeradmin.php';
            ?>
        </div>
        
    </body>
</html>
