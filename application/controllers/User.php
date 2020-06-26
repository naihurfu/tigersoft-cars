<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('LineNotify_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function submit()
	{
		$id 			= $this->input->post('empID');
		$pwd			= md5($this->input->post('pwd'));

		$validate = $this->User_model->validate($id, $pwd);
		if ($validate->num_rows() > 0) 
		{
			$data  	= $validate->row_array();
			$uid  	= $data['u_id'];
			$empid  = $data['u_empid'];
			$fname 	= $data['u_fname'];
			$lname 	= $data['u_lname'];
			$dept 	= $data['u_dept'];
			$level 	= $data['u_level'];
			$email 	= $data['u_email'];
			$date 	= $data['u_saveat'];
			$finaldept = '';

			if ($dept == 1) 
			{
				$finaldept = 'CS';
			} 
			elseif ($dept == 2) 
			{
				$finaldept = 'TA';
			} 
			else 
			{
				$finaldept = 'OTHER';
			}

			$session_data = array(
				'uid'  		=> $uid,
				'empid'  	=> $empid,
				'fname'     => $fname,
				'lname'     => $lname,
				'dept'     	=> $finaldept,
				'dept_id'   => $dept,
				'level'     => $level,
				'email'     => $email,
				'date'     	=> $date,
				'logged_in' => TRUE
			);


			$this->session->set_userdata($session_data);
			$this->LineNotify_model->logged_in($empid, $fname, $lname, $finaldept);
			redirect(base_url() . 'welcome');
		} else {
			$this->session->set_flashdata('login_error', TRUE);
			redirect(base_url() . 'login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'login');
	}
}