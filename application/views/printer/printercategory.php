
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<h2>ເຄື່ອງປິ້ນໃບບິນ</h2>
<table width="100%" class="table table-hover table-bordered">
	<tr>

		<td colspan="1" class="text-center">

<select class="form-control" ng-model="printer_ul" ng-change="Cashierprinteripsave()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
	USB ປິ້ນບຣາວເຊີ
	</option>
  <!-- <option value="1">
USB Standalone
</option>

 <option value="2">
LAN Network Wifi
</option> -->
</select>

		</td>

		<td colspan="2" class="text-center" >

<select class="form-control" ng-model="printer_type" ng-change="Cashierprinteripsave()"  style="width:200px;font-size:16px;font-weight:bold;height:50px;">
<option value="1">
ຂະໜາດ 58mm
</option>
<option value="2">
ຂະໜາດ 80mm
</option>
</select>

		</td>





	</tr>


<tr ng-show="printer_ul=='1'">
	<td>ຊື່ເຄື່ອງປິ້ນບິນ</td>
	<td>
		<input type="text" ng-model="printer_name" class="form-control" placeholder="ຊື່ ເຄື່ອງປິ້ນບິນ" style="font-size:16px;font-weight:bold;height:50px;">
	</td>
	<td>
		<button class="btn btn-success btn-lg" ng-click="Cashierprinteripsave()">ບັນທຶກ</button>

	</td>
	</tr>


	<tr ng-show="printer_ul=='2'">
		<td>IP ປິນເຕີຂອງແຄັດເຊຍ</td>
		<td>
			<input type="text" ng-model="cashier_printer_ip" class="form-control" placeholder="192.168.0.250" style="font-size:16px;font-weight:bold;height:50px;">
		</td>
		<td>
			<button class="btn btn-success btn-lg" ng-click="Cashierprinteripsave()">ບັນທຶກ</button>

		</td>
	</tr>

	<tr ng-show="printer_ul=='2'">
		<td>ການປິ້ນອໍເດີເຂົ້າຄົວໂດຍໃຫ້ລາຍການອາຫານເປັນແບບ</td>
		<td colspan="2">
			<select class="form-control" ng-model="printer_order_type" ng-change="Cashierprinteripsave()"  style="width:400px;font-size:16px;font-weight:bold;height:50px;">
			<option value="0">
			ຕັດແຍກແຜ່ນ (ແຍກຕາມ ip ໝວດໝູ່ອາຫານ)
			</option>
			<option value="1">
			ລວມກັນເປັນແຜ່ນດຽວ (ອອກປິນເຕີຂອງແຄັດເຊຍ)
			</option>
			</select>
		</td>

	</tr>


</table>


<div style="position: absolute; opacity: 0.0;">
<span id="printtest" style="text-align: left;font-size: 20px;font-weight: bold;width: 400px;">
<br />
ຂໍ້ຄວາມປິນ
<br />
</span>
</div>


<div ng-show="printer_ul=='2' && printer_order_type =='0'">

<b>ປິນໃບອໍເດີເຂົ້າຄົວແຍກຕາມໝວດໝູ່</b>
<table id="headerTable" class="table table-hover table-bordered" >
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<th><?=$lang_categoryname?></th>
			<!-- <th>ครัว</th> -->
			<th>IP Printer</th>
			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in categorylist">

		<td align="center">{{$index+1}}</td>

			<td>{{x.product_category_name}}</td>
<!-- <td>{{x.kitchen_name}}</td> -->


			<td ng-show="product_category_id==x.product_category_id">
				<input type="text" ng-model="x.printer_ip" class="form-control">
			</td>

			<td ng-show="product_category_id!=x.product_category_id">{{x.printer_ip}}</td>

			<td ng-show="product_category_id!=x.product_category_id">

				<button class="btn btn-xs btn-warning" ng-click="Editinputcategory(x.product_category_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletecategory(x.product_category_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="product_category_id==x.product_category_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavecategory(x.product_category_id,x.printer_ip)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcategory(x.product_category_id)"><?=$lang_cancel?></button>
			</td>

		</tr>
	</tbody>
</table>

<hr />

