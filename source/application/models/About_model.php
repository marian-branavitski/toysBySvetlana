<?php 
 /**
  * 
  */
 class About_model extends CI_Model
 {
 	
 	public function __construct()
 	{
 		$this->load->database();
 	}

 	public function getInfo($id=FALSE)
 	{
 		if ($id === FALSE) {
 			$query = $this->db->get('about');
 			return $query->result_array();
 		}

 		$query = $this->db->get_where('about', array('id'=>$id));
		return $query->row_array();
 		
 	}

 	public function updateAbout($title, $text, $home_page_text, $time_added, $id)
 	{
 		$data = array(
 			'title' => $title,
 			'text' => $text,
            'home_page_text' => $home_page_text,
 			'time_added' => $time_added
 		);

 		return $this->db->update('about', $data, array('id' => $id));
 	}
 }