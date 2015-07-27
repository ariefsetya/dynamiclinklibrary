<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<table>
	<thead>
		<td><center>
			ID Artikel</center>
		</td>
		<td><center>
			Judul</center>
		</td>
		<td><center>
			Kategori</center>
		</td>
		<td colspan=2><center>
			Pilihan</center>
		</td>
	<thead>
	
	<?php
	$e = mysql_query("select*from artikel where penulis='$_SESSION[id]' order by id desc");
	$w = mysql_fetch_array($e);
	if(empty($w['id'])){
	?>
	<tbody>
		<td colspan=5>
			<center>
				Maaf, Anda belum membuat Artikel
			</center>
		</td>
	</tbody>
	<?php
	}
	else
	{
	$e = mysql_query("select*from artikel where penulis='$_SESSION[id]' order by id desc");
	while($w = mysql_fetch_array($e)){
	
	?>
	<tbody>
		<td><center>
			<?php echo $w['id'];?></center>
		</td>
		<td><center>
			<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="redir.php?art=<?php echo $w['id'];?>"><?php echo $w['nama'];?></a></center>
		</td>
		<td><center>
			<?php echo $w['kategori'];?></center>
		</td>
		<td><center>
			<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="index.php?rpl=ubah&det=<?php echo $w[id];?>"><i class="icon-file" title="Ubah"></i></a></center>
		</td>
		<td><center>
			<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="dilet1.php?art=<?php echo $w[id];?>"><i class="icon-remove" title="Hapus"></i></a></center>
		</td>
	</tbody>
	<?php
	}
	}
	?>
	
</table>