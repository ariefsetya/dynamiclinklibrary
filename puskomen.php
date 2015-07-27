<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
mysql_query("delete from komenartikel where id='$_GET[det]'");
header("location:index.php?rpl=baca_artikel&artcl=$_GET[id]");
}
?>