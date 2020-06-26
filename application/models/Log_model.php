<?php 
class Log_model extends CI_Model {

  public function tax_create_log()
  {   

    $data = array(
      'lt_cid'      => $this->input->post('cID'),
      'lt_dstart'   => $this->input->post('tax_start'),
      'lt_dend'     => $this->input->post('tax_end'),
      'lt_remark'   => $this->input->post('tax_remark'),
      'lt_uid'      => $this->session->userdata('uid')    
    );

    $this->db->insert('log_tax',$data);
  }

  public function km_create_log()
  {   
    $data = array(
      'lk_cid'            => $this->input->post('km_cID'),
      'lk_present'        => $this->input->post('km_present'),
      'lk_previous'       => $this->input->post('km_previous'),
      'lk_needservice'    => $this->input->post('km_needservice'),
      'lk_remark'         => $this->input->post('km_remark'),
      'lk_uid'            => $this->session->userdata('uid')
    );

    $this->db->insert('log_km',$data);
  }

  public function insr_create_log()
  {   
    $data = array(
      'li_cid'      =>  $this->input->post('insr_cID'),
      'li_dstart'   =>  $this->input->post('insr_start'),
      'li_dend'     =>  $this->input->post('insr_end'),
      'li_remark'   =>  $this->input->post('insr_remark'),
      'li_uid'      =>  $this->session->userdata('uid')
    );  

    $this->db->insert('log_insr',$data);
  }

  public function wash_create_log()
  {
    $data = array(
      'lw_cid'    => $this->input->post('wash_cID'),
      'lw_date'   => $this->input->post('wash_date'),
      'lw_remark' => $this->input->post('wash_remark'),
      'lw_uid'    => $this->session->userdata('uid')
    );

    $this->db->insert('log_wash',$data);
  }

  public function km()
  {
    $d = $this->session->userdata('dept_id');

    $this->db->select('cars.* , log_km.*');
    $this->db->from('cars');
    $this->db->join('log_km', 'cars.c_id = log_km.lk_cid');
    $this->db->where('cars.c_dept', $d);

    $this->db->order_by('log_km.lk_timestamp', 'DESC');
    $query = $this->db->get(); 

    return $query->result();
  }

  public function tax()
  {
    $d = $this->session->userdata('dept_id');

    $this->db->select('cars.* , log_tax.*');
    $this->db->from('cars');
    $this->db->join('log_tax', 'cars.c_id = log_tax.lt_cid');
    $this->db->where('cars.c_dept', $d);

    $query = $this->db->get(); 

    return $query->result();
  }

  public function insr()
  {
    $d = $this->session->userdata('dept_id');

    $this->db->select('cars.* , log_insr.*');
    $this->db->from('cars');
    $this->db->join('log_insr', 'cars.c_id = log_insr.li_cid');
    $this->db->where('cars.c_dept', $d);

    $query = $this->db->get(); 

    return $query->result();
  }

  public function wash()
  {
    $d = $this->session->userdata('dept_id');

    $this->db->select('cars.* , log_wash.*');
    $this->db->from('cars');
    $this->db->join('log_wash', 'cars.c_id = log_wash.lw_cid');
    $this->db->where('cars.c_dept', $d);

    $query = $this->db->get(); 

    return $query->result();
  }

  public function acd()
  {
    $d = $this->session->userdata('dept_id');

    $this->db->select('cars.* , log_acd.* , users.*');
    $this->db->from('cars');
    $this->db->join('log_acd', 'cars.c_id = log_acd.la_cid');
    $this->db->join('users', 'users.u_id = log_acd.la_uid');
    $this->db->where('cars.c_dept', $d);
    $this->db->order_by('log_acd.la_timestamp', 'DESC');

    $query = $this->db->get(); 

    return $query->result();
  }

  public function searchKm()
  {
    $d = $this->session->userdata('dept_id');

    $this->db->select('cars.* , log_km.*');
    $this->db->from('cars');
    $this->db->group_by('cars.c_vrno');
    $this->db->join('log_km', 'cars.c_id = log_km.lk_cid');
    $this->db->where('cars.c_dept', $d);

    $query = $this->db->get(); 

    return $query->result();
  }

