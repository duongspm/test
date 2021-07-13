<?php
    include "../admin/include/header_admin.php";
    $trang=0;

    if(isset($_GET["trang"]))
        $trang=$_GET["trang"];

    // $select="dondat.* , thanhvien.HoTen  hotentv , nhanvien.HoTen  hotennv ";
    // $from="dondat INNER JOIN thanhvien ON dondat.TenDangNhap=thanhvien.TenDangNhap
    //                 INNER JOIN nhanvien ON dondat.MaNhanVien=nhanvien.MaNhanVien";
    $select="dondat.* , thanhvien.HoTen hotentv";
    $from="dondat INNER JOIN thanhvien ON dondat.TenDangNhap=thanhvien.TenDangNhap ORDER BY dondat.MaDonDat DESC";

    $layDuLieu=phan_trang($select,$from,"",50,$trang,"");

    $truyvan_layDuLieu=$layDuLieu;

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
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Đơn đặt hàng</title>
        
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
                        <h1 class="mt-4">Đơn đặt hàng</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Đơn đặt hàng</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                
                            </div>
                        </div>
                        <!-- Danh sách loại sản phẩm-->
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Đơn đặt hàng
                            </div>
                            <div  class="card-body" >
                                <table id="datatablesSimple" >
                                    <thead>
                                        <tr>
                                            <th>Mã hóa đơn</th>
                                            <th>Người nhận</th>
                                            <th>Trạng thái</th>
                                            <th>Địa chỉ giao hàng</th>
                                            <th>Ngày đặt hàng</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Mã hóa đơn</th>
                                            <th>Người nhận</th>
                                            <th>Trạng thái</th>
                                            <th>Địa chỉ giao hàng</th>
                                            <th>Ngày đặt hàng</th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                    <tbody>
                                    <?php
                                        while($cot=mysqli_fetch_array($truyvan_layDuLieu))
                                        {
                                    ?>
                                        <tr>
                                            <td><?php echo $cot["MaDonDat"];?></td>
                                            <td><?php echo $cot["hotentv"];?></td>
                                            <!---Trạng thái -->
                                            <td>
                                                <?php if(trim($cot["TrangThai"])==0){
                                                    echo "<span class='text-danger'>Chưa giao hàng (Chắc nhân viên lười)</span>";
                                                }else{
                                                    echo "<span class='text-success'>Đã giao hàng rồi nha</span>";
                                                } ?>
                                            </td>
                                            <td><?php echo $cot["NoiGiao"];?></td>
                                            <td><?php echo date("d/m/Y",strtotime($cot["NgayDat"]));?></td>
                                            <td>
                                                <a href="DonDatHang_Xem.php?MaDonDat=<?php echo $cot["MaDonDat"]; ?>" class="btn btn-success">Detail</a>
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
                <?php
                echo  "$('.divtrang_".$trang."').addClass('divtrangactive');";
                ?>

                $('.XoaDuLieu').click(function(){
                    if(!confirm("Bạn có thực muốn xóa !"))
                        return false;
                });

                $('#btn-timkiem').click(function (){
                    location="comment.php?noidung="+$('#txt-timkiem').val();
                });
            });
        </script>
        <?php include_once "include/footeradmin.php"?>
    </body>
</html>
