<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";
mysql_query("insert into sukastatusasli values('','$_GET[det]','$_GET[id]')");
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