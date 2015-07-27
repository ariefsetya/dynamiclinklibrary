<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
$e = mysql_query("select*from buatbuku where id='$_GET[det]'");
$w = mysql_fetch_array($e);
if($w['id_akun']!=$_SESSION['id']){
?>
<br>
Buku tidak ada<br>
<a href="index.php?rpl=kelolabuku" style="margin-left:500px;font-size:20pt;float:left;margin-right:29px;">Kembali</a>

<?php

}
else if(empty($w) and $w['id_akun']==$_SESSION['id']){
?>
<br>
Buku tidak ada<br>
<a href="index.php?rpl=kelolabuku" style="margin-left:500px;font-size:20pt;float:left;margin-right:29px;">Kembali</a>

<?php
}
else if(!empty($w) and $w['id_akun']==$_SESSION['id'])
{
?>
<br>
	<div style="font-size:20pt;margin-bottom:20px;">Apakah Anda yakin ingin menghapus Buku Online berjudul</div>
	<div style="font-size:30pt;margin-bottom:50px;">"<?php echo $w['judul'];?>"</div>
	<a href="hapusbukuonline.php?det=<?php echo $_GET[det];?>&judul=<?php echo $w['judul'];?>" style="margin-left:500px;font-size:20pt;float:left;margin-right:29px;">Lanjutkan</a>
	<a href="index.php?rpl=kelolabuku" style="font-size:20pt;float:left;">Batal</a>
<h2></h2><br>
<h4></h4>
<?php

}


?>