<div class="slide-show">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block slide-pic" src="../images/b4.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color:black">Pants</h1>
                        <h4 style="color:black">See how good they feel.</h4>
                        <a href="SanPham.php">
                            <button type="button" class="btn btn-success custom-slide-btn"><label>Buy Now</label></button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block slide-pic" src="../images/banner4.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color:black">Clothes</h1>
                        <h4 style="color:black">For All Walks of Life.</h4>
                        <a href="SanPham.php">
                            <button type="button" class="btn btn-success custom-slide-btn"><label>Buy Now</label></button></a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <br>
	<br>
    <div class="container index-category">
        <div class="row">
            <?php
            
					global $conn;
                    $layLoaiSP="SELECT * FROM loaisp";
                    $truyvan_layLoaiSP=mysqli_query($conn,$layLoaiSP);
                    while($cot=mysqli_fetch_array($truyvan_layLoaiSP))
                    {
            ?>
            <div class="col-sm-6 col-md-6 column-in-center">
                <div class="cate-2">
                <img class="d-block slide-pic" src="../admin/products/<?php echo $cot['HinhAnhLoaiSP']?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                    <h1 style="color:black"><a href="DanhMucSanPham.php?loaisp=<?php echo $cot["MaLoaiSP"] ?>"><?php echo $cot['TenLoai']?></h1></a>
                        <h4 style="color:black"><?php echo $cot['MoTa']?></h4>
                    </div>
                </div>
                <br>
            </div>
            <?php
                }
            ?>
            <!-- <div class="col-sm-6 col-md-6 column-in-center">
                <div class="cate-2">
                    <img src="images/banner1.jpg">
                    <br>
                    <br>
                    <div class="top-left">
                        
                    </div>
                </div>
            </div> -->
            
            
        </div>
        <div class="top_main">
            <h2>Hot products</h2>
            <a href="SanPham.php">show all</a>
		<div class="clear"></div>
    </div>