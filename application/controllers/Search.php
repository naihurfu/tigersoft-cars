<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Search_model');
		$this->load->model('Log_model');

		if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
	}

	function search_keyword()
    {
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->Search_model->search($keyword);
        $data['search'] = $this->Log_model->searchKm();	

		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('cars/history/search/kmResult', $data);
		$this->load->view('layout/footer');
    }
}