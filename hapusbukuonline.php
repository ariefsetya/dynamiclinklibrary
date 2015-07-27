<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
mysql_query("delete from buatbuku where id='$_GET[det]'");
mysql_query("delete from isibuku where id_buat='$_GET[det]'");
header("location:index.php?rpl=kelolabuku");
}
?>