<b>ສົ່ງອໍເດີເຂົ້າໜ້າຈໍ CHEF ແຍກຕາມຄົວ  ແລະປິ້ນໃບອໍເດີຕາມ ເຄື່ອງປິ້ນ ip</b>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<!-- <th><?=$lang_categoryname?></th> -->
			<th>ครัว</th>
			<th>IP Printer</th>
			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in kitchenlist">

		<td align="center">{{$index+1}}</td>

			<!-- <td>{{x.product_category_name}}</td> -->
<td>
	<a href="<?php echo $base_url;?>/sale/chef?id={{x.kitchen_id}}" target="_blank" class="btn btn-default">
					{{x.kitchen_name}}
	</a>
</td>


			<td ng-show="kitchen_id==x.kitchen_id">
				<input type="text" ng-model="x.printer_ip" class="form-control">
			</td>

			<td ng-show="kitchen_id!=x.kitchen_id">{{x.printer_ip}}</td>

			<td ng-show="kitchen_id!=x.kitchen_id">

				<button class="btn btn-xs btn-warning" ng-click="Editinputkitchen(x.kitchen_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbutkitchen" class="btn btn-xs btn-danger" ng-click="Deletekitchen(x.kitchen_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="kitchen_id==x.kitchen_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavekitchen(x.kitchen_id,x.printer_ip)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelkitchen(x.kitchen_id)"><?=$lang_cancel?></button>
			</td>

		</tr>
	</tbody>
</table>

</div>





	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.get = function(){

$http.get('Printercategory/get')
       .then(function(response){
          $scope.categorylist = response.data.list;

        });


				$http.get('Printercategory/get_kitchen')
				       .then(function(response){
				          $scope.kitchenlist = response.data.list;

				        });



   };
$scope.get();



$scope.getcashier = function(){

$http.get('Printercategory/getcashier')
       .then(function(response){
          $scope.cashier_printer_ip = response.data[0].cashier_printer_ip;
					$scope.printer_type = response.data[0].printer_type;
					$scope.printer_order_type = response.data[0].printer_order_type;
					$scope.printer_ul = response.data[0].printer_ul;
					$scope.printer_name = response.data[0].printer_name;

        });
   };
$scope.getcashier();


$scope.Cashierprinteripsave = function(){
$http.post("Printercategory/Cashierprinteripupdate",{
	cashier_printer_ip: $scope.cashier_printer_ip,
	printer_type: $scope.printer_type,
	printer_order_type: $scope.printer_order_type,
	printer_ul: $scope.printer_ul,
	printer_name: $scope.printer_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getcashier();

        });
};







$scope.Editinputcategory = function(product_category_id){
$scope.product_category_id = product_category_id;
};

$scope.Cancelcategory = function(product_category_id){
$scope.product_category_id = '';
$scope.get();
};

$scope.Editsavecategory = function(product_category_id,printer_ip){
$http.post("Printercategory/Update",{
	product_category_id: product_category_id,
	printer_ip: printer_ip
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.product_category_id = '';
$scope.get();

        });
};






$scope.Editinputkitchen = function(kitchen_id){
$scope.kitchen_id = kitchen_id;
};

$scope.Cancelkitchen = function(kitchen_id){
$scope.kitchen_id = '';
$scope.get();
};

$scope.Editsavekitchen = function(kitchen_id,printer_ip){
$http.post("Printercategory/Update_kitchen",{
	kitchen_id: kitchen_id,
	printer_ip: printer_ip
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.kitchen_id = '';
$scope.get();

        });
};






$scope.printDiv2 = function(x){
	window.scrollTo(0, 0);

toastr.info('ກຳລັງປິ້ນ...');

	var element = $("#printtest");

var getCanvas; // global variable
         html2canvas(element, {
         onrendered: function (canvas) {
               // $("#previewImage").append(canvas);
                getCanvas = canvas;



 var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/(png|jpg);base64,/, "");



    $.ajax({
      url: '<?php echo $base_url;?>/printer/example/interface/lan.php',
      data: {
             imgdata:newData,
             cashier_printer_ip: $scope.cashier_printer_ip
           },
      type: 'post',
      success: function (response) {
               console.log(response);

      }
    });



             }
         });





    //$("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);



};













});
	</script>
