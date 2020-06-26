<?php 
class Welcome_model extends CI_Model {
	
    public function get_cars()
    {   
        $d = $this->session->userdata('dept_id');

        $this->db->select('cars.* , cars_tax.* , cars_km.* , cars_insr.* , cars_wash.* ,
            (( (cd_kmpresent) - (cd_serviceprevious) ) / ( (cd_kmneedservice) - (cd_serviceprevious))*100) as pb,
            DATEDIFF(cars_tax.ct_end,now() ) as tax,
            DATEDIFF(cars_insr.ci_end,now() ) as insr');
        $this->db->from('cars');
        $this->db->join('cars_tax', 'cars.c_id = cars_tax.ct_carid');
        $this->db->join('cars_km',  'cars.c_id = cars_km.cd_carid');
        $this->db->join('cars_insr', 'cars.c_id = cars_insr.ci_carid');
        $this->db->join('cars_wash', 'cars.c_id = cars_wash.cw_carid');
        $this->db->where('cars.c_dept', $d);
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_data()
    {   
        $d = $this->session->userdata('dept_id');

        $this->db->select('cars.* , cars_tax.* , cars_km.* , cars_insr.* , cars_wash.* ,
            (( (cd_kmpresent) - (cd_serviceprevious) ) / ( (cd_kmneedservice) - (cd_serviceprevious))*100) as pb,
            DATEDIFF(cars_tax.ct_end,now() ) as tax,
            DATEDIFF(cars_insr.ci_end,now() ) as insr');
        $this->db->from('cars');
        $this->db->join('cars_tax', 'cars.c_id = cars_tax.ct_carid');
        $this->db->join('cars_km',  'cars.c_id = cars_km.cd_carid');
        $this->db->join('cars_insr', 'cars.c_id = cars_insr.ci_carid');
        $this->db->join('cars_wash', 'cars.c_id = cars_wash.cw_carid');
        $this->db->where('cars.c_dept', $d);
        $query = $this->db->get();
        return $query->result();
    }

    public function contactData()
    {
        $data = $this->db->get('contact');
        return $data->result();
    }

    public function getAllTicket()
    {
        $select =   array(
            'employeelist.*',
            'count(ticket.tk_user) as Total'
        );  
        $k = [];
        $k = $this->db
                    ->select($select)
                    ->from('employeelist')
                    ->join('ticket','ticket.tk_user = employeelist.eEmpId')
                    ->group_by('employeelist.eEmpId')
                    ->get();
                    
        return $k->result();
    }

}