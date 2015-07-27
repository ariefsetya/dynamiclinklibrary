<?php
	session_start();
	include "phpcon/link.php";
	$sinop = mysql_query("select*from isibuku where id_buat='$_POST[hal]' and hal='sinopsis'");

	$sis = mysql_fetch_array($sinop);
	
	if(empty($sis['id'])){
		$isi = htmlentities($_POST['isi']);
		
		mysql_query("insert into isibuku values('','$_POST[hal]','$isi','sinopsis')");
		echo "<meta http-equiv='refresh' content='0;url=index.php?rpl=kelolabuku'>";
	}
	else{
		$isi = htmlentities($_POST['isi']);
		
		mysql_query("update isibuku set isi='$isi' where id_buat='$_POST[hal]' and hal='sinopsis'");
		echo "<meta http-equiv='refresh' content='0;url=index.php?rpl=kelolabuku'>";

	}
	?>