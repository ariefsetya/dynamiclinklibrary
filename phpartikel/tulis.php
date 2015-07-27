<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>

	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<link href="ckeditor/content.css" rel="stylesheet" type="text/css"/>
<form method="POST" action="postkanartikel.php">
	<table style="width:98%;">
		<tr>
			<td>
				<div class="input-control text">
				<label>Judul Artikel</label>
				<input required="true" type="text" maxlength="50" name="judul"/>
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
			<td colspan=2>
				<div class="place-right">
				<button style="width:40%;color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>" type="reset" name="reset"><b>Kosongkan</b></button>
				<button style="width:40%;color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>" type="submit" name="simpan"><b>Terbitkan</b></button>
				</div>
			</td>
		</tr>
	</table>
</form>