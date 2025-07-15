<?php 

defined('BASEPATH') OR exit('No direct script allowed');

class News extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index()
	{
		$this->load->helper('url');
		redirect('news/admin/all');
	}

	public function admin($slug=NULL)
	{
		if (!$this->dx_auth->is_admin()) {
			show_404();
		}

		$this->load->library('pagination');

		$this->data['news'] = null;

		$offset  = (int) $this->uri->segment(4);

		$row_count = 1; //objects per page

		$count = 0;

		if ($slug == "all") {
			$count = count($this->news_model->getNews(false));
			$p_config['base_url'] = '/news/admin/all/';
			$this->data['title'] = "Admin/All news";
			$this->data['news'] = $this->news_model->getNewsOnPage($row_count, $offset);
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
		$this->load->view('news/admin', $this->data);
		$this->load->view('templates/footer');


	}

	public function view($slug=NULL)
	{
		$this->data['news_item'] = $this->news_model->getNews($slug);
		if (empty($this->data['news_item'])) {
			show_404();
		}

		$this->data['title'] = $this->data['news_item']['title'];
		$this->data['content'] = $this->data['news_item']['text'];
		$this->data['time'] = $this->data['news_item']['time_added'];

		$this->load->view('templates/header', $this->data);
		$this->load->view('news/view', $this->data);
		$this->load->view('templates/footer');
	}

	public function type($slug=NULL)
		{
			$this->load->library('pagination');

			$this->data['news_data'] = null;

			$offset  = (int) $this->uri->segment(4);

			$row_count = 1; //objects per page

			$count = 0;

			if ($slug == "all") {
				$count = count($this->news_model->getNews(false));
				$p_config['base_url'] = '/news/type/all/';
				$this->data['title'] = "All news";
				$this->data['news_data'] = $this->news_model->getNewsOnPage($row_count, $offset);
			}

			if($this->data['news_data'] == null) {
				echo "LOL KEK CHEBUREK";
			}

			// Pagination config
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
			$this->load->view('news/type', $this->data);
			$this->load->view('templates/footer');
		}

	public function create()
	{
		if (!$this->dx_auth->is_admin()) {
			show_404();
		}
		$this->data['title'] = "Add news";

		if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text') && $this->input->post('time_added')) {
			
			$slug = $this->input->post('slug');
			$title = $this->input->post('title');
			$text = $this->input->post('text');
			$time_added = $this->input->post('time_added');

			if ($this->news_model->setNews($slug, $title, $text, $time_added)) {
				$this->load->view('templates/header', $this->data);
				$this->load->view('news/success', $this->data);
				$this->load->view('templates/footer');
			}
		} else {
			$this->load->view('templates/header', $this->data);
			$this->load->view('news/create', $this->data);
			$this->load->view('templates/footer');	
		}

	}

	public function edit($slug=NULL)
	{
		if (!$this->dx_auth->is_admin()) {
			show_404();
		}
		$this->data['title'] = "Edit an article";
		$this->data['news_item'] = $this->news_model->getNews($slug);

		// if (empty($data['news_item'])) {
		// 	show_404();
		// }

		$this->data['title_news'] = $this->data['news_item']['title'];
		$this->data['content_news'] = $this->data['news_item']['text'];
		$this->data['slug_news'] = $this->data['news_item']['slug'];
		$this->data['time_news'] = $this->data['news_item']['time_added'];

		if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text') && $this->input->post('time_added')) {
			$slug = $this->input->post('slug');
			$title = $this->input->post('title');
			$text = $this->input->post('text');
			$time_added = $this->input->post('time_added');

			if ($this->news_model->updateNews($slug, $title, $text, $time_added)) {
				echo "News was updated successfully";
			}
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('news/edit', $this->data);
		$this->load->view('templates/footer');
	}

	public function delete($slug=NULL)
	{
		if (!$this->dx_auth->is_admin()) {
			show_404();
		}
		$this->data['news_delete'] = $this->news_model->getNews($slug);

		if (empty($this->data['news_delete'])) {
			show_404();
		}

		$this->data['title'] = "Delete news";

		$this->data['result'] = "Error accured while deleting ".$this->data['news_delete']['title'];

		if ($this->news_model->deleteNews($slug)) {
			$this->data['result'] = $this->data['news_delete']['title']." was deleted successfully!";
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('news/delete', $this->data);
		$this->load->view('templates/footer');
	}
}