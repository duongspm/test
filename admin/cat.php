<?php

    include "../admin/include/header_admin.php";

    if(isset($_GET["MaLoaiSP"]))
    {
        $xoaDuLieu="DELETE FROM loaisp  WHERE MaLoaiSP='".$_GET["MaLoaiSP"]."'";
        if(mysqli_query($conn,$xoaDuLieu))
        {
            echo "<script>alert('Xóa loại sản phẩm thành công !')</script>";
        }
        else
        {
            echo "<script>alert('Đã xảy ra lỗi !')</script>";
        }
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
        <title>Danh mục loại sản phẩm</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar -->
        <!-- Navbar -->
        <?php include 'include/navbaradmin.php'?>
        <!-- Navbar -->
        <!-- Navbar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include 'include/layoutSidenav_nav.php'?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Danh sách loại sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Danh sách loại sản phẩm</li>
                            <li class="breadcrumb-item"><a href="catadd.php">Thêm loại sản phẩm</a></li>
                        </ol>
                    </div>
                        <!-- Danh sách loại sản phẩm-->
                    <div class="block">
                        <div class="block">
                            <form enctype="multipart/form-data">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tên Loại sản phẩm</th>
                                            <th>Mô tả</th>
                                            <th>Hình ảnh</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $layDuLieu="SELECT * FROM loaisp ORDER BY MaLoaiSP DESC";
                                        $show_cat=mysqli_query($conn,$layDuLieu);
                                        if($show_cat)
                                        {
                                            while ($result = $show_cat -> fetch_assoc())
                                            {
                                    ?>
                                        <tr>
                                            <td><?php echo $result['TenLoai']?></td>
                                            <td><?php echo $result['MoTa']?></td>
                                            <td><img src="../admin/products/<?php echo $result['HinhAnhLoaiSP']?>" width="50"></td>  
                                            <td>
                                                <a href="catedit.php?MaLoaiSP=<?php echo $result["MaLoaiSP"]; ?>" class="btn btn-success">Cập nhật</a>
                                                <a href="<?php echo $_SERVER["PHP_SELF"]; ?>?MaLoaiSP=<?php echo $result["MaLoaiSP"]; ?>" class="XoaDuLieu btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <!-- Danh sách loại sản phẩm-->
                    </div>
                </main>
            </div>
        </div>
        <?php include 'include/footeradmin.php' ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
            $(document).ready(function () {
                $('.XoaDuLieu').click(function(){
                    if(!confirm("Bạn có muốn xóa loại sản phẩm quan trọng này!"))
                        return false;
                });
            });
        </script>
    </body>
</html>
