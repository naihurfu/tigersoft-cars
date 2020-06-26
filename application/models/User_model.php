<?php 
   class User_model extends CI_Model {
	
        public function validate($id, $pwd)
        {   
            $this->db->where('u_empid', $id);
            $this->db->where('u_pwd', $pwd);
            $query = $this->db->get('users', 1);
            return $query;
        }
   }