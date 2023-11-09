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
				'id' => $hasil->product_id,
                'kode_bahan' => $hasil->product_code,
                'nama_bahan'     => $hasil->product_name  ,
				'stock_bahan' => $hasil->quantity       
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

	public function create()
	{
		$this->load->model('M_Product'); 
	
		$this->form_validation->set_rules('kode_bahan', 'Kode Bahan', 'required|max_length[255]');
		$this->form_validation->set_rules('product_name', 'Nama Produk', 'required|max_length[255]');
		$this->form_validation->set_rules('category_id', 'Kategori Produk', 'required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'max_length[1000]');

		if ($this->form_validation->run() == FALSE) {
			$errorMessage = strip_tags(validation_errors());
			$response = array(
				'success' => false,
				'message' => $errorMessage
			);
			echo json_encode($response);
		} else {
			$kodeProduk = $this->input->post('kode_bahan');
			$namaProduk = $this->input->post('product_name');
			$kategoriProduk = $this->input->post('category_id');
			$quantity = $this->input->post('quantity');
			$deskripsi = $this->input->post('deskripsi');
	
			$data = array(
				'product_code' => $kodeProduk,
				'product_name' => $namaProduk,
				'category_id' => $kategoriProduk,
				'quantity' => $quantity,
				'description' => $deskripsi
			);
	
			$inserted = $this->M_Product->insert_product($data);
	
			if ($inserted) {
				$response = array(
					'success' => true,
					'message' => 'Data berhasil disimpan',
					'data' => $data
				);
				echo json_encode($response);
			} else {
				$response = array(
					'success' => false,
					'message' => 'Gagal menyimpan data'
				);
				echo json_encode($response);
			}
		}
	}

	public function ingredients($id)
{
    // Memuat model M_ProductIngredients
    $this->load->model('M_Product');
    
    // Mendapatkan data product ingredients berdasarkan product_id
    $ingredients = $this->M_Product->get_product_ingredients($id);
    
    if ($ingredients) {
        // Jika data ditemukan, mengirim respons sukses
        $response = array(
            'success' => true,
            'message' => 'Get Ingredients Data Successfully',
            'data'    => $ingredients
        );
    } else {
        // Jika data tidak ditemukan, mengirim respons error
        $response = array(
            'success' => false,
            'message' => 'No Ingredients Data Found'
        );
    }

    // Mengirim respons dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

	


	public function destroy($product_id)
	{
		$result = $this->M_Product->delete_product($product_id);

		if ($result) {
			$response = array(
				'success' => true,
				'message' => 'Product has been deleted successfully'
			);
		} else {
			$response = array(
				'success' => false,
				'message' => 'Failed to delete product'
			);
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}

}
