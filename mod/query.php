<?php
$param2 = $_GET['sel'];
	
	$param= $_GET['cari'];
echo "select * from tb_makanan where toko like'%".$param."%' order by ".$param2." desc LIMIT 4";