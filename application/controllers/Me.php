<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Me extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Me_model');

		if($this->session->userdata('logged_in') !== TRUE)
		{
      		redirect('login');
  		}
	}

	public function profile()
	{
		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('user/profile');
		$this->load->view('layout/footer');
	}

	public function changePwd()
	{
		$this->Me_model->changePwd();
		$this->session->set_flashdata('save_success', TRUE);	
		redirect('me/profile', 'refresh');
	}

	public function report()
	{
		$data['all'] 	= $this->Me_model->rpt_countAll();
		$data['waiting'] = $this->Me_model->rpt_waiting();
		$data['fixed'] 	= $this->Me_model->rpt_countFixed();

		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('fetch_report', $data);
		$this->load->view('layout/footer');
	}

	public function fetch_report()
	{
		$output = '';
		$query = '';
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->Me_model->fetch_report($query);
		$output .= '
		<div class="card-body table-responsive p-0">
		<table class="table table-head-fixed table-hover">
		<thead>
		<tr>
		<th style="width:10%;">ความสำคัญ</th>
		<th style="width:20%;">เรื่อง</th>
		<th style="width:40%;">รายละเอียด</th>
		<th style="width:15%;">ผู้แจ้ง</th>
		<th style="width:10%">สถานะ</th>
		</tr>
		';
		if($data->num_rows() > 0)
		{

			foreach($data->result() as $row)
			{
				if ($row->r_fixed == '1') 
				{
					$fix = "<span class='badge bg-success'>แก้ไขแล้ว <i class='fa fa-check'></i></span>";
				} 
				else 
				{
					$fix = "<span class='badge bg-warning'>รอแก้ไข</span>";
				}
				
				$output .= '
				<tr>
				<td style="vertical-align: middle;"><span class="badge bg-success"> '.$row->r_priority.' </span></td>
				<td style="vertical-align: middle;">'.$row->r_topic.'</td>
				<td style="vertical-align: middle;">'.$row->r_detail.'</td>
				<td style="vertical-align: middle;"><span class="badge bg-success"> '.$row->u_empid.' </span><br>'
				.$row->u_fname .'&nbsp;'. $row->u_lname .'</td>
				<td style="vertical-align: middle;"> '
				.$fix.'</td>
				';
			}
		}
		else
		{
			$output .= '<tr>
			<td colspan="8" style="vertical-align: middle;"> <span class="badge bg-warning" style="font-size: 20px; width: 700px;"> ไ ม่ พ บ ข้ อ มู ล </span> </td>
			</tr>';
		}
		$output .= '</table>';
		echo $output;
	}
}

/* End of file me.php */
/* Location: ./application/controllers/me.php */