<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgentModel extends CI_Model {


    public function checkUser($data)
        {
            $this->db->where('Email',$data['Email']);
            $this->db->where('Password',md5($data['Password']));
            return $row = $this->db->get('agents')->row_array();
 
        }

        public function submitData($data,$table)
        {
            $this->db->insert($table,$data);
        }

        ##getRow
        public function getRow($agentTable,$Email)
        {
            $this->db->where('Email',$Email);
            return $row = $this->db->get($agentTable)->row_array();
        }

        public function getService($table,$agentID)
        {
            $this->db->where('agentID',$agentID);
            return $row = $this->db->get($table)->result();
        }

        public function deleteSingle($id,$tablename){
            $this->db->where('id',$id);
            $this->db->delete($tablename);
        }

        public function updateData($id,$tablename,$data){
            
                $this->db->where('id', $id);
                return $this->db->update($tablename, $data);
            }
























}