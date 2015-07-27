<?php
if(!isset($_GET['rpl'])){
$a = rand();
echo "<meta http-equiv='refresh' content='0;url=../index.php?rpl=$a'>";
}
?>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,700' rel='stylesheet' type='text/css' />
	<?php
	$a = mysql_query("select*from rak order by id");
	?>
		    <div class="wrapper">
                <div id="st-accordion" class="st-accordion">
                    <ul>
					<?php
					while($row = mysql_fetch_array($a)){
					?>
                        <li>
                            <a href="#"><b><?php echo $row['nama'];?></b><span class="st-arrow">Open or Close</span></a>
                            <div class="st-content">
								<table>
									<thead>
										<td>
											No
										</td>
										<td>
											Judul
										</td>
										<td>
											Pengarang
										</td>
										<td>
											Penerbit
										</td>
										<td>
											Jumlah
										</td>
									</thead>
									<?php
									$b = 1;
									$s = mysql_query("select*from buku where rak='$row[id]'");
									while($ro = mysql_fetch_array($s)){
									?>
									<tbody>
										<td>
											<?php echo $b; ?>
										</td>
										<td>
											<a href="index.php?rpl=detail&det=<?php echo $ro['id'];?>"><?php echo $ro['Judul']; ?></a>
										</td>
										<td>
											<?php echo $ro['pengarang']; ?>
										</td>
										<td>
											<?php echo $ro['penerbit']; ?>
										</td>
										<td>
											<?php echo $ro['Jumlah']; ?>
										</td>
									</tbody>
									<?php
									$b++;
									}
									?>
								</table>
							</div>
                        </li>
						<?php
						}
						?>
                    </ul>
                </div>
            </div>
			
		<script type="text/javascript" src="js/jquery.accordion.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
			
				$('#st-accordion').accordion({
					oneOpenedItem	: true
				});
				
            });
        </script>