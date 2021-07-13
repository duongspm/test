<?php
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class product
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database(); //gọi lại class database và truyền vào biến db
            $this->fm = new Format(); //class format trong folder helpers
        }
        public function insert_product($data, $files)
        {

            //link là cái phần kết nối csdl
            $TenSP = mysqli_real_escape_string($this->db->link, $data['TenSP']);
            $GiaSP = mysqli_real_escape_string($this->db->link, $data['GiaSP']);
            $SoLuongSP = mysqli_real_escape_string($this->db->link, $data['SoLuongSP']);
            //chua dung toi image
            $Size = mysqli_real_escape_string($this->db->link, $data['Size']);
            $TrangThai = mysqli_real_escape_string($this->db->link, $data['TrangThai']);
            $MaLoai = mysqli_real_escape_string($this->db->link, $data['MaLoai']);
            $MaNSX = mysqli_real_escape_string($this->db->link, $data['MaNSX']);
            $MoTaSP = mysqli_real_escape_string($this->db->link, $data['MoTaSP']);
            //$HinhAnhSP = mysqli_real_escape_string($this->db->link, $data['image']);//
            
            //xu ly them hinh anh
            //kiem tra hinh anh va lay hinh anh cho vao fl
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "products/".$unique_image;

            if(empty($TenSP) || empty($GiaSP) || empty($SoLuongSP) || empty($MoTaSP))
            {
                $alert = "<div class='alert alert-dark'>
                                <strong>Thất bại!</strong> Thêm thất bại ! Nhớ nhập đầy đủ thông tin sản phẩm nha.
                            </div>";
                return $alert;
            }
            else
            {
                $sql = "SELECT * FROM sanpham where TenSanPham ='$TenSP' ";
                $result = $this->db->insert($sql);

                if($result)
                {
                    $alert = "<div class='alert alert-dark'>
                                    <strong>Thất bại!</strong> Thêm thất bại ! Tên sản phẩm đã tồn tại.
                                </div>";
                    return $alert;
                }else{
                    move_uploaded_file($file_temp,$uploaded_image);
                    //INSERT INTO `sanpham`(`MaSanPham`, `TenSanPham`, `SoLuong`, `Size`, `Anh`, `DonGia`, `ThongTin`, `TrangThai`, `MaLoaiSP`, `MaNSX`) 
                    //VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')
                    $query = "INSERT INTO `sanpham`(`TenSanPham`, `SoLuong`, `Size`, `Anh`, `DonGia`, `ThongTin`, `TrangThai`, `MaLoaiSP`,`MaNSX`) 
                        VALUES ('$TenSP','$SoLuongSP','$Size','$unique_image','$GiaSP','$MoTaSP','$TrangThai','$MaLoai','$MaNSX')"; //limit 1 là lấy ra 1 cái đúng thôi
                    $result = $this->db->insert($query);
                    $alert = "<div class='alert alert-success'>
                                    <strong>Thêm thành công!</strong> Thêm dữ liệu sản phẩm thành công.
                                </div>";
                    return $alert;
                }
            }
        }
        public function show_product()
        {
            $query = "SELECT sanpham.*, loaisp.TenLoai,nhasanxuat.TenNSX 
                    FROM sanpham 
                    INNER JOIN loaisp ON sanpham.MaLoaiSP = loaisp.MaLoaiSP 
                    INNER JOIN nhasanxuat ON sanpham.MaNSX = nhasanxuat.MaNSX 
                    ORDER BY sanpham.MaSanPham DESC";
            //$query = "SELECT * FROM sanpham ORDER BY MaSP DESC"; //limit 1 là lấy ra 1 cái đúng thôi
            $result = $this->db->select($query);
            return $result;
        }
        public function getproductbyId($id)
        {
            $query = "SELECT * FROM sanpham where MaSanPham = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data, $files,$id)
        {
            $TenSP = mysqli_real_escape_string($this->db->link, $data['TenSP']);
            $GiaSP = mysqli_real_escape_string($this->db->link, $data['GiaSP']);
            $SoLuongSP = mysqli_real_escape_string($this->db->link, $data['SoLuongSP']);
            //chua dung toi image
            $Size = mysqli_real_escape_string($this->db->link, $data['Size']);
            $TrangThai = mysqli_real_escape_string($this->db->link, $data['TrangThai']);
            $MaLoai = mysqli_real_escape_string($this->db->link, $data['MaLoai']);
            $MaNSX = mysqli_real_escape_string($this->db->link, $data['MaNSX']);
            $MoTaSP = mysqli_real_escape_string($this->db->link, $data['MoTaSP']);
            //$HinhAnhSP = mysqli_real_escape_string($this->db->link, $data['image']);//
            
            //xu ly them hinh anh
            //kiem tra hinh anh va lay hinh anh cho vao fl
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);  //tách 2 ra từ dấu .
            $file_ext = strtolower(end($div)); //strtolower chử hoa thành thường
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext; //Hàm ramdom số từ 0 - 10
            $uploaded_image = "products/".$unique_image;

            if(empty($TenSP) || empty($GiaSP) || empty($SoLuongSP) || empty($MoTaSP))
            {
                $alert = "<div class='alert alert-dark'>
                                <strong>Thất bại!</strong> Update thất bại ! Nhớ nhập đầy đủ thông tin sản phẩm nha.
                            </div>";
                return $alert;
            }
            else
            {   //Nếu file name không trống, tức người dung kh đổi hình ảnh, chỉ cập nhật thông tin khác
                if(!empty($file_name))
                {
                    // if($file_size > 20048)
                    // {
                    //     $alert = "<div class='alert alert-dark'>
                    //                 <strong>Update thất bại!</strong> Kích thước hình ảnh lớn hơn 20MB </div>";
                    //     return $alert;
                    // }
                    // else
                    if(in_array($file_ext,$permited) === false)
                    {
                        $alert = "<div class='alert alert-dark'>
                                    <strong>Update thất bại !</strong> Bạn chỉ có thể upload: ".implode(', ',$permited)."</div>";
                        return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    // UPDATE `sanpham` SET 
                    // `TenSanPham`='$TenSP',
                    // `SoLuong`='$SoLuongSP',
                    // `Size`='$Size',
                    // `Anh`='$unique_image',
                    // `DonGia`='$GiaSP',
                    // `ThongTin`='$MoTaSP',
                    // `TrangThai`='$TrangThai',
                    // `MaLoaiSP`='$MaLoai',
                    // `MaNSX`='$MaNSX' WHERE MaSanPham ='$id'
                    $query="UPDATE `sanpham` SET 
                    `TenSanPham`='$TenSP',
                    `SoLuong`='$SoLuongSP',
                    `Size`='$Size',
                    `Anh`='$unique_image',
                    `DonGia`='$GiaSP',
                    `ThongTin`='$MoTaSP',
                    `TrangThai`='$TrangThai',
                    `MaLoaiSP`='$MaLoai',
                    `MaNSX`='$MaNSX' WHERE MaSanPham ='$id'";
                    // $query = "UPDATE sanpham SET 
                    //     TenSP = '$TenSP',
                    //     GiaSP = '$GiaSP',
                    //     SoLuongSP = '$SoLuongSP' 
                    //     HinhAnhSP = '$unique_image',
                    //     Size = '$Size',
                    //     MaLoai = '$MaLoai' 
                    //     MaNSX = '$MaNSX',
                    //     MoTaSP = '$MoTaSP',
                    //     TrangThai = '$TrangThai' 
                    //     WHERE MaSP = '$id'";
                    
                }
                else
                {
                    //Nếu người dùng không chọn ảnh
                    // $query = "UPDATE sanpham SET 
                    //     TenSP = '$TenSP',
                    //     GiaSP = '$GiaSP',
                    //     SoLuongSP = '$SoLuongSP' 
                    //     Size = '$Size',
                    //     MaLoai = '$MaLoai' 
                    //     MaNSX = '$MaNSX',
                    //     MoTaSP = '$MoTaSP',
                    //     TrangThai = '$TrangThai' 
                    //     WHERE MaSP = '$id'";
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query="UPDATE `sanpham` SET 
                    `TenSanPham`='$TenSP',
                    `SoLuong`='$SoLuongSP',
                    `Size`='$Size',
                    `DonGia`='$GiaSP',
                    `ThongTin`='$MoTaSP',
                    `TrangThai`='$TrangThai',
                    `MaLoaiSP`='$MaLoai',
                    `MaNSX`='$MaNSX' WHERE MaSanPham ='$id'";
                }
                $result = $this->db->update($query);
                if($result)
                {
                    $alert = "<div class='alert alert-success'>
                                    <strong>Cập nhật thành công !</strong> Cập nhật dữ liệu sản phẩm thành công.
                                </div>";
                    return $alert;
                }else{
                    $alert = "<div class='alert alert-success'>
                    
                                    <strong>Cập nhật thành công !</strong> Cập nhật dữ liệu sản phẩm thành công.
                                </div>
                                <script>window.location = 'productlist.php'</script>
                                ";
                    return $alert;
                }
            }
        }
        public function del_product($id)
        {
            $query = "DELETE FROM sanpham where MaSanPham ='$id'";
            $result = $this -> db ->delete($query);
            if($result)
            {
                $alert = "<div class='alert alert-success'>
                                    <strong>Xóa thành công !</strong> Xóa sản phẩm thành công.
                                </div>";
                    return $alert;
            }else{
                $alert = "<div class='alert alert-dark'>
                                <strong>Xóa bại !</strong> Xóa sản phẩm thất bại !.
                            </div>";
                return $alert;
                
            }
        }
    }
?>