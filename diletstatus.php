<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
mysql_query("delete from timeline where id='$_GET[art]'");
mysql_query("delete from komenstatus where id_st='$_GET[art]'");
mysql_query("delete from sukastatusasli where id_tl='$_GET[art]'");

if($_GET['next']=="one"){
header("location:index.php?rpl=status");
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