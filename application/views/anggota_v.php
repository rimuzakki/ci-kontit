<?php	
	echo anchor('anggota/add_new','Tambah Anggota');
?>
	<br><br>
	<table border="1">
		<tr>
			<th>No</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Progdi</th>
			<th>Aksi</th>
		</tr>

		<?php
		$no = 0;
		foreach($query->result_array() as $row) {
			$no++;
			$progdi = $row['progdi'];

			$link_edit = anchor('anggota/edit/'.$row['id_anggota'], 'Edit');
			$link_delete = anchor('anggota/delete/'.$row['id_anggota'], 'Hapus', "onclick='return confirm(\"Yakin?\")'");
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['nim']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $opt_kategori[$progdi]; ?></td>
			<td><?php echo $link_edit.''.$link_delete; ?></td>
		</tr>
		<?php
		}
		?>
	</table>
	<p><?php echo $links; ?></p>
	<br>
	<a href="<?php  echo base_url();?>">Kembali</a>