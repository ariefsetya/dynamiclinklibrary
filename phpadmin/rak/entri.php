<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_POST['simpen'])){
mysql_query("insert into rak values('','$_POST[nama_rak]','$_POST[ket]')");
echo "<script>alert('Rak berhasil disimpan');</script>";

}

?>

<h2><a href="index.php?rpl=m_rak"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a> Entri Data Rak</h2>
	<form method="POST" action="">
		<table>
			<tr>
				<td>
					Nama Rak
				</td>
				<td>
					<div class="input-control text">
						<input required="true" type="text" name="nama_rak"></input>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Keterangan
				</td>
				<td>
					<div class="input-control text">
						<textarea required="true" type="text" name="ket"></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<div class="input-control text place-right">
						<button type="reset" >Reset</button>
						<button type="submit" name="simpen" >Simpan</button>
					</div>
				</td>
			</tr>
		</table>
	</form>
