<?php	
	echo anchor('buku/add_new','Tambah Buku');
?>
	<br><br>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Pengarang</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>

		<?php
		$no = 0;
		foreach($query->result_array() as $row) {
			$no++;
			$kategori = $row['kategori'];

			$link_edit = anchor('buku/edit/'.$row['id_buku'], 'Edit');
			$link_delete = anchor('buku/delete/'.$row['id_buku'], 'Hapus', "onclick='return confirm(\"Yakin?\")'");
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['judul']; ?></td>
			<td><?php echo $row['pengarang']; ?></td>
			<td><?php echo $opt_kategori[$kategori]; ?></td>
			<td><?php echo $link_edit.''.$link_delete; ?></td>
		</tr>
		<?php
		}
		?>
	</table>