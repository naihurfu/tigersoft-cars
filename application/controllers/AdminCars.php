<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminCars extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminCars_model');
		$this->load->model('LineNotify_model');

		if($this->session->userdata('logged_in') !== TRUE)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['query'] = $this->AdminCars_model->get_cars();

		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('admin/cars_index', $data);
		$this->load->view('layout/footer');
	}

	public function carsCreate()
	{
		$this->AdminCars_model->insert_car();
		$this->session->set_flashdata('save_success', TRUE);	
		redirect('AdminCars/index', 'refresh');
	}

	public function kmCreate()
	{
		$id = $this->input->post('km_carid');
		//เช็คซ้ำข้อมูล
		$this->db->where('cd_carid', $id);
		$this->db->from("cars_km");
		$num = $this->db->count_all_results();
		
		if ($num == 0) 
		{
			$this->AdminCars_model->km_cars();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('AdminCars/index', 'refresh');

		} 
		else 
		{
			$this->session->set_flashdata('cannot', TRUE);
			redirect('AdminCars/index', 'refresh');
		}
	}

	public function taxCreate()
	{
		$id = $this->input->post('tax_id');
		//เช็คซ้ำข้อมูล
		$this->db->where('ct_carid', $id);
		$this->db->from("cars_tax");
		$num = $this->db->count_all_results();
		
		if ($num == 0) 
		{
			$this->AdminCars_model->tax_create();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('AdminCars/index', 'refresh');

		} 
		else 
		{
			$this->session->set_flashdata('cannot', TRUE);
			redirect('AdminCars/index', 'refresh');
		}
	}

	public function insrCreate()
	{
		//ประกาศตัวแปรเพื่อเก็บ ID ของรถ นำไป Where 
		$id = $this->input->post('insr_id');
		//เช็คซ้ำข้อมูล
		$this->db->where('ci_carid', $id);
		$this->db->from("cars_insr");
		$num = $this->db->count_all_results();
		
		if ($num == 0) 
		{
			$this->AdminCars_model->insr_create();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('AdminCars/index', 'refresh');

		} 
		else 
		{
			$this->session->set_flashdata('cannot', TRUE);
			redirect('AdminCars/index', 'refresh');
		}
	}

	public function washCreate()
	{
		  // echo '<pre>';
  		// print_r	($_POST);
			// echo '</pre>';
			// exit;
		//ประกาศตัวแปรเพื่อเก็บ ID ของรถ นำไป Where 
		$id = $this->input->post('wash_cID');
		//เช็คซ้ำข้อมูล
		$this->db->where('cw_carid', $id);
		$this->db->from("cars_wash");
		$num = $this->db->count_all_results();

		if ($num == 0) {
			$this->AdminCars_model->wash_Create();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('AdminCars/index', 'refresh');
		} else {
			$this->session->set_flashdata('cannot', TRUE);
			redirect('AdminCars/index', 'refresh');
		}
	}

	public function carEdit()
	{
		$this->AdminCars_model->edit_car();
		$this->session->set_flashdata('save_success', TRUE);
		redirect('AdminCars/index', 'refresh');
	}

	public function carDel()
	{
		$this->AdminCars_model->del_car();
		redirect('AdminCars/index', 'refresh');
	}

	public function checkCreate()
	{
		//ประกาศตัวแปรเพื่อเก็บ ID ของรถ นำไป Where 
		$id = $this->input->post('cID');
		//เช็คซ้ำข้อมูล
		$this->db->where('chk_cid', $id);
		$this->db->from("cars_check");
		$num = $this->db->count_all_results();

		if ($num == 0) 
		{
			$this->AdminCars_model->checkCreate();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('AdminCars/index', 'refresh');
		} 
		else 
		{
			$this->session->set_flashdata('cannot', TRUE);
			redirect('AdminCars/index', 'refresh');
		}
	}

}

//  echo '<pre>';
//  		print_r	($_POST);
//  echo '</pre>';
// exit;