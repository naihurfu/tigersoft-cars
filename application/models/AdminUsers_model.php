<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUsers_model extends CI_Model {

	public function fetch_users()
	{
		$this->db->select('users.* , depts.*');
		$this->db->from('users');
		$this->db->join('depts', 'users.u_dept = depts.d_id');
        $this->db->where('users.u_level !=', 'DEV');
        $this->db->order_by('users.u_empid', 'ASC');

		$query = $this->db->get();

		return $query->result();
	}

	public function addUser()
	{
		$data = array(
            'u_empid'       => strtoupper($this->input->post('empID')),
            'u_fname'       => $this->input->post('fname'),
            'u_lname'       => $this->input->post('lname'),
            'u_pwd'    		=> md5($this->input->post('password')),
            'u_email'      	=> $this->input->post('email'),
            'u_dept'        => $this->input->post('c_dept'),
            'u_level'       => $this->input->post('level')
        );

        $this->db->insert('users',$data);
	}
}

/* End of file AdminUsers_model.php */
/* Location: ./application/models/AdminUsers_model.php */