<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cấp lại mật khẩu Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Khôi phục mật khẩu</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Bạn nhớ tên đăng nhập và email của mình chứ</div>
                                        <form>
                                            <div class="form-floating mb-3">
                                            <table>
                                                <tr>
                                                    <td><label>Email</label></td>
                                                    <td><input class="email" id="email" type="email" required="required"></td>
                                                </tr>
                                                <tr>
                                                <td><label>Tên đăng nhập</label></td>
                                                <td><input class="username" id="username" type="text" required="required"></td>
                                                </tr>
                                                <tr>
                                                <td><label>Mật khẩu</label></td>
                                                <td><input class="password" id="password" type="password" required="required"></td>
                                                </tr>
                                                <tr>
                                                <td><label>Nhập lại mật khẩu</label></td>
                                                <td><input class="password_again" id="password_again" type="password" required="required"></td>
                                                </tr>
                                            </table>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="login.php">Trở về trang Login nào</a>
                                                <input  type="submit" value="Submit" class="btn btn-block btn-info submit my-3">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                        <div id="formFooter">
                                            <a class="underlineHover" name="forget" href="" onclick="alert('Chắc bạn tuyệt vọng lắm mới bấm vào tôi \nGọi điện thoại tới thằng chủ dùm minh. OK?');">Hết cách !</a>
                                        </div>
                                    </div>

                                    <div class="result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <?php include_once "../include/footer_admin.php";?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
        $(document).ready(function()
        {
            $('.submit').click(function(e)
                {
                    e.preventDefault(); 
                    var $email = $('.email').val();
                    var $username = $('.username').val();
                    var $password = $('.password').val();
                    var $password_again = $('.password_again').val();

                    // Kiểm tra đã nhập chưa
                    if ($email == '') {
                        alert('Vui lòng nhập email');
                        return false;
                    }
                    
                    // Kiểm tra đã nhập chưa
                    if ($username == '') {
                        alert('Vui lòng nhập tên đăng nhập đã đăng ký');
                        return false;
                    }

                    if ($password != $password_again) {
                        alert('Mặt khẩu không trùng khớp');
                        return false;
                    }
                   
                    $.ajax
                    ({
                        url: '../classes/passwordAjax.php',
                        type: 'post', //post và get
                        dataType: 'html',
                        data: {
                            email : $email,
                            username : $username,
                            password : $password,
                        }
                    }).done(function(ketqua)
                    {
                        $('.result').html(ketqua);
                    });
                });
        });
    </script>
    </body>
</html>
