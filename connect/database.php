<?php
    $conn = mysqli_connect("localhost","root","","shop");
    mysqli_set_charset($conn,"utf8");
    if(mysqli_connect_errno())
    {
        echo "Kết nối thất bại !!! : ".mysqli_connect_error();
    }
?>