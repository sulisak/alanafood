<?php

class Log_move_table_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }


 public function Get($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto']);



 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT *, from_unixtime(move_date,"%d-%m-%Y %H:%i:%s") as move_date
    FROM sale_list_table_move_log
    WHERE move_date
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
GROUP BY move_date
    ORDER BY ID DESC ');


$query = $this->db->query('SELECT *,
    from_unixtime(move_date,"%d-%m-%Y %H:%i:%s") as move_date_day,
    (SELECT food_table_name FROM food_table as u WHERE u.food_table_id=sh.old_table_id) as old_table_name,
    (SELECT food_table_name FROM food_table as u WHERE u.food_table_id=sh.new_table_id) as new_table_name
    FROM sale_list_table_move_log as sh
    WHERE move_date
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
GROUP BY move_date
ORDER BY ID DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }



public function Getone($data)
        {


$query = $this->db->query('SELECT *,
  SUM(sd.product_sale_num) as product_sale_num,
  from_unixtime(sd.move_date,"%d-%m-%Y %H:%i:%s") as move_date
    FROM sale_list_table_move_log as sd
    WHERE sd.move_date="'.$data['move_date'].'"
    GROUP BY sd.product_name
    ORDER BY sd.ID ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }






  }
