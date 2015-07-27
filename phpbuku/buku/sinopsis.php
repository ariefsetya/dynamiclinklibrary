<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
$det = mysql_real_escape_string($_GET['det']);
$sinop = mysql_query("select*from isibuku where id_buat='$det' and hal='sinopsis'");

$sis = mysql_fetch_array($sinop);
$idbuat = mysql_query("select*from buatbuku where id='$det'");
$hasi = mysql_fetch_array($idbuat);
if($hasi['id_akun']==$_SESSION['id']){
	?>
	<h2>Halaman Sinopsis</h2>
	
	<form method="POST" action="sinopsis.php">
	<table>
	<input type="hidden" name="hal" value="<?php echo $det;?>"></input>
		<tr>
			<td style="width:70%;" colspan=2>
				<div class="input-control textarea" >
					<textarea maxlength="1000" style="height:300px;" name="isi" id="isi"><?php echo $sis['isi'];?></textarea> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="place-right">
				<button type="reset" style="color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>" name="reset">Reset</button>
				<button type="submit" style="color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>" name="simpan">Simpan</button>
				</div>
			</td>
		</tr>
	</table>
	</form>
	<?php
	}
	else
	{
	echo "Buku tidak ada";
	echo "<div style=float:right><a href=index.php?rpl=kelolabuku><h2>Kembali</h2></a></div>";
	}
	?>