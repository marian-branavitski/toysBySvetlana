<?php 
	
	defined('BASEPATH') OR exit('No direct script allowed');

	/**
	 * Main
	 */
	class Main extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->data['title'] = "Main";

			$this->load->model('toys_model');
			$this->data['toys'] = $this->toys_model->getToys(4);
			$this->data['one_toy'] = $this->toys_model->getToys(1, false);
			$this->data['slider_toys'] = $this->toys_model->getOldToys(4);

			$this->load->model('posts_model');
			$this->data['posts'] = $this->posts_model->getLatestPosts(2);

			$this->load->model('about_model');
			$this->data['about_info'] = $this->about_model->getInfo(); 
			
			$this->load->view('templates/header', $this->data);
			$this->load->view('main/index', $this->data);
			$this->load->view('templates/footer');
		}
	}