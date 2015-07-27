<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
$judul = htmlentities($_POST['judul']);
$kategori = htmlentities($_POST['kategori']);
$isi = $_POST['isi'];	
	$d = date("d");
	$m = date("m");
	$y = date("Y");
	$h = date("H");
	$i = date("i");
	$s = date("s");
mysql_query("insert into artikel values('','$judul','$_SESSION[id]','$kategori','$isi','0','$d','$m','$y','$h','$i','$s')");
header("location:index.php?rpl=artikel_saya");
}
?>