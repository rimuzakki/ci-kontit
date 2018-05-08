<?php
	
	class Buku_m extends CI_Model {
		function __construct() {
			parent:: __construct();
		}

		function get_records($criteria='', $order='', $limit='', $offset=0) {
			$this->db->select('*');

			$this->db->from('mst_buku');

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
			$query = $this->db->insert('mst_buku', $data);

			return $query;
		}

		function update_by_id($data, $id) {
			$this->db->where("id_buku = '$id'");

			$query = $this->db->update('mst_buku', $data);

			return $query;
		}

		function delete_by_id($id) {
			$query = $this->db->delete('mst_buku', "id_buku = '$id'");

			return $query;
		}

		function opt_Buku() {
			$this->db->select('id_buku, judul, pengarang');
			$this->db->from('mst_buku');
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				$rowBuku[$row->id_buku] = $row->judul." - ".$row->pengarang;
			}
			return $rowBuku;
		}
	}
?>