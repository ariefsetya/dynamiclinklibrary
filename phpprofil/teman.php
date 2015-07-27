<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<h2>Teman</h2>
<style>
.fren{
width:50%;
float:left;
position:relative;
}
</style>

<?php
$coun = 1;
$teman = mysql_query("select*from penulis order by id_akun");
while($rowteman = mysql_fetch_array($teman)){
$detail = mysql_query("select*from detail_akun where id_akun='$rowteman[id_akun]'");
$rowdetail = mysql_fetch_array($detail);
?>
<div class="fren">
<a href="gotoprofile.php?det=<?php echo $rowteman['id_akun'];?>">
<ul class="replies">
	<li  style="width:100%;color:<?php echo $_SESSION['background'];?>;background:<?php echo $_SESSION['navbar'];?>">
		<div class="avatar"><img src="<?php echo $rowdetail['fp'];?>"/></div>
		<div class="reply">
			<div class="author"><?php echo $rowdetail['nama_depan']." ".$rowdetail['nama_belakang'];?></div>
			<div class="text">
			<?php
			$artikel = mysql_query("select*from artikel where penulis='$rowteman[id_akun]'");
			$rowartikel = mysql_num_rows($artikel);
			$buku = mysql_query("select*from buatbuku where id_akun='$rowteman[id_akun]'");
			$rowbuku = mysql_num_rows($buku);
			echo "$rowartikel Artikel | $rowbuku Buku Online | ";
			$timeline = mysql_query("select*from timeline where host='$rowteman[id_akun]'");
			$rowtimeline = mysql_num_rows($timeline);
			echo "$rowtimeline Status";
			?>
			</div>
		</div>
	</li>
</ul>
</a>
</div>

<?php
}
?>
