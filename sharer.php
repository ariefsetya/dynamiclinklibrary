<?php
session_start();
include "phpcon/link.php";
$selel = mysql_query("select*from penulis where id_akun='$_SESSION[id]'");
$has = mysql_fetch_array($selel);

if(empty($has)){

}
else if(empty($_SESSION['id'])){
?>
        <meta name="description" content="Menyediakan layanan berbagi pengetahuan secara mudah" />
        <meta name="keywords" content="Dynamic Link Library" />
        <meta name="author" content="Dynamic Link Library" /> 
<?php
}
else{
include "phpcon/link.php";
	$d = date("d");
	$m = date("m");
	$y = date("Y");
	$h = date("H");
	$i = date("i");
	$s = date("s");

if(isset($_POST['kirim'])){
$start = htmlentities($_POST['stats']);
$kajsdkasd = mysql_query("insert into timeline values('','$_SESSION[id]','general','$start','$h','$i','$s','$d','$m','$y','0')");
}
?>
        <meta name="description" content="Menyediakan layanan berbagi pengetahuan secara mudah" />
        <meta name="keywords" content="Dynamic Link Library" />
        <meta name="author" content="Dynamic Link Library" /> 
<div style="height:100%;color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>">
<div style="padding:10px;color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>">
<link href="css/modern.css" rel="stylesheet">
<form method="POST" action="" style="border-bottom:1px solid #999;">
	
	<label style="float:left;font-size:20pt;">Buat Status Baru</label>
	
	<br><br>
	<textarea type="text" maxlength="75" style="padding:10px;font-size:18pt;font-family:Segoe UI Light;max-height:100px;height:100px;position:relative;float:left;max-width:100%;width:100%;border-radius:15px;" name="stats"></textarea>
	<br><br>
	<div style="float:right;margin-top:5px;">
	<button type="submit" name="kirim"  style="color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>">Kirim</button>
	</div>
	<div style="width:100%">
	<br>
	</div>
</form>
</div>
</div>
<?php
}
?>