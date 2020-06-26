<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUsers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminUsers_model');
		$this->load->model('Me_model');

		if($this->session->userdata('logged_in') !== TRUE)
		{
			redirect('login');
		}
	}
	public function add_user()
	{
		$data['query'] = $this->AdminUsers_model->fetch_users();

		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('admin/users_index', $data);
		$this->load->view('layout/footer');
	}
	public function added_user()
	{
		if ($_POST != '') 
		{
			$this->AdminUsers_model->addUser();
			$this->session->set_flashdata('user_success', TRUE);
			redirect('AdminUsers/add_user', 'refresh');
		} 
		else 
		{
			$this->session->set_flashdata('user_err', TRUE);
			redirect('AdminUsers/add_user', 'refresh');

		}
		
		$this->AdminUsers_model->fetch_users();

	}
	//แจ้งปัญหาการใช้งานเว็บไซต์
	public function report()
	{
		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('report');
		$this->load->view('layout/footer');
	}
	public function reported()
	{
		$this->Me_model->reported();
		$this->session->set_flashdata('save_success', TRUE);
		redirect('AdminUsers/report', 'refresh');
	}
}

/* End of file AdminUsers.php */
/* Location: ./application/controllers/AdminUsers.php */