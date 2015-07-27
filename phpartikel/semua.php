<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
	$limitan = 15;
	$awal=0;
	if(isset($_GET['src_a']) and isset($_GET['next'])){
	$awal = $_GET['src_a'];
	$limitan = $_GET['src_b'];
	$awal = $awal +15;
	$limitan = $limitan;
	}
	else if(isset($_GET['src_a']) and isset($_GET['back'])){
	$awal = $_GET['src_a'];
	$limitan = $_GET['src_b'];
	$awal = $awal -15;
	$limitan = $limitan;
	}
?>
<table>
	<thead>
		<td>
			Judul
		</td>
		<td>
			Kategori
		</td>
		<td>
			Penulis
		</td>
	<thead>
	<?php
	$e = mysql_query("select*from artikel order by id desc limit $awal,$limitan");
	$w = mysql_fetch_array($e);
	if(empty($w[id])){
	?>
	<tbody>
		<td colspan=5>
			<center>
				Tidak ada artikel
			</center>
		</td>
	</tbody>
	<?php
	}
	else
	{
	$e = mysql_query("select*from artikel order by id desc limit $awal,$limitan");
	while($w = mysql_fetch_array($e)){
	?>
	<tbody>
		<td>
			<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="redir.php?art=<?php echo $w['id'];?>"><?php echo $w['nama'];?></a>
		</td>
		<td>
			<?php echo $w['kategori'];?>
		</td>
		<td>
			<?php 
			$df = mysql_query("select*from akun where id='$w[penulis]'");
			$er = mysql_fetch_array($df);
			echo $er['username'];?>
		</td>
	</tbody>
	<?php
	}
	}
	?>
</table>
	<div class="place-right" style="padding-top:20px;">
		<a href="index.php?rpl=semua_artikel&src_a=<?php echo $awal;?>&src_b=<?php echo $limitan;?>&back="><i type="submit" name="lanjut" style="font-size:30pt;color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" class="icon-arrow-left-3"></i></a>
		<a href="index.php?rpl=semua_artikel&src_a=<?php echo $awal;?>&src_b=<?php echo $limitan;?>&next="><i type="submit" name="lanjut" style="font-size:30pt;color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" class="icon-arrow-right-3"></i></a>
	</div>