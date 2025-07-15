<?php 

class Type_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function getType($category_id)
	{
		$query = $this->db
			->where('id', $category_id)
			->get('categories');

		return $query->result_array();
	}
}