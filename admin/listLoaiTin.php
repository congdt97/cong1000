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
        <form action="" method="post">
          <input name="outAdmin" type="submit" value="Đăng Xuất">
        </form>
      </div></td>
  </tr>
  <tr>
    <td height="39" id="hang2"><?php require "menu.php"; ?></td>
  </tr>
  <tr>
    <td><table width="600" border="1">
        <tr>
          <td colspan="7"><h1>Danh Sách Loại Tin</h1></td>
        </tr>
        <tr>
          <td>idLT</td>
          <td>Ten</td>
          <td>Ten_KhongDau</td>
          <td>ThuTu</td>
          <td>AnHien</td>
          <td>idTL</td>
          <td><a href="themLoaiTin.php">thêm</a></td>
        </tr>
        <?php 
		$loaitin = DanhSachLoaiTin();
		while($row_loaitin = mysqli_fetch_array($loaitin)){
			ob_start();
		?>
        <tr>
          <td>{idLT}</td>
          <td>{Ten}</td>
          <td>{Ten_KhongDau}</td>
          <td>{ThuTu}</td>
          <td>{AnHien}</td>
          <td>{idTL}</td>
          <td><a href="suaLoaiTin.php?idLT={idLT}">sửa</a> - <a onClick="return confirm='Bạn có chắc là muốn xóa không!'" href="xoaLoaiTin.php?idLT={idLT}">xóa</a></td>
        </tr>
        <?php
		$s = ob_get_clean();
		$s = str_replace("{idLT}",$row_loaitin['idLT'],$s);
		$s = str_replace("{Ten}",$row_loaitin['Ten'],$s);
		$s = str_replace("{Ten_KhongDau}",$row_loaitin['Ten_KhongDau'],$s);
		$s = str_replace("{ThuTu}",$row_loaitin['ThuTu'],$s);
		$s = str_replace("{AnHien}",$row_loaitin['AnHien'],$s);
		$s = str_replace("{idTL}",$row_loaitin['idTL'],$s);
		echo $s;
		}
		?>
      </table></td>
  </tr>
</table>
</body>
</html>