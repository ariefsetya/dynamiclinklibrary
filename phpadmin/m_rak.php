<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_GET['rpl'])){
	if($_GET['hal']=="entri"){
		include "rak/entri.php";
	}
	else if($_GET['hal']=="ubah"){
		include "rak/ubah.php";
	}
	else if($_GET['hal']=="hapus"){
		include "rak/hapus.php";
	}
	else if($_GET['hal']=="detail"){
		include "rak/detail.php";
	}
	else {
		include "rak/all.php";
	}
}
	?>