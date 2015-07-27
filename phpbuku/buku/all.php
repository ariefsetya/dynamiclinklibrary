<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
$a = mysql_query("select*from buatbuku where id_akun='$_SESSION[id]' order by id");
?>
<h2>Kelola Buku</h2>
<label><a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="index.php?rpl=tulis_buku">Buat Buku Baru</a></label>
<table>
	<thead>
		<td>
			ID
		</td>
		<td>
			Judul
		</td>
		<td>
			Hal
		</td>
		<td>
			Aktif
		</td>
		<td>
			Terakhir diubah
		</td>
		<td colspan=5>
			<center>Pilihan</center>
		</td>
	</thead>
		
<?php
while($e = mysql_fetch_array($a)){

?>
<tbody>
	<td>
		<?php echo $e['id'];?>
	</td>
	<td>
		<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="index.php?rpl=kelolabuku&hal=baca&det=<?php echo $e[id];?>"><?php echo $e['judul'];?></a>
	</td>
	<td>
		<?php echo $e['jumlah_hal'];?>
	</td>
	<td>
		<?php if($e['aktif']==1){
			echo "<i class=icon-thumbs-up style=color:$_SESSION[navbar];background:$_SESSION[background];></i>";
		}else if($e['aktif']==0){
			echo "<i class=icon-thumbs-down style=color:$_SESSION[navbar];background:$_SESSION[background];></i>";
		}?>
	</td>
	<td>
		<?php echo $e['jam']." ".$e['tanggal'];?>
	</td>
	<td>
		<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="index.php?rpl=kelolabuku&hal=sinopsis&det=<?php echo $e[id];?>"><i class="icon-copy" title="Sinopsis"></i></a>
	</td>
	<td>
		<?php if($e['aktif']==1){
			echo "<a style=color:$_SESSION[navbar];background:$_SESSION[background]; href=nonaktifkan.php?rpl=kelolabuku&det=$e[id]><i class=icon-arrow-down title=Draftkan></i></a>";
		}else if($e['aktif']==0){
			echo "<a style=color:$_SESSION[navbar];background:$_SESSION[background]; href=aktifkan.php?rpl=kelolabuku&det=$e[id]><i class=icon-arrow-up title=Terbitkan></i></a>";
		}?></td>
	<td>
		<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="index.php?rpl=kelolabuku&hal=lanjutkan&det=<?php echo $e[id];?>"><i class=icon-arrow-right title=Lanjutkan></i></a>
	</td>
	<td>
		<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="index.php?rpl=kelolabuku&hal=ubah&det=<?php echo $e[id];?>"><i class=icon-file title=Ubah></i></a>
	</td>
	<td>
		<a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="index.php?rpl=kelolabuku&hal=hapus&det=<?php echo $e[id];?>"><i class=icon-remove title=Hapus></i></a>
	</td>
</tbody>
<?php
}
?>