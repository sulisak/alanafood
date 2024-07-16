
<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #000;
}
a{
	color: #000000;
}
</style>
<div class="col-md-2 col-sm-3">


	<div class="panel panel-default">
		<div class="panel-body">

		<ul class="nav nav-pills">



<li style="width: 100%;" <?php if($tab == 'buy'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/purchase/buy">
<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
ສ້າງລາຍຈ່າຍ </a></li>

<li style="width: 100%;" <?php if($tab == 'vendor'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/purchase/vendor">
<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
ຮ້ານທີ່ໄປຊື້ເຄື່ອງ </a></li>




</ul>


		</div>
	</div>


	 <div class="panel panel-default">
		<div class="panel-body">

ລາຍງານ
<ul class="nav nav-pills">

			<li style="width: 100%;" <?php if($tab === 'expen_perday'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/purchase/expen_perday"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
		ລາຍຈ່າຍລາຍວັນ </a></li>

		<li style="width: 100%;" <?php if($tab === 'expen_permonth'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/purchase/expen_permonth"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
	ລາຍຈ່າຍລາຍເດືອນ </a></li>

	<li style="width: 100%;" <?php if($tab === 'expen_report'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/purchase/expen_report"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
	ແຍກລາຍການ</a></li>

</ul>


</div>
	</div>


	</div>
