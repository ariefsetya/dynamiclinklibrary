<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<?php
if(isset($_GET['rpl']))
	{
	if($_GET['hal']=="daftar")
		{
		include "anggota/daftar_baru.php";
		}
	else if($_GET['hal']=="ubah")
		{
		include "anggota/ubah.php";
		}
	else if($_GET['hal']=="detail")
		{
		include "anggota/detail.php";
		}
	else if($_GET['hal']=="hapus")
		{
		include "anggota/hapus.php";
		}
	else
		{
		include "anggota/all.php";
		}

	}

?>