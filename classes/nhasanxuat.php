<?php
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class nhasanxuat
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database(); //gọi lại class database và truyền vào biến db
            $this->fm = new Format(); //class format trong folder helpers
        }
        public function insert_nhasanxuat($TenNSX, $DiaChiNSX, $SDTNSX,$EmailNSX)
        {
            $TenNSX = $this->fm->validation($TenNSX);//kiểm tra có ký tự đặc biệt hay khoản trắng có hợp lệ không
            $DiaChiNSX = $this->fm->validation($DiaChiNSX);
            $SDTNSX = $this->fm->validation($SDTNSX);
            $EmailNSX = $this->fm->validation($EmailNSX);

            //link là cái phần kết nối csdl
            $TenNSX = mysqli_real_escape_string($this->db->link, $TenNSX);
            $DiaChiNSX = mysqli_real_escape_string($this->db->link, $DiaChiNSX);
            $SDTNSX = mysqli_real_escape_string($this->db->link, $SDTNSX);
            $EmailNSX = mysqli_real_escape_string($this->db->link, $EmailNSX);

            if(empty($TenNSX) || empty($DiaChiNSX) || empty($SDTNSX))
            {
                $alert = "<div class='alert alert-dark'>
                            <strong>Thất bại!</strong> Vui lòng nhập đầy đủ thông tin
                        </div>";
                return $alert;
            }
            else
            {
                $sql = "SELECT * From nhasanxuat where TenNSX ='$TenNSX' ";
                $result = $this->db->insert($sql);
                
                if($result>0)
                {
                    $alert = "<div class='alert alert-dark'>
                                    <strong>Thất bại!</strong> Thêm thất bại !Tên NSX đã tồn tại.
                                </div>";
                    return $alert;
                }else{
                    $query = "INSERT INTO nhasanxuat (`TenNSX`, `DiaChiNSX`, `SDTNSX`, `EmailNSX`) VALUES ('$TenNSX','$DiaChiNSX','$SDTNSX','$EmailNSX' )"; //limit 1 là lấy ra 1 cái đúng thôi
                    $result = $this->db->insert($query);
                    $alert = "<div class='alert alert-success'>
                                    <strong>Thêm thành công!</strong> Thêm dữ liệu thành công.
                                </div>";
                    return $alert;
                }
            }
        }
        public function show_nhasanxuat()
        {
            $query = "SELECT * FROM nhasanxuat ORDER BY MaNSX DESC"; //limit 1 là lấy ra 1 cái đúng thôi
            $result = $this->db->select($query);
            return $result;
        }
        public function getNSXbyid($NSXid)
        {
            $query = "SELECT * FROM nhasanxuat where MaNSX = '$NSXid' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_nhasanxuat($TenNSX, $DiaChiNSX, $SDTNSX,$EmailNSX,$id)
        {
            $TenNSX = $this->fm->validation($TenNSX);//kiểm tra có ký tự đặc biệt hay khoản trắng có hợp lệ không
            $DiaChiNSX = $this->fm->validation($DiaChiNSX);
            $SDTNSX = $this->fm->validation($SDTNSX);
            $EmailNSX = $this->fm->validation($EmailNSX);

            //link là cái phần kết nối csdl
            $TenNSX = mysqli_real_escape_string($this->db->link, $TenNSX);
            $DiaChiNSX = mysqli_real_escape_string($this->db->link, $DiaChiNSX);
            $SDTNSX = mysqli_real_escape_string($this->db->link, $SDTNSX);
            $EmailNSX = mysqli_real_escape_string($this->db->link, $EmailNSX);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($TenNSX) || empty($DiaChiNSX) || empty($SDTNSX))
            {
                $alert = "<span class ='success'>Vui lòng nhập đầy đủ thông tin</span>";
                return $alert;
            }
            else
            {
               
                 $query = "UPDATE nhasanxuat set TenNSX = '$TenNSX',DiaChiNSX = '$DiaChiNSX',SDTNSX = '$SDTNSX',EmailNSX ='$EmailNSX' WHERE MaNSX = '$id'"; //limit 1 là lấy ra 1 cái đúng thôi
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
            $query = "DELETE FROM nhasanxuat where MaNSX ='$id'";
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