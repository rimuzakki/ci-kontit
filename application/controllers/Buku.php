<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	var $data = array();

	function __construct() {
		parent:: __construct();

		$this->load->helper('form');
		$this->load->helper('url');

		$this->data['opt_kategori'] = array('' => '-Pilih salah satu -',
											'novel' => 'Novel',
											'komik' => 'Komik',
											'kamus' => 'Kamus',
											'Teknologi' => 'Teknologi');

		$this->load->model('Buku_m');
		// load lib form validation
		$this->load->library('form_validation');

		// load lib pagination
		$this->load->library('pagination');
	}

	function index() {
		$config = array();
		$config["base_url"] = base_url() . "buku/index";
		$config["total rows"] = $this->Buku_m->jml_Buku();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this_.data["links"] = $this->pagination->create->create_links();

		// $this->add_new();
		$this->data['query'] = $this->Buku_m->get_records(null, null, $config["per_page"], $page);
		$this->load->view('buku_v', $this->data);
		// $this->load->view('welcome_message');
	}

	function add_new() {
		$this->data['is_update'] = 0;
		$this->load->view('buku_form_v', $this->data);
	}

	function save($is_update=0) {
		$data['judul']		= $this->input->post('judul', true);
		$data['pengarang']		= $this->input->post('pengarang', true);
		$data['kategori']		= $this->input->post('kategori', true);

		if($is_update == 0) {
			// jika tambah data baru
			if($this->Buku_m->insert($data))
				redirect('buku');
		}
		else {
			// jika update data
			$id = $this->input->post('id');

			if ($this->Buku_m->update_by_id($data, $id)) 
				redirect('buku');
		}
	}

	function edit($id) {
		$this->data['query'] = $this->Buku_m->get_records("ID_Buku = '$id'");

		$this->data['is_update'] = 1;

		$this->load->view('buku_form_v', $this->data);
	}

	function delete($id) {
		if($this->Buku_m->delete_by_id($id)) {
			redirect('buku');
		}
	}

	function check() {
		$this->form_validation->set_rules('id', 'ID', 'trim');
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

		$this->form_validation->set_message('required', 'Data {field} harus diisi.');
		$this->form_validation->set_error_delimiters('<div style="color: red;">', '</div></br>');

		if ($this->form_validation->run()==true) {
			$this->save($this->input->post('is_update', true));
		} else {
			$this->data['is_update'] = $this->input->post('is_update', true);
			$this->load->view('buku_form_v', $this->data);
		}
	}
	
}
