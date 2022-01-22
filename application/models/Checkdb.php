<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkdb extends CI_Model {

    public function __construct() 
            { }

        public function createTableSchema()
            {
                $result = 0;
                 $result += $this->_createAgentTableSchema();
                 $result += $this->_createInsuranceTableSchema();
                 return $result;

            }

        private function _createAgentTableSchema()
        {
            $this->load->dbforge();

            $fields = array(
                'id' => array(
                    'type' => 'int',
                    'constraint' => 211,
                    'unsigned' => true,
                    'auto_increment' => true
                ),
                'Email' =>array(
                    'type' => 'varchar',
                    'constraint' => 211,
                    'NULL' => true
                ),
                'PhoneNum' => array(
                    'type' => 'varchar',
                    'constraint' => 211,
                    'NULL' => true
                ),
                'Password' =>array(
                    'type' => 'varchar',
                    'constraint' => 211,
                    'NULL' => true
                ),
                'Occupation' => array(
                    'type' => 'varchar',
                    'constraint' => 211,
                    'NULL' => true
                ),
                'AadharPanNumber' =>array(
                    'type' => 'varchar',
                    'constraint' => 211,
                    'NULL' => true
                ),
                'AnnualIncome' => array(
                    'type' => 'varchar',
                    'constraint' => 211,
                    'NULL' => true
                ),
               
                'Address' => array(
                    'type' => 'varchar',
                    'constraint' => 211,
                    'NULL' => true
                ),
                
            );

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id',true);

            return $this->dbforge->create_table('agents',true);
        }

    
        private function _createInsuranceTableSchema()
        {
            $this->load->dbforge();

            $fields = array(
                'id' => array(
                    'type' => 'int',
                    'constraint' => 211,
                    'unsigned' => true,
                    'auto_increment' => true
                ),
                'insuranceID' =>array(
                    'type' => 'int',
                    'constraint' => 11,
                ),
                'insuranceAmount' => array(
                    'type' => 'varchar',
                    'constraint' => 211,
                    'NULL' => true
                ),
                'insuranceType' =>array(
                    'type' => 'varchar',
                    'constraint' => 211,
                    'NULL' => true
                ),
                'agentID' => array(
                    'type' => 'varchar',
                    'constraint' => 211,
                    'NULL' => true
                ),
                'duration' =>array(
                    'type' => 'varchar',
                    'constraint' => 211,
                    'NULL' => true
                )
                
                
            );

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id',true);

            return $this->dbforge->create_table('insurance',true);
        }







}





