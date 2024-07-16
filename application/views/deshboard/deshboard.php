
<?php

date_default_timezone_set('Asia/Bangkok');
$date_expire='2025-02-10';
$datenow=date("Y-m-d ",time()); 




if  ($date_expire >= $datenow){

 echo '<span style="font-weight: bold; color: white;font-size: 20px;">Program Active</span>';


}

else {

    header("Location: expirenotice.php"); 


}


?>

<font style="font-family:Phetsarath OT">

	<?php
if($_SESSION['user_type']=='1' || $_SESSION['user_type']=='9' || $_SESSION['user_type']=='10'){
	echo '<script>
window.location = "'.$base_url.'/sale/salepic";
	</script>';
	}?>


<?php
if($_SESSION['user_type']=='2'){
		echo '<script>
window.location = "'.$base_url.'/warehouse/productlist";
	</script>';
	}
	?>


	<?php
	if($_SESSION['user_type']=='15'){
			echo '<script>
	window.location = "'.$base_url.'/sale/chef";
		</script>';
		}
		?>


		<?php
		if($_SESSION['user_type']=='20'){
				echo '<script>
		window.location = "'.$base_url.'/sale/chef_foranyone";
			</script>';
			}
			?>






<style type="text/css">
	body{
		background-color: #eee;
	}
</style>
<div class="container text-center" ng-app="firstapp" ng-controller="Index">

<div class="col-md-12">


<!-- <center>

	<a href="<?php echo $base_url;?>/sale/salebill" class="btn btn-success"  style="font-size: 15px;font-weight: bold;width: 250px;">
<span class="glyphicon glyphicon-align-justify" aria-hidden="true" style="font-size: 50px;"></span><br />
<?=$lang_billreserv?>
</a>
</center> -->


<br />

<div class="col-md-6">


<div class="col-md-6">
<a style="text-decoration: none;" href="<?php echo $base_url;?>/sale/salereportshift" title="&#3776;&#3738;&#3764;&#3784;&#3719;&#3725;&#3757;&#3732;&#3714;&#3762;&#3725;&#3749;&#3751;&#3745;">
<div class="panel" style="height: 200px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<b>&#3725;&#3757;&#3732;&#3714;&#3762;&#3725;&#3713;&#3760;&#3735;&#3765; <?php if(isset($_SESSION['shift_id'])){ echo number_format($_SESSION['shift_id']);}else{ echo '(&#3725;&#3761;&#3719;&#3738;&#3789;&#3784;&#3780;&#3732;&#3785;&#3739;&#3764;&#3732;&#3713;&#3760;)';} ?></b>
<br />



	<h3><?=$lang_foodbill?>: <b>{{saletodaytable[0].numtable | number}}</b></h3>




	<h3><?=$lang_list?>: <b>{{saletoday[0].sumnum | number}}</b>
<br /><br />
	<?=$lang_income?>: <b>{{saletoday[0].sumprice | number:2}}</b></h3>

</div>
</a>
</div>




<div class="col-md-6">
<a style="text-decoration: none;" href="<?php echo $base_url;?>/sale/salereport" title="&#3776;&#3738;&#3764;&#3784;&#3719;&#3725;&#3757;&#3732;&#3714;&#3762;&#3725;&#3749;&#3762;&#3725;&#3713;&#3762;&#3737;&#3757;&#3762;&#3755;&#3762;&#3737;">
<div class="panel" style="text-align: left;height: 200px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center>
	<center><b>&#3714;&#3762;&#3725;&#3732;&#3765;&#3713;&#3760;&#3735;&#3765; <?php if(isset($_SESSION['shift_id'])){ echo number_format($_SESSION['shift_id']);}else{ echo '(&#3725;&#3761;&#3719;&#3738;&#3789;&#3784;&#3780;&#3732;&#3785;&#3776;&#3739;&#3765;&#3732;&#3713;&#3760;)';} ?></b>


<table width="90%">

<tr ng-repeat="x in productsaletoday">
	<td>{{$index+1}}. {{x.product_name}}</td><td align="right">{{x.product_numall | number}}</td>
