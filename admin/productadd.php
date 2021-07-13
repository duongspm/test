<?php 
    //include_once '../classes/nhasanxuat.php';
    include_once '../classes/product.php';
?>
<?php
    $pd = new product();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    {
        $insertProduct = $pd->insert_product($_POST, $_FILES);
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
        <title>Danh mục sản phẩm</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Staff Camper Store</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><strong></strong></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="?action=logout">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- Navbar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include 'include/layoutSidenav_nav.php'?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Thêm sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="productlist.php">Danh sách sản phẩm</a></li>
                            <li class="breadcrumb-item active">Thêm sản phẩm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="productadd.php" method="post" enctype="multipart/form-data">
                                    <table class="table">
                                        <tr>
                                            <td>Tên sản phẩm</td>
                                                <td><input type="text" name="TenSP" id="TenSP" /></td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Giá sản phẩm</td>
                                            <td><input type="number" name="GiaSP" id="GiaSP"/> (vnđ)</td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng sản phẩm</td>
                                            <td><input type="number" name="SoLuongSP" id="SoLuongSP"/> </td>
                                        </tr>
                                        <tr>
                                            <td>Hình ảnh</td>
                                            <td><input type="file" name="image"/> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Size</td>
                                            <td><input type="text" name="Size" id="Size" value="Unisex"/> </td>
                                        </tr>
                                        <tr>
                                            <td>Loại sản phẩm</td>
                                            <td>
                                                <select name="MaLoai" id="MaLoai" class="MaLoai">
                                                <?php
                                                    $conn = mysqli_connect("MYSQL5047.site4now.net","a77512_tranvan","shop_nhom3","db_a77512_tranvan");
                                                    $sql = "SELECT * FROM loaisp";
                                                    $old = mysqli_query($conn,$sql);
                                                 
                                                    
                                                        while($row = $old ->fetch_assoc())
                                                        {
                                                            $MaLoai = intval ($row["MaLoaiSP"]); 
                                                            $TenLoaiSP = $row["TenLoai"];
                                                ?>
                                                                <option value="<?php echo($MaLoai); ?>">
                                                                <?php echo($TenLoaiSP); ?>
                                                                </option>
                                                            <?php
                                                        }
                                                    
                                                            ?>
                                                </select> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nhà sản xuất</td>
                                            <td>
                                                <select name="MaNSX" id="MaNSX" class="MaNSX">
                                                <?php
                                                    $conn = mysqli_connect("MYSQL5047.site4now.net","a77512_tranvan","shop_nhom3","db_a77512_tranvan");
                                                    $sql = "SELECT * FROM nhasanxuat";
                                                    $old = mysqli_query($conn,$sql);
                                                
                                                        while($row = $old ->fetch_assoc())
                                                        {
                                                            $MaNSX = intval ($row["MaNSX"]); 
                                                            $TenNSX = $row["TenNSX"];
                                                ?>
                                                                <option value="<?php echo($MaNSX); ?>">
                                                                <?php echo($TenNSX); ?>
                                                                </option>
                                                            <?php
                                                        } 
                                                            ?>
                                                </select> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mô tả</td>
                                            <td><textarea rows="4" type="text" name="MoTaSP" id="MoTaSP"></textarea> </td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái</td>
                                            <td>
                                                <select name="TrangThai" id="TrangThai">
                                                    <option value="0">Nổi bật</option>
                                                    <option value="1">Không nổi bật nhưng đẹp</option>
                                                </select>
                                            </td>
                                            <!-- <td><input type="text" id="TrangThai" name="TrangThai"> </td> -->
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input class="btn btn-success" type="submit" name="submit" value="Save">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <?php if(isset($insertProduct))
                        {
                            echo $insertProduct;
                        }?>
                       
                    </div>

                    
                </main>
            </div>

        </div>
        <?php include 'include/footeradmin.php' ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
