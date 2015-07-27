<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";


mysql_query("delete from artikel where id='$_GET[art]'");
mysql_query("delete from komenartikel where id_artikel='$_GET[art]'");
mysql_query("delete from sukastatus where id_tl='$_GET[art]'");

header("location:index.php?rpl=artikel_saya");
}
?>