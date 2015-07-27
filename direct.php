<?php
session_start();

include "phpfunc/num.php";

if(isset($_GET['src_a'])){
	$_SESSION['awal'] = $_GET['src_a'];
	$_SESSION['limitan'] = $_GET['src_b'];
	if(isset($_GET['src_a']) and isset($_GET['next'])){
	$_SESSION['awal'] = $_SESSION['awal'] +$_SESSION['limitan'];
	}
	else if(isset($_GET['src_a']) and isset($_GET['back'])){
	$_SESSION['awal'] = $_SESSION['awal'] -$_SESSION['limitan'];
	}
	else if(isset($_GET['src_a']) and isset($_GET['awal'])){
	$_SESSION['awal'] = 0;
	}
	}
if(!isset($_GET['src_b'])){
$_SESSION['awal'] = 0;
}
$_SESSION['det'] = repp($_GET['det']);
if($_GET['rpl']=="myfriend"){
header("location:index.php?rpl=myfriend");
}
if($_GET['rpl']=="profil"){
header("location:index.php?rpl=profil");
}
?>