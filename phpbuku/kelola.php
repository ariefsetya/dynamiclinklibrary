<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_GET['rpl'])){
	if($_GET['hal']=="ubah"){
		include "buku/ubah.php";
	}
	else if($_GET['hal']=="hapus"){
		include "buku/hapus.php";
	}
	else if($_GET['hal']=="lanjutkan"){
		include "buku/perhal.php";
	}
	else if($_GET['hal']=="baca"){
		include "buku/baca.php";
	}
	else if($_GET['hal']=="sinopsis"){
		include "buku/sinopsis.php";
	}
	else {
		include "buku/all.php";
	}
}
	?>