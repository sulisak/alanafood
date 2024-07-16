
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">







<form class="form-inline">



<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>


<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>
<br />




<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?=$lang_rank?></th>
			<th>ເບິ່ງລາຍການ</th>

			<th>ຈາກໂຕະ</th>

			<th>ໄປຫາໂຕະ</th>

			<th>ຜູ້ເຮັດລາຍການ</th>
			<th>ວັນທີ</th>


		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			<td><button class="btn btn-default btn-sm" ng-click="Getone(x)">ดูรายการ {{x.move_date}}</button></td>

<td>{{x.old_table_name}}</td>

	<td>{{x.new_table_name}}</td>

			<td  align="right">{{x.mover}}</td>
			<td  align="right">{{x.move_date_day}}</td>

		</tr>
	</tbody>
</table>




<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getlist(searchtext,'1',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
	<option value="500">500</option>
	<option value="1000">1000</option>
	<option value="10000">10000</option>
	<option value="100000">100000</option>
	<option value="1000000">1000000</option>
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>




<div class="modal fade" id="Openone">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_saleproductlist?></h4>
			</div>
			<div class="modal-body">
	Code:{{move_date}} <!-- , <?=$lang_cusname?>: {{cus_name}}	, <?=$lang_address?>: {{cus_address_all}}	 -->
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?=$lang_rank?></th>
			<th><?=$lang_productname?></th>
			<!-- <th><?=$lang_barcode?></th> -->
			<th><?=$lang_pricesale?></th>
			<th><?=$lang_discountperunit?></th>
			<th><?=$lang_qty?></th>
			<th><?=$lang_all?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">
			<td>{{$index+1}}</td>
			<td>{{x.product_name}}</td>
			<!-- <td align="center">{{x.product_code}}</td> -->
			<td align="right">{{x.product_price | number:2}}</td>
			<td align="right">{{x.product_price_discount | number:2}}</td>
			<td align="right">{{x.product_sale_num | number}}</td>
			<td align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>





	</tbody>
</table>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>









	</div>


	</div>

	</div>


		<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


	$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};





$("#dayfrom").datetimepicker({
    datetimepicker:false,
        format:'d-m-Y H:i',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$("#dayto").datetimepicker({
    datetimepicker:false,
        format:'d-m-Y H:i',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.dayfrom = '<?php echo date('d-m-Y 00:01',time());?>';
$scope.dayto = '<?php echo date('d-m-Y 23:59',time());?>';





$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage){
   if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

   $http.post("Log_move_table/get",{
searchtext:searchtext,
page: page,
perpage: perpage,
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
}).success(function(data){
$scope.list = data.list;
$scope.pageall = data.pageall;
$scope.numall = data.numall;

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;

        });

   };
$scope.getlist('','1');



$scope.Getone = function(x){
$('#Openone').modal('show');
$http.post("Log_move_table/Getone",{
	move_date: x.move_date
}).success(function(response){
	$scope.move_date = x.move_date;
$scope.listone = response;
        });

};





});
	</script>
