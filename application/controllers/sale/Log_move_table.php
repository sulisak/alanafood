<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_move_table extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/log_move_table_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{


$data['tab'] = 'log_move_table';
$data['title'] = 'Log Move Table';
		$this->salelayout('sale/log_move_table',$data);
}




function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->log_move_table_model->Get($data);

	}

function Getone()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->log_move_table_model->Getone($data);

	}




	}
