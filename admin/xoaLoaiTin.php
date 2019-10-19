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

if (!isset($_SESSION["idUser"]) || $_SESSION["idGroup"]!=1) { // Kiểm tra đăng nhập và có quyền quản trị là 1
	header("location:../index.php");
}

require "../lib/dbCon.php";
require "../lib/quantri.php";

?>
<?php
$idLT = isset($_GET["idLT"])? $_GET["idLT"]:0;
$idLT = settype($idLT,"int");
if(isset($_POST["btnXoa"])){
	xoaLoaiTin($idLT);
	header("location:listLoaiTin.php");	
}
?>
