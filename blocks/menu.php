<ul class="width_common" id="menu_web">
	<li class="active"><a href="./"><img class="logo_icon_home" alt="" src="images/img_logo_home.gif"></a></li>

	<?php 
	$theloai = TheLoai();
	while ($row_theloai = mysqli_fetch_array($theloai)){

	?>
	<li class="dropdown">
		<a href="javascript:void(0)" class="dropbtn"> <?php echo $row_theloai['TenTL'] ?></a>
		<div class="dropdown-content">
			<?php 
			$loaitin = LoaiTin_Theo_TheLoai($row_theloai['idTL']);
			while ($row_loaitin = mysqli_fetch_array($loaitin)) {
				
			?>

			<a href="index.php?p=tintrongloai&idLT=<?php echo $row_loaitin['idLT'] ?>"><?php echo $row_loaitin['Ten'] ?></a>

			<?php 
				}
			?>
		</div>
	</li>
	<?php 
		}
	?>

</ul>