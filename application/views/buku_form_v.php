<?php
	
	if (!empty($query)) {
		$row = $query->row_array();
	} 
	else {
		$row['id_buku'] = '';
		$row['judul'] = '';
		$row['pengarang'] = '';
		$row['kategori'] = '';
	}

	echo form_open('buku/save/'.$is_update);

	echo form_hidden('id',$row['id_buku']);

	echo "Judul : ".form_input('judul',$row['judul'],"size='50' maxlength='100'");
	echo "<br><br>";

	echo "Pengarang : ".form_input('pengarang',$row['pengarang'],"size='50' maxlength='150'");
	echo "<br><br>";

	echo "Kategori : ".form_dropdown('kategori', $opt_kategori,$row['kategori']);
	echo "<br><br>";

	echo form_submit('btn_simpan', 'Simpan');

	echo form_close();
	

?>