<?php

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

$adddate = time();
//$header_code = time();


$data['sale_runno'] = $header_code;
$data['adddate'] = $adddate;


for($i=1;$i<=count($data['listsale']) ;$i++){




	if($data['listsale'][$i-1]['product_id']!='' && $data['listsale'][$i-1]['product_sale_num']!='0'){
$data['listsale'][$i-1]['sale_runno'] = $header_code;
$data['listsale'][$i-1]['adddate'] = $adddate;

if($this->salepage_model->Adddetail($data['listsale'][$i-1])){
	$this->salepage_model->Updateproductdeletestock($data['listsale'][$i-1]);


	$getproductformat = $this->salepage_model->Getproductformat($data['listsale'][$i-1]);

//print_r($getproductformat);

for($ix=1;$ix<=count($getproductformat) ;$ix++){

	$matnum = $getproductformat[$ix-1]['num']*$data['listsale'][$ix-1]['product_sale_num'];
$this->salepage_model->Productmaterialdeletestock($getproductformat[$ix-1]['product_id_material'],$matnum);
}





}





if($i==1){
$this->salepage_model->Addheader($data);

}

}

}


?>
