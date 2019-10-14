<?php
$idLTCP = array(5,3,16);
foreach ($idLTCP as $value) {
    $idLT = $value;
?>

<!-- box cat -->
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#"><?php echo TenLoaiTin($idLT); ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
            <?php 
            $mottin = TinMoiNhat_TheoLoaiTin_MotTin($idLT);
            $row_mottin = mysqli_fetch_array($mottin);
            ?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_mottin['idTin']; ?>"> <?php echo $row_mottin['TieuDe']; ?></a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row_mottin['urlHinh']; ?>" align="left" />
                    <div class="des"><?php echo $row_mottin['TomTat']; ?> </div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            <div class="col2">
                <?php 
                $bontin = TinMoiNhat_TheoLoaiTin_BonTin($idLT);
                
                while ($row_bontin = mysqli_fetch_array($bontin)) {
                ?>
               <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_mottin['idTin']; ?>"> <?php echo $row_bontin['TieuDe']; ?></a></h3>
                <?php 
                    }
                ?>
            </div> 
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->


<?php
}
?>