  public function fetch_km($query)
  {
    $d = $this->session->userdata('dept_id');

    $this->db->select('cars.* , log_km.* , users.*');
    $this->db->from('cars');
    $this->db->join('log_km', 'cars.c_id = log_km.lk_cid');
    $this->db->join('users', 'log_km.lk_uid = users.u_id');


    if($query != '')
    {
     $this->db->like('cars.c_vrno', $query);
     $this->db->or_like('log_km.lk_timestamp', $query);
   }  
   $this->db->order_by('log_km.lk_timestamp', 'DESC');
   $this->db->where('cars.c_dept', $d);

   return $this->db->get();

 }
 public function fetch_tax($query)
 {
  $d = $this->session->userdata('dept_id');

  $this->db->select('cars.* , log_tax.* , users.*');
  $this->db->from('cars');
  $this->db->join('log_tax', 'cars.c_id = log_tax.lt_cid');
  $this->db->join('users', 'log_tax.lt_uid = users.u_id');

  if($query != '')
  {
   $this->db->like('cars.c_vrno', $query);
   $this->db->or_like('log_tax.lt_timestamp', $query);
  }  

  $this->db->order_by('log_tax.lt_timestamp', 'DESC');
  $this->db->where('cars.c_dept', $d);

  return $this->db->get();
  }

public function fetch_insr($query)
{
  $d = $this->session->userdata('dept_id');

  $this->db->select('cars.* , log_insr.* , users.*');
  $this->db->from('cars');
  $this->db->join('log_insr', 'cars.c_id = log_insr.li_cid');
  $this->db->join('users', 'log_insr.li_uid = users.u_id');

  if($query != '')
  {
   $this->db->like('cars.c_vrno', $query);
   $this->db->or_like('log_insr.li_timestamp', $query);
 }  
 $this->db->order_by('log_insr.li_timestamp', 'DESC');
 $this->db->where('cars.c_dept', $d);

 return $this->db->get();
}

public function fetch_ticket($query)
{
  $d = $this->session->userdata('dept_id');

  $this->db->select('cars.* , ticket.* , users.* , employeelist.*');
  $this->db->from('cars');
  $this->db->join('ticket', 'cars.c_id = ticket.tk_cid');
  $this->db->join('users', 'ticket.tk_uid = users.u_id', 'left');
  $this->db->join('employeelist', 'ticket.tk_user = employeelist.eEmpId');
  

  if(!empty($query))
  {
   $this->db->like('cars.c_vrno', $query);
   $this->db->or_like('ticket.tk_date', $query);
   $this->db->or_like('ticket.tk_topic', $query);
   $this->db->or_like('ticket.tk_company', $query);
   $this->db->or_like('ticket.tk_user', $query);
   $this->db->or_like('employeelist.eEmpId', $query);
   $this->db->or_like('employeelist.eFirstName', $query);
   $this->db->or_like('employeelist.eLastName', $query);
   $this->db->or_like('users.u_empid', $query);
   $this->db->or_like('users.u_fname', $query);
  }  
 $this->db->order_by('ticket.tk_datesave', 'DESC');
 $this->db->where('cars.c_dept', $d);

 return $this->db->get();
}

public function fetch_wash($query)
{
  $d = $this->session->userdata('dept_id');

  $this->db->select('cars.* , log_wash.* , users.*');
  $this->db->from('cars');
  $this->db->join('log_wash', 'cars.c_id = log_wash.lw_cid');
  $this->db->join('users', 'log_wash.lw_uid = users.u_id');


  if($query != '')
  {
   $this->db->like('cars.c_vrno', $query);
   $this->db->or_like('log_wash.lw_date', $query);
   $this->db->or_like('log_wash.lw_remark', $query);
  }  

 $this->db->order_by('log_wash.lw_timestamp', 'DESC');
 $this->db->where('cars.c_dept', $d);

 return $this->db->get();

}
}