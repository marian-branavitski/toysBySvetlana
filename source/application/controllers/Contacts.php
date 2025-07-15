<?php 

defined('BASEPATH') OR exit('No direct script allowed');

class Contacts extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('contacts_model');
	}

	public function index()
	{
		$this->load->model('dx_auth/users');

		$this->data['title'] = "Contacts";

		if ($this->dx_auth->is_logged_in()) {
			$username = $this->dx_auth->get_username();
			$this->data['user_item'] = $this->contacts_model->getUserEmailAdress($username);
			$this->data['admin_item'] = $this->users->getAdmin(2);

			$this->data['user_adress'] = $this->data['user_item']['0']['email'];
			$this->data['admin_adress'] = $this->data['admin_item']['0']['email'];
		} 

		$this->load->view('templates/header', $this->data);
		$this->load->view('contacts/contacts', $this->data);
		$this->load->view('templates/footer');
	}
}