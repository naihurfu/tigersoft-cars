<?php 
class Carsmain_model extends CI_Model {

  public function get_cars()
  {   
    $d = $this->session->userdata('dept_id');

    $this->db->select('cars.* , cars_tax.* , cars_km.* , cars_insr.* , cars_wash.*');
    $this->db->from('cars');
    $this->db->join('cars_tax', 'cars.c_id = cars_tax.ct_carid');
    $this->db->join('cars_km',  'cars.c_id = cars_km.cd_carid');
    $this->db->join('cars_insr', 'cars.c_id = cars_insr.ci_carid');
    $this->db->join('cars_wash', 'cars.c_id = cars_wash.cw_carid');
    $this->db->where('cars.c_dept', $d);
    $query = $this->db->get(); 


    return $query->result();
  }

  public function tax_update()
  { 
    $id = $this->input->post('cID');
    $data = array(
      'ct_carid'  => $this->input->post('cID'),
      'ct_start'  => $this->input->post('tax_start'),
      'ct_end'    => $this->input->post('tax_end'),
      'ct_remark' => $this->input->post('tax_remark'),
      'ct_uid'    => $this->session->userdata('uid')
    );
    $this->db->where('ct_carid', $id);
    $this->db->update('cars_tax', $data);

    if ($this->db->affected_rows()) {
      $accToken = "6WT5reh7hGylMeO5ml7oCxCKKIglleAtISKQ30qJqKe";
      $notifyURL = "https://notify-api.line.me/api/notify";
      $headers = array(
         'Content-Type: application/x-www-form-urlencoded',
         'Authorization: Bearer ' . $accToken
      );

      $query = $this->db->get_where('cars', array('c_id' => $id));
      foreach ($query->result() as $row)
      {
        $br = $row->c_brand;
        $vr = $row->c_vrno;
      }

      $data = array(
         'message' =>   "\r\n".
                        '---------- อัพเดตข้อมูลภาษีรถ ----------'.
                        "\r\n". 'รุ่น/ยี่ห้อ' .'  :  '. $br .
                        "\r\n". 'ทะเบียน' .'  :  '. $vr .
                        "\r\n". 'วันเริ่ม' .'  :  '. $this->input->post('tax_start') .
                        "\r\n". 'วันสิ้นสุด' .'  :  '. $this->input->post('tax_end') .
                        "\r\n". 'หมายเหตุ' .'  :  '. $this->input->post('tax_remark') .
                        "\r\n". 'อัพเดตโดย' .'  :  '. $this->session->userdata('fname') .'  '. $this->session->userdata('lname')
      );

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $notifyURL);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 2
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 1
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec($ch);
      curl_close($ch);
   }
  }

  public function km_update()
  {   
    $id = $this->input->post('km_cID');
    $data = array(
      'cd_carid'          => $this->input->post('km_cID'),
      'cd_kmprevious'     => $this->input->post('km_previous'),
      'cd_kmpresent'      => $this->input->post('km_present'),
      'cd_kmneedservice'  => $this->input->post('km_needservice'),
      'cd_serviceprevious'=> ($this->input->post('km_needservice')-10000),
      'cd_remark'         => $this->input->post('km_remark'),
      'cd_uid'            => $this->session->userdata('uid')

    );

    $this->db->where('cd_carid', $id);
    $this->db->update('cars_km', $data);

    if ($this->db->affected_rows()) {
      $accToken = "6WT5reh7hGylMeO5ml7oCxCKKIglleAtISKQ30qJqKe";
      $notifyURL = "https://notify-api.line.me/api/notify";
      $headers = array(
         'Content-Type: application/x-www-form-urlencoded',
         'Authorization: Bearer ' . $accToken
      );

      $query = $this->db->get_where('cars', array('c_id' => $id));
      foreach ($query->result() as $row)
      {
        $br = $row->c_brand;
        $vr = $row->c_vrno;
      }

      $data = array(
         'message' =>   "\r\n".
                        '---------- อัพเดตเลขไมล์ ----------'.
                        "\r\n". 'รุ่น/ยี่ห้อ' .'  :  '. $br .
                        "\r\n". 'ทะเบียน' .'  :  '. $vr .
                        "\r\n". 'เลขไมล์ปัจจุบัน' .'  :  '. $this->input->post('km_present') .
                        "\r\n". 'เลขไมล์ที่ต้องเข้าศูนย์' .'  :  '. $this->input->post('km_needservice') .
                        "\r\n". 'หมายเหตุ' .'  :  '. $this->input->post('km_remark') .
                        "\r\n". 'อัพเดตโดย' .'  :  '. $this->session->userdata('fname') .'  '. $this->session->userdata('lname')
      );

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $notifyURL);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 2
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 1
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec($ch);
      curl_close($ch);
   }
  }

  public function insr_update()
  {   
    $id = $this->input->post('insr_cID');
    $data = array(
      'ci_carid'  => $this->input->post('insr_cID'),
      'ci_start'  => $this->input->post('insr_start'),
      'ci_end'    => $this->input->post('insr_end'),
      'ci_remark' => $this->input->post('insr_remark'),
      'ci_uid'    => $this->session->userdata('uid')
    );
    $this->db->where('ci_carid', $id);
    $this->db->update('cars_insr', $data);

    if ($this->db->affected_rows()) {
      $accToken = "YSOeBnvxrhFHvC8s7Juy2cGJGokdLU4d5CpLPnDyfa6";
      $notifyURL = "https://notify-api.line.me/api/notify";
      $headers = array(
         'Content-Type: application/x-www-form-urlencoded',
         'Authorization: Bearer ' . $accToken
      );

      $query = $this->db->get_where('cars', array('c_id' => $id));
      foreach ($query->result() as $row)
      {
        $br = $row->c_brand;
        $vr = $row->c_vrno;
      }

      $data = array(
         'message' =>   "\r\n".
                        '---------- อัพเดตข้อมูล พรบ.ประกันภัย ----------'.
                        "\r\n". 'รุ่น/ยี่ห้อ' .'  :  '. $br .
                        "\r\n". 'ทะเบียน' .'  :  '. $vr .
                        "\r\n". 'วันเริ่ม' .'  :  '. $this->input->post('insr_start') .
                        "\r\n". 'วันสิ้นสุด' .'  :  '. $this->input->post('insr_end') .
                        "\r\n". 'หมายเหตุ' .'  :  '. $this->input->post('insr_remark') .
                        "\r\n". 'อัพเดตโดย' .'  :  '. $this->session->userdata('fname') .'  '. $this->session->userdata('lname')
      );

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $notifyURL);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 2
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 1
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec($ch);
      curl_close($ch);
   }
  }

  public function wash_update()
  {   
    $id = $this->input->post('wash_cID');
    $data = array(
      'cw_carid'  => $this->input->post('wash_cID'),
      'cw_date'  => $this->input->post('wash_date'),
      'cw_remark' => $this->input->post('wash_remark'),
      'cw_uid'    => $this->session->userdata('uid')
    );
    $this->db->where('cw_carid', $id);
    $this->db->update('cars_wash', $data);

    if ($this->db->affected_rows()) {
      $accToken = "YSOeBnvxrhFHvC8s7Juy2cGJGokdLU4d5CpLPnDyfa6";
      $notifyURL = "https://notify-api.line.me/api/notify";
      $headers = array(
         'Content-Type: application/x-www-form-urlencoded',
         'Authorization: Bearer ' . $accToken
      );

      $query = $this->db->get_where('cars', array('c_id' => $id));
      foreach ($query->result() as $row)
      {
        $br = $row->c_brand;
        $vr = $row->c_vrno;
      }

      $data = array(
         'message' =>   "\r\n".
                        '---------- อัพเดตข้อมูลการล้างรถ ----------'.
                        "\r\n". 'รุ่น/ยี่ห้อ' .'  :  '. $br .
                        "\r\n". 'ทะเบียน' .'  :  '. $vr .
                        "\r\n". 'วันเริ่ม' .'  :  '. $this->input->post('wash_date') .
                        "\r\n". 'หมายเหตุ' .'  :  '. $this->input->post('wash_remark') .
                        "\r\n". 'อัพเดตโดย' .'  :  '. $this->session->userdata('fname') .'  '. $this->session->userdata('lname')
      );

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $notifyURL);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 2
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 1
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec($ch);
      curl_close($ch);
   }
  }

  public function acd_update()
  {
    $data = array(
      'la_cid'    => $this->input->post('acd_cID'),
      'la_date'   => $this->input->post('acd_date'),
      'la_dmg'    => $this->input->post('acd_dmg'),
      'la_detail' => $this->input->post('acd_detail'),
      'la_remark' => $this->input->post('acd_remark'),
      'la_uid'    => $this->session->userdata('uid')
    );

    $this->db->insert('log_acd',$data);

    if ($this->db->affected_rows()) {
      $accToken = "6WT5reh7hGylMeO5ml7oCxCKKIglleAtISKQ30qJqKe";
      $notifyURL = "https://notify-api.line.me/api/notify";
      $headers = array(
         'Content-Type: application/x-www-form-urlencoded',
         'Authorization: Bearer ' . $accToken
      );

      $query = $this->db->get_where('cars', array('c_id' => $id));
      foreach ($query->result() as $row)
      {
        $br = $row->c_brand;
        $vr = $row->c_vrno;
      }

      $data = array(
         'message' =>   "\r\n".
                        '---------- อัพเดตข้อมูลอุบัติเหตุ ----------'.
                        "\r\n". 'รุ่น/ยี่ห้อ' .'  :  '. $br .
                        "\r\n". 'ทะเบียน' .'  :  '. $vr .
                        "\r\n". 'วันที่' .'  :  '. $this->input->post('acd_date') .
                        "\r\n". 'เรื่อง' .'  :  '. $this->input->post('acd_dmg') .
                        "\r\n". 'รายละเอียด' .'  :  '. $this->input->post('acd_detail') .
                        "\r\n". 'หมายเหตุ' .'  :  '. $this->input->post('acd_remark') .
                        "\r\n". 'อัพเดตโดย' .'  :  '. $this->session->userdata('fname') .'  '. $this->session->userdata('lname')
      );

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $notifyURL);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 2
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 1
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec($ch);
      curl_close($ch);
   }
  }

  public function ticket_create()
  {
    $ticket = array(
      'tk_topic'      => $this->input->post('tk_topic'),
      'tk_date'       => $this->input->post('tk_date'),
      'tk_remark'     => $this->input->post('tk_remark'),
      'tk_location'   => $this->input->post('tk_location'),
      'tk_company'    => $this->input->post('tk_company'),
      'tk_user'      => $this->input->post('tk_user1'),
      'tk_cid'        => $this->input->post('tk_cID'),
      'tk_uid'        => $this->session->userdata('uid')
    );

    $this->db->insert('ticket',$ticket);

    if (!empty($this->input->post('tk_user2')))
    {
      $ticket_user2 = array(
        'tk_topic'      => $this->input->post('tk_topic'),
        'tk_date'       => $this->input->post('tk_date'),
        'tk_remark'     => $this->input->post('tk_remark'),
        'tk_location'   => $this->input->post('tk_location'),
        'tk_company'    => $this->input->post('tk_company'),
        'tk_user'      => $this->input->post('tk_user2'),
        'tk_cid'        => $this->input->post('tk_cID'),
        'tk_uid'        => $this->session->userdata('uid')
      );
  
      $this->db->insert('ticket',$ticket_user2);
    }

    if ($this->db->affected_rows()) {
      $accToken = "6WT5reh7hGylMeO5ml7oCxCKKIglleAtISKQ30qJqKe";
      $notifyURL = "https://notify-api.line.me/api/notify";
      $headers = array(
         'Content-Type: application/x-www-form-urlencoded',
         'Authorization: Bearer ' . $accToken
      );

      $data = array(
         'message' =>   "\r\n".
                        '---------- เพิ่มข้อมูลใบสั่ง ----------'.
                        "\r\n". 'วันที่' .'  :  '. $this->input->post('tk_date') .
                        "\r\n". 'ข้อหา' .'  :  '. $this->input->post('tk_topic') .
                        "\r\n". 'สถานที่เกิด' .'  :  '. $this->input->post('tk_location') .
                        "\r\n". 'บริษัทที่ไป' .'  :  '. $this->input->post('tk_company') .
                        "\r\n". 'พนักงาน' .'  :  '. $this->input->post('tk_user1') .' , '.$this->input->post('tk_user2') .
                        "\r\n". 'หมายเหตุ' .'  :  '. $this->input->post('tk_remark') .
                        "\r\n". 'อัพเดตโดย' .'  :  '. $this->session->userdata('fname') .'  '. $this->session->userdata('lname')
      );

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $notifyURL);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 2
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 1
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec($ch);
      curl_close($ch);
   
    }
  }
}