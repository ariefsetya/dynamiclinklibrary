<?php
include "phpcon/link.php";
$tujuan = $_GET['rpl'];
$id = $_GET['det'];

mysql_query("update buatbuku set aktif=1 where id=$id");
header("location:index.php?rpl=$tujuan");
?>