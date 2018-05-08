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
	}
?>