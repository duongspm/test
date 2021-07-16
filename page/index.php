<?php
    include("../layout/header.php");

    global $conn;

    $laySPcao1="SELECT * FROM sanpham ORDER BY DonGia DESC LIMIT 0,1";
    $truyvan_laySPcao1=mysqli_query($conn,$laySPcao1);
    $cot1=mysqli_fetch_array($truyvan_laySPcao1);

    $laySPcao2="SELECT * FROM sanpham ORDER BY DonGia DESC LIMIT 1,1";
    $truyvan_laySPcao2=mysqli_query($conn,$laySPcao2);
    $cot2=mysqli_fetch_array($truyvan_laySPcao2);

    $laySP="SELECT * FROM sanpham where TrangThai ='1' ORDER BY MaSanPham DESC";
    $truyvan_laySP=mysqli_query($conn,$laySP);


?>

<!--banner-ends-->
<!--Slider-Starts-Here-->
<script src="../script/jsNguoiDung/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!--End-slider-script-->
<?php include_once "../include/slider.php"; ?>
<!--start-banner-bottom-->

<!--end-banner-bottom-->
<!--start-shoes-->
<div class="shoes">
    <div class="container">
        <div class="product-one"></div>

            <?php
            $i=0;
            while($cot=mysqli_fetch_array($truyvan_laySP))
                {
                    $i++;
                ?>
        <div class="product-one">
            <div class="col-md-3 product-left">
                <div>
                    <a href="ChiTietSanPham.php?MaSP=<?php echo $cot["MaSanPham"]; ?>">
                        <img height="250" src="../admin/products/<?php echo $cot["Anh"]; ?>" alt="" />
                        <div class="mask">
                            <span>Xem chi tiết</span>
                        </div>
                    </a>
                    <h4><?php echo $cot["TenSanPham"]; ?></h4>
                    <p><a class="item_add" href="#"><i></i> <span class=" item_price"> <?php echo DinhDangTien($cot["DonGia"]); ?> VNĐ</span></a></p>

                </div>
            </div>
        </div>
            <?php
                    if($i%4==0)
                    { ?>
                    <div class="clearfix"></div>
                <?php
                    }
                }
            ?>
    </div>
</div>
<!--end-shoes-->
<?php
include("../include/footer.php");
?>
