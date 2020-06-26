<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model');

		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
	}

	public function index()
	{
		$result = [];
		$result['data'] 	= $this->Welcome_model->get_cars();

		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();
		
		$tickets = $this->Welcome_model->getAllTicket();
		foreach($tickets as $row) {
            $data['label'][] = $row->eEmpId.' '.$row->eFirstName;
			$data['data'][] = $row->Total;
			$data['fName'][] = $row->eFirstName;
		}
		$result['chart_data'] = json_encode($data);

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('dashboard', $result);
		$this->load->view('layout/footer');
	}

	public function news()
	{
		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('news');
		$this->load->view('layout/footer');
	}

	public function contact()
	{
		$data['data'] = $this->Welcome_model->contactData();
		
		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('contact', $data);
		$this->load->view('layout/footer');
	}
}