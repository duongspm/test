<?php 
    include_once '../classes/product.php';
    include_once '../helpers/format.php';
?>
<?php
    $pd = new product();
    if(isset($_GET['productid']))
    {
        $id = $_GET['productid'];
        $delproduct = $pd -> del_product($id);
        echo "<script>alert('Xóa sản phẩm thành công !')</script>";
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
        <title>Danh sách sản phẩm</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
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
                        <h1 class="mt-4">Danh sách sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                            <li class="breadcrumb-item"><a href="productadd.php">Thêm sản phẩm</a></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                               <!--Chú thích-->
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách sản phẩm
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Hình ảnh</th>
                                            <th>Size</th>
                                            <th>Loại sản phẩm</th>
                                            <th>Nhà sản xuất</th>
                                            <th>Mô tả</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Hình ảnh</th>
                                            <th>Size</th>
                                            <th>Loại sản phẩm</th>
                                            <th>Nhà sản xuất</th>
                                            <th>Mô tả</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $pd = new product();
                                            $pdlist = $pd->show_product();
                                            $fm = new Format();

                                            if($pdlist)
                                            {
                                                $i = 0;
                                                while($result = $pdlist->fetch_assoc())
                                                {
                                                    $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $result['TenSanPham']?></td>
                                            <td><?php echo $result['DonGia']?></td>
                                            <td><?php echo $result['SoLuong']?></td>
                                            <td><img src="products/<?php echo $result['Anh']?>" width="50"></td>
                                            <td><?php echo $result['Size']?></td>
                                            <td><?php echo $result['TenLoai']?></td>
                                            <td><?php echo $result['TenNSX']?></td>
                                            <td><?php echo $fm->textShorten($result['ThongTin'],50)?></td>
                                            <td><a href="productedit.php?productid=<?php echo $result['MaSanPham']?>" class="btn btn-success">Sửa</a></td>
                                            <td><a href="?productid=<?php echo $result['MaSanPham']?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa thệc không ???')">Xóa</a></td>
                                        </tr>
                                        <?php 
                                                }
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
        <!-- <script>
            $(document).ready(function () {
                $('.XoaDuLieu').click(function(){
                    if(!confirm("Bạn có muốn xóa sản phẩm quan trọng này!"))
                        return false;
                });
            });
        </script> -->
    </body>
</html>
