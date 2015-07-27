<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
	<?php
	$idnyaaa = repp($_GET['det']);
	$whe = mysql_query("select*from buatbuku where id='$idnyaaa'");
	$ree = mysql_fetch_array($whe);
	if($ree['id_akun']==$_SESSION['id'])
	{
	if(isset($_POST['simpan'])){
	$post = htmlentities($_POST['isi']);
	$ins = mysql_query("insert into isibuku values('','$_GET[det]','$post','$_POST[hal]')");
	}
	$a = mysql_query("select*from isibuku where id_buat='$_GET[det]' and hal<>'sinopsis'");
	$row = mysql_num_rows($a);
	$hal = $row+1;
	
	mysql_query("update buatbuku set jumlah_hal='$row' where id='$_GET[det]'");

	?>
	<h2>Halaman <?php echo $hal;?></h2>
	
	<form method="POST" action="">
	<table>
	<input type="hidden" name="hal" value="<?php echo $hal;?>"></input>
		<tr>
			<td style="width:70%;" colspan=2>
				<div class="input-control textarea" >
					<textarea maxlength="1000" style="height:300px;" name="isi" id="isi"></textarea> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="place-right">
				<button type="reset" name="reset">Reset</button>
				<button type="submit" name="simpan">Simpan</button>
				</div>
			</td>
		</tr>
	</table>
	</form>
	<?php
	}
	else{
	echo "<meta http-equiv='refresh' content='0;url=index.php?rpl=kelolabuku'>";
	}
	?>