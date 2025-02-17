
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">

<div class="form-group">
ປີ
	<input type="text"  ng-model="year" name="" class="form-control" style="width: 70px;">

</div>

<div class="form-group">
<button type="submit" ng-click="reportdaylist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>

<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->

</form>
<hr />

<div ng-if="showloading">
	<center>
	<img src="<?php echo $base_url;?>/pic/loading.gif" />
	<br />
	ລະບົບກຳລັງໂຫຼດຂໍ້ມູນກະລຸນາລໍຖ້າ...
</center>
</div>

	<div id="bar"></div>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="text-align: center;width: 150px;">Month</th>

			<th style="text-align: center;">กำไร</th>

		</tr>
	</thead>
	<tbody style="font-size: 16px;font-weight: bold;">
		<tr>
		<td>ມັງກອນ</td>
		<td align="right">{{daylist[0].m1-daylist[0].mm1-c1 | number:2}}</td>
		</tr>

		<tr>
		<td>ກຸມພາ</td>
		<td align="right">{{daylist[0].m2-daylist[0].mm2-c2 | number:2}}</td>
		</tr>

		<tr>
		<td>ມີນາ</td>
		<td align="right">{{daylist[0].m3-daylist[0].mm3-c3 | number:2}}</td>
		</tr>

		<tr>
		<td>ເມສາ</td>
		<td align="right">{{daylist[0].m4-daylist[0].mm4-c4 | number:2}}</td>
		</tr>

		<tr>
		<td>ພຶດສະພາ</td>
		<td align="right">{{daylist[0].m5-daylist[0].mm5-c5 | number:2}}</td>
		</tr>

		<tr>
		<td>ມິຖຸນາ</td>
		<td align="right">{{daylist[0].m6-daylist[0].mm6-c6 | number:2}}</td>
		</tr>

		<tr>
		<td>ກໍລະກົດ</td>
		<td align="right">{{daylist[0].m7-daylist[0].mm7-c7 | number:2}}</td>
		</tr>

		<tr>
		<td>ສິງຫາ</td>
		<td align="right">{{daylist[0].m8-daylist[0].mm8-c8 | number:2}}</td>
		</tr>

		<tr>
		<td>ກັນຍາ</td>
		<td align="right">{{daylist[0].m9-daylist[0].mm9-c9 | number:2}}</td>
		</tr>

		<tr>
		<td>ຕຸລາ</td>
		<td align="right">{{daylist[0].m10-daylist[0].mm10-c10 | number:2}}</td>
		</tr>

		<tr>
		<td>ພະຈິກ</td>
		<td align="right">{{daylist[0].m11-daylist[0].mm11-c11 | number:2}}</td>
		</tr>

		<tr>
		<td>ທັນວາ</td>
		<td align="right">{{daylist[0].m12-daylist[0].mm12-c12 | number:2}}</td>
		</tr>


	</tbody>
</table>

<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>


	</div>

	</div>

	</div>




			<script>



var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {



$scope.year = '<?php echo date('Y',time());?>';


$scope.reportdaylist = function(){

$scope.showloading = true;

$http.post("Reportsumarymonth/daylist",{
	year: $scope.year
	}).success(function(data){
$scope.daylist = data.data;
$scope.c1 = data.c1;
$scope.c2 = data.c2;
$scope.c3 = data.c3;
$scope.c4 = data.c4;
$scope.c5 = data.c5;
$scope.c6 = data.c6;
$scope.c7 = data.c7;
$scope.c8 = data.c8;
$scope.c9 = data.c9;
$scope.c10 = data.c10;
$scope.c11 = data.c11;
$scope.c12 = data.c12;

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push(
	{count: item.m1-item.mm1-$scope.c1,name: 'มกรา'},
	{count: item.m2-item.mm2-$scope.c2,name: 'กุมภา'},
	{count: item.m3-item.mm3-$scope.c3,name: 'มีนา'},
	{count: item.m4-item.mm4-$scope.c4,name: 'เมษา'},
	{count: item.m5-item.mm5-$scope.c5,name: 'พฤษภา'},
	{count: item.m6-item.mm6-$scope.c6,name: 'มิถุนา'},
	{count: item.m7-item.mm7-$scope.c7,name: 'กรกฎา'},
	{count: item.m8-item.mm8-$scope.c8,name: 'สิงหา'},
	{count: item.m9-item.mm9-$scope.c9,name: 'กันยา'},
	{count: item.m10-item.mm10-$scope.c10,name: 'ตุลา'},
	{count: item.m11-item.mm11-$scope.c11,name: 'พฤษจิกา'},
	{count: item.m12-item.mm12-$scope.c12,name: 'ธันวา'},
	);

	$scope.showloading = false;
});

$scope.Chart($scope.datac);


        });
};
$scope.reportdaylist();





$scope.datac = [];


$scope.Chart = function(datac){
$('#bar').empty();
Morris.Bar({
  element: 'bar',
  data: datac,
  xkey: 'name',
  ykeys: ['count'],
  labels: ['กำไร'],
  barColors: function (row, series, type) {
    if (type === 'bar') {
     var letters = '0123456789ABCDEF';
    var color = '#f0ad4e';
    /*var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }*/
    return color;
    }
  }

});
};

$scope.Openchart = function(){
$scope.showchart = true;
};

$scope.Opentable = function(){
$scope.showchart = false;
};


});

</script>
