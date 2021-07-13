<?php
    include '../lib/session.php';
    Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';
?>
<?php
    class adminlogin
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database(); //gọi lại class database và truyền vào biến db
            $this->fm = new Format(); //class format trong folder helpers
        }
        public function login_admin($adminUser, $adminPass)
        {
            $adminUser = $this->fm->validation($adminUser);//kiểm tra có ký tự đặc biệt hay khoản trắng có hợp lệ không
            $adminPass = $this->fm->validation($adminPass);

            //link là cái phần kết nối csdl
            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            if(empty($adminUser) || empty($adminPass))
            {
                $alert = "Vui lòng nhập tài khoản và mật khẩu Admin";
                return $alert;
            }
            else
            {
                $query = "SELECT * FROM nhanvien WHERE TenDangNhap = '$adminUser' and MatKhau = '$adminPass' LIMIT 1"; //limit 1 là lấy ra 1 cái đúng thôi
                $result = $this->db->select($query);

                if($result !=false)
                {
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin',true);
                    Session::set('adminID',$value['MaNhanVien']);
                    Session::set('adminUser',$value['TenDangNhap']);
                    Session::set('adminName',$value['HoTen']);
                    //quay trở về trang
                    header('Location:index.php');
                }else
                {
                    $alert = "Tài khoản hoặc mật khẩu không trùng khớp !!";
                return $alert;
                }
            }
        }
    }
?>