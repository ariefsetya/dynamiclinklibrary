<?php

if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}

function text_limit($str,$limit)
	{
    if(stripos($str," ")){
	  $ex_str = explode(" ",$str);
	  if(count($ex_str)>$limit){
		for($i=0;$i<$limit;$i++){
		 $str_s.=$ex_str[$i]." ";
		}
	   return $str_s;
	   }else{
		return $str;
	   }
	  }else{
	  return $str;
		}
	}
?>
<?php



$qop = mysql_query("select*from detail_akun where id_akun='$_SESSION[id]'");
$qp = mysql_fetch_array($qop);

$jkl = mysql_query("select*from penulis where id_akun='$_SESSION[id]'");
$ert = mysql_fetch_array($jkl);

$c = mysql_query("select count(*) from artikel where penulis='$_SESSION[username]'");
$count = mysql_fetch_array($c);

?>
<div style="position:relative">
<div style="width:100%;">
<div class="image-container" style="overflow:hidden;max-height:360px;width:100%;color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>">
	<img style="" src="<?php echo $qp[fp];?>"></img>
	<div  class="overlay" style="color:white;font-family:Segoe UI Light;font-size:15pt;line-height:1.1;color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>"><b><center><?php echo $qp['nama_depan']." ".$qp['nama_belakang'];?></center></b>
	<center>Level <?php echo $ert['level'];?> : <?php echo $count['count(*)'];?> Artikel</center>
	</div>
</div>
</div>
<div style="font-size:15pt;height:30px;">
<a style="color:<?php echo $degradasi2[navbar];?>;font-size:15pt;" href="index.php?rpl=profil">Profil</a> <> <a style="color:<?php echo $degradasi2[navbar];?>;font-size:15pt;" href="index.php?rpl=profil&det=tentang">Tentang</a>
</div>
<?php
if($_GET['rpl']=="profil" and $_GET['det']=="tentang"){
$tentang = mysql_query("select*from detail_akun where id_akun='$_SESSION[id]'");
$rowten = mysql_fetch_array($tentang);
$mysqldata = mysql_query("select*from akun where id_akun='$_SESSION[id]'");
$roee = mysql_fetch_array($mysqldata);
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
else{
?>
<div style="width:100%;border-right:1px solid #999;border-left:1px solid #999;">
<iframe src="sharer.php" style="border:0px;width:100%;height:210px;;"></iframe>
<script>
var auto_refresh = setInterval(
function()
{
$('#data').load('tl2.php?limitan=<?php echo $limitan;?>&awal=<?php echo $awal;?>');
}, 1000);
</script>
<div id="data"></div>

</div>

<?php
}
?>
</div>
