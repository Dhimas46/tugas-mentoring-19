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

  

}
