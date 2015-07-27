<?php
session_start();
if(empty($_SESSION['id'])){
header("location:index.php");
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
$kajsdkasd = mysql_query("insert into timeline values('','$_SESSION[id]','$_GET[det]','$start','$h','$i','$s','$d','$m','$y','0')");
}
?>
<link href="css/modern.css" rel="stylesheet">

<form method="POST" action="" style="border-bottom:1px solid #999;">
	
	<label style="float:left;font-size:20pt;">Kirimkan Berita</label>
	
	<br><br>
	<textarea type="text" maxlength="75" style="padding:10px;font-size:18pt;font-family:Segoe UI Light;max-height:100px;height:100px;position:relative;float:left;max-width:100%;width:100%;border-radius:15px;" name="stats"></textarea>
	<br><br>
	<div style="float:right;margin-top:5px;">
	<button type="submit" name="kirim" style="color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>">Kirim</button>
	</div>
	<div style="width:100%">
	<br>
	</div>
</form>
<?php
}
?>