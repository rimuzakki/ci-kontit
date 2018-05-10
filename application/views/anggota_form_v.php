<?php
	
	if (!empty($query)) {
		$row = $query->row_array();
	} 
	else {
		$row['id_anggota'] = '';
		$row['nim'] = '';
		$row['nama'] = '';
		$row['progdi'] = '';
	}

	// echo form_open('anggota/save/'.$is_update);

	// echo form_hidden('id',$row['id_anggota']);

	echo validation_errors();
	echo form_open('anggota/check');
	echo form_hidden('id', set_value('id', $row['id_anggota']));
	echo form_hidden('is_update', $is_update);

	echo "Nim : ".form_input('nim', set_value('nim', $row['nim']),"size='50' maxlength='100'");
	echo "<br><br>";

	echo "Nama : ".form_input('nama', set_value('nama', $row['nama']),"size='50' maxlength='150'");
	echo "<br><br>";

	echo "Progdi : ".form_dropdown('progdi', $opt_kategori, set_value('progdi', $row['progdi']));
	echo "<br><br>";

	echo form_submit('btn_simpan', 'Simpan');

	echo form_close();

?>