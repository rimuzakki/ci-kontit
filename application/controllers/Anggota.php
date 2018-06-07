<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	var $data = array();

	function __construct() {
		parent:: __construct();

		$this->load->helper('form');
		$this->load->helper('url');

		$this->data['opt_kategori'] = array('' => '-Pilih salah satu -',
											'Teknik Informatika' => 'Teknik Informatika',
											'Sistem Informasi' => 'Sistem Informasi',
											'Ilmu Komunikasi' => 'Ilmu Komunikasi');

		$this->load->model('Anggota_m');
		// load lib form validation
		$this->load->library('form_validation');
		// load lib pagination
		$this->load->library('pagination');

		// cek session
		if(!is_logged_in()) {
			redirect('perpus', 'refresh');
		}
	}

	public function index() {

		// pagination
		$config = array();
		$config["base_url"] = base_url() . "anggota/index";
		$config["total_rows"] = $this->Anggota_m->jml_anggota();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data["links"] = $this->pagination->create_links();

		// $this->add_new();
		$this->data['query'] = $this->Anggota_m->get_records(null, null, $config["per_page"], $page);
		$this->load->view('anggota_v', $this->data);
	}

	function add_new() {
		$this->data['is_update'] = 0;
		$this->load->view('anggota_form_v', $this->data);
	}

	function save($is_update=0) {
		$data['nim']		= $this->input->post('nim', true);
		$data['nama']		= $this->input->post('nama', true);
		$data['progdi']		= $this->input->post('progdi', true);

		if($is_update == 0) {
			// jika tambah data baru
			if($this->Anggota_m->insert($data))
				redirect('anggota');
		}
		else {
			// jika update data
			$id = $this->input->post('id');

			if ($this->Anggota_m->update_by_id($data, $id)) 
				redirect('anggota');
		}
	}

	function edit($id) {
		$this->data['query'] = $this->Anggota_m->get_records("ID_Anggota = '$id'");

		$this->data['is_update'] = 1;

		$this->load->view('anggota_form_v', $this->data);
	}

	function delete($id) {
		if($this->Anggota_m->delete_by_id($id)) {
			redirect('anggota');
		}
	}

	function check() {
		$this->form_validation->set_rules('id', 'ID', 'trim');
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Anggota', 'trim|required');
		$this->form_validation->set_rules('progdi', 'Progdi', 'trim|required');

		$this->form_validation->set_message('required', 'Data {field} harus diisi.');
		$this->form_validation->set_error_delimiters('<div style="color: red;">', '</div></br>');

		if ($this->form_validation->run()==true) {
			$this->save($this->input->post('is_update', true));
		} else {
			$this->data['is_update'] = $this->input->post('is_update', true);
			$this->load->view('anggota_form_v', $this->data);
		}
	}
	
}
