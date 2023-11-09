<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_Categories');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$categories = $this->M_Categories->get_all();

		$response = array();

		foreach($categories->result() as $hasil) {

			$response[] = array(
				'id' => $hasil->category_id,
				'kode_bahan' => $hasil->category_code,
				'nama_bahan'     => $hasil->category_name  ,
				'stock_bahan' => $hasil->quantity       
			);
		}
		
		header('Content-Type: application/json');
		echo json_encode(
			array(
				'success' => true,
				'message' => 'Get All Data Categories',
				'data'    => $response  
			)
		);
	}

}
