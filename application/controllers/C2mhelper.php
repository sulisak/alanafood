<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C2mhelper extends MY_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('C2mhelper_model');
    }


	public function index()
	{


echo 'Dummy';



	}




function Delsaleall()
{

echo $this->C2mhelper_model->Delsaleall();
$this->session->sess_destroy();		
header( "location: ".$this->base_url."" );

}








}
