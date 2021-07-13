<script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
</script>
<div class="navigation">
    <?php
        include_once 'connect/database.php';
        $sql_category = 'SELECT * FROM loaisp ORDER BY MaLoaiSP DESC';
        $fetch_category = mysqli_query($conn,$sql_category);
            function phan_trang($tenCot,$tenBang,$dieuKien,$soLuongSP,$trang,$dieuKienTrang)
            {
                global $conn;
                $spbatdau=$trang*$soLuongSP;

                $laySP=" SELECT ".$tenCot." FROM ".$tenBang." ".$dieuKien ." LIMIT ".$spbatdau.",".$soLuongSP;
                $truyvanLaySP=mysqli_query($conn,$laySP);

                $tongsoluongsp=mysqli_num_rows(mysqli_query($conn," SELECT ".$tenCot." FROM ".$tenBang." ".$dieuKien));
                $tongsotrang=$tongsoluongsp/$soLuongSP;

                $dsTrang="";
                for($i = 0 ; $i < $tongsotrang; $i++)
                {
                    $sotrang=$i+1;
                    $dsTrang .=  "<a class='divtrang_".$i."' href='".$_SERVER["PHP_SELF"]."?trang=".$i.$dieuKienTrang."'>". $sotrang  . "</a> ";
                }

                echo "<script>
                        $(document).ready(function(){
                            $('.divtrang').html(\"".$dsTrang."\")
                        });
                    </script>";

                return $truyvanLaySP;
            }
        if(isset($_GET["dx"]))
            unset($_SESSION["MaKH"]);

        if(isset($_GET["moiGH"]))
            unset($_SESSION["giohang"]);

        function DinhDangTien($dongia) //1000000
        {
            $sResult = $dongia;
            for ( $i = 3; $i < strlen($sResult); $i += 4)
            {
                $sSau = substr($sResult,strlen($sResult) - $i); // 000.000
                $sDau = substr($sResult,0, strlen($sResult) - $i); // 1
                $sResult = $sDau . "." . $sSau; // 1.000.000
            }
            return $sResult;
        }
    ?>
        <!--nền tối : bg-dark navbar-dark fixed-top --> 
        <nav class="navbar navbar-expand-sm">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo 'index.php';?>">Trang Chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <!-- Dropdown -->
                   
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="products.php" id="navbardrop" data-toggle="dropdown">
                            Sản Phẩm
                        </a>
                        <div class="dropdown-menu">
                        <?php
                            while($row_category = mysqli_fetch_array($fetch_category))
                            {
                        ?>
                            <a class="dropdown-item" href="DanhMucSanPham.php?loaisp=<?php echo $row_category["MaLoai"] ?>" value="<?php echo $row_category['MaLoai']?>">
                                <?php echo $row_category['TenLoaiSP']?>
                            </a>
                        <?php
                            }
                        ?>    
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Giới Thiệu</a>
                    </li>
       
                    
                </ul>    
                <form method="post" action="TimKiemSanPham.php" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" name="searchproduct" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" name= "tkTenSP" type="text">Search</button>
                </form>
                <!--  -->
            </div>
            <div class="col-md-4 top-header-right divgiohang">
                <?php
                if(isset($_SESSION["giohang"]))
                {
                    $tongsp=0;
                    $tongtien=0;
                    foreach($_SESSION["giohang"] as $cotGH)
                    {
                        $tongsp++;
                        $tongtien+=$cotGH["dongia"]*$cotGH["soluong"];
                    }
                    ?>
                    <div class="cart box_1">
                        <a href="GioHang.php">
                            <h3> <div class="total">
                                    <span > <?php echo DinhDangTien($tongtien); ?> VNĐ </span> (<span id="simpleCart_quantity" > <?php echo $tongsp; ?> </span> SP)</div>
                                <img src="../images/icon_4.png" alt="" />
                        </a>
                        <p><a href="products.php?moiGH=0" class="simpleCart_empty">Làm mới</a></p>
                        <div class="clearfix"> </div>
                    </div>
                <?php
                }
                else{
                    ?>
                    <div class="cart box_1">
                        <a href="GioHang.php">
                            <h3> <div class="total">
                                    <span > 0 VNĐ </span> (<span id="simpleCart_quantity" > 0 </span> sản phẩm)</div>
                                <img src="../images/cart.png" alt="" />
                        </a>
                        <p><a href="products.php?moiGH=0"  class="simpleCart_empty">Làm mới</a></p>
                        <div class="clearfix"> </div>
                    </div>
                <?php } ?>

            </div>
            <?php if(!isset($_SESSION["MaKH"])) { ?>
                 
            <?php }else{ ?>
            <li>
                <a href="ThongTinTaiKhoan.php">
                    <span style="text-transform:none">Xin chào <?php echo $_SESSION["MaKH"]; ?></span>
                </a>
                <a href="<?php echo $_SERVER["PHP_SELF"]; ?>"> Đăng xuất</a>
            </li>
            <?php } ?>
            <a data-toggle="modal" data-target=".bs-example-modal-lg"><i class='fas fa-user' style='font-size:36px'></i></a>
        </nav>
    </div>
    <!--Đăng nhập--->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
    <link rel="stylesheet" type="text/css" href="css/login.css" />
        <div class="modal-content" style="padding: 50px">
                <form method="post" action="DangNhap.php">
                    <input type="hidden" name="tranghientai" value="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="account-top heading">
                        <div class="logins_title">
                            <h2>Đăng nhập</h2>
                            <p>Nếu bạn đã có tài khoản, đăng nhập tại đây</p>
                        </div>
                    </div>
                    <br>
                    <div class="logins_main">
                        <div class="login_col">
                            <div class="login_main">
                                <label>Tên đăng đăng nhập</label>
                                <p></p>
                                <p></p>
                                <input autofocus="" class ="input" id="dn_tendangnhap" name="tendangnhap" type="text">
                            </div>
                        </div>
                        <br/>
                        <div class="login_col">
                            <div class="login_main">
                                <label>Mật khẩu</label>
                                <p></p>
                                <p></p>
                                <input id="dn_matkhau" name="matkhau" type="password" >
                            </div>
                        </div>
                        <br>
                        <div class="login_col">
                            <div class="login_main">
                                <div class="login_main_bottom">
                                   
                                    <p>Bạn quên mật khẩu? Lấy lại mật khẩu</p>
                                    <a class="forgot" href="QuenMatKhau.php">Tại đây</a>
                                    <!-- <input id="dangnhap" type="submit" value="Đăng nhập"> -->
                                </div>
                            </div>
                        </div>
                        <div class="login_col">
                        <div class="login_main">
                            <div class="login_main_bottom">
                                <button type="submit"  id="dangnhap" class="button">
                                    <span>Đăng Nhập</span>
                                </button>
                                <span>Bạn chưa có tài khoản?</span>
                                <a href="register.php">Đăng ký</a>
                            </div>
                        </div>
                    </div>
                    <div class="login_col">
                        <div class="login_main">
                            <div class="login_main_fire">
                                <a id="login_via_fb" href="#" class="login_fire">
                                    <i class='fab fa-facebook-square' style='font-size:36px'></i>   
                                    <span>Facebook</span>
                                </a>
                                <a id="login_via_gg" href="#" class="login_fire">
                                    <i class='fab fa-google' style='font-size:36px'></i>
                                    <span>Google</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-success">
                        <strong>Thông báo !</strong><span style="color: red;" id="dn_thongbao"></span>.
                    </div>
                    
                    </div>
            </form>
            <script>
                $(document).ready(function(){
                    $('#dangnhap').click(function(){
                        dn_tendangnhap=$('#dn_tendangnhap').val();
                        dn_matkhau=$('#dn_matkhau').val();

                        loi=0;
                        if(dn_tendangnhap=="" || dn_matkhau=="")
                        {
                            loi++;
                            $('#dn_thongbao').text(" Hãy nhập đầy đủ thông tin đăng nhập của bạn");
                        }

                        if(loi!=0)
                        {
                            return false;
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>
