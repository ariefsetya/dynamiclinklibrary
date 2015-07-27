<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
<h2>Hak Penulis</h2>
<div style="font-size:20pt;line-height:29px;">
<i class="icon-award-fill">Penulis dapat menulis Artikel dan Status</i><br>
<i class="icon-award-stroke">Penulis dapat memberi komentar Artikel dan Status</i><br>
<i class="icon-award-fill">Penulis dapat memberi rating Artikel</i><br>
<i class="icon-award-stroke">Penulis dapat menyukai Artikel dan Status</i><br>
<i class="icon-award-fill">Penulis dapat mengelola Artikel dan Statusnya sendiri</i><br>
</div>