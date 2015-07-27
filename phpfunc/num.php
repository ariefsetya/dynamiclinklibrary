<?php
include "phpcon/link.php";

	function repp($yangdiubah)
	{
	$awal = array("\'","''","\\","/","//",'"',"","'","-","--",">","<",'"',"h1","h2","h3","h4","h5","h6","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","/");
    $ganti = "";
    $ko = mysql_real_escape_string(str_replace($awal, $ganti, htmlentities($yangdiubah)));
	return $ko;
	}
	function rupp($yangdiubah)
	{
	$awal = array("\'","'","''","/","-","--",">","<",'"');
    $ganti = array("\\''","''","''''","//","-","--",">","<",'"');
    $ko = mysql_real_escape_string(str_replace($awal, $ganti, htmlentities($yangdiubah)));
	return $ko;
	}
?>