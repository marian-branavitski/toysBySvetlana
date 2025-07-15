<?php 
	/**
	 * Posts_model
	 */
	class Posts_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}

		public function getPosts($slug=FALSE)
		{
			if ($slug === FALSE) {
				$query = $this->db->get('posts');
				return $query->result_array();
			}

			$query = $this->db->get_where('posts', array('slug'=>$slug));
			return $query->row_array();
		}

		public function getLatestPosts($limit=2)
		{
			$query = $this->db
				->limit($limit)
				->order_by('time_added', 'desc')
				->get('posts');

			return $query->result_array();
		}

		public function getPostsOnPage($row_count, $offset)
		{
			$query = $this->db
				->order_by('time_added', 'desc')
				->get('posts', $row_count, $offset);
				
			return $query->result_array();
		}

		public function setPosts($slug, $title, $text, $time_added)
		{
			$data = array(
				'slug' => $slug,
				'title' => $title,
				'text' => $text,
				'time_added' => $time_added
			);

			return $this->db->insert('posts', $data);
			echo $this->db->last_query();
		}

		public function updatePosts($title, $text, $slug, $time_added)
		{
			$data = array(
				'title' => $title,
				'text' => $text,
				'slug' => $slug,
				'time_added' => $time_added 
			);

			return $this->db->update('posts', $data, array('slug' => $slug));
		}

		public function deletePosts($slug)
		{
			return $this->db->delete('posts', array('slug' => $slug));
		}
	}