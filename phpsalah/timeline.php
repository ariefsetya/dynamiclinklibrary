<a style='color:<?php echo $degradasi2[navbar];?>' href="index.php?rpl=artikel"><b>Artikel</b></a> | <a style='color:<?php echo $degradasi2[navbar];?>' href="index.php?rpl=status">Status</a> | <a style='color:<?php echo $degradasi2[navbar]?>' href="index.php?rpl=bukuonline">Buku Online</a>
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
$time = mysql_query("select*from artikel order by id desc limit $awal,$limitan");
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
$tim = mysql_query("select*from artikel order by id desc limit $awal,$limitan");
$ro = mysql_fetch_array($tim);
if(empty($ro['id'])){
echo "<br>Artikel tidak ada";
}else{
while($row = mysql_fetch_array($time)){
?>
<div id="" style="border-bottom:1px solid <?php echo $degradasi2['navbar'];?>;border-left:10px solid <?php echo $degradasi2['navbar'];?>;padding-left:5px;">
<a href="redir.php?art=<?php echo $row[id];?>"><h3><?php echo $row['nama'];?></h3></a>
<?php
echo text_limit($row[isi],100)."<br><br>";
$wwwwww = mysql_query("select id from komenartikel where id_artikel=$row[id]");
$num = mysql_num_rows($wwwwww); 

$asdf = mysql_query("select id,id_akun,id_tl from sukastatus where id_tl=$row[id] and id_akun=$_SESSION[id]");
$asd = mysql_query("select id,id_akun,id_tl from sukastatus where id_tl=$row[id]");
$mm = mysql_num_rows($asd); 
$like = mysql_fetch_array($asdf); 


?>
<a style="font-size:20pt;" href="redir.php?art=<?php echo $row[id];?>"><i title="<?php echo $num; ?> Komentar" class=icon-comments-4 alt="hai"></i></a>
<?php
if($row['penulis']==$_SESSION['id']){
?>
	<a style="font-size:20pt;" href="dilet.php?art=<?php echo $row[id];?>"><i title="Hapus" class=icon-remove></i></a>
<?php
}
if(empty($like['id'])){
?>
<a style="font-size:20pt;" href="likein.php?det=<?php echo $row[id];?>&id=<?php echo $_SESSION[id];?>"><i title="<?php echo $mm; ?> Suka" class=icon-thumbs-up></i></a>
<?php
}
else if(!empty($like['id'])){
?>
<a style="font-size:20pt;" href="likeout.php?det=<?php echo $row[id];?>&id=<?php echo $_SESSION[id];?>"><i title="<?php echo $mm; ?> Suka" class=icon-thumbs-down></i></a>
<?php
}


echo " <div style="."color:green;"."><b>Ditulis pada $row[jam]:$row[menit]:$row[detik] $row[tgl]/$row[bln]/$row[thn] </b><div class=place-right><a href=redir.php?art=$row[id]".">"."Selengkapnya</a></div></div></div>";
}

$rojml = mysql_query("select*from artikel order by id desc");
$jml = mysql_num_rows($rojml);
if($jml > $limitan){
?>
<div class="place-right" style="padding-top:20px;">
	<a href="index.php?rpl=artikel&src_a=<?php echo $awal;?>&src_b=<?php echo $limitan;?>&back="><i type="submit" name="lanjut" style="font-size:30pt;" class="icon-arrow-left-3"></i></a>
	<a href="index.php?rpl=artikel&src_a=<?php echo $awal;?>&src_b=<?php echo $limitan;?>&next="><i type="submit" name="lanjut" style="font-size:30pt;" class="icon-arrow-right-3"></i></a>
</div>
<?php
}
}
?>