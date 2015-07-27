<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
mysql_query("delete from sukastatus where id_akun='$_GET[id]' and id_tl='$_GET[det]'");
header("location:index.php?rpl=artikel");
}
?>