<?php 
class Ticket_model extends CI_Model {
	
  public function numTicket()
  {
      $num = $this->db->get('ticket');
      return $num->num_rows();
  }
}