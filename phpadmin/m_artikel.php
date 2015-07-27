<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_GET['rpl'])){
	if($_GET['hal']=="buat"){
		include "artikel/buat.php";
	}
	else if($_GET['hal']=="lihat"){
		include "artikel/baca.php";
	}
	else if($_GET['hal']=="ubah"){
		include "artikel/ubah.php";
	}
	else if($_GET['hal']=="hapus"){
		include "artikel/hapus.php";
	}
	else{
		include "artikel/all.php";
	}
}
	?>