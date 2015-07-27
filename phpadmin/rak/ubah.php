<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_POST['upgred'])){
mysql_query("update rak set nama='$_POST[nama_rak]',ket='$_POST[ket]' where id='$_GET[det]'");
echo "<script>alert('Rak berhasil di perbarui');</script>";

}
$buka = mysql_query("select*from rak where id='$_GET[det]'");
$bua = mysql_fetch_array($buka);

?>

<h2><a href="index.php?rpl=m_rak"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a> Ubah Data Rak</h2>
	<form method="POST" action="">
		<table>
			<tr>
				<td>
					Nama Rak
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" value="<?php echo $bua['nama'] ?>" name="nama_rak"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Keterangan
				</td>
				<td>
					<div class="input-control text">
						<textarea required="true" type="text" name="ket"><?php echo $bua['ket'] ?></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<div class="input-control text place-right">
						<button type="reset" >Reset</button>
						<button type="submit" name="upgred" >Perbarui</button>
					</div>
				</td>
			</tr>
		</table>
	</form>
