<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";


mysql_query("delete from detail_akun where id_akun='$_GET[det]'");
mysql_query("delete from akun where id='$_GET[det]'");
mysql_query("delete from detail_tampilan where id_aku='$_GET[det]'");
mysql_query("delete from penulis where id_akun='$_GET[det]'");
header("location:index.php?rpl=m_anggota");
}
?>