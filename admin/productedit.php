<?php 
    //include_once '../classes/nhasanxuat.php';
    include_once '../classes/product.php';
?>
<?php
    $pd = new product();
    if(!isset($_GET['productid']) || $_GET['productid'] == NULL)
    {
        echo "<script>window.location = 'productlist.php'</script>";
    }else {
        $id = $_GET['productid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    {
        $updateProduct = $pd->update_product($_POST, $_FILES, $id);
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
        <title>Cập nhật sản phẩm</title>
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
                        <h1 class="mt-4">Cập nhật sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="productlist.php">Danh sách sản phẩm</a></li>
                            <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php 
                                $get_product_by_id = $pd ->getproductbyId($id);
                                if($get_product_by_id)
                                {
                                    while($result_product = $get_product_by_id->fetch_assoc())
                                    {
                            ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <table class="table">
                                        <tr>
                                            <td><label>Tên sản phẩm</label></td>
                                                <td><input value="<?php echo $result_product['TenSanPham']?>" type="text" name="TenSP" id="TenSP" /></td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Giá sản phẩm</label></td>
                                            <td><input value="<?php echo $result_product['DonGia']?>" type="number" name="GiaSP" id="GiaSP"/> (vnđ)</td>
                                        </tr>
                                        <tr>
                                            <td><label>Số lượng sản phẩm</label></td>
                                            <td><input value="<?php echo $result_product['SoLuong']?>" type="number" name="SoLuongSP" id="SoLuongSP"/> </td>
                                        </tr>
                                        <!-- image -->
                                        <tr>
                                            <td><label>Hình ảnh</label></td>
                                            <td>
                                                <img src="products/<?php echo $result_product['Anh']?>" width="200">
                                               
                                                <input type="file" name="image"/> 
                                            </td>
                                        </tr>
                                        <!-- image -->
                                        <tr>
                                            <td><label>Size</label></td>
                                            <td><input value="<?php echo $result_product['Size']?>" type="text" name="Size" id="Size" value="Unisex"/> </td>
                                        </tr>
                                        <tr>
                                            <td><label>Loại sản phẩm</label></td>
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
                                                                <option 
                                                                    <?php
                                                                        if($MaLoai == $result_product['MaLoaiSP'])
                                                                        {
                                                                            echo 'selected';
                                                                        }
                                                                    ?>
                                                                value="<?php echo($MaLoai); ?>">
                                                                <?php echo($TenLoaiSP); ?>
                                                                </option>
                                                            <?php
                                                        }
                                                    
                                                            ?>
                                                </select> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Nhà sản xuất</label></td>
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
                                                                <option
                                                                <?php
                                                                    if($MaNSX == $result_product['MaNSX'])
                                                                    {
                                                                        echo 'selected';
                                                                    }
                                                                ?>
                                                                value="<?php echo($MaNSX); ?>">
                                                                <?php echo($TenNSX); ?>
                                                                </option>
                                                            <?php
                                                        } 
                                                            ?>
                                                </select> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Mô tả</label></td>
                                            <td><input value="<?php echo $result_product['ThongTin']?>" type="text" name="MoTaSP" id="MoTaSP"/> </td>
                                        </tr>
                                        <tr>
                                            <td><label>Trạng thái</label></td>
                                            <td>
                                                <select id="select" name="TrangThai">
                                                        <!-- <option>----Chọn trạng thái sản phẩm----</option> -->
                                                        <?php
                                                            if($result_product['TrangThai']==1)
                                                            {
                                                        ?>
                                                        <option selected value="1">Nổi bật</option>
                                                        <option value="0">Không nổi bật nhưng đẹp</option>
                                                        <?php
                                                            }else{
                                                                ?>
                                                                <option value="1">Nổi bật</option>
                                                                <option selected value="0">Không nổi bật nhưng đẹp</option>
                                                            <?php
                                                            }
                                                            ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input class="btn btn-success" type="submit" name="submit" value="Update">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php if(isset($updateProduct))
                        {
                            echo $updateProduct;
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
