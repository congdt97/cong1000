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
    <td><table width="1000" border="1">
  <tr>
    <td colspan="6"><h2>Danh Sách Thể Loại</h2></td>
    </tr>
  <tr>
    <td>idTL</td>
    <td>TenTL</td>
    <td>TenTL_KhongDau</td>
    <td>ThuTu</td>
    <td>AnHien</td>
    <td><a href="themTheLoai.php">thêm</a></td>
  </tr>
  <?php 
  $theloai = DanhSachTheLoai();
  while($row_theloai = mysqli_fetch_array($theloai)){
	  ob_start();
  ?>
  <tr>
    <td>{idTL}</td>
    <td>{TenTL}</td>
    <td>{TenTL_KhongDau}</td>
    <td>{ThuTu}</td>
    <td>{AnHien}</td>
    <td><a href="suaTheLoai.php?idTL={idTL}">sửa</a> - <a onClick="return confirm('Bạn có chắc muốn xóa không?')" href="xoaTheLoai.php?idTL={idTL}">xóa</a></td>
  </tr>
  <?php 
  $s = ob_get_clean();
  $s = str_replace("{idTL}",$row_theloai["idTL"],$s);
  $s = str_replace("{TenTL}",$row_theloai["TenTL"],$s);
  $s = str_replace("{TenTL_KhongDau}",$row_theloai["TenTL_KhongDau"],$s);
  $s = str_replace("{ThuTu}",$row_theloai["ThuTu"],$s);;
  $s = str_replace("{AnHien}",$row_theloai["AnHien"],$s);
  echo $s;
  }
  ?>
    </table>
</td>
  </tr>
</table>
	
</body>
</html>