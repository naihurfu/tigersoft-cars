<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model');

		if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
				}
			}
}
