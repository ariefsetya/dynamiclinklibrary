<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
$r = $_GET['art'];
mysql_query("update artikel set lihat=lihat+1 where id='$r'");
header("location:index.php?rpl=baca_artikel&artcl=$r");
}
?>