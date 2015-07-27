<a style='color:<?php echo $degradasi2[navbar];?>' href="index.php?rpl=artikel">Artikel</a> | <a style='color:<?php echo $degradasi2[navbar];?>' href="index.php?rpl=status"><b>Status</b></a> | <a style='color:<?php echo $degradasi2[navbar]?>' href="index.php?rpl=bukuonline">Buku Online</a>
<?php
	$awal=0;
	if(isset($_GET['src_a']) and isset($_GET['next'])){
	$awal = $_GET['src_a'];
	$limitan = $_GET['src_b'];
	$awal = $awal +$limitan;
	$limitan = $limitan;
	}
	else if(isset($_GET['src_a']) and isset($_GET['back'])){
	$awal = $_GET['src_a'];
	$limitan = $_GET['src_b'];
	$awal = $awal -$limitan;
	$limitan = $limitan;
	}
$time = mysql_query("select*from timeline order by id desc limit $awal,$limitan");
$tim = mysql_query("select*from timeline order by id desc limit $awal,$limitan");
$ro = mysql_fetch_array($tim);
if(empty($ro['id'])){
echo "<br>Status tidak ada";
}else{
while($row = mysql_fetch_array($time)){
$nama = mysql_query("select*from detail_akun where id_akun='$row[host]'");
$rownama = mysql_fetch_array($nama);
?>
<div id="" style="border-bottom:1px solid <?php echo $degradasi2['navbar'];?>;border-left:10px solid <?php echo $degradasi2['navbar'];?>;padding-left:5px;">
<a style='color:<?php echo $degradasi2[navbar];?>' href="gotoprofile.php?det=<?php echo $row[host];?>"><h4><?php echo $rownama['nama_depan']." ".$rownama['nama_belakang']."</a>";
if($row['tujuan']!="general"){
	$gen = mysql_query("select*from detail_akun where id_akun='$row[tujuan]'");
	$rowgen = mysql_fetch_array($gen);
	echo " > <a style='color:$degradasi2[navbar]' href=gotoprofile.php?det=$row[tujuan]>".$rowgen['nama_depan']." ".$rowgen['nama_belakang']."</a>";
	}?>
<?php
echo "<br>".$row[isi]."<br><br>";
$wwwwww = mysql_query("select id from komenstatus where id_artikel=$row[id]");
$num = mysql_num_rows($wwwwww); 

$asdf = mysql_query("select id,id_akun,id_tl from sukastatusasli where id_tl=$row[id] and id_akun=$_SESSION[id]");
$asd = mysql_query("select id,id_akun,id_tl from sukastatusasli where id_tl=$row[id]");
$mm = mysql_num_rows($asd); 
$like = mysql_fetch_array($asdf); 


?>
<a style="color:<?php echo $degradasi2[navbar];?>;font-size:20pt;" href="redirkomenstatus.php?art=<?php echo $row[id];?>"><i title="<?php echo $num; ?> Komentar" class=icon-comments-4 alt="hai"></i></a>
<?php
if($row['host']==$_SESSION['id'] or $row['tujuan']==$_SESSION['id']){
?>
	<a style="color:<?php echo $degradasi2[navbar];?>;font-size:20pt;" href="diletstatus.php?next=status&art=<?php echo $row[id];?>"><i title="Hapus" class=icon-remove></i></a>
<?php
}
if(empty($like['id'])){
?>
<a style="color:<?php echo $degradasi2[navbar];?>;font-size:20pt;" href="likeinstatus.php?next=status&det=<?php echo $row[id];?>&id=<?php echo $_SESSION[id];?>"><i title="<?php echo $mm; ?> Suka" class=icon-thumbs-up></i></a>
<?php
}
else if(!empty($like['id'])){
?>
<a style="color:<?php echo $degradasi2[navbar];?>;font-size:20pt;" href="likeoutstatus.php?next=status&det=<?php echo $row[id];?>&id=<?php echo $_SESSION[id];?>"><i title="<?php echo $mm; ?> Suka" class=icon-thumbs-down></i></a>
<?php
}


echo " <div style="."color:$degradasi2[navbar];"."><b>Ditulis pada $row[jam]:$row[menit]:$row[detik] $row[tgl]/$row[bln]/$row[thn] </b><div class=place-right></div></div></div>";
}
$rojml = mysql_query("select*from timeline order by id desc");
$jml = mysql_num_rows($rojml);
if($jml > $limitan){
?>
<div class="place-right" style="padding-top:20px;">
	<a href="index.php?rpl=status&src_a=<?php echo $awal;?>&src_b=<?php echo $limitan;?>&back="><i type="submit" name="lanjut" style="color:<?php echo $degradasi2[navbar];?>;font-size:30pt;" class="icon-arrow-left-3"></i></a>
	<a href="index.php?rpl=status&src_a=<?php echo $awal;?>&src_b=<?php echo $limitan;?>&next="><i type="submit" name="lanjut" style="color:<?php echo $degradasi2[navbar];?>;font-size:30pt;" class="icon-arrow-right-3"></i></a>
</div>
<?php
}
}
?>