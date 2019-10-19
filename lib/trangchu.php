<?php 
function TinMoiNhat_MotTin(){
	$sql = "
			SELECT * FROM tin
			ORDER BY idTin DESC
			LIMIT 0,1
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function Tin_Theo_ID($idTin){
	$sql = "
			SELECT * FROM tin
			WHERE idTin = $idTin
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function TinMoiNhat_CungLoai_BaTin($idTin, $idLT){
	$sql = "
			SELECT * FROM tin
			WHERE (idLT = $idLT) && (idTin!=$idTin)
			ORDER BY idTin DESC
			LIMIT 0,3
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function TinMoiNhat_BonTin(){
	$sql = "
			SELECT * FROM tin
			ORDER BY idTin DESC
			LIMIT 1,4
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function TinXemNhieu_TamTin(){
	$sql = "
			SELECT * FROM `tin`
			ORDER BY `tin`.`SoLanXem` DESC
			LIMIT 0,8
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function TinMoiNhat_TheoLoaiTin_MotTin($idLT){
	$sql = "
			SELECT * FROM tin
			WHERE idLT = $idLT
			ORDER BY idTin DESC
			LIMIT 0,1
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}
function TinMoiNhat_TheoLoaiTin_BonTin($idLT){
	$sql = "
			SELECT * FROM tin
			WHERE idLT=$idLT
			ORDER BY idTin DESC
			LIMIT 1,4
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function TinMoiNhat_TheoLoaiTin_HaiTin($idLT){
	$sql = "
			SELECT * FROM tin
			WHERE idLT=$idLT
			ORDER BY idTin DESC
			LIMIT 1,2
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}



function TinMoiNhat_TheoLoai_MuoiTin($idLT){
	$sql = "
			SELECT * FROM tin
			WHERE idLT=$idLT
			ORDER BY idTin DESC
			LIMIT 0,10
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function TenLoaiTin($idLT){
	$sql = "
			SELECT Ten FROM loaitin
			WHERE idLT=$idLT
	";
	$loaitin = mysqli_query($GLOBALS["___mysqli_ston"],$sql);
	$row = mysqli_fetch_array($loaitin);
	return $row['Ten'];
}

function QuangCao($vitri){
	$sql = "
			SELECT * FROM quangcao
			WHERE vitri = $vitri
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function TheLoai(){
	$sql = "
			SELECT * FROM theloai
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function TheLoai_TheoID($idTL){
	$sql = "
			SELECT * FROM theloai
			WHERE idTL = $idTL
	 ";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function LoaiTin_Theo_TheLoai($idTL){
	$sql = "
			SELECT * FROM loaitin
			WHERE idTL=$idTL
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function BreadCrumb($idLT){
	$sql = "
			SELECT TenTL, Ten FROM loaitin, theloai
			WHERE loaitin.idTL = theloai.idTL
			AND idLT = $idLT
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function TinTheoLoaiTin_PhanTrang($idLT, $from, $sotintrang){
	$sql = "
			SELECT * FROM tin
			WHERE idLT = $idLT
			ORDER BY idTin DESC
			LIMIT $from , $sotintrang
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function TinTheoLoaiTin($idLT){
	$sql = "
			SELECT * FROM tin
			WHERE idLT = $idLT
			ORDER BY idTin DESC
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function CapNhatSoLanXem($idTin){
	$sql = "
			UPDATE tin
			SET SoLanXem = SoLanXem + 1
			WHERE idTin = $idTin
	";
	mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function TimKiem($tukhoa){
	$sql = " 
		SELECT * FROM tin
		WHERE TieuDe REGEXP '$tukhoa'
		ORDER BY idTin DESC
	";
	return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

function getUser($un, $pa){
	$sql = " 
        SELECT * FROM Users
        WHERE Username = '$un' &&
        Password = '$pa'
    ";
    return mysqli_query($GLOBALS["___mysqli_ston"],$sql);
}

?>