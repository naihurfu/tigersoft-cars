<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CarsWash_model extends CI_Model
{

	public function num_cars_data()
	{
		$d = $this->session->userdata('dept_id');
		$cars = $this->db->query('SELECT * FROM cars WHERE c_dept = ?', $d);

		return $cars->num_rows();
	}
	public function cars_data()
	{
		$d = $this->session->userdata('dept_id');

		$cars_data = $this->db->query('
			SELECT cars_wash.* , cars.* 
			FROM cars_wash 
			INNER JOIN cars 
			ON cars_wash.cw_carid = cars.c_id
			WHERE c_dept = ?', $d);
		return $cars_data->result();
	}

	public function washed_data()
	{
		$d = $this->session->userdata('dept_id');
		$w = date("m/Y");
		$this->db->select('cars_wash.* , cars.*');
		$this->db->from('cars_wash');
		$this->db->join('cars', 'cars_wash.cw_carid = cars.c_id');
		$this->db->where('cw_status', $w);
		$this->db->where('c_dept', $d);

		$washed = $this->db->get();

		return $washed->result();
	}

	public function num_washed()
	{

		$d = $this->session->userdata('dept_id');
		$w = date("m/Y");
		$this->db->select('cars_wash.* , cars.*');
		$this->db->from('cars_wash');
		$this->db->join('cars', 'cars_wash.cw_carid = cars.c_id');
		$this->db->where('cw_status', $w);
		$this->db->where('c_dept', $d);

		$nw = $this->db->get();

		return $nw->num_rows();
	}

	public function unwash_data()
	{
		$d = $this->session->userdata('dept_id');
		$w = date("m/Y");
		$this->db->select('cars_wash.* , cars.*');
		$this->db->from('cars_wash');
		$this->db->join('cars', 'cars_wash.cw_carid = cars.c_id');
		$this->db->where('cw_status !=', $w);
		$this->db->where('c_dept', $d);

		$unwash = $this->db->get();

		return $unwash->result();
	}

	public function num_unwashed()
	{
		$d = $this->session->userdata('dept_id');
		$w = date("m/Y");
		$this->db->select('cars_wash.* , cars.*');
		$this->db->from('cars_wash');
		$this->db->join('cars', 'cars_wash.cw_carid = cars.c_id');
		$this->db->where('cw_status !=', $w);
		$this->db->where('c_dept', $d);

		$nu = $this->db->get();

		return $nu->num_rows();
	}


	public function wash_update_status()
	{
		$id = $this->input->post('cid_status_wash');
		$m = $this->input->post('monthly_wash') . '/' . $this->input->post('year_wash');

		$data = array(
			'cw_status'  => $m
		);
		$this->db->where('cw_carid', $id);
		$this->db->update('cars_wash', $data);
	}

	public function editWash()
	{
		$id = $this->input->post('id');
		$data = array(
			'lw_date' 	=> $this->input->post('uwash_date'),
			'lw_remark' => $this->input->post('uwash_remark'),
			'lw_uid'		=> $this->session->userdata('uid')
		);
		$this->db->where('lw_id', $id);
		$this->db->update('log_wash', $data);
	}
}

/* End of file CarsWash_model.php */
/* Location: ./application/models/CarsWash_model.php */