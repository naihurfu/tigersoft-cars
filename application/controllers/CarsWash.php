<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CarsWash extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CarsWash_model');

		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['cars'] = $this->CarsWash_model->num_cars_data();
		$data['cars_data'] = $this->CarsWash_model->cars_data();
		$data['washed'] = $this->CarsWash_model->washed_data();
		$data['nw'] = $this->CarsWash_model->num_washed();
		$data['unwash'] = $this->CarsWash_model->unwash_data();
		$data['nu'] = $this->CarsWash_model->num_unwashed();


		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('cars/wash_monthly/index', $data);
		$this->load->view('layout/footer');
	}

	public function wash_status_update()
	{


		$id = $this->input->post('cid_status_wash');
		//เช็คซ้ำข้อมูล
		$this->db->where('cw_carid', $id);
		$this->db->from("cars_wash");
		$num = $this->db->count_all_results();

		if ($num == 1) {
			$this->CarsWash_model->wash_update_status();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('CarsWash/index', 'refresh');
		} else {
			$this->session->set_flashdata('cannot', TRUE);
			redirect('CarsWash/index', 'refresh');
		}
	}

	public function wash_edit()
	{
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// exit;

		$id = $this->input->post('id');
		//เช็คซ้ำข้อมูล
		$this->db->where("lw_id", $id);
		$this->db->from("log_wash");
		$num = $this->db->count_all_results();

		if ($num == 1) {
			$this->CarsWash_model->editWash();
			$this->session->set_flashdata('save_success', TRUE);
			redirect('CarsWash/index', 'refresh');
		} else {
			$this->session->set_flashdata('cannot', TRUE);
			redirect('CarsWash/index', 'refresh');
		}
	}
}

/* End of file CarsWash.php */
/* Location: ./application/controllers/CarsWash.php */