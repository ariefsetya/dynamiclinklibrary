<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_POST['simpan'])){
$judul = htmlentities($_POST['judul']);
$kategori = htmlentities($_POST['kategori']);
$isi = $_POST['isi'];

	$awalnya = array("#IMG","IMG#");
    $gantinya =   array("<img style="."max-width:400px;"." src=","></img>");
    $isi = str_replace($awalnya, $gantinya,$isi);
	
	$d = date("d");
	$m = date("m");
	$y = date("Y");
	$h = date("H");
	$i = date("i");
	$s = date("s");

mysql_query("insert into artikel values('','$judul','$_SESSION[id]','$kategori','$isi','0','$d','$m','$y','$h','$i','$s')");

}
?>
<h2><a href="index.php?rpl=m_artikel"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a> Buat Artikel</h2>
<form method="POST" action="">
	<table style="width:98%;">
		<tr>
			<td>
				<div class="input-control text">
				<label>Judul Artikel</label>
				<input type="text" name="judul"/>
				</div>
			</td>
			<td>
			<div class="input-control text">
				<label>Kategori</label>
				<select required="true" name="kategori">
				  <option selected="true"></option>
				  <option value="Cerpen">Cerpen</option>
				  <option value="Puisi">Puisi</option>
				  <option value="Agama Islam">Agama Islam</option>
				  <option value="Agama Kristen">Agama Kristen</option>
				  <option value="Diary">Diary</option>
				  <option value="Motivasi">Motivasi</option>
				  <option value="Rumus">Rumus</option>
				  <option value="Pengetahuan">Pengetahuan</option>
				  <option value="Tutorial">Tutorial</option>
				  <option value="Kodingan">Kodingan</option>
				  <option value="Movie">Movie</option>
				  <option value="Cinta">Cinta</option>
				  <option value="Lain-lain">Lain-lain</option>
				</select>
			</div>
			</td>
		</tr>
		<tr>
			<td style="width:70%;" colspan=2>
				<div class="input-control textarea" >
				<label>Isi Artikel</label>
					<textarea cols="80" style="height:900px;" name="isi" id="isi"></textarea> 
				<script type="text/javascript">
							var editor = CKEDITOR.replace('isi');
				  </script>	
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<center>
				<button style="float:right;" type="submit" name="simpan"><b>Terbitkan</b></button>
				<button style="float:right;" type="reset" name="reset"><b>Kosongkan</b></button>
				</center>
			</td>
		</tr>
	</table>
</form>