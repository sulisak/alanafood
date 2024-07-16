<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salepage extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/salepage_model');

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


$data['tab'] = 'salepage';
$data['title'] = 'Sale Page';
		$this->deshboardlayout('sale/salepage',$data);
}




function Getproductlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Getproductlist($data);

	}

	function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Findproduct($data);

	}



function Customer()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Customer($data);

	}


	function Gettoday()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Gettoday($data);

	}


function Savesale()
    {

	$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$runnolast = $this->salepage_model->Getrunnolast();

if($runnolast){
	$runnonow = $runnolast[0]['sale_runno'];

$runnoplus = $runnonow + '1';
$header_code = str_pad($runnoplus, 10, "0", STR_PAD_LEFT);
}else{
	$header_code = '0000000001';
}

//$adddate = time();
//$header_code = time();

for($i=1;$i<=count($data['listsale']) ;$i++){


$data['sale_runno'] = $header_code;
//$data['adddate'] = $adddate;

	if($data['listsale'][$i-1]['product_id']!='' && $data['listsale'][$i-1]['product_sale_num']!='0'){
$data['listsale'][$i-1]['sale_runno'] = $header_code;
$data['listsale'][$i-1]['adddate'] = $data['adddate'];
$data['listsale'][$i-1]['ID'] = null;

  $this->salepage_model->Adddetail($data['listsale'][$i-1]);

  $this->salepage_model->Updateproductdeletestock($data['listsale'][$i-1]);


	$getproductformat = $this->salepage_model->Getproductformat($data['listsale'][$i-1]);

//print_r($getproductformat);

for($ix=1;$ix<=count($getproductformat) ;$ix++){

	$matnum = $getproductformat[$ix-1]['num']*$data['listsale'][$i-1]['product_sale_num'];
$this->salepage_model->Productmaterialdeletestock($getproductformat[$ix-1]['product_id_material'],$matnum);
}











if($i==count($data['listsale'])){


    $resault =  $this->salepage_model->Findsalelistdub($data);


    foreach ($resault as $row)
    {

     $data2['product_id'] = $row->product_id;
     $data2['product_price'] = $row->product_price;
      $data2['product_sale_num'] =   $row->product_sale_num;

    $this->salepage_model->Updateproductaddstock($data2);


    $getproductformat = $this->salepage_model->Getproductformat($data2);

    //print_r($getproductformat);

    for($i=1;$i<=count($getproductformat) ;$i++){

    	$matnum = $getproductformat[$i-1]['num']*$data2['product_sale_num'];
    $this->salepage_model->Productmaterialaddstock($getproductformat[$i-1]['product_id_material'],$matnum);
    }

  }


$this->salepage_model->Deletelastsavesale($data);

}




if($i==1){




$this->salepage_model->Addheader($data);

}

}

}



	}






  function Getquotation()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Getquotation($data);

	}



  function Savequotation()
      {

  	$data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }

  //$numforcuslast = $this->salepage_model->Getnumforcuslast();
  //$numforcusnow = $numforcuslast[0]['number_for_cus'];

  //$numforcusplus = $numforcusnow + '1';


  //$runnolast = $this->salepage_model->Getrunnolast();



  //$adddate = time();
  $header_code = 'quo'.$data['adddate'];

  for($i=1;$i<=count($data['listsale']) ;$i++){

  //$data['number_for_cus'] = $numforcusplus;

  $data['sale_runno'] = $header_code;
  //$data['adddate'] = $adddate;



  	if($data['listsale'][$i-1]['product_id']!='' && $data['listsale'][$i-1]['product_sale_num']!='0'){
  $data['listsale'][$i-1]['sale_runno'] = $header_code;
  $data['listsale'][$i-1]['adddate'] = $data['adddate'];

$data['listsale'][$i-1]['ID'] = null;

  if($this->salepage_model->Adddetailquotation($data['listsale'][$i-1])){
  	//$this->salepage_model->Updateproductdeletestock($data['listsale'][$i-1]);


    //$getrelationlist = $this->salepage_model->Getrelationlist($data['listsale'][$i-1]['product_id']);

    //print_r($getrelationlist);
    //foreach ($getrelationlist as $key => $value) {
    //$this->salepage_model->Updateproductdeletestock_relation($value['product_id_relation'],($value['product_num_relation']*$data['listsale'][$i-1]['product_sale_num']));

    //}

  }





  if($i==1){
  $this->salepage_model->Addheaderquotation($data);
  //$price_value = $data['sumsale_price']-$data['discount_last'];
  //$this->salepage_model->Addmoneychange($data['money_changeto_customer'],$data['money_from_customer'],$price_value);
  }

  }

  }



  	}








	}
