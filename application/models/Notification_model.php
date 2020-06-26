<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model {

  public function fetch_notification()
  {
    $this->db->select('notification.*, cars.*');
    $this->db->from('notification');
    $this->db->join('cars', 'notification.n_cid = cars.c_id');
    $this->db->where('n_status', 1);
    $notify = $this->db->get();

    return $notify->result();
  }

  public function num_notification()
  {
    $this->db->select('notification.*, cars.*');
    $this->db->from('notification');
    $this->db->join('cars', 'notification.n_cid = cars.c_id');
    $this->db->where('n_status', 1);
    $numrows = $this->db->get();

    return $numrows->num_rows();
  }

	public function create_km()
	{
		$data = array(

         'n_cid'      => $this->input->post('cid'),
         'n_detail'   => 'เลขไมล์ใกล้จะครบกำหนดเช็คระยะ',
         'n_status'   => false
         
     );

     $this->db->insert('notification', $data);
  }
}