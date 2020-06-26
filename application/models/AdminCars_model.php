<?php 
   class AdminCars_model extends CI_Model {
	
        public function get_cars()
        {   
            $this->db->select('cars.* , depts.*');
            $this->db->from('cars');
            $this->db->join('depts', 'cars.c_dept = depts.d_id', 'left');
            $query = $this->db->get(); 

            return $query->result();
        }

        // เพิ่มรถ
        public function insert_car()
        {    
            $data = array(
                'c_brand'   => $this->input->post('c_brand'),
                'c_vrno'    => $this->input->post('c_vrno'),
                'c_dept'    => $this->input->post('c_dept'),
                'c_uid'     => $this->session->userdata('uid')

            );

            $this->db->insert('cars',$data);

            if ($this->db->affected_rows()) {
                $accToken = "YSOeBnvxrhFHvC8s7Juy2cGJGokdLU4d5CpLPnDyfa6";
                $notifyURL = "https://notify-api.line.me/api/notify";
                $headers = array(
                    'Content-Type: application/x-www-form-urlencoded',
                    'Authorization: Bearer ' . $accToken
                );

                $data = array(
                    'message' =>   "\r\n".
                                '---------- เพิ่มรถ ----------'.
                                "\r\n". 'รุ่น/ยี่ห้อ ' . '  :  '. $this->input->post('c_brand') .
                                "\r\n". 'ทะเบียน ' . '  :  ' . $this->input->post('c_vrno') .
                                "\r\n".'เพิ่มโดย ' . '  :  ' .  $this->session->userdata('empid') . '  ' . $this->session->userdata('fname') . '  ' . $this->session->userdata('lname')
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

        public function edit_car()
        {   
            $id = $this->input->post('id');
            $data = array(
                'c_brand'   => $this->input->post('c_brand'),
                'c_vrno'    => $this->input->post('c_vrno'),
                'c_dept'    => $this->input->post('c_dept')
            );

            $this->db->where('c_id', $id);
            $this->db->update('cars', $data);
        }

        public function del_car()
        {   
            $id = $this->input->post('id');

            $this->db->delete('cars_check', array('chk_cid' => $id));
            $this->db->delete('cars_insr',  array('ci_carid' => $id));
            $this->db->delete('cars_km',    array('cd_carid' => $id));
            $this->db->delete('cars_tax',   array('ct_carid' => $id));
            $this->db->delete('cars_wash',  array('cw_carid' => $id));
            $this->db->delete('log_acd',    array('la_cid' => $id));
            $this->db->delete('log_insr',   array('li_cid' => $id));
            $this->db->delete('log_km',     array('lk_cid' => $id));
            $this->db->delete('log_tax',    array('lt_cid' => $id));
            $this->db->delete('log_wash',   array('lw_cid' => $id));
            $this->db->delete('ticket',     array('tk_cid' => $id));
            $this->db->delete('cars',       array('c_id' => $id));

        }

        // เพิ่มข้อมูล เลขไมล์
        public function km_cars()
        {
            $data = array(
                'cd_carid'          => $this->input->post('km_carid'),
                'cd_kmpresent'      => $this->input->post('km_previous'),
                'cd_kmprevious'     => $this->input->post('km_present'),
                'cd_kmneedservice'  => $this->input->post('km_needservice'),
                'cd_remark'         => $this->input->post('km_remark'),
                'cd_uid'            => $this->session->userdata('uid')

            );

            $this->db->insert('cars_km',$data);
        }

        // เพิ่มข้อมูล ภาษี
        public function tax_create()
        {
            $data = array(
                'ct_carid'  => $this->input->post('tax_id'),
                'ct_start'  => $this->input->post('tax_start'),
                'ct_end'    => $this->input->post('tax_end'),
                'ct_remark' => $this->input->post('tax_remark'),
                'ct_uid'    => $this->session->userdata('uid')
            );

            $this->db->insert('cars_tax',$data);
        }

        // เพิ่มข้อมูล ประกันภัย
        public function insr_create()
        {
            $data = array(
                'ci_carid'  => $this->input->post('insr_id'),
                'ci_start'  => $this->input->post('insr_start'),
                'ci_end'    => $this->input->post('insr_end'),
                'ci_remark' => $this->input->post('insr_remark'),
                'ci_uid'    => $this->session->userdata('uid')
            );

            $this->db->insert('cars_insr',$data);
        }

        public function wash_create()
        {
        
            $data = array(
                'cw_carid'  => $this->input->post('wash_cID'),
                'cw_date'   => $this->input->post('wash_date'),
                'cw_remark' => $this->input->post('wash_remark'),
                'cw_status' => '00/0000',
                'cw_uid'    => $this->session->userdata('uid')
            );

            $this->db->insert('cars_wash',$data);
        }

        public function checkCreate()
        {

            $data = array(
                'chk_cid'      => $this->input->post('cID'),
                'chk_tools'     => $this->input->post('ck_tools'),
                'chk_sparetire' => $this->input->post('ck_sparetire'),
                'chk_btire'     => $this->input->post('ck_btire'),
                'chk_ftire'     => $this->input->post('ck_ftire'),
                'chk_uid'       => $this->session->userdata('uid')

            );

            $this->db->insert('cars_check',$data);
        }
   }