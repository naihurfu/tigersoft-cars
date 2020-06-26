<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model');

		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
	}

	public function kmUpdate()
	{
		$data['query'] 	= $this->Log_model->km();
		//$data['search'] = $this->Log_model->searchKm();	

		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('cars/history/kmUpdate', $data);
		$this->load->view('layout/footer');
	}

	public function insrUpdate()
	{
		$data['query'] = $this->Log_model->insr();

		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('cars/history/insrUpdate', $data);
		$this->load->view('layout/footer');
	}

	public function taxUpdate()
	{
		$data['query'] = $this->Log_model->tax();
		$data['search'] = $this->Log_model->searchKm();
		
		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('cars/history/taxUpdate', $data);
		$this->load->view('layout/footer');
	}

	public function washUpdate()
	{
		$data['query'] = $this->Log_model->wash();

		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('cars/history/washUpdate', $data);
		$this->load->view('layout/footer');
	}

	public function acdUpdate()
	{
		$data['query'] = $this->Log_model->acd();

		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('cars/history/acdUpdate', $data);
		$this->load->view('layout/footer');
	}

	public function ticket()
	{
		// Import Model
		$this->load->model('Ticket_model');
		
		$data['num'] = $this->Ticket_model->numTicket();

		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('cars/history/ticket', $data);
		$this->load->view('layout/footer');
	}

	public function search_km()
	{
		$output = '';
		$query = '';
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->Log_model->fetch_km($query);
		$output .= '
		<div class="card-body table-responsive p-0">
		<table class="table table-head-fixed table-hover">
		<thead>
		<tr>
		<th width="120px">เลขทะเบียน</th>
		<th>ก่อนหน้า</th>
		<th>ปัจจุบัน</th>
		<th width="120px">ต้องเข้าศูนย์</th>
		<th>หมายเหตุ</th>
		<th>วันที่บันทึก</th>
		<th>ผู้บันทึก</th>
		</tr>
		';

		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$output .= '
				<tr>
				<td style="vertical-align: middle;"><span class="badge bg-success"> ' . $row->c_brand . ' </span> ' . $row->c_vrno . '</td>
				<td style="vertical-align: middle;">' . number_format($row->lk_previous) . '</td>
				<td style="vertical-align: middle;">' . number_format($row->lk_present) . '</td>
				<td style="vertical-align: middle;">' . number_format($row->lk_needservice) . '</td>
				<td style="vertical-align: middle;" class="text-left"> <i class="fa fa-angle-double-right fa-fw"></i> ' . $row->lk_remark . '</td>
				<td style="vertical-align: middle;"><span class="badge bg-success"> ' . date("d M Y", strtotime($row->lk_timestamp)) . ' </span></td>
				<td style="vertical-align: middle;"><span class="badge bg-success"> ' . $row->u_empid . ' </span> <br>' . $row->u_fname . ' ' . $row->u_lname . '</td>
				</tr>
				';
			}
		} else {
			$output .= '<tr>
			<td colspan="6" style="vertical-align: middle;"> <span class="badge bg-warning" style="font-size: 20px; width: 700px;"> ไ ม่ พ บ ข้ อ มู ล </span> </td>
			</tr>';
		}
		$output .= '</table>';
		echo $output;
	}

	public function search_tax()
	{
		$output = '';
		$query = '';
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->Log_model->fetch_tax($query);
		$output .= '
		<div class="card-body table-responsive p-0">
		<table class="table table-head-fixed table-hover">
		<thead>
		<tr>
		<th style="width: 8%;">เลขทะเบียน</th>
		<th>วันเริ่ม</th>
		<th>วันสิ้นสุด</th>
		<th style="width: 40%;">หมายเหตุ</th>
		<th style="width: 5%;">วันที่บันทึก</th>
		<th style="width: 5%;">ผู้บันทึก</th>
		</tr>
		';
		if ($data->num_rows() > 0) {
			//echo "<pre>";
			//print_r ($data->result());
			//echo "</pre>";
			//exit;

			foreach ($data->result() as $row) {

				$output .= '
				<tr>
				<td style="vertical-align: middle;">' . $row->c_vrno . '<span class="badge bg-success"> ' . $row->c_brand . ' </span></td>
				<td style="vertical-align: middle;">' . date("d M Y", strtotime($row->lt_dstart)) . '</td>
				<td style="vertical-align: middle;">' . date("d M Y", strtotime($row->lt_dend)) . '</td>
				<td style="vertical-align: middle;" class="text-left"> <i class="fa fa-angle-double-right fa-fw"></i> ' . $row->lt_remark . '</td>
				<td style="vertical-align: middle;"><span class="badge bg-success"> ' . date("d M Y", strtotime($row->lt_timestamp)) . ' </span></td>
				<td style="vertical-align: middle;"><span class="badge bg-success"> ' . $row->u_fname . '  ' . $row->u_lname . ' </span></td>
				</tr>
				';
			}
		} else {
			$output .= '<tr>
			<td colspan="6" style="vertical-align: middle;"> <span class="badge bg-warning" style="font-size: 20px; width: 700px;"> ไ ม่ พ บ ข้ อ มู ล </span> </td>
			</tr>';
		}
		$output .= '</table>';
		echo $output;
	}

	public function search_insr()
	{
		$output = '';
		$query = '';
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->Log_model->fetch_insr($query);
		$output .= '
		<div class="card-body table-responsive p-0">
		<table class="table table-head-fixed table-hover">
		<thead>
		<tr>
		<th style="width: 8%;">เลขทะเบียน</th>
		<th>วันเริ่ม</th>
		<th>วันสิ้นสุด</th>
		<th style="width: 40%;">หมายเหตุ</th>
		<th style="width: 5%;">วันที่บันทึก</th>
		<th style="width: 5%;">ผู้บันทึก</th>
		</tr>
		';
		if ($data->num_rows() > 0) {
			//echo "<pre>";
			//print_r ($data->result());
			//echo "</pre>";
			//exit;

			foreach ($data->result() as $row) {

				$output .= '
				<tr>
				<td style="vertical-align: middle;">' . $row->c_vrno . '<span class="badge bg-success"> ' . $row->c_brand . ' </span></td>
				<td style="vertical-align: middle;">' . date("d M Y", strtotime($row->li_dstart)) . '</td>
				<td style="vertical-align: middle;">' . date("d M Y", strtotime($row->li_dend)) . '</td>
				<td style="vertical-align: middle;" class="text-left"> <i class="fa fa-angle-double-right fa-fw"></i> ' . $row->li_remark . '</td>
				<td style="vertical-align: middle;"><span class="badge bg-success"> ' . date("d M Y", strtotime($row->li_timestamp)) . ' </span></td>
				<td style="vertical-align: middle;"><span class="badge bg-success"> ' . $row->u_fname . '  ' . $row->u_lname . ' </span></td>
				</tr>
				';
			}
		} else {
			$output .= '<tr>
			<td colspan="6" style="vertical-align: middle;"> <span class="badge bg-warning" style="font-size: 20px; width: 700px;"> ไ ม่ พ บ ข้ อ มู ล </span> </td>
			</tr>';
		}
		$output .= '</table>';
		echo $output;
	}

	public function search_ticket()
	{
		$output = '';
		$query = '';
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->Log_model->fetch_ticket($query);
		$output .= '
		<div class="card-body table-responsive">
		<table class="table table-head-fixed table-hover">
		<thead>
		<tr>
		<th style="width: 5%;">เลขทะเบียน</th>
		<th style="width: 15%;">ข้อหา</th>
		<th style="width: 10%;">พนักงาน</th>
		<th style="width: 15%;">วันที่</th>
		<th style="width: 20%;">สถานที่</th>
		<th style="width: 20%;">บริษัทที่ไป</th>
		<th style="width: 25%;">หมายเหตุ</th>
		</tr>
		';
		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {

				$output .= '
				<tr>
				<td style="vertical-align: middle;">' . $row->c_vrno . '<span class="badge bg-success"> ' . $row->c_brand . ' </span></td>
				<td style="vertical-align: middle;">' . $row->tk_topic . '</td>
				<td style="vertical-align: middle;">
				<span class="badge bg-success" id="user1">' . $row->tk_user . '</span><br/>
				' . $row->eFirstName . ' ' . $row->eLastName . '
				</td>
				<td style="vertical-align: middle;" class="text-center"> ' . date("d M Y", strtotime($row->tk_date)) . '</td>
				<td style="vertical-align: middle;">' . $row->tk_location . '</td>
				<td style="vertical-align: middle;">' . $row->tk_company . '</td>
				<td style="vertical-align: middle;">' . $row->tk_remark . '</td>
				</tr>
				';
			}
		} else {
			$output .= '<tr>
			<td colspan="8" style="vertical-align: middle;"> <span class="badge bg-warning" style="font-size: 20px; width: 700px;"> ไ ม่ พ บ ข้ อ มู ล </span> </td>
			</tr>';
		}
		$output .= '</table>';
		echo $output;
	}

	public function search_wash()
	{
		$output = '';
		$query = '';
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->Log_model->fetch_wash($query);
		$output .= '
		<div class="card-body table-responsive p-0">
		<table class="table table-head-fixed table-hover">
		<thead>
		<tr>
		<th style="width: 10%;">เลขทะเบียน</th>
		<th>วันที่นำรถไปล้าง</th>
		<th style="width: 40%;">หมายเหตุ</th>
		<th>ผู้บันทึก</th>
		<th>บันทึกเมื่อ</th>
		<th>#</th>
		</tr>
		';
		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {
				$output .= '
				<tr>
				<td style="vertical-align: middle;">' . $row->c_vrno . '<span class="badge bg-success"> ' . $row->c_brand . ' </span></td>
				<td class="text-center" style="vertical-align: middle;" class="text-left"> ' . date("d M Y", strtotime($row->lw_date)) . '</td>
				<td style="vertical-align: middle;">' . $row->lw_remark . '</td>
				<td style="vertical-align: middle;">' . $row->u_fname . '  ' . $row->u_lname . ' <br><span class="badge bg-success"> ' . $row->u_empid . ' </span></td>
				<td style="vertical-align: middle;" class="text-center"> ' . date("d M Y", strtotime($row->lw_timestamp)) . '</td>
				<td style="vertical-align: middle;" class="text-center"> <i class="fa fa-edit text-primary" id="editWash" style="cursor: pointer;" 
				data-id="' . $row->lw_id . '" 
				data-br="' . $row->c_brand . '" 
				data-vr="' . $row->c_vrno . '"
				data-date="' . $row->lw_date . '"
				data-remark="' . $row->lw_remark . '"
				 ><i></td>
				</tr>
				';
			}
		} else {
			$output .= '<tr>
			<td colspan="5" style="vertical-align: middle;"> <span class="badge bg-warning" style="font-size: 20px; width: 700px;"> ไ ม่ พ บ ข้ อ มู ล </span> </td>
			</tr>';
		}
		$output .= '</table>';
		echo $output;
	}
}