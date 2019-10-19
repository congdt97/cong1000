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
$loaitin = ChiTietLoaiTin($idLT);
$row_loaitin = mysqli_fetch_array($loaitin);
if(isset($_POST["btnSua"])){
	$Ten = $_POST["Ten"];
	$Ten_KhongDau = changeTitle($Ten);
	$ThuTu = $_POST["ThuTu"];
	$AnHien = $_POST["AnHien"];
	$idTL = $_POST["idTL"];
	suaLoaiTin($idLT,$Ten,$Ten_KhongDau,$ThuTu,$AnHien,$idTL);
	header("location:listLoaiTin.php");	
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
        <form action="" method="post">
          <input name="outAdmin" type="submit" value="Đăng Xuất">
        </form>
      </div></td>
  </tr>
  <tr>
    <td height="39" id="hang2"><?php require "menu.php"; ?></td>
  </tr>
  <tr>
    <td><form action="" method="post"><table width="600" border="1">
  <tr>
    <td colspan="2"><h1>Sửa Loại Tin</h1></td>
    </tr>
  <tr>
    <td>Ten</td>
    <td><input value="<?php echo $row_loaitin["Ten"] ?>" type="text" name="Ten" id="Ten"></td>
  </tr>
  <tr>
    <td>ThuTu</td>
    <td><input value="<?php echo $row_loaitin["ThuTu"] ?>" type="text" name="ThuTu" id="ThuTu"></td>
  </tr>
  <tr>
    <td>AnHien</td>
    <td><p>
    <?php $hien = $row_loaitin["AnHien"] ? 'checked="checked"':''; ?>
      <label>
        <input <?php echo $hien = $row_loaitin["AnHien"]==1 ? 'checked="checked"':''; ?> type="radio" name="AnHien" value="1" id="AnHien_0">
        Hiện</label>
      <br>
      <label>
        <input <?php echo $hien = $row_loaitin["AnHien"]==1 ? '':'checked="checked"'; ?> type="radio" name="AnHien" value="0" id="AnHien_1">
        Ẩn</label>
      <br>
    </p></td>
  </tr>
  <tr>
    <td>idTL</td>
    <td>
    <select name="idTL" id="idTL">
    	<?php
		$theloai = DanhSachTheLoai();
		while($row_theloai = mysqli_fetch_array($theloai)){
		?>
    	<option <?php echo $p = $row_loaitin["idTL"]==$row_theloai["idTL"] ? 'selected="selected"':''; ?> value="<?php echo $row_theloai["idTL"] ?>" ><?php echo $row_theloai["TenTL"] ?></option>
        <?php
		}
		?>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="btnSua" type="submit" id="btnSua" value="Sửa"></td>
  </tr>
</table></form>
</td>
  </tr>
</table>
</body>
</html>