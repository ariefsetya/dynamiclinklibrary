<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
	<div style="font-size:20pt;margin-bottom:20px;">Saya telah membaca hak penulis dan setuju untuk menjadi penulis</div>
	<div style="font-size:20pt;margin-bottom:20px;">serta ingin mendaftarkan akun saya ke level Jejaring Sosial</div>
	<div style="font-size:30pt;margin-bottom:50px;"> di Perpustakaan Online SMK Negeri 10 Jakarta</div>
	<a href="index.php?rpl=setuju" style="margin-left:500px;font-size:20pt;float:left;margin-right:29px;">Lanjutkan</a>
	<a href="index.php" style="font-size:20pt;float:left;">Batal</a>