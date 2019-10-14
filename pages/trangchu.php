<?php 
$list_idTL = array(5,3,7,2,4,6,9,1);


foreach ($list_idTL as $idTL) {
$theloai = TheLoai_TheoID($idTL);
$row_theloai = mysqli_fetch_array($theloai);

?>

<div class="box-cat">
    <div class="cat">
        <div class="main-cat">
            <a href="javascript:void(0)"><?php echo $row_theloai['TenTL']; ?></a>
        </div>
        <div class="child-cat">
            <?php 
            $loaitin = LoaiTin_Theo_TheLoai($idTL);
            $row_1loaitin = mysqli_fetch_array($loaitin);
            while ($row_loaitin = mysqli_fetch_array($loaitin)) {
            ?>
            <a href="./index.php?p=tintrongloai&idLT=<?php echo $row_loaitin['idLT'] ?>"><?php echo $row_loaitin['Ten'] ?></a>
            <?php 
            }
            ?>

        </div>
        <div class="clear"></div>
        <div class="cat-content">
            <div class="col1">
                <div class="news">

                    <?php
                    $tinmoinhat = TinMoiNhat_TheoLoaiTin_MotTin($row_1loaitin['idLT']);
                    $row_tinmoinhat = mysqli_fetch_array($tinmoinhat);
                    ?>

                    <h3 class="title" ><a href="./index.php?p=chitiettin$idTin=<?php echo $row_tinmoinhat['idTin'] ?>"> <?php echo $row_tinmoinhat['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_tinmoinhat['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row_tinmoinhat['TomTat'] ?></div>
                    <div class="clear"></div>
                   
                </div>
            </div>
            <div class="col2">

                <?php
                $haitinmoi = TinMoiNhat_TheoLoaiTin_HaiTin($row_1loaitin['idLT']);
                while ($row_haitinmoi = mysqli_fetch_array($haitinmoi)) {
                ?>

                <p class="tlq"><a href="./index.php?p=chitiettin&idTin=<?php echo $row_haitinmoi['idTin'] ?>"><?php echo $row_haitinmoi['TieuDe'] ?></a></p>

                <?php 
                }
                ?>

            </div>    
        </div>
    </div>
</div>
<div class="clear"></div>

<!-- box cat-->

<?php
}
?>