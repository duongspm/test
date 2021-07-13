<?php
    if(!isset($_GET["loaisp"]) && !isset($_GET["gia"]))
        header("location:SanPham.php");

    include("../layout/header.php");
?>

<?php
    $trang=0;
    if(isset($_GET["trang"]))
        $trang=$_GET["trang"];

    if(isset($_GET["loaisp"])) {
        $dieukientrang = $_GET["loaisp"];
        $laysp = phan_trang("*", "sanpham", "where MaLoaiSP='" . $dieukientrang . "'", 6, $trang, "&loaisp=" . $dieukientrang);
    }
    else {
        $dieukientrang = $_GET["gia"];
        $laysp = phan_trang("*", "sanpham", "where DonGia < '" . $dieukientrang . "'", 6, $trang, "&gia=" . $dieukientrang);
    }

    $truyvan_laysp=$laysp;

?>

	<!--start-breadcrumbs-->
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="" role="tab"
                    aria-controls="pills-home" aria-selected="true">Tất cả sản phẩm</a>
            </li>
            <?php
                global $conn;
                $layLoaiSP="SELECT * FROM loaisp";
                $truyvan_layLoaiSP=mysqli_query($conn,$layLoaiSP);
                while($cot=mysqli_fetch_array($truyvan_layLoaiSP))
                {
            ?>
            <li id= "value" class="nav-item">
                <a href="DanhMucSanPham.php?loaisp=<?php echo $cot["MaLoaiSP"] ?>" role="tab"
                    aria-controls="pills-profile" aria-selected="false"><?php echo $cot['TenLoai']?></a>
                </li>
            <?php
                }
            ?>
        </ul>
	<!--end-breadcrumbs-->
	<!--start-product--> 
	<div class="product">
		<div class="container">
			<div class="product-main">
                <!--  phan danh sach san pham -->

                <div class="col-md-9 p-left">
                    <div class="clearfix"> </div>
                    <?php
                        $i=0;
                        while($cot=mysqli_fetch_array($truyvan_laysp))
                        {
                            $i++;
                    ?>
				    <div class="product-one">
                        <div class="col-md-4 product-left single-left">
                            <div >
                                <a href="ChiTietSanPham.php?MaSP=<?php echo $cot["MaSanPham"]; ?>" >  <!-- link chi tiet san pham -->
                                    <img height="250" src="../admin/products/<?php echo $cot["Anh"] ?>" alt="" />
                                    <div class="mask mask1">
                                        <span>Xem chi tiết</span>
                                    </div>
                                </a>
                                <h4><?php echo $cot["TenSanPham"] ?></h4>
                                <p><a class="item_add" href="#"><span class=" item_price"> <?php echo DinhDangTien($cot["DonGia"]); ?> VNĐ</span></a></p>
                            </div>
                        </div>

                    </div>
                    <?php if($i%3==0) {?>

                    <div class="clearfix"> </div>

                    <?php
                            }
                        }
                    ?>
                        <div class="divtrang"></div>
			    </div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
	<!--end-product-->
<script>
    $(document).ready(function(){
        <?php
           echo  "$('.divtrang_".$trang."').addClass('divtrangactive')";
        ?>
    });
</script>

<?php
    include_once "../include/footer.php";
?>