</tr>


 </table>

 </center>

</div>
</a>
</div>


<div class="col-md-6">
<a style="text-decoration: none;" href="<?php echo $base_url;?>/warehouse/stock" title="&#3776;&#3738;&#3764;&#3784;&#3719;&#3754;&#3760;&#3733;&#3787;&#3757;&#3713;&#3751;&#3761;&#3732;&#3734;&#3768;&#3732;&#3764;&#3738;&#3725;&#3761;&#3719;&#3776;&#3755;&#3772;&#3767;&#3757;">
<div class="panel" style="text-align: left;height: 220px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center><b>&#3754;&#3760;&#3733;&#3787;&#3757;&#3713;&#3725;&#3761;&#3719;&#3776;&#3755;&#3772;&#3767;&#3757;</b>

<table width="90%">
<tr ng-repeat="x in productoutofstock">
<td>{{$index+1}}. {{x.product_name}}</td><td align="right">{{x.product_stock_num | number}}</td>
</tr>

 </table>

 </center>

</div>
</a>
</div>


<div class="col-md-6">
<a style="text-decoration: none;" href="<?php echo $base_url;?>/warehouse/stockmat" title="&#3776;&#3738;&#3764;&#3784;&#3719;&#3754;&#3760;&#3733;&#3787;&#3757;&#3713;&#3751;&#3761;&#3732;&#3734;&#3768;&#3732;&#3764;&#3738;&#3725;&#3761;&#3719;&#3776;&#3755;&#3772;&#3767;&#3757;">
<div class="panel" style="text-align: left;height: 220px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center><b>&#3751;&#3761;&#3732;&#3734;&#3768;&#3732;&#3764;&#3738;&#3725;&#3761;&#3719;&#3776;&#3755;&#3772;&#3767;&#3757;</b>

<table width="90%">
<tr ng-repeat="x in productmatoutofstock">
<td>{{$index+1}}. {{x.product_name}}</td><td align="right">{{x.product_stock_num | number}}</td>
</tr>

 </table>

 </center>

</div>
</a>
</div>






</div>

<div class="col-md-6">

<a href="<?php echo $base_url;?>/sale/salepic" class="btn btn-success"  style="font-size: 18px;font-weight: bold; width: 450px;">
<span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="font-size: 50px;"></span><br />
&#3720;&#3789;&#3714;&#3762;&#3725;&#3757;&#3762;&#3755;&#3762;&#3737;/&#3776;&#3716;&#3767;&#3784;&#3757;&#3719;&#3732;&#3767;&#3784;&#3745;
</a>

<!-- <a href="<?php echo $base_url;?>/sale/salepage" class="btn btn-warning"  style="font-size: 15px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-record" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_salelist?>
</a> -->



<!-- <a href="<?php echo $base_url;?>/sale/product_return" class="btn btn-default"  style="font-size: 15px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-refresh" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_returnproduct?>
</a> -->


<br/><br/>

<a href="<?php echo $base_url;?>/purchase/buy" class="btn btn-primary" style="font-size: 18px;font-weight: bold; width: 450px;">

<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="font-size: 50px;"></span><br /> &#3738;&#3761;&#3737;&#3735;&#3766;&#3713;&#3749;&#3762;&#3725;&#3720;&#3784;&#3762;&#3725;

</a>
<p></p>


<a href="<?php echo $base_url;?>/warehouse/productlist" class="btn btn-primary"  style="font-size: 18px;font-weight: bold;width: 150px;">
<span class="glyphicon glyphicon-cutlery" aria-hidden="true" style="font-size: 50px;"></span><br />
&#3757;&#3762;&#3755;&#3762;&#3737;/&#3776;&#3716;&#3767;&#3784;&#3757;&#3719;&#3732;&#3767;&#3784;&#3745;
</a>




<a href="<?php echo $base_url;?>/mycustomer" class="btn btn-primary" style="font-size: 18px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: 50px;"></span><br /> &#3749;&#3769;&#3713;&#3716;&#3785;&#3762;
</a>


