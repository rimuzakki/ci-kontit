<h2>Form Pinjam</h2>
<?php echo form_open('pinjam/save/'); ?>
Anggota : <?php echo form_dropdown('id_anggota', $anggota,''); ?>
<br><br>
Buku : <?php echo form_dropdown('id_buku', $buku,''); ?>
<br><br>
<?php
$data = array (
				'name'	=>	'tgl_pinjam',
				'type'	=>	'date'
			  );
?>
Tgl.Pinjam : <?php echo form_input($data); ?>
<br><br>
<?php
$data = array (
				'name'	=>	'tgl_kembali',
				'type'	=>	'date'
			  );
?>
Tgl.kembali : <?php echo form_input($data); ?>
<br><br>
<?php
	echo form_submit('btn_simpan', 'Simpan');
	echo form_reset('btn_batal', 'Batal');
	echo form_close();
?>