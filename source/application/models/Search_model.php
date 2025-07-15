<?php 
	
	class Search_model extends CI_Model
	{
		public function search($q, $row_count, $offset)
		{
			$array_search = array(
				'name' => $q,
				'description' => $q,
				'slug' => $q,
			);

			$query = $this->db
				->or_like($array_search)
				->order_by('time_added', 'desc')
				->get('toys', $row_count, $offset);

			return $query->result_array(); 
		}
	}