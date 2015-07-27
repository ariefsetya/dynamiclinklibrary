<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
mysql_query("delete from komenstatus where id='$_GET[det]'");
header("location:index.php?rpl=detstat&det=$_GET[id]");
}
?>