<?php
session_start();
include "phpcon/link.php";
$cari = mysql_query("select*from timeline where id='$_GET[art]'");
$rowcari = mysql_fetch_array($cari);
$da = mysql_query("select*from detail_akun where id_akun='$rowcari[host]'");
$rowda = mysql_fetch_array($da);
if($_GET['id']=="status"){
$kirim = "
<div style=\"width:100%;height:150px;border:2px solid #2d89ef;\">
<table>
	<tr>
		<td style=\"border-right:1px solid #2d89ef;\">
			<img style=\"height:145.5px;\" src=\"".$rowda['fp']."\"></img>
		</td>
		<td valign=\"top\" style=\"width:120%;\">
			".$rowda['nama_depan']." ".$rowda['nama_belakang']."<br />
			".$rowcari['isi']."
			
		</td>
	</tr>
</table>
</div>

";
	$d = date("d");
	$m = date("m");
	$y = date("Y");
	$h = date("H");
	$i = date("i");
	$s = date("s");


$kajsdkasd = mysql_query("insert into timeline values('','$_SESSION[id]','general','$kirim','$h','$i','$s','$d','$m','$y','0')");
header("location:index.php");
}