<?php 
	
	defined('BASEPATH') OR exit('No direct script allowed');
	
	class About extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('about_model');
		}

		public function index()
		{
			if (!$this->dx_auth->is_admin()) {
				show_404();
			}
			$this->data['title'] = 'About';
			$this->data['info'] = $this->about_model->getInfo();

			$this->load->view('templates/header', $this->data);
			$this->load->view('about/index', $this->data);
			$this->load->view('templates/footer');
		}

		public function page()
		{
			$this->data['about_item'] = $this->about_model->getInfo();

			if (empty($this->data['about_item'])) {
				echo "LOL";
			}

			$this->load->view('templates/header', $this->data);
			$this->load->view('about/page', $this->data);
			$this->load->view('templates/footer');
		}

		public function edit($id=NULL)
		{
			if (!$this->dx_auth->is_admin()) {
				show_404();
			}
			$this->data['title'] = 'Edit about page';
			$this->data['about_item'] = $this->about_model->getInfo($id);

			$this->data['about_title'] = $this->data['about_item']['title'];
			$this->data['about_text'] = $this->data['about_item']['text'];
			$this->data['about_time'] = $this->data['about_item']['time_added'];
			$this->data['about_home_page_text'] = $this->data['about_item']['home_page_text'];

			if ($this->input->post('title') && $this->input->post('text') && $this->input->post('home_page_text') && $this->input->post('time_added')) {
				$title = $this->input->post('title');
				$text = $this->input->post('text');
				$time_added = $this->input->post('time_added');
				$home_page_text = $this->input->post('home_page_text');
				$id = 1;

				if ($this->about_model->updateAbout($title, $text, $home_page_text, $time_added, $id)) {
					$this->data['about_title'] = $this->data['about_item']['title'];
					$this->data['about_text'] = $this->data['about_item']['text'];
					$this->data['about_time'] = $this->data['about_item']['time_added'];
					$this->data['about_home_page_text'] = $this->data['about_item']['home_page_text'];

					echo "About page was updated successfully";

					$this->load->view('templates/header', $this->data);
					$this->load->view('about/edit-success', $this->data);
					$this->load->view('templates/footer');					

				}
			}

			$this->load->view('templates/header', $this->data);
			$this->load->view('about/edit', $this->data);
			$this->load->view('templates/footer');
		}

	} 	