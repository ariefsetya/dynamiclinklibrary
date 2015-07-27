<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
mysql_query("delete from sukastatusasli where id_akun='$_GET[id]' and id_tl='$_GET[det]'");
if($_GET['next']=="one"){
header("location:index.php?rpl=detstat&det=$_GET[det]");
}
else if($_GET['next']=="status")
{
header("location:index.php?rpl=status");
}
else if($_GET['next']=="profile")
{
header("location:index.php?rpl=profil");
}
else if($_GET['next']=="fren")
{
header("location:gotoprofile.php?det=$_GET[prof]");
}
}
?>