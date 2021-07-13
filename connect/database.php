<?php
    $conn = mysqli_connect("MYSQL5047.site4now.net","a77512_tranvan","shop_nhom3","db_a77512_tranvan");
    mysqli_set_charset($conn,"utf8");
    if(mysqli_connect_errno())
    {
        echo "Kết nối thất bại !!! : ".mysqli_connect_error();
    }
?>