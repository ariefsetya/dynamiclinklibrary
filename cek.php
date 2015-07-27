<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
}else{
include "phpcon/link.php";

$fi = mysql_query("select*from detail_akun where id_akun='$_SESSION[id]'");
$datafi = mysql_fetch_array($fi);
$file = $datafi['fp'];
$f = pathinfo($file);
$eks = $f['extension'];
if($eks != "jpg" and $eks != "jpeg" and $eks != "png" and $eks != "gif"){
unlink($file);
}
}
?>