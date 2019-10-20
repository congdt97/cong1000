<?php 
$db = array(
	'servername' => 'localhost',
	'username'	=> 'root',
	'password'	=> '',
	'dbname'	=> 'khoaphamtraining'
);

$conn = ( $GLOBALS["___mysqli_ston"] = mysqli_connect($db['servername'], $db['username'], $db['password'], $db['dbname'])) or die("Kết nối thất bại: " . mysqli_connect_eror());

mysqli_set_charset($conn, "utf8");
?>