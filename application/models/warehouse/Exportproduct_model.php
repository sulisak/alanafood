<?php

class Exportproduct_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Adddetail($data)
        {

$data2['importproduct_header_code'] = $data['importproduct_header_code'];
$data2['product_id'] = $data['product_id'];

$data2['lotno'] = $data['lotno'];
$data2['date_end'] = $data['date_end'];
$data2['date_end2'] = strtotime($data['date_end']);

$data2['importproduct_detail_pricebase'] = $data['importproduct_detail_pricebase'];
$data2['importproduct_detail_num'] = $data['importproduct_detail_num'];
$data2['importproduct_detail_date'] = $data['importproduct_detail_date'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
if ($this->db->insert("wh_exportproduct_detail", $data2)){

		return true;
	}

  }


      public function Addheader($data)
        {
$data2['importproduct_header_remark'] = $data['importproduct_header_remark'];
$data2['importproduct_header_refcode'] = $data['importproduct_header_refcode'];
$data2['importproduct_header_num'] = $data['importproduct_header_num'];
$data2['importproduct_header_amount'] = $data['importproduct_header_amount'];
$data2['importproduct_header_code'] = $data['importproduct_header_code'];
$data2['importproduct_header_date'] = $data['importproduct_header_date'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

$data2['lotno'] = $data['lotno'];
$data2['date_end'] = $data['date_end'];
$data2['date_end2'] = strtotime($data['date_end']);


if ($this->db->insert("wh_exportproduct_header", $data2)){
        return true;
    }

  }







           public function Get($data)
        {


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT *,
    from_unixtime(importproduct_header_date,"%d-%m-%Y %H:%i:%s") as importproduct_header_date2
    FROM wh_exportproduct_header
    WHERE owner_id="'.$_SESSION['owner_id'].'"  AND importproduct_header_refcode LIKE "%'.$data['searchtext'].'%"
    OR owner_id="'.$_SESSION['owner_id'].'"  AND importproduct_header_remark LIKE "%'.$data['searchtext'].'%"
    OR owner_id="'.$_SESSION['owner_id'].'"  AND importproduct_header_code LIKE "%'.$data['searchtext'].'%"
    ORDER BY importproduct_header_id DESC LIMIT '.$start.' , '.$perpage.' ');


$query = $this->db->query('SELECT *,
    from_unixtime(importproduct_header_date,"%d-%m-%Y %H:%i:%s") as importproduct_header_date2
    FROM wh_exportproduct_header
    WHERE
    owner_id="'.$_SESSION['owner_id'].'"  AND importproduct_header_refcode LIKE "%'.$data['searchtext'].'%"
    OR owner_id="'.$_SESSION['owner_id'].'"  AND importproduct_header_remark LIKE "%'.$data['searchtext'].'%"
    OR owner_id="'.$_SESSION['owner_id'].'"  AND importproduct_header_code LIKE "%'.$data['searchtext'].'%"
    ORDER BY importproduct_header_id DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }









        public function Getdateend($data)
     {


     $perpage = $data['perpage'];

         if($data['page'] && $data['page'] != ''){
     $page = $data['page'];
         }else{
       $page = '1';
         }


         $start = ($page - 1) * $perpage;


     $querynum = $this->db->query('SELECT wl.product_name,
       wd.lotno,
       wd.date_end,
       wd.date_end2,
     from_unixtime(importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date2
     FROM wh_exportproduct_detail as wd
     LEFT JOIN wh_product_list as wl on wl.product_id=wd.product_id
     WHERE  wd.date_end !="" AND wd.status="0"  AND wl.product_name LIKE "%'.$data['searchtext'].'%"
     OR  wd.date_end !="" AND wd.status="0" AND wd.lotno LIKE "%'.$data['searchtext'].'%"
     ORDER BY wd.date_end2 ASC LIMIT '.$start.' , '.$perpage.' ');


     $query = $this->db->query('SELECT wl.product_id,wl.product_name,wl.product_code,
       wd.lotno,
       wd.date_end,
       wd.date_end2,
       wd.importproduct_detail_num,
       wd.importproduct_detail_id,
     from_unixtime(importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date2
     FROM wh_exportproduct_detail as wd
     LEFT JOIN wh_product_list as wl on wl.product_id=wd.product_id
     WHERE  wd.date_end !="" AND wd.status="0"  AND wl.product_name LIKE "%'.$data['searchtext'].'%"
     OR  wd.date_end !="" AND wd.status="0" AND wd.lotno LIKE "%'.$data['searchtext'].'%"
     ORDER BY wd.date_end2 ASC LIMIT '.$start.' , '.$perpage.' ');
     $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


     $num_rows = $querynum->num_rows();

     $pageall = ceil($num_rows/$perpage);




     $json = '{"list": '.$encode_data.',
     "numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

     return $json;


     }











public function Getimportone($data)
        {

$query = $this->db->query('SELECT
wp.product_name as product_name,
wp.product_code as product_code,
wi.lotno as lotno,
wi.date_end as date_end,
wi.importproduct_detail_pricebase as importproduct_detail_pricebase,
wi.importproduct_detail_num as importproduct_detail_num,
from_unixtime(wi.importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date,
z.zone_name as zone_name
    FROM wh_exportproduct_detail as wi
    LEFT JOIN wh_product_list as wp on wp.product_id=wi.product_id
    LEFT JOIN zone as z on z.zone_id=wi.product_id
    WHERE wi.owner_id="'.$_SESSION['owner_id'].'" and wi.importproduct_header_code="'.$data['importproduct_header_code'].'"
    ORDER BY wi.importproduct_detail_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Getimportone2($data)
        {

$query = $this->db->query('SELECT
wp.product_id as product_id,
wp.product_name as product_name,
wi.importproduct_detail_pricebase as importproduct_detail_pricebase,
wi.importproduct_detail_num as importproduct_detail_num,
from_unixtime(wi.importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date
    FROM wh_exportproduct_detail as wi
    LEFT JOIN wh_product_list as wp on wp.product_id=wi.product_id
    WHERE wi.owner_id="'.$_SESSION['owner_id'].'" and wi.importproduct_header_code="'.$data['importproduct_header_code'].'"
    ORDER BY wi.importproduct_detail_id ASC');
$encode_data = $query->result();
return $encode_data;

        }





    public function Deleteimportlist($data)
        {

$query = $this->db->query('DELETE FROM wh_exportproduct_detail  WHERE importproduct_header_code="'.$data['importproduct_header_code'].'" and  owner_id="'.$_SESSION['owner_id'].'"');

if($query){
$query2 = $this->db->query('DELETE FROM wh_exportproduct_header  WHERE importproduct_header_code="'.$data['importproduct_header_code'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
}


return true;

        }




        public function Updatestatusdateend($data)
        {

        $query = $this->db->query('UPDATE wh_exportproduct_detail
        SET status="1"
        WHERE importproduct_detail_id="'.$data['importproduct_detail_id'].'"');



        $query2 = $this->db->query('UPDATE wh_product_list
            SET product_stock_num=product_stock_num + '.$data['importproduct_detail_num'].'
            WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');

        return true;




        }






        public function Salestatusdateend3($data)
        {

        $query = $this->db->query('UPDATE wh_exportproduct_detail
        SET status="3"
        WHERE importproduct_detail_id="'.$data['importproduct_detail_id'].'"');

        return true;




        }






        public function Updateproductimportstock($data)
        {

$price_value = $data['importproduct_detail_pricebase'] * $data['importproduct_detail_num'];
$query = $this->db->query('UPDATE wh_product_list
    SET product_stock_num=product_stock_num - '.$data['importproduct_detail_num'].',product_num_all=product_num_all - '.$data['importproduct_detail_num'].',
    product_price_value=product_price_value - '.$price_value.'
    WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }

         public function Updateproductdeletestock($data2)
        {
$price_value = $data2['detailnum'] * $data2['detailpricebase'];
$query = $this->db->query('UPDATE wh_product_list
    SET product_stock_num=product_stock_num + '.$data2['detailnum'].',
    product_num_all=product_num_all + '.$data2['detailnum'].',
    product_price_value=product_price_value - '.$price_value.'
    WHERE product_id="'.$data2['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }



         public function Findproduct($data)
        {

$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_pricebase as product_pricebase
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_code="'.$data['product_code'].'"
    ORDER BY wl.product_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





        public function Findproduct2($data)
        {

        $query = $this->db->query('SELECT
        wl.product_id as product_id,
        wl.product_code as product_code,
        wl.product_name as product_name,
        wl.product_pricebase as product_pricebase
        FROM wh_product_list  as wl
        LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
        WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_name LIKE "%'.$data['product_name'].'%"
        ORDER BY wl.product_id DESC LIMIT 5');
        $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
        return $encode_data;

        }






        public function Getrelationlist($product_id)
        {

        $query = $this->db->query('SELECT
        *
        FROM wh_product_relation_list
        WHERE product_id="'.$product_id.'"');
        return $query->result_array();

        }




        public function Updateproductimportstock_relation($product_id,$numnow)
        {

        $query = $this->db->query('UPDATE wh_product_list
        SET product_stock_num=product_stock_num - '.$numnow.'
        WHERE product_id="'.$product_id.'" and  owner_id="'.$_SESSION['owner_id'].'"');
        return true;

        }






    }
