<?php

//Quản lý thể loại
function DanhSachTheLoai(){
	$sql = "SELECT * FROM theloai
	ORDER BY idTL DESC";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function insertTheLoai($TenTL,$TenTL_KhongDau,$ThuTu,$AnHien){
	$sql = "
			INSERT INTO theloai
			VALUES(null,'$TenTL','$TenTL_KhongDau','$ThuTu','$AnHien')
	";
	mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function ChiTietTheLoai($idTL){
	$sql = "
			SELECT * FROM theloai
			WHERE idTL = '$idTL'
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function updateTheLoai($idTL,$TenTL,$TenTL_KhongDau,$ThuTu,$AnHien){
	$sql = "
			UPDATE theloai
			SET TenTL='$TenTL', TenTL_KhongDau='$TenTL_KhongDau', ThuTu='$ThuTu', AnHien='$AnHien'
			WHERE idTL = '$idTL'
	";
	mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function deleteTheLoai($idTL){
	$sql = "
			DELETE FROM theloai
			WHERE idTL = '$idTL'
	
	";
	mysqli_query($GLOBALS["___mysqli_ston"],$sql);
	
}

//Quản Lý Loại Tin
function DanhSachLoaiTin(){
	$sql = "
			SELECT * FROM loaitin 
			LEFT JOIN theloai 
			ON loaitin.idTL = theloai.idTL 
			UNION 
			SELECT * FROM loaitin 
			RIGHT JOIN theloai 
			ON loaitin.idTL = theloai.idTL
			ORDER BY idLT DESC
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function ChiTietLoaiTin($idLT){
	$sql = "
			SELECT * FROM loaitin 
			WHERE idLT = '$idLT'
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
	
}

function addLoaiTin($Ten,$Ten_KhongDau,$ThuTu,$AnHien,$idTL){
	$sql = "
			INSERT INTO loaitin
			VALUES(null,'$Ten','$Ten_KhongDau','$ThuTu','$AnHien','$idTL')
	";
	mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function suaLoaiTin($idLT,$Ten,$Ten_KhongDau,$ThuTu,$AnHien,$idTL){
	$sql = "
			UPDATE loaitin SET
			Ten = '$Ten',
			Ten_KhongDau = '$Ten_KhongDau',
			ThuTu = '$ThuTu',
			AnHien = '$AnHien',
			idTL = '$idTL'
			WHERE idLT = '$idLT'
	";
	mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function xoaLoaiTin($idLT){
	$sql = "
			DELETE FROM loaitin
			WHERE idLT = '$idLT'
	";
	mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function stripUnicode($str){
	if (!$str) {
		return false;
	}
	$unicode = array(
		'a' => 'á|à|ả|ã|ạ|ă|ằ|ắ|ẳ|ẵ|ặ|â|ầ|ấ|ẩ|ẫ|ậ',
		'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ằ|Ắ|Ẳ|Ẵ|Ặ|Â|Ầ|Ấ|Ẩ|Ẫ|Ậ',
		'd' => 'đ',
		'D' => 'Đ',
		'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		'i' => 'í|ì|ỉ|ĩ|ị',
		'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
		'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
		'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
	);
	foreach ($unicode as $khongdau => $codau) {
		$arr = explode("|", $codau);
		$str = str_replace($arr, $khongdau, $str);
	}
	return $str;
}
function changeTitle($str){
	$str = trim($str);
	if ($str == "") {
		return "";
	}
	$str = str_replace('"','',$str);
	$str = str_replace("'",'',$str);
	$str = stripUnicode($str);
	
	$str = mb_convert_case($str, MB_CASE_TITLE,'utf-8');
	$str = str_replace(' ','-',$str);
	return $str;
}
?>