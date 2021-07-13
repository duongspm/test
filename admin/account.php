<?php
    include "../admin/include/header_admin.php";
    if(isset($_GET["MaNhanVien"]))
    {
        $xoaDuLieu="DELETE FROM nhanvien  WHERE MaNhanVien='".$_GET["MaNhanVien"]."'";
        if(mysqli_query($conn,$xoaDuLieu))
        {
            echo "<script>alert('Xóa tài khoản thành công !')</script>";
        }
        else
        {
            echo "<script>alert('Đã xảy ra lỗi !')</script>";
        }
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
        <title>Danh sách tài khoản admin</title>
        <link href="css/styles.css" rel="stylesheet" />
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
                                Thông tin admin và nhân viên
                            </div>
                        <div class="col-lg-12">
                           
                            <div >
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Họ và Tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Giới Tính</th>
                                        <th>Số điện thoại</th>
                                        <th>Tài khoản</th>
                                    </tr>
                                    <?php 
                                            $layDuLieu="SELECT * FROM nhanvien ORDER BY MaNhanVien DESC";
                                            $show_cat=mysqli_query($conn,$layDuLieu);
                                            if($show_cat)
                                            {
                                                while ($result = $show_cat -> fetch_assoc())
                                                {
                                        ?>
                                        <tr>
                                            <td><?php echo $result['HoTen']?></td>
                                            <td><?php echo $result['NgaySinh']?></td>
                                            <td>
                                                <?php
                                                    if(trim($result["GioiTinh"])=="M")
                                                        echo "Nam";
                                                    else if(trim($result["GioiTinh"])=="F")
                                                        echo "Nữ";
                                                    else echo "Khác";

                                                ?>
                                            </td>
                                            <td><?php echo $result['DienThoai']?></td>
                                            
                                            <td><?php echo $result['TenDangNhap']?></td>
                                            <td>
                                                <a href="accountedit.php?MaNhanVien=<?php echo $result["MaNhanVien"]; ?>" class="btn btn-success">Cập nhật</a>
                                                <a href="<?php echo $_SERVER["PHP_SELF"]; ?>?MaNhanVien=<?php echo $result["MaNhanVien"]; ?>" class="XoaDuLieu btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                        <?php 
                                                }
                                            }
                                        ?>

                                </table>
                                <div class="divtrang"></div>
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
            $(document).ready(function () {
                $('.XoaDuLieu').click(function(){
                    if(!confirm("Bạn có muốn xóa tài khoản này!"))
                        return false;
                });

            });
        </script>
    </body>
</html>
