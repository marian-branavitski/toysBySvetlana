<?php 

	/**
	 * Admin for toys 
	 */
	class Toys extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('toys_model');
		}

		public function index()
		{
			$this->load->helper('url');
			redirect('/toys/admin/all/');
		}

		public function admin($slug=NULL)
		{
			if (!$this->dx_auth->is_admin()) {
				show_404();
			}
			
			$this->data['toys'] = null;

			$offset = (int) $this->uri->segment(4);
			$row_count = 2;

			$this->load->library('pagination');

			if ($slug == "all") {
				$count = count($this->toys_model->getToysUnlimited(false));
				$p_config['base_url'] = '/toys/admin/all/';
				$this->data['toys'] = $this->toys_model->getAllToysOnPage($row_count, $offset);
				$this->data['title'] = 'Admin/All toys';
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
			$this->load->view('toys/admin', $this->data);
			$this->load->view('templates/footer');
		}

		public function view($slug=NULL)
		{
			$this->load->model('type_model');
			$this->data['toys_item'] = $this->toys_model->getToysUnlimited($slug);
			$category_id = $this->data['toys_item']['category_id'];
			if (empty($this->data['toys_item'])) {
				show_404();
			}
			
			$this->data['img'] = $this->data['toys_item']['img'];
			$this->data['title'] = $this->data['toys_item']['name'];
			$this->data['content'] = $this->data['toys_item']['description'];
			$this->data['type'] = $this->data['toys_item']['category_id'];
			$this->data['time'] = $this->data['toys_item']['time_added'];

			$this->data['type_name'] = $this->type_model->getType($category_id);

			$this->load->view('templates/header', $this->data);
			$this->load->view('toys/view', $this->data);
			$this->load->view('templates/footer');
		}

		public function type($slug=NULL)
		{
			$this->load->library('pagination');

			$this->data['toys_data'] = null;

			$offset  = (int) $this->uri->segment(4);

			$row_count = 2; //objects(toys) per page

			$count = 0;

			if ($slug == "all") {
				$count = count($this->toys_model->getToys(20, false));
				$p_config['base_url'] = '/toys/type/all/';
				$this->data['title'] = "All toys";
				$this->data['toys_data'] = $this->toys_model->getAllToysOnPage($row_count, $offset);
			}

			if ($slug == 'rabbits') {
				$count = count($this->toys_model->getToysByCategory(20, 1, false));
				$p_config['base_url'] = '/toys/type/rabbits/';
				$this->data['title'] = "Handmade Rabbits";
				$this->data['toys_data'] = $this->toys_model->getToysOnPage($row_count, $offset, 1);
			}

			if ($slug == 'bears') {
				$count = count($this->toys_model->getToysByCategory(20, 2, false));
				$p_config['base_url'] = '/toys/type/bears/';
				$this->data['title'] = "Handmade Bears";
				$this->data['toys_data'] = $this->toys_model->getToysOnPage($row_count, $offset, 2);
			}

			if ($slug == 'other') {
				$count = count($this->data['toys_data'] = $this->toys_model->getToysByCategory(20, 3, false));
				$p_config['base_url'] = '/toys/type/other';
				$this->data['title'] = "Other";
				$this->data['toys_data'] = $this->toys_model->getToysOnPage($row_count, $offset, 3);
			}


			if($this->data['toys_data'] == null) {
				show_404();
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
			$this->load->view('toys/type', $this->data);
			$this->load->view('templates/footer');
		}

		public function create()
		{
			if (!$this->dx_auth->is_admin()) {
				show_404();
			}
			$this->data['title'] = 'Add a toy';

			if ($this->input->post('slug') && $this->input->post('name') && $this->input->post('description') && $this->input->post('category_id') && $this->input->post('time_added') && !empty($_FILES['img'])) {
				
				//Adding image
				$f_name = $_FILES['img']['name']; 
				$target_dir = dirname(__FILE__) . '\..\..\upload\\';
				$target_file = $target_dir . basename($_FILES["img"]["name"]);

				$img = '/upload/' . basename($_FILES["img"]["name"]);

				$temp_name = $_FILES['img']['tmp_name'];
				
				//Select file type
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				//Valid file extensions
				$extensions_arr = array("jpg","jpeg","png","gif");
				//Check extension
				if (in_array($imageFileType, $extensions_arr)) {
					move_uploaded_file($temp_name, $target_file);					
				}

				$slug = $this->input->post('slug');
				$name = $this->input->post('name');
				$description = $this->input->post('description');
				$category_id = $this->input->post('category_id');
				$time_added = $this->input->post('time_added');

				if ($this->toys_model->setToys($slug, $name, $img, $description, $category_id, $time_added)) {
					$this->load->view('templates/header', $this->data);
					$this->load->view('toys/success', $this->data);
					$this->load->view('templates/footer');
				}
			} else {
				$this->load->view('templates/header', $this->data);
				$this->load->view('toys/create', $this->data);
				$this->load->view('templates/footer');
			}
		}

		public function edit($slug=NULL)
		{
			if (!$this->dx_auth->is_admin()) {
				show_404();
			}
			$this->data['title'] = "Edit a toy";
			$this->data['toys_item'] = $this->toys_model->getToysUnlimited($slug);

			$this->data['name_toy'] = $this->data['toys_item']['name'];
			$this->data['slug_toy'] = $this->data['toys_item']['slug'];
			$this->data['img_toy'] = $this->data['toys_item']['img'];
			$this->data['about_toy'] = $this->data['toys_item']['description'];
			$this->data['category_toy'] = $this->data['toys_item']['category_id'];
			$this->data['time_toy'] = $this->data['toys_item']['time_added'];

			
			if ($this->input->post('slug') && $this->input->post('name') && $this->input->post('description') && $this->input->post('category_id') && $this->input->post('time_added')) {
				//$img = "Error while loading the image";
				
				//Check if the string with image is empty
				if (!empty($_FILES['new_img'])) {
					
					$f_name = $_FILES['new_img']['name']; 
					$target_dir = dirname(__FILE__) . '\..\..\upload\\';
					$target_file = $target_dir . basename($_FILES["new_img"]["name"]);

					$img = '/upload/' . basename($_FILES["new_img"]["name"]);

					$temp_name = $_FILES['new_img']['tmp_name'];
					
					//Select file type
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					//Valid file extensions
					$extensions_arr = array("jpg","jpeg","png","gif");
					//Check extension
					if (in_array($imageFileType, $extensions_arr)) {
						move_uploaded_file($temp_name, $target_file);					
					}

				} else {
					//Cheking the input
					// img = old_img
				}	
				
				$slug = $this->input->post('slug');
				$name = $this->input->post('name');
				
				$description = $this->input->post('description');
				$category_id = $this->input->post('category_id');
				$time_added = $this->input->post('time_added');

				if ($this->toys_model->updateToys($slug, $name, $img, $description, $category_id, $time_added)) {

					$this->data['name_toy'] = $name;
					$this->data['img_toy'] = $img;
					$this->data['about_toy'] = $description;
					$this->data['category_toy'] = $category_id;
					$this->data['time_toy'] = $time_added;

					echo "Toy was edited successfully";

					$this->load->view('templates/header', $this->data);
					$this->load->view('toys/edit_success', $this->data);
					$this->load->view('templates/footer');
				}

			}
			

			$this->load->view('templates/header', $this->data);
			$this->load->view('toys/edit', $this->data);
			$this->load->view('templates/footer');
		}

		public function delete($slug=NULL)
		{
			if (!$this->dx_auth->is_admin()) {
				show_404();
			}
			$this->data['toys_delete'] = $this->toys_model->getToys(false, $slug);

			if (empty($this->data['toys_delete'])) {
				//show_404();
				echo "LOL";
			}

			$this->data['title'] = "Delete toy";
			$this->data['result'] = "Error accured while deleting ".$this->data['toys_delete']['name'];

			if ($this->toys_model->deleteToys($slug)) {
				$this->data['result'] = $this->data['toys_delete']['name']." was deleted successfully!";
			}

			$this->load->view('templates/header', $this->data);
			$this->load->view('toys/delete', $this->data);
			$this->load->view('templates/footer');
		}


	}