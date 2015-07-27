<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_GET['rpl'])){
	if($_GET['hal']=="naiklevel"){
		include "penulis/naiklevel.php";
	}
	else {
		include "penulis/level.php";
	}
}
	?>