<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_Categories');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$categories = $this->M_Categories->get_all();
		$data['categories'] = $categories;
		
		$this->load->view('welcome_message', $data);
	}
}
