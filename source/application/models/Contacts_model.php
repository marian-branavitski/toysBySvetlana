<?php 

class Contacts_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function getUserEmailAdress($username)
	{
		$query = $this->db
			->where('username', $username)
			->get('users');

		return $query->result_array();
	}
}