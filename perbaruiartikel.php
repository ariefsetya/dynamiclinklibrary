<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
$judul = htmlentities($_POST['judul']);
$kategori = htmlentities($_POST['kategori']);
$isi = $_POST['isi'];

	$awalnya = array("#IMG","IMG#");
    $gantinya =   array("<img style="."max-width:400px;"." src=","></img>");
    $isi = str_replace($awalnya, $gantinya,$isi);
	
	$d = date("d");
	$m = date("m");
	$y = date("Y");
	$h = date("H");
	$i = date("i");
	$s = date("s");

mysql_query("update artikel set nama='$judul',kategori='$kategori',isi='$isi',tgl='$d',bln='$m',thn='$y',jam='$h',menit='$i',detik='$s' where id='$_GET[det]'");
header("location:index.php?rpl=artikel_saya");
}
?>