<?php

    include "../admin/include/header_admin.php";

    if(!isset($_GET["MaBinhLuan"]))
        echo "<script>location='comment.php';</script>";

    $layDuLieu="SELECT * FROM binhluan
                    INNER JOIN thanhvien ON binhluan.TenDangNhap=ThanhVien.TenDangNhap
                    INNER JOIN sanpham ON binhluan.MaSanPham=sanpham.MaSanPham
                    WHERE MaBinhLuan='".$_GET["MaBinhLuan"]."'";
    global $conn;
    $truyvan_layDuLieu=mysqli_query($conn,$layDuLieu);
    if(mysqli_num_rows($truyvan_layDuLieu)>0)
    {
        $cot=mysqli_fetch_array($truyvan_layDuLieu);
    }
    else
    {
        echo "<script>location='comment.php';</script>";
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
        <title>Xem Bình Luận Của Khách Hàng</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                        <h1 class="mt-4">Bình Luận Của Khách Hàng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active"><a href="comment.php">Danh sách bình luận</a></li>
                            <li class="breadcrumb-item active">Chi tiết Bình Luận Của Khách Hàng</li>
                            
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="col-lg-12">
                            <div class="block">
                                <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Tên khách hàng</th><td><input readonly  value="<?php echo $cot["HoTen"]; ?>"> </td>
                                        </tr>
                                        <tr>
                                            <th>Tên sản phẩm</th><td><input readonly value="<?php echo $cot["TenSanPham"]; ?>"> </td>
                                        </tr>
                                        <tr>
                                            <th>Thời gian bình luận</th><td><input readonly  value="<?php echo date("d/m/Y",strtotime($cot["NgayBinhLuan"])); ?>"> </td>
                                        </tr>
                                        <tr>
                                            <th>Nội dung</th><td><textarea readonly rows="6"  ><?php echo $cot["NoiDung"]; ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th><input id="Xoa" type="submit" value="Xóa bình luận" class="btn btn-danger"></th>
                                        </tr>


                                    </table>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                        
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
            $(document).ready(function(){
                $('#Xoa').click(function(){
                    if(!confirm("Bạn có thực muốn xóa bình luận hữu ích này !"))
                        return false;
                });

            });
        </script>
        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST") {
                global $conn;
                $xoaDuLieu="DELETE FROM binhluan  WHERE MaBinhLuan='".$_GET["MaBinhLuan"]."'";
                if(mysqli_query($conn,$xoaDuLieu))
                {
                    echo "<script>alert('Xóa bình luận thành công thành công !')</script>";
                }
                else
                {
                    echo "<script>alert('Đã xảy ra lỗi !')</script>";
                }
            echo "<script>location='comment_xem.php?MaBinhLuan=".$_GET["MaBinhLuan"]."';</script>";
        }

        ?>
    </body>
</html>
