<style>
.center {
    margin-left: auto;
  margin-right: auto;
  width: 40%;
  align-items: center;
}
</style>
</head>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopthoitrang";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
mysqli_query($conn,"set names utf8");

function phan_trang($tenCot,$tenBang,$dieuKien,$soLuongSP,$trang,$dieuKienTrang)
{
	global $conn;
    $spbatdau=$trang*$soLuongSP;

    $laySP=" SELECT ".$tenCot." FROM ".$tenBang." ".$dieuKien ." LIMIT ".$spbatdau.",".$soLuongSP;
    $truyvanLaySP=mysqli_query($conn,$laySP);

    $tongsoluongsp=mysqli_num_rows(mysqli_query($conn," SELECT ".$tenCot." FROM ".$tenBang." ".$dieuKien));
    $tongsotrang=$tongsoluongsp/$soLuongSP;

    $dsTrang="";
    for($i = 0 ; $i < $tongsotrang; $i++)
    {
        $sotrang=$i+1;
        $dsTrang .=  "<a class='divtrang_".$i."' href='".$_SERVER["PHP_SELF"]."?trang=".$i.$dieuKienTrang."'>". $sotrang  . "</a> ";
    }

    echo "<script>
                $(document).ready(function(){
                    $('.divtrang').html(\"".$dsTrang."\")
                });
            </script>";

    return $truyvanLaySP;
}

if(isset($_GET["dx_admin"]))
    unset($_SESSION["admin"]);

function DinhDangTien($dongia) //1000000
{
    $sResult = $dongia;
    for ( $i = 3; $i < strlen($sResult); $i += 4)
    {
        $sSau = substr($sResult,strlen($sResult) - $i); // 000.000
        $sDau = substr($sResult,0, strlen($sResult) - $i); // 1
        $sResult = $sDau . "." . $sSau; // 1.000.000
    }
    return $sResult;
}

$soDDH=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM donhang WHERE TrangThai='0'"));

?>

   