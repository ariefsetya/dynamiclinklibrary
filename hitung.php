<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";

	$a = mysql_query("select*from penulis order by id_akun");
	while($row = mysql_fetch_array($a)){
	
	$count = mysql_query("select count(*) from artikel where penulis='$row[id_akun]'");
	$angka = mysql_fetch_array($count);
	$hasil = $angka['count(*)'];
	
	mysql_query("insert into temp_penulis values('$row[id_akun]','$hasil')");
	}
	$a = 1;
	$q = mysql_query("select*from temp_penulis order by artikel");
	while($ro = mysql_fetch_array($q)){
	
	
	mysql_query("update penulis set level='$a' where id_akun='$ro[id_akun]'");
	$a++;
	}
	mysql_query("delete from temp_penulis");
	}
?>	