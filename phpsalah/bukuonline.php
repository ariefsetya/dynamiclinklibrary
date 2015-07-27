<a style='color:<?php echo $degradasi2[navbar];?>' href="index.php?rpl=artikel">Artikel</a> | <a style='color:<?php echo $degradasi2[navbar];?>' href="index.php?rpl=status">Status</a> | <a style='color:<?php echo $degradasi2[navbar]?>' href="index.php?rpl=bukuonline"><b>Buku Online</b></a>
<?php
	$awal=0;
	if(isset($_GET['src_a']) and isset($_GET['next'])){
	$awal = $_GET['src_a'];
	$limitan = $_GET['src_b'];
	$awal = $awal +$limitan;
	}
	else if(isset($_GET['src_a']) and isset($_GET['back'])){
	$awal = $_GET['src_a'];
	$limitan = $_GET['src_b'];
	$awal = $awal -$limitan;
	}
$time = mysql_query("select*from buatbuku where aktif=1 order by id desc limit $awal,$limitan");
$a = 1;
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
$tim = mysql_query("select*from buatbuku where aktif=1 order by id desc limit $awal,$limitan");
$ro = mysql_fetch_array($tim);
if(empty($ro['id'])){
echo "<br>Buku Online tidak ada";
}
else
{
while($row = mysql_fetch_array($time)){
?>
<div id="" style="border-bottom:1px solid <?php echo $degradasi2['navbar'];?>;border-left:10px solid <?php echo $degradasi2['navbar'];?>;padding-left:5px;">
<a href="redir.php?art=<?php echo $row[id];?>"><h3><b><?php echo $row['nama'];?></b></h3></a>
<?php
$sinopsis = mysql_query("select*from isibuku where id_buat='$row[id]' and hal='sinopsis'");
$rowsin = mysql_fetch_array($sinopsis);

echo "<a style='color:$degradasi2[navbar]' href=index.php?rpl=bukupenulis&hal=baca&det=$row[id]>".$row['judul']."</a>"."<br>";
echo text_limit($rowsin['isi'],100)."<br><br>";

echo " <div style="."color:$degradasi2[navbar];"."><b>Ditulis pada $row[jam] $row[tanggal] </b><div class=place-right><a style='color:$degradasi2[navbar]' href=index.php?rpl=bukupenulis&hal=baca&det=$row[id]>Selengkapnya</a></div></div></div>";
}
$rojml = mysql_query("select*from bukuonline order by id desc");
$jml = mysql_num_rows($rojml);
if($jml > $limitan){
?>
<div class="place-right" style="padding-top:20px;">
	<a href="index.php?rpl=bukuonline&src_a=<?php echo $awal;?>&src_b=<?php echo $limitan;?>&back="><i type="submit" name="lanjut" style="color:<?php echo $degradasi2['navbar'];?>;font-size:30pt;" class="icon-arrow-left-3"></i></a>
	<a href="index.php?rpl=bukuonline&src_a=<?php echo $awal;?>&src_b=<?php echo $limitan;?>&next="><i type="submit" name="lanjut" style="color:<?php echo $degradasi2['navbar'];?>;font-size:30pt;" class="icon-arrow-right-3"></i></a>
</div>
<?php
}
}
?>