<?php

class Salereport_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto']);


$query = $this->db->query('SELECT
    wpl.product_id as product_id,
    wpl.product_code as product_code,
    wpl.product_name as product_name,
    wpc.product_category_name as product_category_name,
    (SELECT sum(sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_numall,
    (SELECT sum(sd.product_price * sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id   AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_pricesaleall,
    (SELECT sum(sd.product_price_discount*sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id   AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_pricediscountall,
    (SELECT sum((sd.product_price - sd.product_price_discount) * sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_priceall,
    (SELECT wid.product_pricebase FROM wh_product_list as wid WHERE wid.product_id=wpl.product_id AND wid.owner_id="'.$_SESSION['owner_id'].'") as product_pricebaseall

FROM sale_list_datail as sld
LEFT JOIN wh_product_list as wpl on wpl.product_id=sld.product_id
LEFT JOIN wh_product_category as wpc on wpc.product_category_id=wpl.product_category_id
WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.product_category_id="'.$data['product_category_id'].'"
AND sld.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
GROUP BY sld.product_id ORDER BY product_priceall DESC');


$query2 = $this->db->query('SELECT
    wpl.product_id as product_id,
    wpl.product_code as product_code,
    wpl.product_name as product_name,
    wpc.product_category_name as product_category_name,
    (SELECT sum(sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_numall,
    (SELECT sum(sd.product_price * sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id   AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_pricesaleall,
    (SELECT sum(sd.product_price_discount*sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id   AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_pricediscountall,
    (SELECT sum((sd.product_price - sd.product_price_discount) * sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_priceall,
    (SELECT wid.product_pricebase FROM wh_product_list as wid WHERE wid.product_id=wpl.product_id AND wid.owner_id="'.$_SESSION['owner_id'].'") as product_pricebaseall

FROM sale_list_datail as sld
LEFT JOIN wh_product_list as wpl on wpl.product_id=sld.product_id
LEFT JOIN wh_product_category as wpc on wpc.product_category_id=wpl.product_category_id
WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
AND sld.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
GROUP BY sld.product_id ORDER BY product_priceall DESC');



$query3 = $this->db->query('SELECT
    wpl.product_id as product_id,
    wpl.product_code as product_code,
    wpl.product_name as product_name,
    wpc.product_category_name as product_category_name,
    (SELECT sum(sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.shift_id="'.$data['shift_id'].'" ) as product_numall,
    (SELECT sum(sd.product_price * sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id   AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.shift_id="'.$data['shift_id'].'" ) as product_pricesaleall,
    (SELECT sum(sd.product_price_discount*sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id   AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.shift_id="'.$data['shift_id'].'" ) as product_pricediscountall,
    (SELECT sum((sd.product_price - sd.product_price_discount) * sd.product_sale_num) FROM sale_list_datail as sd WHERE sd.product_id=wpl.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.shift_id="'.$data['shift_id'].'" ) as product_priceall,
    (SELECT wid.product_pricebase FROM wh_product_list as wid WHERE wid.product_id=wpl.product_id AND wid.owner_id="'.$_SESSION['owner_id'].'") as product_pricebaseall

FROM sale_list_datail as sld
LEFT JOIN wh_product_list as wpl on wpl.product_id=sld.product_id
LEFT JOIN wh_product_category as wpc on wpc.product_category_id=wpl.product_category_id
WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
AND sld.shift_id="'.$data['shift_id'].'"
GROUP BY sld.product_id ORDER BY product_priceall DESC');


if($data['shift_id']!=''){
  $querydata = $query3->result();
}else if($data['product_category_id']!=''){
    $querydata = $query->result();
}else{
    $querydata = $query2->result();
}


$encode_data = json_encode($querydata,JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





public function Salelistdatail($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM sale_list_datail
WHERE owner_id="'.$_SESSION['owner_id'].'"
AND adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND product_id="'.$data['product_id'].'" ORDER BY ID DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




public function Discountlastlist($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM sale_list_header
WHERE owner_id="'.$_SESSION['owner_id'].'"
AND  discount_last!="0.00" AND adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"  ORDER BY ID DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




        public function Exportexcel($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT
    sh.cus_name as "ชื่อลูกค้า",
    sd.product_code as "รหัสสินค้า",
	sd.product_name as "ชื่อสินค้า",
	sd.product_price as "ราคาขายต่อหน่วย",
    sd.product_price_discount as "ส่วนลดต่อหน่วย",
	sd.product_sale_num as "จำนวนที่ซื้อ",
	(sd.product_price*sd.product_sale_num)-(sd.product_sale_num*sd.product_price_discount) as "รายรับ",
	from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as "วันที่"
FROM sale_list_datail as sd
LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
WHERE sh.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
order by sd.ID DESC
 ');
return $query;

        }



    }
