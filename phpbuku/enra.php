<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_POST['simpen'])){
mysql_query("insert into rak values('','$_POST[nama_rak]','$_POST[ket]')");
echo "<script>alert('Rak berhasil disimpan');</script>";

}

?>

<h3>Entri Data Rak</h3>
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
						<button type="reset" class="bg-color-blue" style="color:white">Reset</button>
						<button type="submit" name="simpen" class="bg-color-blue" style="color:white">Simpan</button>
					</div>
				</td>
			</tr>
		</table>
	</form>