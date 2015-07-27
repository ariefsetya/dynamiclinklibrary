<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
$dir = htmlentities($_GET['art']);
mysql_query("update timeline set lihat=lihat+1 where id='$dir'");
header("location:index.php?rpl=detstat&det=$dir");
}
?>