<a href="<?php echo $base_url;?>/sale/salelist" class="btn btn-primary"  style="font-size: 18px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size: 50px;"></span><br />
 &#3749;&#3762;&#3725;&#3719;&#3762;&#3737;&#3713;&#3762;&#3737;&#3714;&#3762;&#3725;
</a>


<br/><br/>





<a href="<?php echo $base_url;?>/food/food_table" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_managetable?>
</a>




<a href="<?php echo $base_url;?>/salesetting/discount" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 50px;"></span><br />
<?=$lang_salesetting?>
</a>




<a href="<?php echo $base_url;?>/storemanager/user_owner" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 150px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 50px;"></span><br />
<?=$lang_managestore?>
</a>


<br/><br/>




<a href="<?php echo $base_url;?>/printer/printercategory" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 450px;">
<span class="glyphicon glyphicon-print" aria-hidden="true" style="font-size: 50px;"></span><br /> &#3776;&#3716;&#3767;&#3784;&#3757;&#3719;&#3742;&#3764;&#3745;
</a>

<br/><br/>

</div>

<hr />


<div class="col-md-12">
<center>



	<a href="<?php echo $base_url;?>/backup_all" class="btn btn-info"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
	<span class="glyphicon glyphicon-save" aria-hidden="true" style="font-size: 30px;"></span><br />
	Backup Database
	</a>


<br /><br />	



<a href="#" class="btn btn-danger" ng-click="Delsaleall()"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
	<span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 30px;"></span><br />
	&#3749;&#3766;&#3738;&#3739;&#3760;&#3755;&#3751;&#3761;&#3732;&#3713;&#3762;&#3737;&#3714;&#3762;&#3725;&#3735;&#3761;&#3719;&#3805;&#3771;&#3732;
	</a>



</center>
</div>








<div class="modal fade" id="Delsaleall">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">&#3749;&#3766;&#3738;&#3739;&#3760;&#3755;&#3751;&#3761;&#3732;&#3713;&#3762;&#3737;&#3714;&#3762;&#3725;&#3735;&#3761;&#3719;&#3805;&#3771;&#3732;</h4>
			</div>
			<div class="modal-body">
			<center>
<font style="color:red;">*** &#3739;&#3760;&#3755;&#3751;&#3761;&#3732;&#3713;&#3762;&#3737;&#3714;&#3762;&#3725;&#3735;&#3761;&#3719;&#3805;&#3771;&#3732;&#3720;&#3760;&#3755;&#3762;&#3725;&#3780;&#3739; &#3738;&#3789;&#3784;&#3754;&#3762;&#3745;&#3762;&#3732;&#3737;&#3763;&#3713;&#3761;&#3738;&#3716;&#3767;&#3737;&#3745;&#3762;&#3780;&#3732;&#3785; </font>
<br />
<a href="<?php echo $base_url;?>/c2mhelper/delsaleall" class="btn btn-success"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
	&#3746;&#3767;&#3737;&#3746;&#3761;&#3737;
	</a>

</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>



</div>
</div>


</font>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.Saletodaytable = function(){

$http.get('Home/Saletodaytable')
		 .then(function(response){
				$scope.saletodaytable = response.data;

			});
 };
$scope.Saletodaytable();




$scope.Saletoday = function(){

$http.get('Home/Saletoday')
		 .then(function(response){
				$scope.saletoday = response.data;

			});
 };
$scope.Saletoday();




$scope.Productsaletoday = function(){

$http.get('Home/Productsaletoday')
		 .then(function(response){
				$scope.productsaletoday = response.data;

			});
 };
$scope.Productsaletoday();


$scope.Productoutofstock = function(){

$http.get('Home/Productoutofstock')
		 .then(function(response){
				$scope.productoutofstock = response.data;

			});
 };
$scope.Productoutofstock();


$scope.Productmatoutofstock = function(){

$http.get('Home/Productmatoutofstock')
		 .then(function(response){
				$scope.productmatoutofstock = response.data;

			});
 };
$scope.Productmatoutofstock();



$scope.Delsaleall = function(){

$('#Delsaleall').modal('show');
 };
 
 
 
 

});
	</script>
