<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_POST['simpaun'])){
mysql_query("update denda set hitung='$_POST[hitung]', jumlah='$_POST[denda]',maks='$_POST[maks]'");
echo "<script>alert('Denda berhasil disimpan')</script>";
}
$denda = mysql_query("select*from denda");
$row = mysql_fetch_array($denda);
?>
<h2>Managemen Denda</h2>
<form method="POST" action="">
<table>
	<tr>
		<td>
			Denda dihitung
		</td>
		<td>
			<div class="input-control text">
			<select name="hitung">
				<option selected="true" value="<?php echo $row['hitung'];?>"><?php echo $row['hitung'];?></option>
				<option value=""></option>
				<option value="Perjam">Perjam</option>
				<option value="Perhari">Perhari</option>
				<option value="Perminggu">Perminggu</option>
			</select>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			Jumlah Denda (Rp.)
		</td>
		<td>
			<div class="input-control text">
				<input type="text" name="denda" value="<?php echo $row['jumlah'];?>"></input>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			Maksimal Denda (Rp.)
		</td>
		<td>
			<div class="input-control text">
				<input type="text" name="maks" value="<?php echo $row['maks'];?>"></input>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			<button type="reset" name="reset">Reset</button>
			<button type="submit" name="simpaun">Simpan</button>
		</td>
	</tr>
</table>
</form>
