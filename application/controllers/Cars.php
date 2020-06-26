<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cars extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Carsmain_model');
		$this->load->model('Log_model');

		if($this->session->userdata('logged_in') !== TRUE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['query'] = $this->Carsmain_model->get_cars();
		
		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('cars/index', $data);
		$this->load->view('layout/footer');
	}

	public function taxUpdate()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		$id = $this->input->post('cID');
		//เช็คซ้ำข้อมูล
		$this->db->where('ct_carid', $id);
		$this->db->from("cars_tax");
		$num = $this->db->count_all_results();

		if ($num == 1) {
			$this->Carsmain_model->tax_update();
			$this->Log_model->tax_create_log();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('Cars/index', 'refresh');
		} else {
			$this->session->set_flashdata('cannot', TRUE);
			redirect('Cars/index', 'refresh');
		}
	}

	public function kmUpdate()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		$id = $this->input->post('km_cID');
		//เช็คซ้ำข้อมูล
		$this->db->where('cd_carid', $id);
		$this->db->from("cars_km");
		$num = $this->db->count_all_results();

		if ($num == 1) {
			$this->Carsmain_model->km_update();
			$this->Log_model->km_create_log();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('Cars/index', 'refresh');
		} else {
			$this->session->set_flashdata('cannot', TRUE);
			redirect('Cars/index', 'refresh');
		}
	}
	public function insrUpdate()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
 
		$id = $this->input->post('insr_cID');
		//เช็คซ้ำข้อมูล
		$this->db->where('ci_carid', $id);
		$this->db->from("cars_insr");
		$num = $this->db->count_all_results();

		if ($num == 1) {
			$this->Carsmain_model->insr_update();
			$this->Log_model->insr_create_log();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('Cars/index', 'refresh');
		} else {
			$this->session->set_flashdata('cannot', TRUE);
			redirect('Cars/index', 'refresh');
		}
	}
	public function washUpdate()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		$id = $this->input->post('wash_cID');
		//เช็คซ้ำข้อมูล
		$this->db->where('cw_carid', $id);
		$this->db->from("cars_wash");
		$num = $this->db->count_all_results();

		if ($num == 1) {
			$this->Carsmain_model->wash_update();
			$this->Log_model->wash_create_log();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('CarsWash/index', 'refresh');
		} else {
			$this->session->set_flashdata('cannot', TRUE);
			redirect('CarsWash/index', 'refresh');
		}
	}

	public function acdUpdate()
	{
		$this->Carsmain_model->acd_update();
		$this->session->set_flashdata('save_success', TRUE);
		redirect('Cars/index', 'refresh');
	}

	public function ticketAdd()
	{
		
		$this->Carsmain_model->ticket_create();
		$this->session->set_flashdata('save_success', TRUE);
		redirect('Cars/index', 'refresh');
	}
}