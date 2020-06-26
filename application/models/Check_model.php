<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_model extends CI_Model {

	
	public function fetch_cars()
	{
		$d = $this->session->userdata('dept_id');

		$this->db->select('cars.* , cars_check.* , cars_wash.*');
		$this->db->from('cars'); 
		$this->db->join('cars_check', 'cars.c_id = cars_check.chk_cid');
		$this->db->join('cars_wash', 'cars.c_id = cars_wash.cw_carid');
        $this->db->where('cars.c_dept', $d);
		
		$query = $this->db->get(); 
        return $query->result();
	}

	public function insert_cars()
	{

	    $id = $this->input->post('cID');
	    $data = array(
	      'chk_cid'  		=> $this->input->post('cID'),
	      'chk_tools'  		=> $this->input->post('tools'),
	      'chk_sparetire'   => $this->input->post('spare_tire'),
	      'chk_ftire' 		=> $this->input->post('f_tire'),
	      'chk_btire' 		=> $this->input->post('b_tire'),
	      'chk_uid'    		=> $this->session->userdata('uid')
	    );
	    $this->db->where('chk_cid', $id);
	    $this->db->update('cars_check', $data);
	}



	
}

/* End of file Check_model.php */
/* Location: ./application/models/Check_model.php */