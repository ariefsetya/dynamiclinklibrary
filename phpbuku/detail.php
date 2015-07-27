<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
$detail = mysql_query("select*from buku where id='$_GET[det]'");
$det = mysql_fetch_array($detail);
?>
<h2><a href="index.php?rpl=rak_buku"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a>  Detail Buku <?php echo $det['Judul'];?></h2>
<table>
	<tr>
		<td rowspan=9 style="width:200px;" valign=top>
			<div style="width:220px;height:200px;max-height:200px;overflow-y:scroll;border:1px solid #999;">
			<img src="<?php echo $det['Cover'];?>" style="width:200px;"></img>
			</div>
		</td>
	</tr>
	<tr>
		<td>
		Judul
		</td>
		<td>
		<?php echo $det['Judul'];?>
		</td>
	</tr>
	<tr>
		<td>
		Pengarang
		</td>
		<td>
		<?php echo $det['pengarang'];?>
		</td>
	</tr>
	<tr>
		<td>
		Penerbit
		</td>
		<td>
		<?php echo $det['penerbit'];?>
		</td>
	</tr>
	<tr>
		<td>
		Tahun Terbit
		</td>
		<td>
		<?php echo $det['tahun_terbit'];?>
		</td>
	</tr>
	<tr>
		<td>
		ISBN
		</td>
		<td>
		<?php echo $det['ISBN'];?>
		</td>
	</tr>
	<tr>
		<td>
		Pengarang
		</td>
		<td>
		<?php echo $det['pengarang'];?>
		</td>
	</tr>
	<tr>
		<td>
		Penerbit
		</td>
		<td>
		<?php echo $det['penerbit'];?>
		</td>
	</tr>
	<tr>
		<td>
		Harga Buku
		</td>
		<td>
		<?php echo $det['Harga'];?>
		</td>
	</tr>
	<tr>
		<td colspan=2>
		Jumlah Buku
		</td>
		<td>
		<?php echo $det['Jumlah'];?>
		</td>
	</tr>
	<tr>
		<td colspan=2>
		Tahun Masuk
		</td>
		<td>
		<?php echo $det['Masuk'];?>
		</td>
	</tr>
	<tr>
		<td colspan=2>
			Rak
		</td>
		<td>
		<?php 
		$a = mysql_query("select*from rak where id='$det[rak]'");
		$b = mysql_fetch_array($a);
		echo $b['nama'];?>
		</td>
	</tr>
	<tr>
		<td colspan=2>
		Ukuran
		</td>
		<td>
		<?php echo $det['Ukuran'];?>
		</td>
	</tr>
	<tr>
		<td colspan=2>
		Bahasa
		</td>
		<td>
		<?php echo $det['Bahasa'];?>
		</td>
	</tr>
	<tr>
		<td colspan=2>
		Dilihat
		</td>
		<td>
		<?php echo $det['lihat'];?>
		</td>
	</tr>
	<tr>
		<td colspan=2>
		Sinopsis
		</td>
		<td>
		<?php echo $det['sinopsis'];?>
		</td>
	</tr>
</table>
