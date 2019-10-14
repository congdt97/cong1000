<?php 
$idLT = $_GET["idLT"];
settype($idLT, "int");

$bc = BreadCrumb($idLT);
$row_bc = mysqli_fetch_array($bc);

?>
<div>
    Trang Chủ >> <?php echo $row_bc['TenTL'] ?> >> 
    <a href="index.php?p=tintrongloai&idLT=<?php echo $row_bc['idLT'] ?>"><?php echo $row_bc['Ten'] ?></a>
</div>

<!-- phân trang  -->
<?php 
$sotintrang = 4;
if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
    settype($trang,"int");
}else{
    $trang = 1;
}
$from = ($trang - 1)*$sotintrang ;

?>
<?php

$tin = TinTheoLoaiTin_PhanTrang($idLT, $from, $sotintrang);
while ($row_tin = mysqli_fetch_array($tin)) {

?>
<!-- phân trang  -->

<div class="box-cat">
    <div class="cat1">
        
        <div class="clear"></div>
        <div class="cat-content">
            <div class="col0 col1">
                <div class="news">
                    <h3 class="title" ><a href="./index.php?p=chitiettin&idTin=<?php echo $row_tin['idTin'] ?>"><?php echo $row_tin['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_tin['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row_tin['TomTat'] ?></div>
                    <div class="clear"></div>
                   
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- box cat-->

<?php 
}
?>

<hr/>
<style>
#phantrang {
    text-align: center;
}
#phantrang a {
    background: #000; color: #ff0;padding: 5px;margin-right:3px; 
}
#phantrang a:hover{
    background: #09f;
}

</style>
<div id="phantrang">
<?php
$t = TinTheoLoaiTin($idLT);
$tongsotin = mysqli_num_rows($t);
$tongsotrang = round($tongsotin/$sotintrang);
for ($i=1; $i<=$tongsotrang ; $i++) {  
?>
    <a <?php if ($i == $trang) echo "style='background-color:red'"; ?> href="index.php?p=tintrongloai&idLT=<?php echo $idLT ?>&trang=<?php echo $i ?>"> <?php echo $i ?></a>
<?php 
}
?>
</div>
