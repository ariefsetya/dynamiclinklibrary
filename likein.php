<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
mysql_query("insert into sukastatus values('','$_GET[det]','$_GET[id]')");
header("location:index.php?rpl=artikel");
}
?>