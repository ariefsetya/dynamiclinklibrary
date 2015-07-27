<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
$isi = htmlentities($_POST['isi']);
$pengirim = $_SESSION['id'];	
	$d = date("d");
	$m = date("m");
	$y = date("Y");
	$h = date("H");
	$i = date("i");
	$s = date("s");
mysql_query("insert into kotaksaran values('','$pengirim','$isi','$d','$m','$y','$h','$i','$s')");
header("location:index.php?rpl=kotaksaran");
}
?>