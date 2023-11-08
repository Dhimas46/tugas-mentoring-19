<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Product');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $product = $this->M_Product->get_all();

        $response = array();

        foreach($product->result() as $hasil) {

            $response[] = array(
                'kode_bahan' => $hasil->kode,
                'nama_bahan'     => $hasil->nama_product  ,
				'stock_bahan' => $hasil->stock       
            );

        }
        
        header('Content-Type: application/json');
        echo json_encode(
            array(
                'success' => true,
                'message' => 'Get All Data Product',
                'data'    => $response  
            )
        );

    }
}
