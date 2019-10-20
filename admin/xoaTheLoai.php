<?php 

ob_start();
session_start();

//dang xuat
if (isset($_POST["outAdmin"])) {
	unset($_SESSION["idUser"]);
    unset($_SESSION["Username"]);
    unset($_SESSION["HoTen"]);
    unset($_SESSION["idGroup"]);
}

// Kiểm tra đăng nhập và có quyền quản trị là 1
if (!isset($_SESSION["idUser"]) || $_SESSION["idGroup"]!=1) { 
	header("location:../index.php");
}

require "../lib/dbCon.php";
require "../lib/quantri.php";

?>
<?php
$idTL = isset($_GET["idTL"])?$_GET["idTL"]:0;
settype($idTL,"int");
deleteTheLoai($idTL);
header("location:listTheLoai.php");
?>