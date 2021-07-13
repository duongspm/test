
<?php
/** Lưu các phiên giao dịch khi đăng nhập, thanh toán, giỏ hàng**/
class Session{
    public static function init(){
        if(version_compare(phpversion(), '5.4.0', '<')){
            if(session_id() ==''){
                session_start();
            }
        }else{
            if(session_status()==PHP_SESSION_NONE){
                session_start();
            }
        }
    }
    //xuất ra giá trị
    public static function set($key,$val)
    {
        $_SESSION[$key] = $val;
    }        
    public static function get($key)
    {
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    //kiểm tra phiên có tồn tại hay không
    public static function checkSession()
    {
        self::init();
        if(self::get("adminlogin")==false)
        {
            self::destroy();
            header("Location:login.php");
        }
    }

    public static function checkLogin()
    {
        self::init();
        if(self::get("adminlogin")==true)
        {
            self::destroy();
            header("Location:index.php");
        }
    }

    //xóa phiên làm việc hoặc hủy
    public static function destroy()
    {
        session_destroy();
        header("Location:login.php");
    }
}
?>