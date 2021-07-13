<?php
    include "../admin/include/header_admin.php";
    $TongSoLuongKH=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM thanhvien"));
    if(isset($_GET["TenDangNhap"]))
    {
        $xoaDuLieu="DELETE FROM thanhvien  WHERE TenDangNhap='".$_GET["TenDangNhap"]."'";
        if(mysqli_query($conn,$xoaDuLieu))
        {
            echo "<script>alert('Xóa thành công !')</script>";
        }
        else
        {
            // $result = mysqli_error($conn,$xoaDuLieu);
            // echo $result;
            echo "<script>alert('Đã xảy ra lỗi ! Khách hàng có liên quan đến giỏ hàng ')</script>";
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
        <title>Danh sách khác hàng</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar -->
        <?php include 'include/navbaradmin.php'?>
        <!-- Navbar -->
        <div id="layoutSidenav">
            <!-- side nav -->
            <div id="layoutSidenav_nav">
                <?php include 'include/layoutSidenav_nav.php'?>
            </div>
            <!-- side nav -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Danh sách khách hàng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Danh sách khách hàng</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                               <!--Chú thích-->
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Số khách hàng: 
                                <h2><?php echo $TongSoLuongKH?></h2>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Họ Tên</th>
                                            <th>Ngày Sinh</th>
                                            <th>Giới tính</th>
                                            <th>Địa Chỉ</th>
                                            <th>SĐT</th>
                                            <th>Email</th>
                                            <th>Tên Đăng Nhập</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Họ Tên</th>
                                            <th>Ngày Sinh</th>
                                            <th>Giới tính</th>
                                            <th>Địa Chỉ</th>
                                            <th>SĐT</th>
                                            <th>Email</th>
                                            <th>Tên Đăng Nhập</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        //$conn = mysqli_connect("localhost","root","","shop");
                                        $sql = "SELECT * FROM thanhvien";
                                        $truyvan_layDuLieu = mysqli_query($conn,$sql);
                                        while($cot=mysqli_fetch_array($truyvan_layDuLieu))
                                        {
                                    ?>
                                        <tr>
                                            <td><?php echo $cot["HoTen"];?></td>
                                            <td><?php echo date("d/m/Y",strtotime($cot["NgaySinh"]));?></td>

                                            <td>
                                            <?php
                                                if(trim($cot["GioiTinh"])=="M")
                                                    echo "Nam";
                                                else if(trim($cot["GioiTinh"])=="F")
                                                    echo "Nữ";
                                                else 
                                                    echo "Khác";
                                            ?>
                                            </td>
                                            <td><?php echo $cot["DiaChi"];?></td>
                                            <td><?php echo $cot["DienThoai"];?></td>
                                            <td><?php echo $cot["Email"];?></td>
                                            <td><?php echo $cot["TenDangNhap"];?></td>
                                           
                                            <td>
                                                <a href="<?php echo $_SERVER["PHP_SELF"]; ?>?TenDangNhap=<?php echo $cot["TenDangNhap"]; ?>" class="XoaDuLieu btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
            $(document).ready(function () {
                $('.XoaDuLieu').click(function(){
                    if(!confirm("Bạn có thực muốn xóa khách hàng thân thiết này !"))
                        return false;
                });
            });
        </script>
    </body>
</html>
