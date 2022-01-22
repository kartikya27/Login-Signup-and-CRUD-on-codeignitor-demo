<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgentModel extends CI_Model {


    public function checkUser($data)
        {
            $this->db->where('Email',$data['Email']);
            $this->db->where('Password',$data['Password']);
            return $row = $this->db->get('agents')->row_array();
 
        }

        public function submitData($data,$table)
        {
            $this->db->insert($table,$data);
        }



























}