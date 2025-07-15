<?php 

	/**
	 * 
	 */
	class Toys_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}

		public function getToys($limit=2, $slug=FALSE)
		{
			if ($slug == FALSE) {
				$query = $this->db
					->order_by('time_added', 'desc')
					->limit($limit)
					->get('toys');
				return $query->result_array();
			}

			$query = $this->db->get_where('toys', array('slug'=>$slug));
			return $query->row_array();
			
		}

		public function getOldToys($limit=1)
		{
			$query = $this->db
				->order_by('time_added', 'asc')
				->limit($limit)
				->get('toys');

			return $query->result_array();
		}

		public function getToysUnlimited($slug=FALSE)
		{
			if ($slug === FALSE) {
				$query = $this->db->get('toys');
				return $query->result_array();
			}

			$query = $this->db->get_where('toys', array('slug'=>$slug));
			return $query->row_array();
		}

		public function getToysByCategory($limit=20, $category=1, $slug=FALSE)
		{
			if ($slug === FALSE) {
				$query = $this->db
					->where('category_id', $category)
					->order_by('time_added', 'desc')
					->limit($limit)
					->get('toys');

				return $query->result_array();
			}
		}

		public function getToysOnPage($row_count, $offset, $type = 1)
		{
			$query = $this->db
				->where('category_id', $type)
				->order_by('time_added', 'desc')
				->get('toys', $row_count, $offset);

			return $query->result_array();
		}

		public function getAllToysOnPage($row_count, $offset)
		{
			$query = $this->db
				->order_by('time_added', 'desc')
				->get('toys', $row_count, $offset);

			return $query->result_array();
		}

		public function setToys($slug, $name, $img, $description, $category_id, $time_added)
		{
			$data = array(
				'slug' => $slug,
				'name' => $name,
				'img' => $img,
				'description' => $description,
				'category_id' => $category_id,
				'time_added' => $time_added 
			);

			return $this->db->insert('toys', $data);
		}

		public function updateToys($slug, $name, $img, $description, $category_id, $time_added)
		{
			$data = array(
				'slug' => $slug,
				'name' => $name,
				'img' => $img,
				'description' => $description,
				'category_id' => $category_id,
				'time_added' => $time_added 
			);

			return $this->db->update('toys', $data, array('slug' => $slug));
		}

		public function deleteToys($slug)
		{
			return $this->db->delete('toys', array('slug' => $slug));
		}
	}