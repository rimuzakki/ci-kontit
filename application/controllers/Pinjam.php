<?php
	class Pinjam extends CI_Controller
	{
		var $data = array();
		function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->model('anggota_m');
			$this->load->model('buku_m');
			$this->load->model('pinjam_m');	
			// load lib form validation
			$this->load->library('form_validation');
		}
		public function index()
		{
			$this->data['anggota'] = $this->anggota_m->opt_Anggota();
			$this->data['buku'] = $this->buku_m->opt_Buku();
			$this->load->view('pinjam_v', $this->data);
		}
		function save()
		{
			$data['id_anggota']		= $this->input->post('id_anggota', true);
			$data['id_buku']		= $this->input->post('id_buku', true);
			$data['tgl_pinjam']		= $this->input->post('tgl_pinjam', true);
			$data['tgl_kembali']	= $this->input->post('tgl_kembali', true);

			if($this->pinjam_m->insert($data))
				redirect('perpus');
		}

		function check() 
		{
			$this->form_validation->set_rules('id_buku', 'ID Buku', 'trim');
			$this->form_validation->set_rules('id_anggota', 'ID Anggota', 'trim');
			$this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'trim|required');
			$this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'trim|required');

			$this->form_validation->set_message('required', 'Data {field} harus diisi.');
			$this->form_validation->set_error_delimiters('<div style="color: red;">', '</div></br>');

			if ($this->form_validation->run()==true) {
				$this->save($this->input->post('is_update', true));
			} else {
				$this->data['is_update'] = $this->input->post('is_update', true);
				$this->load->view('pinjam_v', $this->data);
			}
		}
	}
?>