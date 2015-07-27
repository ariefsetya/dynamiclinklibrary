<?php
session_start();
include "phpcon/link.php";
$judul = $_POST['judul'];
$tag = $_POST['tag'];
	$d = date("d");
	$m = date("m");
	$y = date("Y");
	$h = date("H");
	$i = date("i");
	$s = date("s");
$jam = "$h:$i:$s";
$tanggal = "$d/$m/$y";
mysql_query("insert into buatbuku values('','$judul','0','$_SESSION[id]','$jam','$tanggal','$tag','0','0')");
header("location:index.php?rpl=kelolabuku");
?>