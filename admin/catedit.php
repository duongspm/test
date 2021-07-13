<?php
    $conn = mysqli_connect("localhost","root","","shopthoitrang");
    if(!isset($_POST["MaLoaiSP"]))
        //echo "<script>location='cat.php';</script>";
    $layDuLieu="SELECT * FROM loaisp WHERE MaLoaiSP = '".$_POST["MaLoaiSP"]."'";
    $truyvan_layDuLieu = mysqli_query($conn,$layDuLieu);
    if(mysqli_num_rows($truyvan_layDuLieu)>0)
    {
        $cot=mysqli_fetch_array($truyvan_layDuLieu);
        //$cot = $truyvan_layDuLieu -> fetch_assoc();
    }
    else
    {
        //echo "<script>location='cat.php';</script>";
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
        <title>Sửa loại sản phẩm</title>
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
                        <h1 class="mt-4">Sửa loại sản phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="cat.php">Danh sách loại sản phẩm</a></li>
                            <li class="breadcrumb-item"><a href="catadd.php">Thêm loại sản phẩm</a></li>
                            <li class="breadcrumb-item active">Sửa loại sản phẩm</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php
                                // $get_cat_name = $cat->getcatbyId($id);
                                // if($get_cat_name)
                                // {
                                //     while($result = $get_cat_name->fetch_assoc())
                                //     {
                                     
                            ?>
                                <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" enctype="multipart/form-data">
                                    <table >
                                        <?php
                                            // $conn = mysqli_connect("localhost","root","","shop");
                                            // if(!isset($_POST["MaLoai"]))
                                             
                                            // $layDuLieu="SELECT * FROM loaisanpham WHERE MaLoai = '".$_POST["MaLoai"]."'";
                                            // $truyvan_layDuLieu = mysqli_query($conn,$layDuLieu);
                                            // $cot=mysqli_fetch_array($truyvan_layDuLieu);
                                        ?>
                                        <tr>
                                            <td>Tên loại sản phẩm</td>
                                            <td>
                                                <input type="text" name="catName" id="catName" /> 
                                                (A | B)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hình ảnh loại sản phẩm</td>
                                           
                                            <td><input type="file" name="catImage" id="catImage"/></td>
                                        </tr>
                                        <tr>
                                            <td>Mô tả loại sản phẩm</td>
                                            <td><input type="text" name="catDes" id="catDes"/></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input id="Luu" type="submit" value="Lưu" class="btn btn-success button_insert ">
                                                <!-- <input  type="submit" value="Thêm" class="btn btn-block btn-info"> -->
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            <?php
                                    
                                //     }
                                // }
                            ?>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php include 'include/footeradmin.php' ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST") {
                $TenLoaiSP = $_POST["catName"];
                $ChuThichLoaiSP = $_POST["catDes"];
                $catImage=$cot["HinhAnhLoaiSP"];
                if($TenLoaiSP==""||$ChuThichLoaiSP=="")
                {
                    echo "<script>alert('Cập nhật đầy đủ thông tin loại sản phẩm !')</script>";
                    return false;
                }
                if($_FILES["catImage"]["name"]!="")
                {
                    unlink("../admin/products/".$catImage);
                    $catImage=$_FILES["catImage"]["name"];
                    move_uploaded_file($_FILES["catImage"]["tmp_name"],"../admin/products/".$catImage);
                }
                
                global $conn;
                $suaDuLieu="UPDATE loaisp
                            SET TenLoai='".$TenLoaiSP."',MoTa='".$ChuThichLoaiSP."',HinhAnhLoaiSP='".$catImage."'
                            WHERE MaLoaiSP='".$_GET["MaLoaiSP"]."'";
                if(mysqli_query($conn,$suaDuLieu))
                {
                    echo "<script>alert('Cập nhật thành công !')</script>";
                    echo "<script>location='cat.php';</script>";
                }
                else
                {
                    echo "<script>alert('Đã xảy ra lỗi !')</script>";
                }
                echo "<script>location='catedit.php?MaLoaiSP=".$_GET["MaLoaiSP"]."';</script>";
            }

            ?>
    </body>
</html>
