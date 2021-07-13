<?php
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class category
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database(); //gọi lại class database và truyền vào biến db
            $this->fm = new Format(); //class format trong folder helpers
        }
        public function insert_category($data,$files)
        {
            //link là cái phần kết nối csdl
            $catName = mysqli_real_escape_string($this->db->link, $data['catName']);
            //$catImage = mysqli_real_escape_string($this->db->link, $catImage);
            $catDes = mysqli_real_escape_string($this->db->link, $data['catDes']);

            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "products/".$unique_image;

            if(empty($catName) || empty($catDes))
            {
                $alert = "<div class='alert alert-dark'>
                                <strong>Thất bại!</strong> Thêm thất bại ! Nhập đầy đủ thông tin.
                            </div>";
                return $alert;
            }
            else
            {
                $sql = "SELECT * From loaisp where TenLoai ='$catName' ";
                $result = $this->db->insert($sql);

                if($result)
                {
                    $alert = "<div class='alert alert-dark'>
                                    <strong>Thất bại!</strong> Thêm thất bại !Tên Loại sản phẩm đã tồn tại.
                                </div>";
                    return $alert;
                }else{
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "INSERT INTO loaisp (`TenLoai`, `MoTa`, `HinhAnhLoaiSP`) 
                            VALUES ('$catName','$catDes','$unique_image' )"; //limit 1 là lấy ra 1 cái đúng thôi
                    $result = $this->db->insert($query);
                    $alert = "<div class='alert alert-success'>
                                    <strong>Thêm thành công!</strong> Thêm dữ liệu thành công.
                                </div>";
                    return $alert;
                }
            }
        }
        public function show_category()
        {
            $query = "SELECT * FROM loaisp ORDER BY MaLoaiSP DESC"; //limit 1 là lấy ra 1 cái đúng thôi
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyId($id)
        {
            $query = "SELECT * FROM loaisp where MaLoaiSP = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_category($catName, $catDes, $catImage,$id)
        {
            $catName = $this->fm->validation($catName);//kiểm tra có ký tự đặc biệt hay khoản trắng có hợp lệ không
            $catDes = $this->fm->validation($catDes);
            $catImage = $this->fm->validation($catImage);

            //link là cái phần kết nối csdl
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $catDes = mysqli_real_escape_string($this->db->link, $catDes);
            $catImage = mysqli_real_escape_string($this->db->link, $catImage);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($catName) || empty($catDes) || empty($catImage))
            {
                $alert = "<div class='alert alert-dark'>
                            <strong>Thất bại!</strong> Thêm thất bại !Nhập đầy đủ thông tin.
                        </div>";
                return $alert;
            }
            else
            {
               
                 $query = "UPDATE loaisp set TenLoai = '$catName',HinhAnhLoaiSP = '$catImage',MoTa = '$catDes' WHERE MaLoaiSP = '$id'"; //limit 1 là lấy ra 1 cái đúng thôi
                    $result = $this->db->update($query);
                if($result>0)
                {
                    $alert = "<div class='alert alert-success'>
                                    <strong>Thêm thành công!</strong> Sửa dữ liệu thành công.
                                </div>";
                    return $alert;
                }else{
                    $alert = "<div class='alert alert-dark'>
                                    <strong>Thất bại!</strong> Sửa thất bại !.
                                </div>";
                    return $alert;
                    
                }
            }

        }
        public function del_nhasanxuat($id)
        {
            $query = "DELETE FROM loaisp where MaLoaiSP ='$id'";
            $result = $this -> db ->delete($query);
            if($result)
            {
                $alert = "<div class='alert alert-success'>
                                    <strong>Xóa thành công!</strong> Xóa dữ liệu thành công.
                                </div>";
                    return $alert;
            }else{
                $alert = "<div class='alert alert-dark'>
                                <strong>Xóa bại!</strong> Xóa dữ liệu thất bại !.
                            </div>";
                return $alert;
                
            }
        }
    }
?>