<?php 
	defined('BASEPATH') OR exit('No direct script allowed');

	class Posts extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('posts_model');
		}

		public function index()
		{
			$this->load->helper('url');
			redirect('/posts/admin/all');
		}

		public function admin($slug=NULL)
		{
			if (!$this->dx_auth->is_admin()) {
				show_404();
			}
			
			$this->data['posts'] = null;

			$offset = (int) $this->uri->segment(4);
			$row_count = 2;

			$this->load->library('pagination');

			if ($slug == "all") {
				$count = count($this->posts_model->getPosts(false));
				$p_config['base_url'] = '/posts/admin/all/';
				$this->data['posts'] = $this->posts_model->getPostsOnPage($row_count, $offset);
				$this->data['title'] = 'Admin/All important noticies';
			}
	

			$p_config['total_rows'] = $count;
			$p_config['per_page'] = $row_count;

			$p_config['full_tag_open'] = "<ul class='pagination'>";
			$p_config['full_tag_close'] ="</ul>";
			$p_config['num_tag_open'] = '<li>';
			$p_config['num_tag_close'] = '</li>';
			$p_config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$p_config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$p_config['next_tag_open'] = "<li>";
			$p_config['next_tagl_close'] = "</li>";
			$p_config['prev_tag_open'] = "<li>";
			$p_config['prev_tagl_close'] = "</li>";
			$p_config['first_tag_open'] = "<li>";
			$p_config['first_tagl_close'] = "</li>";
			$p_config['last_tag_open'] = "<li>";
			$p_config['last_tagl_close'] = "</li>";

			//initialise pagination
			$this->pagination->initialize($p_config);

			$this->data['pagination'] = $this->pagination->create_links();


			$this->load->view('templates/header', $this->data);
			$this->load->view('posts/admin', $this->data);
			$this->load->view('templates/footer');
		}

		public function view($slug=NULL)
		{
			$this->data['posts_item'] = $this->posts_model->getPosts($slug);

			if (empty($this->data['posts_item'])) {
			 	show_404();
			 } 

			$this->data['title'] = $this->data['posts_item']['title'];
			$this->data['text'] = $this->data['posts_item']['text'];
			$this->data['slug'] = $this->data['posts_item']['slug'];
			$this->data['time_added'] = $this->data['posts_item']['time_added'];

			$this->load->view('templates/header', $this->data);
			$this->load->view('posts/view', $this->data);
			$this->load->view('templates/footer');
		}

		public function create()
		{
			if (!$this->dx_auth->is_admin()) {
				show_404();
			}
			$this->data['title'] = "Add post";

			if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text') && $this->input->post('time_added')) {
				$slug = $this->input->post('slug');
				$title = $this->input->post('title');
				$text = $this->input->post('text');
				$time_added = $this->input->post('time_added');

				if ($this->posts_model->setPosts($slug, $title, $text, $time_added)) {
					$this->load->view('templates/header', $this->data);
					$this->load->view('posts/success', $this->data);
					$this->load->view('templates/footer');
				}
			} else {
				$this->load->view('templates/header', $this->data);
				$this->load->view('posts/create', $this->data);
				$this->load->view('templates/footer');
			} 
			
		}

		public function edit($slug=NULL)
		{
			if (!$this->dx_auth->is_admin()) {
				show_404();
			}
			$this->data['title'] = "Edit a post";
			$this->data['post_item'] = $this->posts_model->getPosts($slug);

			if (empty($this->data['post_item'])) {
				//show_404();
				echo "LOL";
			}

			$this->data['post_title'] = $this->data['post_item']['title'];
			$this->data['post_text'] = $this->data['post_item']['text'];
			$this->data['post_slug'] = $this->data['post_item']['slug'];
			$this->data['post_time'] = $this->data['post_item']['time_added'];

			if ($this->input->post('title') && $this->input->post('text') && $this->input->post('slug') && $this->input->post('time_added')) {
				$title = $this->input->post('title');
				$text = $this->input->post('text');
				$slug = $this->input->post('slug');
				$time_added = $this->input->post('time_added');

				if ($this->posts_model->updatePosts($title, $text, $slug, $time_added)) {
					echo "Success !";
				}
			} 
			
			$this->load->view('templates/header', $this->data);
			$this->load->view('posts/edit', $this->data);
			$this->load->view('templates/footer');
			
		}

		public function delete($slug=NULL)
		{
			if (!$this->dx_auth->is_admin()) {
				show_404();
			}
			$this->data['posts_delete'] = $this->posts_model->getPosts($slug);
			
			if (empty($this->data['posts_delete'])) {
				echo "HA LOH";
			}

			$this->data['title'] = "Delete post";

			$this->data['result'] = "Error has encountered while deleting ".$this->data['posts_delete']['title'];

			if ($this->posts_model->deletePosts($slug)) {
				$this->data['result'] = $this->data['posts_delete']['title']." was successfully deleted";
			}

			$this->load->view('templates/header', $this->data);
			$this->load->view('posts/delete', $this->data);
			$this->load->view('templates/footer');
		}
	}