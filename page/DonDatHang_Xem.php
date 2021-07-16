<?php

include("../layout/header.php");

if(!isset($_SESSION["tendangnhap"]))
    echo "<script>location='SanPham.php';</script>";

global $conn;

$layThongTin="SELECT * FROM thanhvien WHERE TenDangNhap='".$_SESSION["tendangnhap"]."'";
$truyvanlayThongTin=mysqli_query($conn,$layThongTin);
$cot=mysqli_fetch_array($truyvanlayThongTin);

$laydonhang ="SELECT * FROM dondat join thanhvien ON dondat.TenDangNhap = thanhvien.TenDangNhap WHERE thanhvien.TenDangNhap='".$_SESSION["tendangnhap"]."'";
$truyvanlaydonhang=mysqli_query($conn,$laydonhang);
$donhang=mysqli_fetch_array($truyvanlaydonhang);

 
    if(isset($_GET["MaDonDatXoa"]))
    {
        $xoaDuLieu1="DELETE FROM ct_dondat  WHERE MaDonDat='".$_GET["MaDonDatXoa"]."' and TrangThai='1'";//đã giao
        $xoa1=mysqli_query($conn,$xoaDuLieu1);
        $xoaDuLieu2="DELETE FROM dondat  WHERE MaDonDat='".$_GET["MaDonDatXoa"]."' and TrangThai='1'";
        if(mysqli_query($conn,$xoaDuLieu2))
        {
            echo "<script>alert('Hủy đơn hàng thành công ! Huhu :((')</script>";
        }
        else
        {
            echo "<script>alert('Đơn hàng đã được giao sao bạn lại muốn xóa!')</script>";
        }
    }

    if(!isset($_GET["MaDonDat"]))
        echo "<script>location='ThongTinTaiKhoan.php';</script>";

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
        echo "<script>location='ThongTinTaiKhoan.php';</script>";
    }

?>
<!--end-breadcrumbs-->
<!--start-account-->
<div class="account">
    <div class="container">
        <div class="account-bottom">
            <div class="col-md-6 account-left">
                <div class="account-top heading">
                    <h3>Xem chi tiết Đơn đặt hàng</h3>
                </div>
                <br>
                <div>
                    <div class="container">
                    <form id="frmDuyetDDH" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                            <table class="table table-hover">
                                <tr>
                                    <td >
                                        <a onclick="return confirm('Bạn có thực sự muốn hủy hóa đơn? Hãy cho chúng tôi thời gian, Chúng tôi sẽ bù đấp cho bạn :>');" href="<?php echo $_SERVER["PHP_SELF"]; ?>?MaDonDatXoa=<?php echo $cotDDH["MaDonDat"]; ?>" id="Xoa" class="btn btn-danger">Hủy đơn hàng</a>
                                    </td>
                                    <td colspan="3">
                                       Trạng thái:
                                            <?php if(trim($cotDDH["TrangThai"])==0) {?>
                                                <div class="alert alert-danger">
                                                    <strong>Đang di chuyển ! </strong>XIN LỖI VÌ SỰ CHẬM TRỄ NÀY. Đơn hàng sẽ được giao trong một nốt nhạc <i class='fas fa-music'></i>.
                                                </div>
                                            <?php }else{
                                                ?>
                                                <div class="alert alert-success">
                                                    <strong>Đã thanh toán ! </strong>Cám ơn bạn đã tin tưởng!.
                                                </div>
                                           <?php } ?>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình Ảnh</th>
                                    <th>Số lượng</th>
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
                                        <td><a href="ChiTietSanPham.php?MaSP=<?php echo $cotGH["MaSP"]; ?>" ><img src="../admin/products/<?php echo $cotCT_DDH["Anh"]; ?>"width="50px"></a></td>
                                        <td><?php echo $cotCT_DDH["SoLuong"]; ?></td>
                                        <td><?php echo DinhDangTien($cotCT_DDH["DonGia"]); ?></td>
                                        <td><?php echo DinhDangTien($cotCT_DDH["SoLuong"]*$cotCT_DDH["DonGia"]); ?></td>
                                    </tr>

                                <?php  } ?>
                                <tr class="card bg-info text-white">
                                    <th colspan="3">Tất cả</th>
                                    <th><?php echo DinhDangTien($tongtien); ?> VNĐ</th>
                                    
                                </tr>

                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../script/jsNguoiDung/jsNguoiDung.js"></script>

