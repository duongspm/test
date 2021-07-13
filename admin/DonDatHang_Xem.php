<?php
    include "../admin/include/header_admin.php";
    if(isset($_GET["MaDonDatXoa"]))
    {
        $xoaDuLieu1="DELETE FROM ct_dondat  WHERE MaDonDat='".$_GET["MaDonDatXoa"]."'";
        $xoa1=mysqli_query($conn,$xoaDuLieu1);
        $xoaDuLieu2="DELETE FROM dondat  WHERE MaDonDat='".$_GET["MaDonDatXoa"]."'";
        if(mysqli_query($conn,$xoaDuLieu2))
        {
            echo "<script>alert('Xóa thành công !')</script>";
        }
        else
        {
            echo "<script>alert('Đã xảy ra lỗi !')</script>";
        }
    }

    if(!isset($_GET["MaDonDat"]))
        echo "<script>location='DonDatHang.php';</script>";

    $layDonDat="SELECT dondat.* , thanhvien.HoTen  hotentv ,thanhvien.DienThoai, nhanvien.HoTen  hotennv FROM dondat
                    INNER JOIN thanhvien ON dondat.TenDangNhap=thanhvien.TenDangNhap
                    INNER JOIN nhanvien ON dondat.MaNhanVien=nhanvien.MaNhanVien
                    WHERE MaDonDat='".$_GET["MaDonDat"]."'";
    $truyvan_layDonDat=mysqli_query($conn,$layDonDat);
    if(mysqli_num_rows($truyvan_layDonDat)>0)
    {
        //lay thong tin don dat hang
        $cotDDH=mysqli_fetch_array($truyvan_layDonDat);

        //lay chi tiet don dat hang
        $layCT_DonDat="SELECT  sanpham.*, ct_dondat.* FROM ct_dondat
                    INNER JOIN sanpham ON ct_dondat.MaSanPham=sanpham.MaSanPham
                    WHERE MaDonDat='".$_GET["MaDonDat"]."'";
        $truyvan_layCT_DonDat=mysqli_query($conn,$layCT_DonDat);
    }
    else
    {
        echo "<script>location='DonDatHang.php';</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
       
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
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Xem chi tiết Đơn đặt hàng</title>
        
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
                        <h1 class="mt-4">Chi tiết Đơn đặt hàng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="DonDatHang.php">Danh sách đơn hàng</a></li>
                            <li class="breadcrumb-item active">Chi tiết Đơn đặt hàng</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class='fas fa-shopping-cart' style='font-size:24px'></i>
                                Chi tiết Đơn đặt hàng
                            </div>
                            <div class="card-body">
                            <form id="frmDuyetDDH" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                            <table class="table table-bordered">

                                <tr>
                                    <td >
                                        <b>Mã đơn đặt hàng:</b> <?php echo $cotDDH["MaDonDat"]; ?> <br>
                                        <b>Người nhận:</b> <?php echo $cotDDH["hotentv"]; ?> <br>
                                        <b>Nơi giao:</b> <?php echo $cotDDH["NoiGiao"]; ?> <br>
                                        <b>SĐT người nhận:</b> <?php echo $cotDDH["DienThoai"]; ?> <br>
                                        <b>Ngày đặt:</b> <?php echo date("d/m/Y",strtotime($cotDDH["NgayDat"]));?> <br>
                                    </td>
                                    <td colspan="3">

                                       Trạng thái:
                                        <select name="TrangThai" id="TrangThai" class="form-control">
                                            <?php if(trim($cotDDH["TrangThai"])==0) {?>
                                                <option selected value="0">Chưa giao hàng (Chắc nhân viên lười)</option>
                                                <option value="1">Đã giao hàng rồi nha</option>
                                            <?php }else{
                                                ?>
                                                <option value="0">Chưa giao hàng (Chắc nhân viên lười)</option>
                                                <option selected value="1">Đã giao hàng rồi nha</option>
                                           <?php } ?>
                                        </select>
                                        <br>
                                        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>?MaDonDatXoa=<?php echo $cotDDH["MaDonDat"]; ?>" id="Xoa" class="btn btn-danger">Xóa</a>
                                    </td>

                                </tr>

                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình Ảnh</th>
                                    <th>Số lượng đặt</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                                <?php
                                $tongtien=0;
                                while($cotCT_DDH=mysqli_fetch_array($truyvan_layCT_DonDat))
                                    {
                                        $tongtien+=$cotCT_DDH["SoLuong"]*$cotCT_DDH["DonGia"];
                                 ?>

                                    <tr>
                                        <td><?php echo $cotCT_DDH["TenSanPham"]; ?></td>
                                        <td><img src="../admin/products/<?php echo $cotCT_DDH["Anh"]; ?>" width="50px"></td>
                                        <td><?php echo $cotCT_DDH["SoLuong"]; ?></td>
                                        <td><?php echo DinhDangTien($cotCT_DDH["DonGia"]); ?></td>
                                        <td><?php echo DinhDangTien($cotCT_DDH["SoLuong"]*$cotCT_DDH["DonGia"]); ?></td>
                                    </tr>

                                <?php  } ?>
                                <tr class="card bg-info text-white">
                                    <th colspan="3">Tổng tiền</th>
                                    <th><?php echo DinhDangTien($tongtien); ?> VNĐ</th>
                                </tr>

                            </table>
                        </form>
                            </div>
                        </div>
                        <!-- Danh sách loại sản phẩm-->
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
            $(document).ready(function(){
            $('#Xoa').click(function(){
                if(!confirm("Bạn có thực muốn xóa !"))
                    return false;
            });

            $('#TrangThai').change(function(){
                $('#frmDuyetDDH').submit();
            });

        });
        </script>
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST") {
                global $conn;
                $trangthai=$_POST["TrangThai"];

                $layNV="SELECT * FROM nhanvien WHERE TenDangNhap='".$_SESSION["admin"]."'";
                $truyvan_layNV=mysqli_query($conn,$layNV);
                $cotTV=mysqli_fetch_array($truyvan_layNV);

                $suaDuLieu="UPDATE dondat SET TrangThai='".$trangthai."' WHERE MaDonDat='".$_GET["MaDonDat"]."'";
                if(mysqli_query($conn,$suaDuLieu))
                {
                    echo "<script>alert('Cập nhật đơn hàng thành công !')</script>";
                }
                else
                {
                    echo "<script>alert('Đã xảy ra lỗi! Cập nhật đơn hàng thất bại')</script>";
                }
                echo "<script>location='DonDatHang_Xem.php?MaDonDat=".$_GET["MaDonDat"]."';</script>";
            }

            ?>
        <?php include_once "include/footeradmin.php"?>
    </body>
</html>
