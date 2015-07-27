<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<link href="ckeditor/content.css" rel="stylesheet" type="text/css"/>
<h2><a style="color:<?php echo $_SESSION['navbar'];?>;background:<?php echo $_SESSION['background'];?>" href="index.php?rpl=kelolabuku"><i style="font-size:18pt;" class="icon-arrow-left-3"></i></a> Buat Buku</h2>
<form method="POST" action="buat.php">
	<table style="width:98%;">
		<tr>
			<td>
				<div class="input-control text">
				<label>Judul Buku</label>
				<input required="true" type="text" maxlength="50" name="judul"/>
				</div>
			</td>
		</tr>
		<tr>
			<td>
			<div class="input-control text">
				<label>Tag (misalnya : cinta, cerita, novel, pengetahuan, petualangan)</label>
				<input type="text" required="true" name="tag"></input>
			</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="place-right">
				<button style="width:40%;color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>" type="reset" name="reset"><b>Reset</b></button>
				<button style="width:40%;color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>" type="submit" name="simpan"><b>Buat</b></button>
				</div>
			</td>
		</tr>
	</table>
</form>