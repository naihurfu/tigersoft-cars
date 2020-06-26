<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Check_model');

		if($this->session->userdata('logged_in') !== TRUE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['query'] = $this->Check_model->fetch_cars();

		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('cars/check', $data);
		$this->load->view('layout/footer');
	}

	public function checked()
	{
		$id = $this->input->post('cID');
		//เช็คซ้ำข้อมูล
		$this->db->where('chk_cid', $id);
		$this->db->from("cars_check");
		$num = $this->db->count_all_results();

		if ($num == 1) 
		{
			$this->Check_model->insert_cars();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('Check/index', 'refresh');
		} 
		else 
		{
			$this->session->set_flashdata('cannot', TRUE);
			redirect('Check/index', 'refresh');
		}

	}

}

/* End of file Check.php */
/* Location: ./application/controllers/Check.php */