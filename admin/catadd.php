<?php
    // include "../admin/include/header_admin.php";
    // if($_SERVER["REQUEST_METHOD"]=="POST") {
    //     $catName = $_POST["catName"];
    //     $catDes = $_POST["catDes"];
    //     $catImage = $_FILES["image"];
    //     // $permited = array('jpg','jpeg','png','gif');
    //     // $file_name = $_FILES['image']['name'];
    //     // $file_size = $_FILES['image']['size'];
    //     // $file_temp = $_FILES['image']['tmp_name'];

    //     // $div = explode('.',$file_name);
    //     // $file_ext = strtolower(end($div));
    //     // $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
    //     // $uploaded_image = "../images/products/".$unique_image;
    //     // move_uploaded_file($file_temp,$uploaded_image);
    //     // move_uploaded_file($file_temp,$uploaded_image);
    //     if($catImage["type"]!="image/jpeg" && $catImage["type"]!="image/png")
    //     {
    //         echo "<script>alert('Hãy chọn đúng định dạng hình!')</script>";
    //         return;
    //     }
    //     move_uploaded_file($catImage["tmp_name"],"../images/products/".$catImage["name"]);
    //     $themDuLieu="INSERT INTO loaisanpham(TenLoaiSP,HinhAnhLoaiSP,ChuThichLoaiSP) VALUES ('".$catName."','".$catImage["name"]."','".$catDes."')";
    //     if(mysqli_query($conn,$themDuLieu))
    //     {
    //         echo "<script>alert('Thêm loại sản phẩm thành công !')</script>";
    //         echo "<script>location='cat.php';</script>";
    //     }
    //     else
    //     {
    //         echo "<script>alert('Đã xảy ra lỗi !')</script>";
    //     }
    // }

?>
<?php 
    //include_once '../classes/nhasanxuat.php';
    include_once '../classes/category.php';
?>
<?php
    $cat = new category();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    {
        $insertCat = $cat->insert_category($_POST, $_FILES);
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
                        <h1 class="mt-4">Thêm loại sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="cat.php">Danh sách loại sản phẩm</a></li>
                            <li class="breadcrumb-item active">Thêm loại sản phẩm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="catadd.php" method="POST" enctype="multipart/form-data">
                                    <table >
                                        <tr>
                                            <td width="167">Tên loại sản phẩm</td>
                                                <td width="423">
                                                <input type="text" name="catName" id="catName" class="catName" /> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hình ảnh loại sản phẩm</td>
                                            <td><input type="file" name="image" id="image" class="image"/></td>
                                        </tr>
                                        <tr>
                                            <td>Mô tả loại sản phẩm</td>
                                            <td><input type="text" name="catDes" id="catDes" class="catDes"/> </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input id="Luu" type="submit" value="Lưu" name="submit" class="btn btn-primary"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <?php if(isset($insertCat))
                        {
                            echo $insertCat;
                        }?>
                    </div>
                </main>
            </div>
        </div>
        <?php include 'include/footeradmin.php' ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- <script>
            $(document).ready(function(){
                $('#Luu').click(function(){
                    catName=$('#catName').val();
                    catDes=$('#catDes').val();
                    catImage=$('#catImage').val();

                    loi=0;
                    if(catName=="" || catDes=="" || catImage=="")
                    {
                        loi++;
                        alert("Vui lòng nhập đầy đủ thông tin loại sản phẩm !! Bởi vì nó rất quan trọng");
                    }
                    if(loi!=0)
                    {
                        return false;
                    }
                });
            });
        </script> -->
    </body>
</html>
