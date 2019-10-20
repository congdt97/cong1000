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

if(isset($_POST["btnThem"])){
	$TenTL = $_POST["TenTL"];
	$TenTL_KhongDau = changeTitle($TenTL);
	$ThuTu = $_POST["ThuTu"];
	settype($ThuTu,"int");
	$AnHien = $_POST["AnHien"];
	insertTheLoai($TenTL,$TenTL_KhongDau,$ThuTu,$AnHien);
	header("location:listTheLoai.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Trang quản trị</title>
<link rel="stylesheet" type="text/css" href="layout.css"/>

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
    <td><form action="" method="post"><table width="500" border="1">
  <tr>
    <td colspan="2"><h2>Thêm Thể Loại</h2></td>
    </tr>
  <tr>
    <td>TenTL</td>
    <td><input name="TenTL" type="text" id="TenTL"></td>
  </tr>
  <tr>
    <td>ThuTu</td>
    <td><input type="text" name="ThuTu" id="ThuTu"></td>
  </tr>
  <tr>
    <td>AnHien</td>
    <td><p>
      <label>
        <input type="radio" name="AnHien" value="1" id="AnHien_0">
        Hiện</label>
      <br>
      <label>
        <input type="radio" name="AnHien" value="0" id="AnHien_1">
        Ẩn</label>
      <br>
    </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btnThem" id="btnThem" value="Thêm"></td>
  </tr>
</table></form></td>
  </tr>
</table>
	
</body>
</html>