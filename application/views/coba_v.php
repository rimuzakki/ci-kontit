<?php
	
	foreach ($buku->result() as $row) {
		echo $row->judul."-".$row->pengarang."-".$row->kategori."<br>";
	}

?>