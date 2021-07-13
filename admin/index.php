<?php
    include "../admin/include/header_admin.php";
    global $conn;

    $TongSanPham=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sanpham"));
    $TongSoLuongLoaiSP=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM loaisp"));
    $TongSoLuongKH=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM thanhvien"));
    $TongSoLuongAdmin=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM nhanvien"));
    $TongSoLuongComment=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM binhluan"));
    $TongNhaSanXuat=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM nhasanxuat"));
    $TongSoLuongDonHang=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dondat"));
    $TongDonHangChuaGiao=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dondat WHERE TrangThai=0"));
    $TongDonHangDaGiao=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dondat WHERE TrangThai=1"));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Staff Camper Store</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
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
                        <h1 class="mt-4">Trang chủ</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Trang chủ</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Khách hàng</div>
                                    
                                        <div class="center">
                                            <h1><?php echo $TongSoLuongKH?></h1>
                                        </div>                                        
                            
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="customers.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Sản Phẩm</div>
                                        <div class="center">
                                            <h1><?php echo $TongSanPham?></h1>
                                        </div>     
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="productlist.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Đơn Hàng Đã Giao</div>
                                        <div class="center">
                                            <h1><?php echo $TongDonHangDaGiao?></h1>
                                        </div>   
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="DonDatHang.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Đơn Hàng Chưa Giao</div>
                                    <div class="center">
                                            <h1><?php echo $TongDonHangChuaGiao?></h1>
                                        </div>   
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="DonDatHang.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Thông kê sơ bộ
                                    </div>
                                    <div class="panel-body">
                                        <div class="list-group">
                                            <a href="nhasanxuatlist.php" class="list-group-item">
                                                <i class="fa fa-home"></i> Nhà sản xuất
                                                <h4><?php echo $TongNhaSanXuat; ?></h4>
                                            </a>
                                            <a href="productlist.php" class="list-group-item">
                                                
                                                <i class="fa fa-shopping-cart"></i> Sản phẩm trong cửa hàng
                                                <h4><?php echo $TongSanPham; ?></h4>
                                            </a>
                                            <a href="catadd.php" class="list-group-item">
                                                <i class="fa fa-fw fa-desktop"></i> Số loại sản phẩm
                                                <h4><?php echo $TongSoLuongLoaiSP; ?></h4>
                                            </a>
                                            <a href="customers.php" class="list-group-item">
                                                <i class="fa fa-fw fa-user"></i> Số khách hàng đăng ký tài khoản
                                                <h4><?php echo $TongSoLuongKH; ?></h4>
                                            </a>
                                            <!-- <a href="NhanVien.php" class="list-group-item">
                                                <i class="fa fa-fw fa-gear"></i> Số Tài khoản Admin
                                                <h4><!?php echo $TongSoLuongAdmin; ?></h4>
                                            </a> -->
                                            <a href="comment.php" class="list-group-item">
                                                <i class="fa fa-comments"></i> Số bình luận khách hàng để lại
                                                <h4><?php echo $TongSoLuongComment; ?></h4>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>aa</div> -->
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Thông kế số đơn hàng
                                    </div>
                                    <div class="panel-body">
                                        <div class="list-group">
                                            <a href="DonDatHang.php" class="list-group-item">
                                                <i class="fa fa-tasks"></i> Tổng số đơn đặt hàng vừa qua
                                                <h4><?php echo $TongSoLuongDonHang; ?></h4>
                                            </a>
                                            <a href="DonDatHang.php" class="list-group-item">
                                                <i class="fa fa-check-square-o"></i> Số đơn đặt hàng đã giao
                                                <h4><?php echo $TongDonHangDaGiao; ?></h4>
                                            </a>
                                            <a href="DonDatHang.php" class="list-group-item">
                                                <i class="fa fa-square-o"></i> Số đơn đặt hàng chưa giao (Do nhân viên lười)
                                                <h4><?php echo $TongDonHangChuaGiao; ?></h4>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!--footer -->
                <?php include 'include/footeradmin.php'?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
