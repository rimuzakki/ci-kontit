<?php

class Perpus extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('perpus_v');
	}
}
?>