<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}

$det = repp($_SESSION['det']);
$qop = mysql_query("select*from detail_akun where id_akun='$det'");
$qp = mysql_fetch_array($qop);

$jkl = mysql_query("select*from penulis where id_akun='$det'");
$ert = mysql_fetch_array($jkl);

$c = mysql_query("select count(*) from artikel where penulis='$det'");
$count = mysql_fetch_array($c);

?>
<div style="width:100%;">
<div class="image-container" style="overflow:hidden;max-height:360px;width:100%;color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>">
	<img style="" src="<?php echo $qp[fp];?>"></img>
	<div  class="overlay" style="color:white;font-family:Segoe UI Light;font-size:15pt;line-height:1.1;color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>"><b><center><?php echo $qp['nama_depan']." ".$qp['nama_belakang'];?></center></b>
	<center>Level <?php echo $ert['level'];?> : <?php echo $count['count(*)'];?> Artikel</center>
	</div>
</div>
</div>
<div style="font-size:15pt;height:30px;">
<a style="color:<?php echo $degradasi2[navbar];?>;font-size:15pt;" href="index.php?rpl=myfriend">Profil</a> <> <a style="color:<?php echo $degradasi2[navbar];?>;font-size:15pt;" href="index.php?rpl=myfriend&det=tentang">Tentang</a>
</div>
<?php
if($_GET['rpl']=="myfriend" and $_GET['det']=="tentang"){
$tentang = mysql_query("select*from detail_akun where id_akun='$_SESSION[det]'");
$rowten = mysql_fetch_array($tentang);
?>
<table>
	<tr>
		<td>Nama</td>
		<td><?php echo $rowten['nama_depan']." ".$rowten['nama_belakang'];?></td>
	</tr>
	<tr>
		<td>NIS</td>
		<td><?php echo $rowten['nis'];?></td>
	</tr>
	<tr>
		<td>E-Mail</td>
		<td><?php echo $rowten['email'];?></td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td><?php echo $rowten['tl'];?></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td><?php echo $rowten['tgl'];?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td><?php echo $rowten['jk'];?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><?php echo $rowten['alamat'];?></td>
	</tr>
	<tr>
		<td>Tentang Saya</td>
		<td><?php echo $rowten['aboutme'];?></td>
	</tr>
</table>
<?php
}
else if($_GET['rpl']){
?>
<div  style="width:100%;border-right:1px solid #999;border-left:1px solid #999;">
<iframe style="border:0px;width:100%;height:188px;" src="tulis2.php?det=<?php echo $det?>"></iframe>
<script>
var auto_refresh = setInterval(
function()
{
$('#data').load('tl.php?rpl=myfriend&det=<?php echo $det;?>&limitan=<?php echo $limitan;?>&awal=<?php echo $awal;?>');
}, 1000);
</script>
<div id="data"></div>

</div>
<?php
}
?>
