<?php

class C2mhelper_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }





      public function Delsaleall()
        {



$this->db->query('TRUNCATE TABLE sale_list_header');
$this->db->query('TRUNCATE TABLE sale_list_datail');
$this->db->query('TRUNCATE TABLE sale_list_header_bak');
$this->db->query('TRUNCATE TABLE sale_list_datail_bak');
$this->db->query('TRUNCATE TABLE shift');

    }


}