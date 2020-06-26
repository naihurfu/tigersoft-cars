<?php 
class Search_model extends CI_Model {
	
  public function search($keyword)
  {

    $this->db->select('cars.* , log_km.*');
    $this->db->from('cars');
    $this->db->where('cars.c_vrno', $keyword);
    $this->db->join('log_km', 'cars.c_id = log_km.lk_cid');
    $this->db->order_by('log_km.lk_timestamp', 'DESC');
    $query = $this->db->get(); 

    return $query->result();
  }
}