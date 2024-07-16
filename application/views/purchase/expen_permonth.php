
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
	
	 ລະບົບກຳລັງໂຫຼດຂໍ້ມູນກະລຸນາລໍຖ້າ...
</center>
</div>

	<div id="bar"></div>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="text-align: center;width: 150px;">Month</th>

			<th style="text-align: center;">ລາຍຈ່າຍ</th>

		</tr>
	</thead>
	<tbody style="font-size: 16px;font-weight: bold;">
		<tr>
		<td>ມັງກອນ</td>
		<td align="right">{{daylist[0].m1 | number:2}}</td>
		</tr>

		<tr>
		<td>ກຸມພາ</td>
		<td align="right">{{daylist[0].m2 | number:2}}</td>
		</tr>

		<tr>
		<td>ມີນາ</td>
		<td align="right">{{daylist[0].m3 | number:2}}</td>
		</tr>

		<tr>
		<td>ເມສາ</td>
		<td align="right">{{daylist[0].m4 | number:2}}</td>
		</tr>

		<tr>
		<td>ພຶດສະພາ</td>
		<td align="right">{{daylist[0].m5 | number:2}}</td>
		</tr>

		<tr>
		<td>ມິຖຸນາ</td>
		<td align="right">{{daylist[0].m6 | number:2}}</td>
		</tr>

		<tr>
		<td>ກໍລະກົດ</td>
		<td align="right">{{daylist[0].m7 | number:2}}</td>
		</tr>

		<tr>
		<td>สิงหาคม</td>
		<td align="right">{{daylist[0].m8 | number:2}}</td>
		</tr>

		<tr>
		<td>ສິງຫາ</td>
		<td align="right">{{daylist[0].m9 | number:2}}</td>
		</tr>

		<tr>
		<td>ກັນຍາ</td>
		<td align="right">{{daylist[0].m10 | number:2}}</td>
		</tr>

		<tr>
		<td>ພະຈິກ</td>
		<td align="right">{{daylist[0].m11 | number:2}}</td>
		</tr>

		<tr>
		<td>ທັນວາ</td>
		<td align="right">{{daylist[0].m12 | number:2}}</td>
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

$http.post("Expen_permonth/daylist",{
	year: $scope.year
	}).success(function(data){
$scope.daylist = data;


$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push(
	{count: item.m1,name: 'ມັງກອນ'},
	{count: item.m2,name: 'ກຸມພາ'},
	{count: item.m3,name: 'ມີນາ'},
	{count: item.m4,name: 'ເມສາ'},
	{count: item.m5,name: 'ພຶດສະພາ'},
	{count: item.m6,name: 'ມິຖຸນາ'},
	{count: item.m7,name: 'ກໍລະກົດ'},
	{count: item.m8,name: 'ສິງຫາ'},
	{count: item.m9,name: 'ກັນຍາ'},
	{count: item.m10,name: 'ຕຸລາ'},
	{count: item.m11,name: 'ພະຈິກ'},
	{count: item.m12,name: 'ທັນວາ'},
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
  labels: ['ລາຍຈ່າຍ'],
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
