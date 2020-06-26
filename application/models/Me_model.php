<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Me_model extends CI_Model {

	public function my_profile()
	{
		//
	}

	public function changePwd()
    {   
        $id 	= $this->input->post('u_id');
        $newpwd = md5($this->input->post('new_pwd'));

        $this->db->set('u_pwd', $newpwd);
        $this->db->where('u_id', $id);
        $this->db->update('users');
    }

    public function reported()
    {   
        $data = array(
            'r_topic'       => $this->input->post('r_topic'),
            'r_priority'    => $this->input->post('r_priority'),
            'r_detail'      => $this->input->post('r_detail'),
            'r_uid'         => $this->session->userdata('uid'),
            'r_fixed'       => false
        );

        $this->db->insert('report',$data);
    }

    public function fetch_report($query)
    {
        $this->db->select('report.* , users.*');
        $this->db->from('report');
        $this->db->join('users', 'report.r_uid = users.u_id');

        if($query != '')
        {
           $this->db->like('report.r_topic', $query);
           $this->db->or_like('report.r_timestamp', $query);
           $this->db->or_like('report.r_priority', $query);
        }  
       $this->db->order_by('report.r_priority', 'DESC');
       return $this->db->get();
    }

   public function rpt_countAll()
    {

    $all = $this->db->query('SELECT * FROM report');

    return $all->num_rows();
    }

    public function rpt_waiting()
    {
        $waiting = $this->db->query('SELECT * FROM report WHERE r_fixed = 0');

        return $waiting->num_rows();
    }

    public function rpt_countFixed()
    {
        $fixed = $this->db->query('SELECT * FROM report WHERE r_fixed = 1');

        return $fixed->num_rows();
    }

}

/* End of file me_model.php */
/* Location: ./application/models/me_model.php */