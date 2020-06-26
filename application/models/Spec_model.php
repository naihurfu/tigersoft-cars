<?php
class Spec_model extends CI_Model
{
   public function insert()
   {
      $data = array(
         'comName'         => $this->input->post('comName'),
         'codePc'          => $this->input->post('codePc'),
         'empId'           => strtoupper($this->input->post('empId')),
         'brand'           => $this->input->post('brand'),
         'category'        => $this->input->post('category'),
         'serialLicense'   => $this->input->post('serialLicense'),
         'productId'       => $this->input->post('productId'),
         'windows'         => $this->input->post('windows'),
         'cpu'             => $this->input->post('cpu'),
         'gpu'             => strtoupper($this->input->post('gpu')),
         'ram'             => strtoupper($this->input->post('ram')),
         'ssd'             => strtoupper($this->input->post('ssd')),
         'hdd'             => strtoupper($this->input->post('hdd')),
         'mouse'           => $this->input->post('mouse'),
         'keyboard'        => $this->input->post('keyboard'),
         'monitor'         => $this->input->post('monitor'),
         'callnumber'      => $this->input->post('call'),
         'callBrand'       => $this->input->post('callBrand'),
         'bag'             => $this->input->post('bag'),
         's_uid'           => $this->session->userdata('uid'),
         'remark'          => $this->input->post('remark')
      );


      $this->db->insert('specpc', $data);
   }

   public function update()
   {
      $id = $this->input->post('s_id');
      $data = array(
         'comName'         => $this->input->post('comName'),
         'codePc'          => $this->input->post('codePc'),
         'empId'           => strtoupper($this->input->post('empId')),
         'brand'           => $this->input->post('brand'),
         'category'        => $this->input->post('category'),
         'serialLicense'   => $this->input->post('serialLicense'),
         'productId'       => $this->input->post('productId'),
         'windows'         => $this->input->post('windows'),
         'cpu'             => $this->input->post('cpu'),
         'gpu'             => strtoupper($this->input->post('gpu')),
         'ram'             => strtoupper($this->input->post('ram')),
         'ssd'             => strtoupper($this->input->post('ssd')),
         'hdd'             => strtoupper($this->input->post('hdd')),
         'mouse'           => $this->input->post('mouse'),
         'keyboard'        => $this->input->post('keyboard'),
         'monitor'         => $this->input->post('monitor'),
         'callnumber'      => $this->input->post('call'),
         'callBrand'       => $this->input->post('callBrand'),
         'bag'             => $this->input->post('bag'),
         's_uid'           => $this->session->userdata('uid'),
         'remark'          => $this->input->post('remark')
      );
      $this->db->where('s_id', $id);
      $this->db->update('specpc', $data);
   }

   public function fetch_spec($query)
   {
      $this->db->select('*');
      $this->db->from('specpc');
      if ($query != '') {
         $this->db->like('specpc.comName', $query);
         $this->db->or_like('specpc.codePc', $query);
         $this->db->or_like('specpc.brand', $query);
         $this->db->or_like('specpc.category', $query);
         $this->db->or_like('specpc.serialLicense', $query);
         $this->db->or_like('specpc.productId', $query);
         $this->db->or_like('specpc.cpu', $query);
         $this->db->or_like('specpc.gpu', $query);
         $this->db->or_like('specpc.ram', $query);
         $this->db->or_like('specpc.ssd', $query);
         $this->db->or_like('specpc.hdd', $query);
         $this->db->or_like('specpc.mouse', $query);
         $this->db->or_like('specpc.keyboard', $query);
         $this->db->or_like('specpc.monitor', $query);
         $this->db->or_like('specpc.callnumber', $query);
         $this->db->or_like('specpc.callbrand', $query);
         $this->db->or_like('specpc.bag', $query);
         $this->db->or_like('specpc.remark', $query);
      }
      $this->db->order_by('specpc.timestamp', 'DESC');

      return $this->db->get();
   }
}