<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Product extends CI_Model {

    /**
     * Get All Data Siswa
     */
    public function get_all()
    {
        $this->db->select("*");
        $this->db->from("products");
        // $this->db->order_by("id_siswa", "DESC");
        return $this->db->get();
    }
	public function delete_product($product_id)
    {
        $this->db->where('id', $product_id);
        $this->db->delete('products');
        return true; 
    }

	public function insert_product($data) {
        $this->db->insert('products', $data);
        return $this->db->affected_rows() > 0;
    }
	public function get_product_ingredients($product_id)
{
    $this->db->select('*');
    $this->db->from('product_ingredients');
    $this->db->where('product_id', $product_id);
    $query = $this->db->get();

    return $query->result();
}


  

}
