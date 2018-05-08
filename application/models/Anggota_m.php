<?php
	
	class Anggota_m extends CI_Model {
		function __construct() {
			parent:: __construct();
		}

		function get_records($criteria='', $order='', $limit='', $offset=0) {
			$this->db->select('*');

			$this->db->from('mst_anggota');

			if($criteria !='')
				$this->db->where($criteria);

			if($order !='')
				$this->db->order_by($order);

			if($limit !='')
				$this->db->limit($limit. $offset);

			$query = $this->db->get();

			return $query;
		}

		function insert($data) {
			$query = $this->db->insert('mst_anggota', $data);

			return $query;
		}

		function update_by_id($data, $id) {
			$this->db->where("id_anggota = '$id'");

			$query = $this->db->update('mst_anggota', $data);

			return $query;
		}

		function delete_by_id($id) {
			$query = $this->db->delete('mst_anggota', "id_anggota = '$id'");

			return $query;
		}

		function opt_Anggota() {
			$this->db->select('id_anggota, nim, nama');
			$this->db->from('mst_anggota');
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				$rowAnggota[$row->id_anggota] = $row->nim." - ".$row->nama;
			}
			return $rowAnggota;
		}
	}
?>