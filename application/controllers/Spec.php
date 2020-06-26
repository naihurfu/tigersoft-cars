<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spec extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Spec_model');

		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
	}

	public function add()
	{
		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('spec/index');
		$this->load->view('layout/footer');
	}

	public function view()
	{
		$this->load->model('Notification_model');
		$result['notify'] = $this->Notification_model->fetch_notification();
		$result['numrows'] = $this->Notification_model->num_notification();

		$this->load->view('layout/header');
		$this->load->view('layout/nav', $result);
		$this->load->view('layout/sidebar');
		$this->load->view('spec/view');
		$this->load->view('layout/footer');
	}

	public function insert()
	{
		$this->Spec_model->insert();
		$this->session->set_flashdata('save_success', TRUE);
		redirect('Spec/view', 'refresh');
	}

	public function update()
	{
		$this->Spec_model->update();
		$this->session->set_flashdata('save_success', TRUE);
		redirect('Spec/view', 'refresh');
	}

	public function search_spec()
	{
		$output = '';
		$query = '';
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->Spec_model->fetch_spec($query);
		$output .= '
		<div class="card-body table-responsive p-0">
		<table class="table table-head-fixed table-hover">
		<thead>
		<tr>
		<th>ผู้ดูแล</th>
		<th>CODE</th>
		<th>ชื่อคอมพิวเตอร์</th>
		<th>ประเภท</th>
		<th>ยี่ห้อ</th>
		<th>Windows</th>
		<th>S/N</th>
		<th>CPU</th>
		<th>GPU</th>
		<th>SSD</th>
		<th>HDD</th>
		<th>RAM</th>
		<th>Mouse</th>
		<th>Keyboard</th>
		<th>จอ</th>
		<th>โทรศัพท์</th>
		<th>หมายเหตุ</th>
		<th>อัพเดท</th>
		</tr>
		';

		if ($data->num_rows() > 0) {

			foreach ($data->result() as $row) {
				$output .= '
				<tr>
				<td style="vertical-align: middle;">' . $row->empId . '</td>
				<td style="vertical-align: middle;">' . $row->codePc . '</td>
				<td style="vertical-align: middle;">' . $row->comName . '</td>
				<td style="vertical-align: middle;">' . $row->category . '</td>
				<td style="vertical-align: middle;">' . $row->brand . '</td>
				<td style="vertical-align: middle;">' . $row->windows . '</td>
				<td style="vertical-align: middle;">' . $row->serialLicense . '</td>
				<td style="vertical-align: middle;">' . $row->cpu . '</td>
				<td style="vertical-align: middle;">' . $row->gpu . '</td>
				<td style="vertical-align: middle;">' . $row->ssd . '</td>
				<td style="vertical-align: middle;">' . $row->hdd . '</td>
				<td style="vertical-align: middle;">' . $row->ram . '</td>
				<td style="vertical-align: middle;">' . $row->mouse . '</td>
				<td style="vertical-align: middle;">' . $row->keyboard . '</td>
				<td style="vertical-align: middle;">' . $row->monitor . '</td>
				<td style="vertical-align: middle;">' . $row->callnumber . '</td>
				<td style="vertical-align: middle;">' . $row->remark . '</td>
				<td style="vertical-align: middle;"> <i class="fa fa-edit" id="edit" style="cursor: pointer;" 
				data-empId="' . $row->empId . '"
				data-codePc="' . $row->codePc . '"
				data-comName="' . $row->comName . '"
				data-category="' . $row->category . '"
				data-brand="' . $row->brand . '"
				data-windows="' . $row->windows . '"
				data-sn="' . $row->serialLicense . '"
				data-pid="' . $row->productId . '"
				data-cpu="' . $row->cpu . '"
				data-gpu="' . $row->gpu . '"
				data-ssd="' . $row->ssd . '"
				data-hdd="' . $row->hdd . '"
				data-ram="' . $row->ram . '"
				data-mouse="' . $row->mouse . '"
				data-keyboard="' . $row->keyboard . '"
				data-monitor="' . $row->monitor . '"
				data-call="' . $row->callnumber . '"
				data-callBrand="' . $row->callBrand . '"
				data-remark="' . $row->remark . '"
				data-id="' . $row->s_id . '"
				> </i> </td>
				</tr>
				';
			}
		} else {
			$output .= '<tr>
			<td colspan="17" style="vertical-align: middle;"> <span class="badge bg-warning" style="font-size: 20px; width: 100%;"> ไม่พบข้อมูล </span> </td>
			</tr>';
		}
		$output .= '</table>';
		echo $output;
	}
}