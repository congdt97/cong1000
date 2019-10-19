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


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Trang quản trị</title>
<link rel="stylesheet" type="text/css" href="layout.css">

</head>
<body>
<table width="1000" border="0" align="center">
  <tr>
    <td id="hangTieuDe">Trang Quản Trị 
    <div style="width:300px;float:right">Chào bạn <?php echo $_SESSION["HoTen"] ?>
    <form action="" method="post"><input name="outAdmin" type="submit" value="Đăng Xuất"></form>
    </div>
    
    </td>
  </tr>
  <tr>
    <td height="39" id="hang2"><?php require "menu.php"; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>