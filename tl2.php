<?php
session_start();

if(empty($_GET['limitan']) and empty($_GET['awal'])){
header("location:index.php");
}
else if(empty($_SESSION['id'])){
header("location:index.php");
}
else{

include "phpfunc/num.php";
$limitan = repp($_SESSION['limitan']);
$awal = repp($_SESSION['awal']);
include "phpcon/link.php";
$apa = mysql_query("select*from timeline where host='$_SESSION[id]' or tujuan='$_SESSION[id]' order by id desc limit $awal,$limitan");
$aaa = mysql_query("select*from timeline where host='$_SESSION[id]' or tujuan='$_SESSION[id]' order by id desc limit $awal,$limitan");
$aol = mysql_fetch_array($aaa);
$jml = mysql_num_rows($aaa);
if(empty($aol['id'])){
?>
Tidak ada status<br>
<a style="position:absolute;right:100;font-size:18pt;" href="direct.php?rpl=profil&src_a=0&src_b=<?php echo $limitan;?>&awal">Kembali</a>
<?php
}
else{
while($ew = mysql_fetch_array($apa)){
$q = mysql_query("select*from detail_akun where id_akun='$ew[host]'");
$qwqw = mysql_fetch_array($q);
?>
<table>
<tr>
<td rowspan=2 style="width:50px;" valign=top>
<img style="width:50px;height:50px;overflow-y:hidden;" src="<?php echo $qwqw[fp];?>"></img>
</td>
<td>
	<?php echo "<a style=color:$_SESSION[navbar];background:$_SESSION[background]; href=gotoprofile.php?det=$ew[host]>".$qwqw['nama_depan']." ".$qwqw['nama_belakang']."</a>";
	if($ew['tujuan']!="general" or $ew['tujuan']==$_SESSION['id']){
	$gen = mysql_query("select*from detail_akun where id_akun='$ew[tujuan]'");
	$rowgen = mysql_fetch_array($gen);
	echo " > <a style=color:$_SESSION[navbar];background:$_SESSION[background]; href=gotoprofile.php?det=$ew[tujuan]>".$rowgen['nama_depan']." ".$rowgen['nama_belakang']."</a>";
	}?>
</td>
</tr>
<tr>
	<td rowspan=2 style=" white-space: pre;white-space: pre-wrap;word-wrap:break-all"><?php echo $ew['isi'];?></td>
</tr>
<tr>
<td>
</td>
</tr>
<tr>
<td>
</td>
<td>
<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="redirkomenstatus.php?art=<?php echo $ew['id'];?>">Dikirim pada <?php echo $ew[jam].":".$ew[menit].":".$ew[detik]." ".$ew[tgl]."/".$ew[bln]."/".$ew[thn]."</a>";?>

<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="index.php?rpl=detstat&det=<?php echo $ew['id'];?>"><i title="Komentar" class=icon-comments-4></i></a>
<?php

?>
	<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="diletstatus.php?next=profile&art=<?php echo $ew['id'];?>"><i title="Hapus" class=icon-remove></i></a>
<?php

$asdf = mysql_query("select id,id_akun,id_tl from sukastatusasli where id_tl=$ew[id] and id_akun=$_SESSION[id]");
$asd = mysql_query("select id,id_akun,id_tl from sukastatusasli where id_tl=$ew[id]");
$mm = mysql_num_rows($asd); 
$like = mysql_fetch_array($asdf); 
if(empty($like['id'])){
?>
<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="likeinstatus.php?next=profile&det=<?php echo $ew[id];?>&id=<?php echo $_SESSION[id];?>"><i title="<?php echo $mm; ?> Suka" class=icon-thumbs-up></i></a>
<?php
}
else if(!empty($like['id'])){
?>
<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="likeoutstatus.php?next=profile&det=<?php echo $ew[id];?>&id=<?php echo $_SESSION[id];?>"><i title="<?php echo $mm; ?> Suka" class=icon-thumbs-down></i></a>
<?php
}
?>

</td>
</tr>
</table>

<?php

}
$rojml = mysql_query("select*from timeline where tujuan='$_SESSION[id]' or host='$_SESSION[id]' order by id desc");
$jml = mysql_num_rows($rojml);
if($jml > $limitan){
?>
<div class="place-right" style="padding-top:20px;">
	<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="direct.php?rpl=profil&src_a=<?php echo $awal;?>&src_b=<?php echo $limitan;?>&back="><i type="submit" name="lanjut" style="font-size:30pt;" class="icon-arrow-left-3"></i></a>
	<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="direct.php?rpl=profil&src_a=<?php echo $awal;?>&src_b=<?php echo $limitan;?>&next="><i type="submit" name="lanjut" style="font-size:30pt;" class="icon-arrow-right-3"></i></a>
</div>
<?php
}
}
}
?>