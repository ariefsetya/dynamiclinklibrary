<a style='color:<?php echo $degradasi2[navbar];?>' href="index.php?rpl=artikel">Artikel</a> | <a style='color:<?php echo $degradasi2[navbar];?>' href="index.php?rpl=status">Status</a> | <a style='color:<?php echo $degradasi2[navbar]?>' href="index.php?rpl=bukuonline">Buku Online</a>
<?php

$detail = repp($_GET[det]);
if(isset($_POST['komen'])){
	$d = date("d");
	$m = date("m");
	$y = date("Y");
	$h = date("H");
	$i = date("i");
	$s = date("s");
	$postan = htmlentities($_POST['komen']);
mysql_query("insert into komenstatus values('','$_SESSION[id]','$detail','$postan','$h','$i','$s','$d','$m','$y')");
}


$time = mysql_query("select*from timeline where id=$detail");
$tim = mysql_query("select*from timeline where id=$detail");
$ro = mysql_fetch_array($tim);
if(empty($ro['id'])){
echo "<br>Status tidak ada";
}
else
{
$row = mysql_fetch_array($time);
$nama = mysql_query("select*from detail_akun where id_akun='$row[host]'");
$rownama = mysql_fetch_array($nama);
?>
<div id="" style="border-bottom:1px solid <?php echo $degradasi2['navbar'];?>;border-left:10px solid <?php echo $degradasi2['navbar'];?>;padding-left:5px;">
<a href="gotoprofile.php?det=<?php echo $row[host];?>"><h4><b><?php echo $rownama['nama_depan']." ".$rownama['nama_belakang'];?></b></h4></a>
<?php
echo $row[isi]."<br><br>";
$wwwwww = mysql_query("select id from komenstatus where id_st=$detail");
$num = mysql_num_rows($wwwwww); 

$asdf = mysql_query("select id,id_akun,id_tl from sukastatusasli where id_tl=$detail and id_akun=$_SESSION[id]");
$asd = mysql_query("select id,id_akun,id_tl from sukastatusasli where id_tl=$detail");
$mm = mysql_num_rows($asd); 
$like = mysql_fetch_array($asdf); 




if($row['host']==$_SESSION['id'] or $row['tujuan']==$_SESSION['id']){
?>
	<a style="font-size:20pt;" href="diletstatus.php?next=one&art=<?php echo $detail;?>"><i title="Hapus" class=icon-remove></i></a>
<?php
}
if(empty($like['id'])){
?>
<a style="font-size:20pt;" href="likeinstatus.php?next=one&det=<?php echo $detail;?>&id=<?php echo $_SESSION[id];?>"><i title="<?php echo $mm; ?> Suka" class=icon-thumbs-up></i></a>
<?php
}
else if(!empty($like['id'])){
?>
<a style="font-size:20pt;" href="likeoutstatus.php?next=one&det=<?php echo $detail;?>&id=<?php echo $_SESSION[id];?>"><i title="<?php echo $mm; ?> Suka" class=icon-thumbs-down></i></a>
<?php
}

echo " <div style="."color:green;"."><b>Ditulis pada $row[jam]:$row[menit]:$row[detik] $row[tgl]/$row[bln]/$row[thn] </b><div class=place-right></div></div></div>";

?>
<ul class="replies" style="padding-top:2px;">
<?php
$komenan = mysql_query("select*from komenstatus where id_st='$detail' order by id");
while($kom = mysql_fetch_array($komenan)){
$det = mysql_query("select*from detail_akun where id_akun='$kom[id_akun]'");
$wer = mysql_fetch_array($det);
?>
	<li class="bg-color-blue" style="width:100%;">
		<b class="sticker sticker-left sticker-color-blue" style="z-index:100;"></b>
		<div class="avatar"><img src="<?php echo $wer['fp'];?>"/></div>
		<div class="reply">
			<div class="date" style="font-size:12pt;"><?php echo $kom['jam'].":".$kom['menit'].":".$kom['detik']." ".$kom['tgl']."/".$kom['bln']."/".$kom['thn']; if($e['penulis']==$_SESSION['id'] or $_SESSION['id']==$kom['id_akun']){?> <a href="puskomenstat.php?det=<?php echo $kom['id']; ?>&id=<?php echo $detail; ?>"><i title="Hapus" class="icon-remove" style="color:lightgreen;"></i></a><?php } ?></div>
			<div class="author"><b><?php echo $wer['nama_depan']." ".$wer['nama_belakang']; ?></b></div> 
			<div class="text" style="font-size:10pt;"><?php echo $kom['isi'];?></div>
		</div>
	</li>
	<?php
	}
	$qwere = mysql_query("select*from penulis where id_akun='$_SESSION[id]'");
	$qwe = mysql_fetch_array($qwere);
	$qwer = mysql_query("select*from detail_akun where id_akun='$_SESSION[id]'");
	$qwa = mysql_fetch_array($qwer);
	if(!empty($qwe['id_akun']) or $_SESSION['user_akses']==10){
	?>
	<li class="bg-color-blue" style="width:100%;">
		<b class="sticker sticker-left sticker-color-blue"></b>
		<div class="avatar"><img src="<?php echo $qwa['fp'];?>"/></div>
		<div class="reply">
			<div class="author"><b><?php echo $qwa['nama_depan']." ".$qwa['nama_belakang']; ?></b></div>
			<div class="text"><form method="POST" action=""><input placeholder="Tulis Komentar..." style="width:100%;height:30px;padding:5px;font-family:Segoe UI Light;font-size:11pt;" type="text" name="komen"></input></form></div>
		</div>
	</li>
	<?php
	}
	?>
</ul>
<?php
}
?>