<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpfunc/num.php";
if(isset($_GET['awal'])){
$_SESSION['awal'] = repp($_GET['awal']);
$_SESSION['limitan'] = $_SESSION['limitan'];

}else{
$_SESSION['awal'] = 0;
}
$_SESSION['det'] = repp($_GET['det']);
if($_SESSION['det']==$_SESSION['id']){
header("location:index.php?rpl=profil");
}
else
{
header("location:index.php?rpl=myfriend&det=$_SESSION[det]");
}
}
?>