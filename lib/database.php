<?php
    include '../config/config.php';
?>
<?php
class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    //lấy từ file config.php
    public $link;
    public $error;

    //file cha, chạy từ file connectDB()
    public function __construct()
    {
        $this ->connectDB();
    }

    //kết nối, lấy cái biến đã khai báo ở trên
    private function connectDB(){
        $this -> link = new mysqli($this->host, $this ->user, $this->pass, $this->dbname);
        if(!$this -> link){
            $this->error = "Connection fail".$this->link->connect_error;
        return false;
        }
    }

    //Select or Read data - chọn ra trong dữ liệu
    public function select($query)
    {
        # code...
        $result = $this -> link -> query($query) or die ($this -> link -> error.__LINE__);
        if($result -> num_rows > 0)
        {
            return $result;
        }else{
            return false;
        }
    }

    //Insert data
    public function insert($query)
    {
        # code...
        $insert_row = $this -> link -> query($query) or die ($this -> link -> error.__LINE__);
        if($insert_row -> num_rows > 0)
        {
            return $insert_row;
        }else{
            return false;
        }
    }

    //Update data
    public function update($query)
    {
        # code...
        $update_row = $this -> link -> query($query) or die ($this -> link -> error.__LINE__);
        if($update_row -> num_rows > 0)
        {
            return $update_row;
        }else{
            return false;
        }
    }

    //Delete data
    public function delete($query)
    {
        # code...
        $delete_row = $this -> link -> query($query) or die ($this -> link -> error.__LINE__);
        if($delete_row -> num_rows > 0)
        {
            return $delete_row;
        }else{
            return false;
        }
    }
}
?>