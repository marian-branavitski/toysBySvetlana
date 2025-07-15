<?php

	/**
	 * My own controller
	 */
	class MY_Controller extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

			$this->data['title'] = "Toys by Svetlana";
			
			$this->load->model('news_model');
			$this->data['news'] = $this->news_model->getNews();
		}
	}