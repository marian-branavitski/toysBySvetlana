<?php 

class News_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function getNews($slug=FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db
				->order_by('time_added', 'desc')
				->get('news');
			return $query->result_array();
		}

		$query = $this->db->get_where('news', array('slug'=>$slug));
		return $query->row_array();
	}


	public function getNewsOnPage($row_count, $offset)
	{
		$query = $this->db
			->order_by('time_added', 'desc')
			->get('news', $row_count, $offset);
			
		return $query->result_array();
	}

	public function setNews($slug, $title, $text, $time_added)
	{
		$data = array(
			'title' => $title,
			'slug' => $slug,
			'text' => $text,
			'time_added' => $time_added
		);

		return $this->db->insert('news', $data);
	}

	public function updateNews($slug, $title, $text, $time_added)
	{
		$data = array(
			'title' => $title,
			'slug' => $slug,
			'text' => $text,
			'time_added' => $time_added
		);

		return $this->db->update('news', $data, array('slug' => $slug));
	}

	public function deleteNews($slug)
	{
		return $this->db->delete('news', array('slug' => $slug));
	}

	public function getLimitedNews($limit=2)
	{
		$query = $this->db
			->order_by('time_added', 'text')
			->limit($limit)
			->get('news');
		return $query->result_array();
		
	}
}