<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Categories extends CI_Model {

	
	public function get_all()
	{
		$query = $this->db->get("categories");
		return $query->result();
	}
	
}
