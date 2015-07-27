<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
$e = mysql_query("select*from rak where id='$_GET[det]'");
$w = mysql_fetch_array($e);
if(empty($w)){
?>
<br>
Rak sudah tidak ada<br>
<a href="index.php?rpl=m_rak" style="margin-left:500px;font-size:20pt;float:left;margin-right:29px;">Kembali</a>

<?php
}
else
{
?>
<br>
	<div style="font-size:20pt;margin-bottom:20px;">Apakah Anda yakin ingin menghapus Rak dengan nama</div>
	<div style="font-size:30pt;margin-bottom:50px;">"<?php echo $w['nama'];?>"</div>
	<a href="hapusrak.php?det=<?php echo $_GET[det];?>" style="margin-left:500px;font-size:20pt;float:left;margin-right:29px;">Lanjutkan</a>
	<a href="index.php?rpl=m_rak" style="font-size:20pt;float:left;">Batal</a>
<h2></h2><br>
<h4></h4>
<?php

}


?>