<font style="font-family:Phetsarath OT">

    <?php
if($_SESSION['printer_type']=='1'){
	$pt_width = '380px';
}else{
	$pt_width = '550px';
}
?>



    <?php
if($_SESSION['printer_type']=='1'){
	$slipwidth = '190px';
}else{
	$slipwidth = '250px';
}
?>




    <style type="text/css">
    .product_box:hover {

        box-shadow: 0 1px 2px #000;

    }

    /* new	*/
    @media print {
        * {
            margin: 0 !important;
            padding: 0 !important;
        }

        #controls,
        .footer,
        .footerarea {
            display: none;
        }

        html,
        body {
            /*changing width to 100% causes huge overflow and wrap*/
            height: 100%;
            overflow: hidden;
            background: #FFF;
            font-size: 9.5pt;
        }


    }

    /*--- new */
    </style>

    <head>
        <!-- cdnjs -->
        <!-- <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script> -->
        <script src="<?=$base_url?>/js/jquery.lazy.min.js"></script>
        <script src="<?=$base_url?>/js/jquery.lazy.plugins.min.js"></script>

    </head>

    <div class="lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">

        <!-- <?php if($_SESSION['user_type']=='10'){?>
<div class="col-md-12 text-center panel panel-default" style="font-size:25px;">
		ลูกค้าสั่งอาหาร โต๊ะ {{table_name}}
</div>
<?php } ?> -->



        <input type="hidden" value="{{Discount_lastfunc()}}">

        <div class="col-sm-8 col-md-8">



            <form class="form-inline" style="float: left;">


                <?php if($_SESSION['user_type']!='10'){?>
                <div class="form-group">
                    <button ng-if="table_name != ''" type="submit" ng-click="Opentable()" class="btn btn-primary btn-lg"
                        placeholder="" title="<?=$lang_search?>"
                        style="width: 100%;padding-left: 5px;padding-right: 5px;">

                        <span>
                            {{table_name | limitTo:6}}
                        </span>
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </div>


                <?php } ?>


                <div class="form-group">
                    <select class="form-control" name="product_category_id" ng-model="product_category_id"
                        style="height: 45px;width: 123px;font-size: 20px;" ng-change="Selectcat(product_category_id)">
                        <option value="0">
                            ໝວດໝູ່
                        </option>
                        <option ng-repeat="y in categorylist" value="{{y.product_category_id}}" style="font-size:30px;">
                            {{y.product_category_name}}
                        </option>
                    </select>
                </div>




                <div class="form-group">
                    <input id="product_name_search" ng-model="product_name_search" class="form-control"
                        placeholder="ຄົ້ນຫາ" style="height: 45px;width: 100px;font-size: 20px;"
                        ng-change="searchproductlist(product_name_search)">
                </div>


            </form>


            <?php if($_SESSION['user_type']<'9'){?>
            <form class="form-inline">

                <div class="form-group">
                    <input type="text" id="customer_name" ng-model="customer_name" class="form-control"
                        placeholder="<?=$lang_cusname?>" style="height: 45px;width: 100px;font-size: 14px;" readonly="">
                </div>
                <div class="form-group">
                    <button type="hidden" ng-click="Opencustomer()" class="btn btn-success btn-lg" placeholder=""
                        title="<?=$lang_search?>"><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span></button>
                </div>
                <div class="form-group">
                    <input type="hidden" id="cus_address_all" ng-model="cus_address_all" class="form-control"
                        placeholder="<?=$lang_address?>" style="height: 45px;font-size: 16px;width: 500px;">
                </div>
                <!-- <div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->
                <div class="form-group">
                    <button ng-if="table_name != ''" type="submit" ng-click="Opentablemove()"
                        class="btn btn-warning btn-lg" placeholder="" title="<?=$lang_search?>"
                        style="width: 100%;padding-left: 5px;padding-right: 5px;">

                        <span>
                            <?php echo $lang_movetable;?>/ລວມໂຕະ
                        </span>
                    </button>
                </div>

                <!-- <div class="form-group">
<select class="form-control" ng-model="sale_type"  style="height: 45px;width: 150px;font-size: 20px;">
	<option value="1">
		<?=$lang_retail?>
	</option>

</select>
</div> -->



                <!-- <div class="form-group" style="font-size: 20px;">
<input type="checkbox" ng-model="reserv" ng-true-value="1" ng-false-value="0" style="height: 35px;width: 35px;"><?=$lang_bookitem?>
</div> -->


                <div class="form-group" style="float: right;">

                    <?php if(isset($_SESSION['shift_user_id']) && $_SESSION['user_id']==$_SESSION['shift_user_id']){?>
                    <button ng-click="Closeshiftnow()" class="btn btn-lg btn-info" style="font-weight:bold">ປິດກະ
                        (<?php if(isset($_SESSION['shift_id'])){echo $_SESSION['shift_id'];} ?>)</button>
                    <?php }else{
	if(isset($_SESSION['shift_user_name']) && $_SESSION['user_type']!='10'){
?>
                    <button ng-click="Closeshiftnow()" class="btn btn-lg btn-info" style="font-weight:bold">ປິດກະ
                        (<?php if(isset($_SESSION['shift_id'])){echo $_SESSION['shift_id'];} ?>)</button>
                    <?php
}

 } ?>
                </div>


            </form>



            <?php } ?>



            <input type="hidden" name="" ng-model="customer_id">

            <br />


            <div style="height: 700px;overflow: auto;">



                <div class="col-xs-4 col-sm-4 col-md-2 panel panel-default product_box" ng-repeat="x in productlist"
                    style="height: 200px;cursor: pointer;padding-right: 0px;padding-left: 0px;"
                    ng-click="Openselectproductnum(x,$index)">
                    <!-- <span style="float: left;">{{x.product_code}}</span> -->
                    <div class="panel-body " style="padding: 0px;">


                        <center>
                            <img ng-if="x.product_image != ''" src="<?php echo $base_url;?>/{{x.product_image}}"
                                class="img img-responsive lazy" style="height: 140px;" title="{{x.product_name}}">

                            <!-- <img ng-if="x.product_image == ''" ng-src="<?php echo $base_url;?>/pic/df.png" class="img img-responsive" style="height: 140px;" title="{{x.product_name}}"> -->

                            <div ng-if="x.product_image == ''" style="font-size:30px;font-weight:bold;height:140px;">
                                <br /> {{x.product_name}}
                            </div>
                            <p></p>
                            <span ng-if="x.product_image != ''">{{x.product_name}}</span>
                            <script>
                            window.onscroll = function() {
                                lazyload();

                            }

                            function lazyload() {

                                var lazyImage = document.getElementsByClassName('lazy');
                                for (var i = 0; i < lazyImage.length; i++) {
                                    if (elementInViewport(lazyImage[i])) {
                                        lazyImage[i].setAttribute('src', lazyImage[i].getAttribute('src'));
                                    }
                                    console.log("lazyload is working...");
                                }
                            }

                            function elementInViewport(el) {
                                var rect = el.getBoundingClientRect();
                                return (
                                    rect.top >= 0 &&
                                    rect.left >= 0 &&
                                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                                );
                            }
                            </script>
                            <br />

                            <div ng-if="x.product_price_discount==0.00" style="color: red;font-weight: bold;">
                                <span ng-if="sale_type=='1'">{{x.product_price | number:2}}</span>
                                <span ng-if="sale_type=='2'">{{x.product_wholesale_price | number:2}}</span>
                            </div>

                            <span ng-if="x.product_price_discount!=0.00 && sale_type=='1'">
                                <strike>
                                    {{x.product_price | number:2}}
                                </strike>
                            </span>

                            <span ng-if="x.product_price_discount!=0.00 && sale_type=='2'">
                                <strike>
                                    {{x.product_wholesale_price | number:2}}
                                </strike>
                            </span>

                            <span ng-if="x.product_price_discount!=0.00 && sale_type=='1'"
                                style="color: red;font-weight: bold;">
                                {{x.product_price-x.product_price_discount | number:2}}
                            </span>

                            <span ng-if="x.product_price_discount!=0.00 && sale_type=='2'"
                                style="color: red;font-weight: bold;">
                                {{x.product_wholesale_price-x.product_price_discount | number:2}}
                            </span>



                        </center>

                    </div>
                </div>




                <?php if($_SESSION['user_type']!='10'){?>
                <div class="col-sm-3 col-md-2">
                    <div ng-click="Addproductrank()" class="panel-body  panel panel-default product_box"
                        style="height: 100px;cursor: pointer;background-color: #eee;">


                        <center>
                            ປັກໝຸດອາຫານ<br />
                            <span class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size: 30px;"></span>

                        </center>

                    </div>


                    <div ng-show="productlist.length != '0'" ng-click="Delproductrank()"
                        class="panel-body  panel panel-default product_box"
                        style="height: 75px;cursor: pointer;background-color: #eee;">


                        <center>
                            <?=$lang_removeitem?><br />
                            <span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 30px;"></span>

                        </center>

                    </div>



                </div>
                <?php } ?>








            </div>


        </div>



        <div class="col-sm-4 col-md-4">


            <table width="100%">
                <tbody>
                    <tr>

                        <td>



                            <form class="form-inline">


                                <?php if($_SESSION['user_type']<'9'){ ?>

                                <form class="form-inline" style="float: left;">

                                    <div class="form-group">
                                        <input type="text" id="product_code_id" class="form-control"
                                            ng-model="product_code"
                                            style="width: 150px;text-align: right;height: 47px;background-color:#dff0d8;font-size: 20px;"
                                            placeholder="<?=$lang_barcode?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" ng-click="Addpushproductcode(product_code)"
                                            class="btn btn-default btn-lg"><?=$lang_enter?></button>
                                    </div>



                                    <div class="form-group">
                                        <select class="form-control" ng-model="pay_type"
                                            style="height: 45px;width: 150px;font-size: 20px;background-color:orange;color:#fff;">
                                            <option value="1">
                                                <?=$lang_cash?>
                                            </option>
                                            <!-- <option value="2">
		<?=$lang_transfer?>
	</option> -->
                                            <option value="3">
                                                <?=$lang_creditcard?>
                                            </option>
                                            <!-- <option value="4">
		<?=$lang_owe?>
	</option> -->
                                            <option value="5">
                                                <?=$lang_qrpayment?>
                                            </option>

                                            <!-- <option value="6">
		ກະເປົາເງິນ
	</option> -->

                                        </select>
                                    </div>
                                    <?php } ?>



                                    <!-- <div class="form-group" style="float: right;">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->


                                </form>



                        </td>

                    </tr>
                    <tr>

                        <td colspan="2">

                            <span ng-show="cannotfindproduct" style="color: red;">
                                <?=$lang_cannotfoundproduct?>
                            </span>

                        </td>
                    </tr>
                </tbody>
            </table>










            <br />
            <div class="panel panel-default">
                <div class="panel-body ">

                    <button class="btn btn-primary btn-lg" style="margin-top: 2px;">
                        <span style="color: white;">ໂຕະ </span>
                        <span style="color: white;">{{table_name}}</span>
                    </button>

                    <select ng-model="user_ordering_id" ng-change="Saveuser_ordering()" class="form-control"
                        style="width:160px;float:right;">
                        <option value="0" ng-if="user_ordering_id=='0'">
                            ພະນັກງານຮັບອໍເດີ
                        </option>
                        <option ng-repeat="x in getuser_ordering_list" value="{{x.user_id}}">
                            {{x.name}}
                        </option>
                    </select>


                    <?php if($_SESSION['user_type']<'9'){ ?>
                    <div style="height: 250px;overflow: auto;">
                        <?php } ?>
                        <?php if($_SESSION['user_type']>='9'){ ?>
                        <div style="height: 350px;overflow: auto;">
                            <?php } ?>



                            <div ng-if="loading" style="height:100px;text-align:center;">
                                <br /><br />ກຳລັງໂຫຼດລາຍການ...<br />ຖ້ານານ...ກົດF5
                            </div>

                            <div ng-if="listsale==''" style="height:100px;text-align:center;">
                                <br /><br />ຍັງບໍ່ມີລາຍການ...
                            </div>


                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="3" align="left">ຈຳນວນ</th>
                                        <th colspan="2" align="left">ຊື່</th>
                                        <th colspan="50">ລາຄາ</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr ng-repeat="x in listsale" style="background-color:#eee;">

                                        <td style="width: 1px;">

                                            <?php
if($_SESSION['user_type']=='1'){ ?>
                                            <!-- <button class="btn btn-default btn-xs" ng-click="Editpush(x)">
<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</button> -->
                                            <?php } ?>

                                            <?php
if($_SESSION['user_type']=='4'){ ?>
                                            <!-- <button class="btn btn-default btn-xs" ng-click="Editpushadmin(x)">
<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</button> -->
                                            <?php } ?>


                                        </td>

                                        <td>
                                            <!-- <input type="text" placeholder="0"  ng-model="x.product_sale_num" style="width:20px;text-align: right;"> -->
                                            {{x.product_sale_num}}
                                        </td>

                                        <td>

                                            <span ng-if="x.so_order !='0'" style="color: #337ab7;font-weight: bold;">
                                                {{x.product_name}}
                                                <br />
                                                {{x.note_order}}
                                            </span>
                                            <span ng-if="x.so_order =='0'">
                                                {{x.product_name}}
                                                <br />
                                                {{x.note_order}}
                                            </span>


                                            <input type="hidden" ng-model="x.product_id">

                                        </td>

                                        <td>

                                            <span ng-if="x.status=='1'">
                                                <i style="color:orange;font-size:10px;">ກຳລັງເຮັດ</i>
                                            </span>
                                            <span ng-if="x.status=='2'">
                                                <i style="color:green;font-size:10px;">ສຳເລັດ</i>
                                            </span>

                                        </td>

                                        <td align="right">
                                            {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2 }}
                                        </td>


                                        <td style="width: 1px;">
                                            <?php
if($_SESSION['user_type']!='4' && $_SESSION['user_type']!='10'){ ?>
                                            <button ng-if="x.so_order=='0'" id="delproductbut{{x.s_ID}}"
                                                class="btn btn-danger btn-xs" ng-click="Deletepush(x)">x</button>
                                            <button ng-if="x.so_order!='0'" id="delproductbut{{x.s_ID}}"
                                                class="btn btn-danger btn-xs" ng-click="Deletepush(x)">x</button>

                                            <?php } ?>


                                            <?php
if($_SESSION['user_type']=='4'){ ?>
                                            <button id="delproductbut{{x.s_ID}}" class="btn btn-default btn-xs"
                                                ng-click="Deletepushadmin(x)">x</button>
                                            <?php } ?>


                                            <?php
	if($_SESSION['user_type']=='10'){ ?>
                                            <button id="delproductbut{{x.s_ID}}"
                                                ng-if="x.so_order=='1' && x.product_sale_num=='1'"
                                                class="btn btn-default btn-xs" ng-click="Deletepush(x)">x</button>
                                            <?php } ?>


                                        </td>


                                    </tr>





                                    <tr>
                                        <td colspan="3" align="right"><?=$lang_all?></td>

                                        <td align="right" style="font-weight: bold;">{{Sumsalenum() | number }}</td>
                                        <td align="right" style="font-weight: bold;">{{Sumsaleprice() | number:0 }}</td>
                                        <td></td>
                                    </tr>


                                    <?php
if($_SESSION['owner_vat_status']=='2'){
?>
                                    <tr>
                                        <td colspan="4" align="right">
                                            <?=$lang_vat?>
                                            {{vatnumber}} %
                                        <td align="right" style="font-weight: bold;">
                                            {{(Sumsaleprice() * vatnumber/100) | number:2 }}
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" align="right"><?=$lang_pricesumvat?></td>
                                        <td align="right" style="font-weight: bold;">
                                            {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}</td>
                                        <td></td>
                                    </tr>




                                    <?php
}
?>




                                    <!-- <tr ng-hide='true'>
		<td colspan="4" align="right">
<input type="checkbox" ng-model="addvat" ng-change="Addvatcontrol()">
		<?=$lang_vat?></td>

		</tr>


		<tr ng-show="addvat">
		<td colspan="2" align="right">
		<?=$lang_vat?>
		 <input type="number" ng-model="vatnumber" style="width:50px;text-align: right;">
		 %</td>
			<td align="right" style="font-weight: bold;">
			{{(Sumsaleprice() * vatnumber/100) | number:2 }}
			</td>
		</tr>

		<tr ng-show="addvat">
		<td colspan="2" align="right"><?=$lang_pricesumvat?></td>
			<td align="right" style="font-weight: bold;">
			{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}</td>
<td></td>
		</tr> -->




                                </tbody>
                            </table>

                        </div>



                        <center>



                            <div>
                                <button ng-if="listsale != '' && customer_name != ''" id="savequotation"
                                    class="btn btn-warning btn-sm" ng-click="Savequotation()">ບັນທຶກ(ຄ້າງຊຳລະ)</button>
                                <button ng-if="listsale == '' && quotationlist !=''" ng-click="Showquotationlist()"
                                    class="btn btn-warning btn-sm">ລາຍການຄ້າງຊຳລະ</button>
                            </div>

                        </center>




                        <table class="table" style="margin-bottom: 0px;">
                            <tbody>

                                <tr>
                                    <td colspan="2"
                                        style="font-weight: bold;font-size: 70px;color: green;text-align: center;vertical-align:middle;">
                                        <span ng-show="discount_percent=='0'">
                                            {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - discount_last | number:0 }}
                                        </span>

                                        <span ng-show="discount_percent=='1'">
                                            {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - ((Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100)) | number:0 }}
                                        </span>

                                    </td>
                                </tr>

                                <tr>
                                    <?php if($_SESSION['user_type']<'9'){ ?>

                                    <td ng-if="customer_product_score_all > '0'">
                                        <button class="btn btn-info btn-sm" ng-click="Showproduct_pointmodal()"
                                            style="width: 100%;font-size: 16px;">
                                            ໃຊ້ຄະແນນ ({{customer_product_score_all | number}})
                                        </button>
                                    </td>

                                </tr>
                                <?php } ?>





                                <?php if($_SESSION['user_type']<'100'){ ?>
                                <tr>
                                    <td colspan="2">

                                        <button type="submit" ng-disabled="clickprintorder" ng-if="checkorder != '0'"
                                            class="btn btn-info btn-sm" ng-click="Printorder()"
                                            style="width: 100%;font-size: 26px;">ສົ່ງ Order ເຂົ້າຄົວ</button>

                                        <button type="submit" ng-if="checkorder == '0'" class="btn btn-default btn-sm"
                                            style="width: 100%;font-size: 26px;" disabled="">ສົ່ງ Order
                                            ເຂົ້າຄົວ</button>

                                    </td>







                                </tr>


                                <?php } ?>







                            </tbody>
                        </table>




                        <?php if($_SESSION['user_type']<'9'){?>
                        <table class="table" style="margin-bottom: 0px;">
                            <tbody>

                                <tr>
                                    <td ng-hide="servicechargelist.servicecharge_percent=='0'">

                                        <button class="btn btn-default" style="width:100%;text-align:center;"
                                            ng-click="Addpushproductcode(servicechargelist.product_code,'','servicecharge')">
                                            Service Charge {{servicechargelist.servicecharge_percent}}%
                                        </button>

                                    </td>

                                    <td ng-hide="vatlist.vat_percent=='0'">

                                        <button class="btn btn-default" style="width:100%;text-align:center;"
                                            ng-click="Addpushproductcode(vatlist.product_code,'','servicecharge','vat')">
                                            VAT {{vatlist.vat_percent}}%
                                        </button>

                                    </td>
                                </tr>
                        </table>

                        <table class="table" style="margin-bottom: 0px;">
                            <tbody>

                                <tr>
                                    <td colspan="2">
                                        <button class="btn btn-primary" style="width:100%;text-align:center;"
                                            data-toggle="modal" data-target="#discountcategory">
                                            ສ່ວນຫຼຸດໝວດໝູ່ %
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        ສ່ວນຫຼຸດທ້າຍບິນ <select ng-model="discount_percent">
                                            <option value="0"><?=$lang_mo?></option>
                                            <option value="1">%</option>
                                        </select>



                                        <div ng-show="discount_percent=='0'">
                                            <input type="number" class="form-control" ng-model="discount_last"
                                                placeholder="<?=$lang_discount_last?>"
                                                style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">
                                            <span ng-if="discount_last!='0'"
                                                style="font-weight: normal;">{{(discount_last*100)/(Sumsaleprice() + (Sumsaleprice() * vatnumber/100)) | number:2 }}
                                                %</span>
                                        </div>


                                        <div ng-show="discount_percent=='1'">
                                            <input type="number" class="form-control" ng-model="discount_last_percent"
                                                placeholder="<?=$lang_dis?> %"
                                                style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">

                                            <span ng-if="discount_last_percent!='0'"
                                                style="font-weight: normal;">{{(Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100) | number:2 }}
                                                <?=$lang_currency?></span>
                                        </div>



                                    </td>

                                </tr>



                                <tr>
                                    <td>
                                        <button ng-disabled="listsale==''" type="submit" ng-if="printer_ul =='0'"
                                            class="btn btn-warning btn-sm" ng-click="Checkbill()"
                                            style="width: 100%;font-size:33px;font-weight:bold;"><?php echo $lang_checkbill;?></button>


                                        <!-- <button ng-disabled="listsale==''" type="submit" ng-if="printer_ul !='0'" class="btn btn-warning btn-sm" ng-click="Checkbillip()" style="width: 100%;font-size:33px;font-weight:bold;"><?php echo $lang_checkbill;?></button> -->



                                    </td>


                                    <td>
                                        <span ng-if="customer_wallet > '0'">

                                            <button ng-disabled="listsale==''" type="submit" class="btn btn-lg btn-info"
                                                ng-click="Opengetmoneyfromwalletmodal()" style="width:100%;">
                                                <span class="glyphicon glyphicon-briefcase"
                                                    aria-hidden="true"></span>({{customer_wallet | number}})
                                                ຊຳລະຈາກກະເປົາ
                                            </button>
                                            <br /><br />
                                        </span>

                                        <button ng-disabled="listsale==''" ng-click="Opengetmoneymodal()"
                                            class="btn btn-lg btn-primary"
                                            style="width:100%;font-size:30px;font-weight:bold;">
                                            ຮັບເງິນ(F9)</button>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <?php } ?>










                        <!-- Modal -->
                        <div id="discountcategory" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">ສ່ວນຫຼຸດຕາມ ໝວດໝູ່</h4>
                                    </div>
                                    <div class="modal-body">

                                        <center>
                                            ໝວດໝູ່
                                            <select class="form-control" ng-model="discountcategory_category_id"
                                                style="height: 45px;width: 123px;font-size: 20px;">
                                                <option ng-repeat="y in categorylist" value="{{y.product_category_id}}"
                                                    style="font-size:30px;">
                                                    {{y.product_category_name}}
                                                </option>
                                            </select>
                                            <br />
                                            ສ່ວນຫຼຸດ %
                                            <select class="form-control" ng-model="discountcategory_percent"
                                                style="height: 45px;width:125px;font-size:30px;font-weight:bold;">
                                                <?php
for($i=0;$i<=100;$i++){
	echo '<option value="'.$i.'">'.$i.' %</option>';
}
?>
                                            </select>
                                            <br />

                                            <button class="btn btn-success btn-lg"
                                                ng-click="Discountcategory_ok(discountcategory_category_id,discountcategory_percent)">
                                                ຢືນຢັນ
                                            </button>

                                        </center>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ປິດ</button>
                                    </div>
                                </div>

                            </div>
                        </div>






                        <div class="modal fade" id="Addproductrankmodal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><?=$lang_additem?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="" ng-model="searchproductrank"
                                            ng-change="Searchproductranklist(searchproductrank)"
                                            placeholder="ຄົ້ນຫາຊື່ສິນຄ້າ" class="form-control">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr style="background-color: #ddd;">
                                                    <th><?=$lang_additem?></th>
                                                    <th><?=$lang_productname?></th>
                                                    <th><?=$lang_price?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="x in productranklist" ng-if="x.product_rank == '0'">
                                                    <th><button class="btn btn-success btn-xs"
                                                            ng-click="Addproductranksave(x)">+
                                                            <?=$lang_additem?></button>

                                                    </th>

                                                    <th>{{x.product_name}}</th>
                                                    <th>{{x.product_price}}</th>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>














                        <div class="modal fade" id="Opengetmoneymodal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body" style="height:600px;">


                                        <center>


                                            <input type="text" id="money_from_customer_id" class="form-control"
                                                ng-model="money_from_customer" placeholder="ຮັບເງິນຈາກລູກຄ້າ"
                                                style="text-align: right;height: 70px;background-color:#dff0d8;font-size: 40px;font-weight:bold;">



                                            <br />
                                            <div ng-click="Addnumbermoney('1')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                1
                                            </div>
                                            <div ng-click="Addnumbermoney('2')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                2
                                            </div>
                                            <div ng-click="Addnumbermoney('3')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                3
                                            </div>
                                            <div ng-click="Addnumbermoney('4')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                4
                                            </div>



                                            <div ng-click="Addnumbermoney('5')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                5
                                            </div>
                                            <div ng-click="Addnumbermoney('6')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                6
                                            </div>
                                            <div ng-click="Addnumbermoney('7')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                7
                                            </div>
                                            <div ng-click="Addnumbermoney('8')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                8
                                            </div>


                                            <div ng-click="Addnumbermoney('9')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                9
                                            </div>
                                            <div ng-click="Addnumbermoney('0')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                0
                                            </div>

                                            <div ng-click="Addnumbermoney('00')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                00
                                            </div>

                                            <div ng-click="Addnumbermoney('000')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                000
                                            </div>

                                            <div ng-click="Addnumbermoney('3000')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                3,000
                                            </div>
                                            <div ng-click="Addnumbermoney('5000')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                5,000
                                            </div>
                                            <div ng-click="Addnumbermoney('10000')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                10,000
                                            </div>


                                            <div ng-click="Addnumbermoney('20000')"
                                                class="col-xs-3 col-sm-3 col-md-4 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                20,000
                                            </div>

                                            <div ng-click="Addnumbermoney('30000')"
                                                class="col-xs-3 col-sm-3 col-md-4 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                30,000
                                            </div>

                                            <div ng-click="Addnumbermoney('40000')"
                                                class="col-xs-3 col-sm-3 col-md-4 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                40,000
                                            </div>
                                            <div ng-click="Addnumbermoney('50000')"
                                                class="col-xs-3 col-sm-3 col-md-4 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                50,000
                                            </div>

                                            <div ng-click="Addnumbermoney('60000')"
                                                class="col-xs-3 col-sm-3 col-md-4 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                60,000
                                            </div>
                                            <div ng-click="Addnumbermoney('70000')"
                                                class="col-xs-3 col-sm-3 col-md-4 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                70,000
                                            </div>
                                            <div ng-click="Addnumbermoney('80000')"
                                                class="col-xs-3 col-sm-3 col-md-4 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                80,000
                                            </div>
                                            <div ng-click="Addnumbermoney('90000')"
                                                class="col-xs-3 col-sm-3 col-md-4 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                90,000
                                            </div>

                                            <div ng-click="Addnumbermoney('100000')"
                                                class="col-xs-3 col-sm-3 col-md-4 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                100,000
                                            </div>

                                            <div ng-click="Addnumbermoney('200000')"
                                                class="col-xs-3 col-sm-3 col-md-4 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                200,000
                                            </div>

                                            <div ng-click="Addnumbermoney('300000')"
                                                class="col-xs-3 col-sm-3 col-md-4 btn btn-info"
                                                style="font-size:40px;font-weight:bold;height: 70px;">
                                                300,000
                                            </div>
                                            <div ng-click="Addnumbermoney('x')"
                                                class="col-xs-3 col-sm-3 col-md-3 btn btn-warning"
                                                style="font-size:20px;font-weight:bold;height: 70px;">
                                                x <br /> ລຶບທັງໝົດ
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <br /><br />
                                            </div>

                                            <button type="submit" class="col-xs-12 col-sm-12 col-md-12 btn btn-success"
                                                style="font-size:40px;font-weight:bold;height: 70px;" id="savesale"
                                                ng-click="Savesale(money_from_customer,Sumsalepricevat(),discount_last )">
                                                ຢືນຢັນຊຳລະເງິນ(Enter)
                                            </button>

                                        </center>



                                    </div>
                                    <div class="modal-footer">
                                        <center>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                aria-hidden="true">ປິດໜ້າຕ່າງ(Esc)</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="modal fade" id="Opengetmoneyfromwalletmodal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body" style="height:100px;">


                                        <center>

                                            <button type="submit" class="col-xs-12 col-sm-12 col-md-12 btn btn-success"
                                                style="font-size:40px;font-weight:bold;height: 70px;" id="savesale"
                                                ng-click="Savesale('wallet',Sumsalepricevat(),discount_last )">
                                                ຢືນຢັນຊຳລະເງິນຈາກກະເປົາ
                                            </button>

                                        </center>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            aria-hidden="true">ປິດໜ້າຕ່າງ</button>

                                    </div>
                                </div>
                            </div>
                        </div>












                        <div class="modal fade" id="Delproductrankmodal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><?=$lang_removeitem?></h4>
                                    </div>
                                    <div class="modal-body">

                                        <table class="table table-hover">
                                            <thead>
                                                <tr style="background-color: #ddd;">
                                                    <th><?=$lang_removeitem?></th>
                                                    <th><?=$lang_productname?></th>
                                                    <th><?=$lang_price?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="x in productlist">
                                                    <th><button class="btn btn-default btn-xs"
                                                            ng-click="Delproductranksave(x)">-
                                                            <?=$lang_removeitem?></button></th>
                                                    <th>{{x.product_name}}</th>
                                                    <th>{{x.product_price}}</th>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>













                        <div class="modal fade" id="Showproduct_pointmodal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">ເລືອກອາຫານ/ເຄື່ອງດື່ມ ຟຣີ</h4>
                                    </div>
                                    <div class="modal-body">
                                        <center>
                                            <h1>ຄະແນນທີ່ມີ {{customer_product_score_all | number}}</h1>
                                        </center>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr style="background-color: #ddd;">
                                                    <th>ເລືອກ</th>
                                                    <th>ອາຫານ/ເຄື່ອງດື່ມ</th>
                                                    <th>ຈຳນວນ</th>
                                                    <th>ຄະແນນທີ່ຫັກ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="x in product_point_list">

                                                    <th><button
                                                            ng-if="x.point_use <= ParsefloatFunc(customer_product_score_all)"
                                                            class="btn btn-default btn-sm"
                                                            ng-click="Addpushproductcode(x.product_code,x)">ເລືອກ</button>
                                                    </th>
                                                    <th>{{x.product_name}}</th>
                                                    <th>1</th>
                                                    <th>{{x.point_use | number}}</th>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>










                        <div class="modal fade" id="Openfull">
                            <div class="modal-dialog modal-lg" style="width: 100%;margin: 0px;">
                                <div class="modal-content">
                                    <div class="modal-body">





                                        <table width="100%">
                                            <tbody>
                                                <tr>

                                                    <td align="left">
                                                        <form class="form-inline">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    ng-model="product_code"
                                                                    style="font-size: 20px;text-align: right;height: 47px;width: 300px;background-color:#dff0d8;"
                                                                    placeholder="<?=$lang_searchproductnameorscan?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    ng-click="Addpushproductcode(product_code)"
                                                                    class="btn btn-default btn-lg"><?=$lang_enter?></button>
                                                            </div>
                                                            <div class="form-group" ng-show="cannotfindproduct"
                                                                style="color: red;">
                                                                <?=$lang_cannotfoundproduct?>
                                                            </div>
                                                            <div class="form-group">
                                                                <button ng-click="Refresh()"
                                                                    class="btn btn-default btn-lg" placeholder=""
                                                                    title="รีเฟรส"><span
                                                                        class="glyphicon glyphicon-refresh"
                                                                        aria-hidden="true"></span></button>
                                                            </div>
                                                        </form>

                                                    </td>
                                                    <td style="font-size: 50px;font-weight: bold;">
                                                        <span
                                                            style="color: red">{{Sumsalepricevat() | number:2 }}</span>
                                                        <?=$lang_currency?>
                                                    </td>
                                                    <td align="right" width="10%">
                                                        <button type="button" class="btn btn-default btn-lg"
                                                            data-dismiss="modal">x</button>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>


                                        <hr />
                                        <div style="height: 350px;overflow: auto;" id="Openfulltable">

                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr class="trheader">
                                                        <th style="width: 50px;"><?=$lang_rank?></th>

                                                        <th style="text-align: center;width: 250px;">
                                                            <?=$lang_productname?></th>
                                                        <th style="text-align: center;width: 100px;"><?=$lang_barcode?>
                                                        </th>
                                                        <th style="text-align: center;width: 150px;">
                                                            <?=$lang_saleprice?></th>

                                                        <th width="100px;" style="text-align: center;width: 100px;">
                                                            <?=$lang_discountperunit?></th>
                                                        <th style="text-align: center;width: 80px;"><?=$lang_qty?></th>
                                                        <th style="text-align: center;width: 80px;"><?=$lang_priceall?>
                                                        </th>
                                                        <th style="width: 50px;"><?=$lang_delete?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="x in listsale" style="font-size: 20px;">
                                                        <td style="width: 50px;" align="center">{{$index+1}}</td>

                                                        <td style="width: 250px;">

                                                            {{x.product_name}}


                                                            <input type="hidden" ng-model="x.product_id">

                                                        </td>
                                                        <td align="center" style="width: 100px;">{{ x.product_code }}
                                                        </td>


                                                        <td align="right" style="width: 150px;">
                                                            {{x.product_price | number:2}}</td>
                                                        <td align="right" style="width: 100px;"><input type=""
                                                                placeholder="<?=$lang_discount?>" class="form-control"
                                                                ng-model="x.product_price_discount"
                                                                style="text-align: right;"></td>
                                                        <td align="right" style="width: 80px;"><input type=""
                                                                placeholder="<?=$lang_qty?>" class="form-control"
                                                                ng-model="x.product_sale_num"
                                                                style="text-align: right;width: 80px;"></td>

                                                        <td style="width: 50px;" align="right">
                                                            {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2 }}
                                                        </td>
                                                        <td><button class="btn btn-danger"
                                                                ng-click="Deletepush($index)"><?=$lang_delete?></button>
                                                        </td>
                                                    </tr>


                                                    <tr style="font-size: 20px;">
                                                        <td colspan="5" align="right"><?=$lang_all?></td>

                                                        <td align="right" style="font-weight: bold;">
                                                            {{Sumsalenum() | number }}</td>
                                                        <td align="right" style="font-weight: bold;">
                                                            {{Sumsaleprice() | number:2 }}</td>
                                                        <td></td>
                                                    </tr>

                                                    <tr style="font-size: 20px;">
                                                        <td colspan="8" align="right">
                                                            <input type="checkbox" ng-model="addvat"
                                                                ng-change="Addvatcontrol()">
                                                            <?=$lang_addvat?>
                                                        </td>

                                                    </tr>


                                                    <tr style="font-size: 20px;" ng-show="addvat">
                                                        <td colspan="6" align="right">
                                                            vat
                                                            <input type="number" ng-model="vatnumber"
                                                                style="width: 50px;text-align: right;">
                                                            %
                                                        </td>
                                                        <td align="right" style="font-weight: bold;">
                                                            {{(Sumsaleprice() * vatnumber/100) | number:2 }}
                                                        </td>
                                                        <td></td>
                                                    </tr>

                                                    <tr style="font-size: 20px;" ng-show="addvat">
                                                        <td colspan="6" align="right"><?=$lang_pricesumvat?></td>
                                                        <td align="right" style="font-weight: bold;">
                                                            {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}
                                                        </td>
                                                        <td></td>
                                                    </tr>

                                                </tbody>
                                            </table>


                                        </div>

                                        <hr />
                                        <table class="table table-hover" width="100%">
                                            <tbody>
                                                <tr style="font-size: 20px;">
                                                    <td align="right"><?=$lang_all?></td>

                                                    <td align="right" style="font-weight: bold;"><?=$lang_qty?>
                                                        {{Sumsalenum() | number }}</td>
                                                    <td align="right" style="font-weight: bold;"><?=$lang_summary?>
                                                        <span
                                                            style="color: red">{{Sumsalepricevat() | number:2 }}</span>
                                                        <?=$lang_currency?>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="table table-hover" width="100%">
                                            <tbody>




                                                <tr style="font-size: 20px;">
                                                    <td width="25%" align="right"><?=$lang_getmoney?>:</td>
                                                    <td>
                                                        <form>
                                                            <input type="text" id="money_from_customer2"
                                                                class="form-control" ng-model="money_from_customer"
                                                                placeholder="<?=$lang_moneyfromcus?>"
                                                                style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">



                                                    </td>
                                                    <td width="35%"> <?=$lang_moneychange?>:
                                                        <b>{{money_from_customer - Sumsalepricevat() | number:2}}
                                                            <?=$lang_currency?></b>
                                                    </td>
                                                    <td align="right" width="10%"><button type="submit"
                                                            class="btn btn-success btn-lg" id="savesale2"
                                                            ng-click="Savesale(money_from_customer,Sumsalepricevat())"><?=$lang_getmoneyenter?></button>
                                                    </td>
                                                    </form>

                                                </tr>
                                            </tbody>
                                        </table>





                                    </div>

                                </div>
                            </div>
                        </div>






                        <div class="modal fade" id="Showquotationlistmodal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body">



                                        <input ng-model="search_quotationlist" type="text" placeholder="ຄົ້ນຫາ..."
                                            class="form-control" style="width:200px;">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr class="trheader">
                                                    <th><?=$lang_rank?></th>
                                                    <th>ຊຳລະເງິນ</th>
                                                    <th>code</th>
                                                    <th><?=$lang_cusname?></th>



                                                    <th><?=$lang_productnum?></th>
                                                    <th><?=$lang_pricesum?></th>


                                                    <?php
				if($_SESSION['owner_vat_status']=='2'){
				?>
                                                    <th><?=$lang_vat?> Exclude %</th>
                                                    <th><?=$lang_pricesumvat?></th>
                                                    <?php
				}
				?>


                                                    <th>ສ່ວນຫຼຸດທ້າຍບິນ</th>
                                                    <th><?=$lang_sumall?></th>

                                                    <th><?=$lang_day?></th>
                                                    <!-- <th style="width: 50px;"><?=$lang_delete?></th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="x in quotationlist | filter:search_quotationlist">
                                                    <td class="text-center">{{$index+1}}</td>

                                                    <td>
                                                        <button class="btn btn-primary btn-sm"
                                                            ng-click="Getonequotation2pay(x)">
                                                            ຊຳລະເງິນ
                                                        </button>
                                                    </td>
                                                    <td>
                                                        {{x.sale_runno}}


                                                    </td>
                                                    <td>{{x.cus_name}}

                                                    </td>


                                                    <td align="right">{{x.sumsale_num | number}}</td>
                                                    <td align="right">{{x.sumsale_price | number:2}}</td>


                                                    <?php
				if($_SESSION['owner_vat_status']=='2'){
				?>
                                                    <td align="right">{{x.sumsale_price * (x.vat/100) | number:2}}</td>
                                                    <td align="right">
                                                        {{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) | number:2}}
                                                    </td>
                                                    <?php
				}
				?>



                                                    <td align="right">{{x.discount_last | number:2}}</td>
                                                    <td align="right">
                                                        {{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) - x.discount_last | number:2}}
                                                    </td>



                                                    <td>{{x.adddate}}</td>
                                                    <!-- <td align="center"><button class="btn btn-xs btn-danger" ng-click="Deletequotationlist(x)" id="delbut{{x.ID}}">
							<?=$lang_delete?></button></td> -->
                                                </tr>
                                            </tbody>
                                        </table>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="modal fade" id="Openchangemoney">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h4 class="modal-title"><?=$lang_moneychange?></h4>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h1 style="color: red;font-weight: bold;font-size: 70px;">
                                            {{changemoney | number:0}}
                                        </h1>
                                        <br />


                                        <button ng-if="printer_ul !='0'" class="btn btn-primary btn-lg"
                                            ng-click="printDivminiip()"
                                            style="font-size:39px;font-weight: bold;"><?=$lang_receipt?></button>

                                        <button ng-if="printer_ul =='0'" class="btn btn-primary btn-lg"
                                            ng-click="printDivmini()"
                                            style="font-size:39px;font-weight: bold;"><?=$lang_receipt?></button>

                                        <hr />
                                        <button type="button" class="btn btn-danger btn-lg"
                                            ng-click="clickokafterpay()"><?=$lang_close?>ໜ້າຕ່າງ(Esc)</button>



                                        <!-- <button class="btn btn-default" ng-click="printDivfull()"><?=$lang_billfull?></button> -->
                                    </div>

                                </div>
                            </div>
                        </div>













                        <hr />



                    </div>
                </div>






                <div class="modal fade" id="Opencustomer">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><?=$lang_searchcus?></h4>
                            </div>
                            <div class="modal-body">

                                <form class="form-inline">
                                    <div class="form-group">
                                        <input type="text" ng-model="customer_name" class="form-control"
                                            placeholder="ຄົ້ນຫາ ລະຫັດສະມາຊິກ ຫຼືຊື່"
                                            style="height: 45px;font-size: 20px;">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" ng-click="Searchcustomer()" class="btn btn-success btn-lg"
                                            placeholder="" title="Enter"><span class="glyphicon glyphicon-search"
                                                aria-hidden="true"></span></button>
                                    </div>
                                    <div class="form-group">
                                        <a href="<?php echo $base_url; ?>/mycustomer" class="btn btn-default btn-lg"
                                            placeholder="" title="ໄປໜ້າລູກຄ້າ" target="_blank">ໄປໜ້າລູກຄ້າ</a>
                                    </div>
                                </form>
                                <br />
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="trheader">
                                            <th style="text-align:center;"><?=$lang_select?></th>
                                            <th style="text-align:center;"><?=$lang_memberid?></th>
                                            <th style="text-align:center;"><?=$lang_cusname?></th>
                                            <th style="text-align:center;">ຄະແນນ</th>
                                            <th style="text-align:center;">ເງິນໃນກະເປົາ</th>
                                            <th style="text-align:center;">ເຕີມເງິນ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="x in customerlist">
                                            <td style="text-align:center;"><button class="btn btn-success"
                                                    ng-click="Selectcustomer(x)">
                                                    <?=$lang_select?>
                                                </button></td>
                                            <td style="text-align:center;">{{x.cus_add_time}}</td>
                                            <td style="text-align:center;">{{x.cus_name}}</td>
                                            <td style="text-align:center;">{{x.product_score_all | number}}</td>
                                            <td align="right"><b>{{x.wallet | number}}</b> ກີບ</td>
                                            <td align="center"><button class="btn btn-info"
                                                    ng-click="Addwalletmodal(x)">ເຕີມເງິນ</button> </td>
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









                <div class="modal fade" id="Addwalletmodal">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">

                                <center>
                                    <h3><b>ເຕີມເງິນໃຫ້ <br /> {{addwallet_cus_name}} </b>
                                        <br />
                                        {{addwallet_cus_add_time}}
                                    </h3>
                                    <form>
                                        <input type="number" ng-model="addwallet_money" placeholder="0"
                                            class="form-control" style="width:150px;font-size:40px;height:50px;">
                                        <br />
                                        <button type="submit" ng-show="addwallet_money" class="btn btn-success btn-lg"
                                            ng-click="Addwalletconfirm()">ຢືນຢັນ</button>
                                    </form>
                                </center>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>






                <div style="position: absolute; opacity: 0.0;">

                    <div class="modal fade" id="Addwalletmodalprint">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body" id="section-to-print-addwallet"
                                    style="width: <?php echo $pt_width;?>;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">


                                    <center>
                                        <td width="250px" align="center">
                                            <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="200px">
                                        </td>
                                        </tr>
                                        </table>
                                    </center>

                                    <b><span style="font-size: 30px;"> <?php echo $_SESSION['owner_name']; ?></span>
                                    </b>

                                    <br />
                                    <?php echo $_SESSION['owner_address']; ?>
                                    <br />
                                    ໂທ <?php  echo ' '.$_SESSION['owner_tel']; ?>

                                    <br />
                                    ____________________________________________
                                    <br />
                                    <b>ກະເປົາເງິນ คุณ {{addwallet_cus_name}} </b>
                                    <br />
                                    ລະຫັດສະມະຊິກ {{addwallet_cus_add_time}}
                                    <br />
                                    ເຕີມເງິນໃໝ່ <b> {{ParsefloatFunc(addwallet_money) | number}} </b> บาท
                                    <br />
                                    ຍອດເງິນຄົງເຫຼືອ <b>
                                        {{ParsefloatFunc(addwallet_wallet)+ParsefloatFunc(addwallet_money) | number}}
                                    </b> บาท

                                    <br />
                                    ________________________________________________________
                                    <table width="100%">
                                        <tr>
                                            <td style="text-align: left;"><?=$lang_sales?> </td>
                                            <td style="text-align: left;"><?php echo $_SESSION['name']; ?></td>
                                            <td> </td>
                                        </tr>

                                    </table>

                                    <?=$lang_day?> {{adddate}}

                                    <br />


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>





                <div class="modal fade" id="Modalproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><?=$lang_productlist?></h4>
                            </div>
                            <div class="modal-body">
                                <input type="text" ng-model="searchproduct" placeholder="ຄົ້ນຫາລະຫັດຫຼືຊື່ສິນຄ້າ"
                                    style="width:300px;" class="form-control">
                                <br />
                                <div style="overflow: auto;height: 400px;">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="trheader">
                                                <th>ເລືອກ</th>
                                                <th>ລະຫັດ</th>
                                                <th>ຊື່ສິນຄ້າ</th>
                                                <th>ລາຄາ</th>
                                                <th>ສ່ວນຫຼຸດຕໍ່ໜ່ວຍ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="y in productlist | filter:searchproduct">
                                                <td><button ng-click="Selectproduct(y,indexrow)"
                                                        class="btn btn-success">ເລືອກ</button></td>
                                                <td align="center">{{y.product_code}}</td>
                                                <td>{{y.product_name}}</td>
                                                <td align="right">{{y.product_price | number:2}}</td>
                                                <td align="right">{{y.product_price_discount | number:2}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>







                <div class="modal fade" id="Openone">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><?=$lang_saleproductlist?></h4>

                            </div>
                            <div class="modal-body" id="section-to-print">



                                <b><span style="font-size: 18px;"> <?php echo $_SESSION['owner_name']; ?></span> </b>

                                <!--<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?> -->
                                <br />
                                <?php echo $_SESSION['owner_address']; ?>
                                <br />
                                <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
                                <br />
                                <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
                                <br />

                                <b><?=$lang_table?>: {{table_name_getone}}</b>
                                Order: {{sale_runno}}


                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="trheader">
                                            <th style="width:10px;"><?=$lang_rank?></th>
                                            <th style="width:300px;"><?=$lang_productname?></th>
                                            <!-- <th style="width:100px;"><?=$lang_barcode?></th> -->
                                            <th style="width:100px;"><?=$lang_saleprice?></th>
                                            <th style="width:100px;"><?=$lang_discountperunit?></th>
                                            <th style="width:100px;"><?=$lang_qty?></th>
                                            <th style="width:100px;"><?=$lang_priceall?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="x in listone">
                                            <td align="center" style="width:10px;">{{$index+1}}</td>
                                            <td style="width:300px;">{{x.product_name}}</td>
                                            <!-- <td align="center" style="width:50px;">{{x.product_code}}</td> -->
                                            <td align="right" style="width:50px;">{{x.product_price | number:2}}</td>
                                            <td align="right" style="width:50px;">
                                                {{x.product_price_discount | number:2}}</td>
                                            <td align="right" style="width:5px;">{{x.product_sale_num | number}}</td>
                                            <td align="right" style="width:50px;">
                                                {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right" style="font-weight: bold;">
                                                <?=$lang_all?></td>

                                            <td align="right" style="font-weight: bold;">{{sumsale_num | number}}</td>
                                            <td align="right" style="font-weight: bold;">
                                                <u>{{sumsale_price | number:2}}</u>
                                            </td>
                                        </tr>



                                        <?php
if($_SESSION['owner_vat_status']=='1'){
?>
                                        <tr ng-if="vat3=='0'">
                                            <td align="right" colspan="5"><?=$lang_vat?>
                                                {{<?=$_SESSION['owner_vat']?>}}%</td>
                                            <td style="font-weight: bold;" align="right">
                                                {{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}
                                            </td>
                                        </tr>




                                        <tr ng-if="vat3=='0'">
                                            <td align="right" colspan="5"><?=$lang_pricebeforvat?></td>
                                            <td style="font-weight: bold;" align="right">
                                                {{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}
                                            </td>
                                        </tr>

                                        <tr ng-if="vat3=='0'">
                                            <td align="right" colspan="5">ราคารวม vat</td>
                                            <td style="font-weight: bold;" align="right">
                                                {{sumsalevat | number:2}}</td>
                                        </tr>


                                        <tr ng-if="vat3!='0'">
                                            <td align="right" colspan="5"><?=$lang_vat?> {{vat3}}%</td>
                                            <td style="font-weight: bold;" align="right">
                                                {{sumsalevat-sumsale_price | number:2}}</td>
                                        </tr>




                                        <tr ng-if="vat3!='0'">
                                            <td align="right" colspan="5"><?=$lang_pricebeforvat?></td>
                                            <td style="font-weight: bold;" align="right">
                                                {{sumsalevat-(sumsalevat-sumsale_price) | number:2}}</td>
                                        </tr>

                                        <tr ng-if="vat3!='0'">
                                            <td align="right" colspan="5">ราคารวม vat</td>
                                            <td style="font-weight: bold;" align="right">
                                                {{sumsalevat | number:2}}</td>
                                        </tr>



                                        <?php
}
?>





                                        <?php
if($_SESSION['owner_vat_status']=='2'){
?>
                                        <tr ng-if="vat3!='0'">
                                            <td align="right" colspan="5"><?=$lang_vat?> {{vat3}}%</td>
                                            <td style="font-weight: bold;" align="right">
                                                {{sumsalevat-sumsale_price | number:2}}</td>
                                        </tr>




                                        <tr ng-if="vat3!='0'">
                                            <td align="right" colspan="5"><?=$lang_pricebeforvat?></td>
                                            <td style="font-weight: bold;" align="right">
                                                {{sumsalevat-(sumsalevat-sumsale_price) | number:2}}</td>
                                        </tr>

                                        <tr ng-if="vat3!='0'">
                                            <td align="right" colspan="5">ราคารวม vat</td>
                                            <td style="font-weight: bold;" align="right">
                                                {{sumsalevat | number:2}}</td>
                                        </tr>

                                        <?php
}
?>




                                        <!-- <tr ng-if="vat3 > '0'">
		<td align="right" colspan="5"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr> -->

                                        <tr>
                                            <td align="right" colspan="5"><?=$lang_discount?></td>
                                            <td style="font-weight: bold;" align="right">{{discount_last2 | number:2}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" colspan="5"><?=$lang_sumall?></td>
                                            <td style="font-weight: bold;" align="right">
                                                <u>{{sumsalevat-discount_last2 | number:2}}</u>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" colspan="5"><?=$lang_getmoney?></td>
                                            <td style="font-weight: bold;" align="right">
                                                {{money_from_customer3 | number:2}}</td>
                                        </tr>
                                        <tr>
                                            <td align="right" colspan="5"><?=$lang_moneychange?></td>
                                            <td style="font-weight: bold;" align="right">
                                                {{money_from_customer3-(sumsalevat-discount_last2) | number:2}}</td>
                                        </tr>
                                    </tbody>
                                </table>





                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                    aria-hidden="true">Close</button>

                            </div>
                        </div>
                    </div>
                </div>




                <div class="modal fade" id="Openonemini" style="visibility: hidden;">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div id="section-to-print">
                                    <center>
                                        <table>
                                            <tr>
                                                <td align="center">
                                                    <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>"
                                                        width="100px">
                                                </td>
                                            </tr>
                                        </table>
                                        <b><span style="font-size: 18px;"> <?php echo $_SESSION['owner_name']; ?></span>
                                        </b>


                                        <?php if($_SESSION['owner_tax_number'] != ''){ ?>
                                        <br />
                                        <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
                                        <?php } ?>


                                        <br />
                                        <?php echo $_SESSION['owner_address']; ?>
                                        <br />
                                        <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

                                        <br />


                                        ________________
                                        <br />


                                        <span ng-if="cus_id != null">
                                            <table width="100%">
                                                <tr>
                                                    <td><?=$lang_cusname?></td>
                                                    <td>{{cus_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><?=$lang_address?>: {{cus_address_all}}</td>
                                                </tr>
                                                <tr>
                                                    <td>ເງິນໃນກະເປົາ</td>
                                                    <td>{{cus_wallet | number}}</td>
                                                </tr>
                                                <tr>
                                                    <td>ຄະແນນສະສົມ</td>
                                                    <td>{{cus_score | number}}</td>
                                                </tr>
                                            </table>

                                            ________________
                                        </span>


                                        <?=$lang_receipt?></button>
                                        <br />
                                        <?=$lang_table?>: {{table_name}}
                                        <br />


                                        ຊຳລະໂດຍ
                                        <span ng-if="pay_type_slip=='1'">ເງິນສົດ</span>
                                        <span ng-if="pay_type_slip=='2'"><?=$lang_transfer?></span>
                                        <span ng-if="pay_type_slip=='3'"><?=$lang_creditcard?></span>
                                        <span ng-if="pay_type_slip=='4'"><?=$lang_owe?></span>
                                        <span ng-if="pay_type_slip=='5'"><?=$lang_qrpayment?></span>
                                        <span ng-if="pay_type_slip=='6'">ກະເປົາເງິນ Wallet</span>

                                        <br />





                                        <!--<br />

 (VAT <span ng-if="vat3 == '0'">Included</span><span ng-if="vat3 > '0'">{{vat3}} %</span>)
 -->


                                        <!--
<span ng-if="cus_name != ''">
___________________________
<br />
<?=$lang_cusname?>: {{cus_name}}
<br />
 <?=$lang_address?>: {{cus_address_all}}
  <br />
 </span>  -->

                                        <?=$lang_productservice?>

                                    </center>

                                    <table class="table" style="width: 100%;font-size:14px;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="x in listone">

                                                <td colspan="2" align="left">{{x.product_sale_num}} {{x.product_name}}
                                                </td>

                                                <td align="right">
                                                    {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}
                                                </td>
                                            </tr>
                                            <tr>

                                                <td colspan="2" align="right"><?=$lang_summary?>:</td>


                                                <td align="right">{{sumsale_price | number:2}}</td>
                                            </tr>

                                            <tr ng-if="vat3 > '0'">
                                                <td><?=$lang_vat?> {{vat3}} %</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsale_price*(vat3/100) | number:2}}</td>
                                            </tr>


                                            <tr ng-if="vat3 > '0'">
                                                <td><?=$lang_pricesumvat?></td>
                                                <td align="right">
                                                    {{sumsalevat | number:2}}</td>
                                            </tr>

                                            <tr>

                                                <td colspan="2" align="right"><?=$lang_discount?>:</td>
                                                <td align="right">{{discount_last2 | number:2}}</td>
                                            </tr>

                                            <tr>

                                                <td colspan="2" align="right"><?=$lang_sumall?>:</td>
                                                <td align="right" style="font-weight: bold;">
                                                    {{sumsalevat-discount_last2 | number:2}}</td>
                                            </tr>


                                            <tr>

                                                <td colspan="2" align="right"><?=$lang_getmoney?>:</td>
                                                <td align="right">{{money_from_customer3 | number:2}}</td>
                                            </tr>
                                            <tr>

                                                <td colspan="2" align="right"><?=$lang_moneychange?>:</td>
                                                <td align="right">
                                                    {{money_from_customer3 -(sumsalevat-discount_last2) | number:2}}
                                                </td>
                                            </tr>

                                            <?php
if($_SESSION['owner_vat']!='0'){
?>
                                            <tr>
                                                <td colspan="2" align="right"><?=$lang_vat?> <?=$_SESSION['owner_vat']?>
                                                    %</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}
                                                </td>
                                            </tr>


                                            <tr>
                                                <td colspan="2" align="right"><?=$lang_pricebeforvat?></td>
                                                <td align="right">
                                                    {{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}
                                                </td>
                                            </tr>
                                            <?php } ?>


                                        </tbody>
                                    </table>

                                    <!-- __________________________________________
<table width="100%">
	<tbody>
		<tr ng-repeat="c in lastbillcat">
			<td style="text-align: left;">{{c.catname}}</td>
			<td>{{c.num}}</td>
			<td>{{c.pricevalue}}</td>
		</tr>

	</tbody>
</table> -->

                                    <center>
                                        ________________
                                        <br />
                                        <?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
                                        <br />
                                        Order: {{sale_runno}}
                                        <br />

                                        <?=$lang_day?>ພິມ: {{adddate}}

                                        <br />

                                        <?=$_SESSION['footer_slip']?>

                                        <br />
                                        ________________
                                    </center>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" ng-click="printDiv()">
                                    <?=$lang_print?></button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                    aria-hidden="true">Close</button>

                            </div>
                        </div>
                    </div>
                </div>







            </div>


            <?php if($_SESSION['user_type'] < '9'){?>
            <div class="col-sm-12 col-md-12">
                <div class="col-sm-12 col-md-12 panel panel-default">
                    <div class="panel-body">

                        ລາຍການຂາຍລ້າສຸດ


                        <div style="float: right;">
                            <input type="checkbox" ng-model="showdeletcbut">
                            <?=$lang_showdel?>
                        </div>


                        <form class="form-inline">
                            <div class="form-group">
                                <input type="text" ng-model="searchtext" ng-change="getlist(searchtext,'1')"
                                    class="form-control" placeholder="<?=$lang_search?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success"
                                    placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search"
                                        aria-hidden="true"></span></button>
                            </div>
                            <div class="form-group">
                                <button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder=""
                                    title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh"
                                        aria-hidden="true"></span></button>
                            </div>

                        </form>
                        <br />




                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="trheader">
                                    <th><?=$lang_rank?></th>
                                    <th style="width:130px;"><?=$lang_runno?></th>


                                    <th><?=$lang_table?></th>

                                    <!-- <th><?=$lang_cusname?></th> -->

                                    <th><?=$lang_productnum?></th>
                                    <th><?=$lang_pricesum?></th>


                                    <?php
if($_SESSION['owner_vat_status']=='2'){
?>
                                    <th><?=$lang_vat?> Exclude</th>
                                    <th><?=$lang_pricesumvat?></th>
                                    <?php
}
?>

                                    <th><?=$lang_discount?></th>
                                    <th><?=$lang_sumall?></th>
                                    <th><?=$lang_getmoney?></th>
                                    <th><?=$lang_moneychange?></th>
                                    <th><?=$lang_payby?></th>
                                    <th>ຜູ້ຮັບເງິນ</th>
                                    <th>ພະນັກງານຮັບອໍເດີ</th>
                                    <th><?=$lang_day?></th>
                                    <th ng-show="showdeletcbut" style="width: 50px;"><?=$lang_delete?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="x in list">
                                    <td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
                                    <td ng-show="selectpage!='1'" class="text-center">
                                        {{($index+1)+(perpage*(selectpage-1))}}</td>
                                    <td>

                                        <button ng-show="printer_ul =='0'" class="btn btn-primary btn-xs"
                                            ng-click="printDivmini2(x)">ພິມ</button>

                                        <button ng-show="printer_ul !='0'" class="btn btn-primary btn-xs"
                                            ng-click="printDivminiip2(x)">ພິມ</button>


                                        <button class="btn btn-default btn-xs"
                                            ng-click="Getone(x)">{{x.sale_runno}}</button>
                                    </td>

                                    <td>{{x.table_name}}</td>

                                    <!-- <td>{{x.cus_name}}</td> -->

                                    <td align="right">{{x.sumsale_num | number}}</td>
                                    <td align="right">{{x.sumsale_price | number:2}}</td>


                                    <?php
if($_SESSION['owner_vat_status']=='2'){
?>
                                    <td align="right">{{x.sumsale_price * (x.vat/100) | number:2}}</td>
                                    <td align="right">
                                        {{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) | number:2}}
                                    </td>

                                    <?php
}
?>



                                    <td align="right">{{x.discount_last | number:2}}</td>
                                    <td align="right">
                                        {{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) - x.discount_last | number:2}}
                                    </td>
                                    <td align="right">{{x.money_from_customer | number:2}}</td>
                                    <td align="right">
                                        {{x.money_from_customer - ((ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price)) - x.discount_last) | number:2}}
                                    </td>

                                    <td>
                                        <span ng-if="x.pay_type=='1'">ເງິນສົດ</span>
                                        <span ng-if="x.pay_type=='2'"><?=$lang_transfer?></span>
                                        <span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
                                        <span ng-if="x.pay_type=='4'"><?=$lang_owe?></span>
                                        <span ng-if="x.pay_type=='5'"><?=$lang_qrpayment?></span>
                                        <span ng-if="x.pay_type=='6'">ກະເປົາເງິນ Wallet</span>
                                    </td>

                                    <td>{{x.name}}</td>
                                    <td>{{x.name_user_ordering}}</td>
                                    <td>{{x.adddate}}</td>
                                    <td ng-show="showdeletcbut" align="center"><button class="btn btn-xs btn-danger"
                                            ng-click="Deletelist(x)" id="delbut{{x.ID}}">
                                            <?=$lang_delete?></button></td>
                                </tr>
                            </tbody>
                        </table>


                        <form class="form-inline">
                            <div class="form-group">
                                <?=$lang_show?>
                                <select class="form-control" name="perpage" id="perpage" ng-model="perpage"
                                    ng-change="getlist(searchtext,'1',perpage)">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                </select>

                                <?=$lang_page?>
                                <select name="selectthispage" id="selectthispage" class="form-control"
                                    ng-model="selectthispage" ng-change="getlist(searchtext,selectthispage,perpage)">
                                    <option ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
                                </select>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
            <?php } ?>








            <div class="modal fade" id="Opentable">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">


                            <button ng-if="table_id!=''" type="button" class="btn btn-default"
                                ng-click="Closeopentablemodal()" style="float: right;">ປິດໜ້າຕ່າງ</button>


                            <!-- ==================  update prevent cashier add edit stock ======== -->
                            <?php if($_SESSION['user_type']=='2' && ['user_type']==3 && ['user_type']=='4'){?>
                            <a style="float: right;" href="<?php echo $base_url;?>/warehouse/productlist"
                                class="btn btn-warning" target="_blank">ເພີ້ມ ລົບ ແກ້ໄຂ ລາຍການອາຫານ</a>
                            <?php } ?>

                            <!-- ================== End update prevent cashier add edit stock ======== -->


                            <!-- ================== close user cashier to prevent add edit stock ======== -->

                            <!--  <?php if($_SESSION['user_type']<'9'){?>
				<a style="float: right;" href="<?php echo $base_url;?>/warehouse/productlist" class="btn btn-warning" target="_blank">ເພີ້ມ ລົບ ແກ້ໄຂ ລາຍການອາຫານ</a>
<?php } ?> -->

                            <!-- ================== close user cashier to prevent add edit stock ======== -->


                            <h4 class="modal-title"><?php echo $lang_selecttable;?></h4>

                            <form>
                                <input type="text" name="searchtablename" ng-model="searchtablename"
                                    placeholder="ຄົ້ນຫາ" class="form-control"
                                    style="width:200px;height:50px;font-size:25px;font-weight:bold;" />
                            </form>
                        </div>
                        <div class="modal-body" style="height: 450px;overflow: scroll;">

                            <center ng-show="confirmcloseshiftnowok == '1' && cshiftnow=='0'">

                                <h1><b>ປິດກະສົ່ງຍອດເງິນ_test</b></h1>

                                <input type="number" ng-model="shift_money_end" class="form-control"
                                    placeholder="ເງິນທັງໝົດໃນລີ້ນຊັກ x.xx"
                                    style="font-size:25px;font-weight:bold;width:350px;height:60px;" />
                                <br>
                                <button ng-show="shift_money_end" ng-click="Confirmcloseshiftnow()"
                                    class="btn btn-lg btn-success"
                                    style="font-size:50px;font-weight:bold">ຢືນຢັນການປິດກະ</button>
                                <hr />

                                <button ng-click="Canclecloseshiftnow()" class="btn btn-sm btn-default"
                                    style="font-size:50px;font-weight:bold">ຂາຍຕໍ່</button>





                            </center>


                            <?php if(!isset($_SESSION['shift_id'])) {?>
                            <center ng-show="shiftnow == '0'">

                                <?php if(isset($_SESSION['shift_id_old'])){ ?>



                                <?php

$moneyshiftchange = number_format($_SESSION['shift_money_end_old']-$_SESSION['shift_money_start_old'],2);
	echo 'ເງິນໃນລີ້ນຊັກສຸດທ້າຍ('.number_format($_SESSION['shift_money_end_old'],2).') - ເງິນເລີ່ມຕົ້ນ('.number_format($_SESSION['shift_money_start_old'],2).') = ສ່ວນຕ່າງ('.$moneyshiftchange.')'

	?>


                                <br />

                                <button type="submit" ng-if="printer_ul =='0'" ng-click="Openbillcloseday()"
                                    class="btn btn-info btn-lg">ພິມບິນປິດຍອດກະ
                                    <?php if(isset($_SESSION['shift_id_old'])){echo $_SESSION['shift_id_old'];} ?></button>

                                <button ng-if="printer_ul !='0' " type="button" class="btn btn-info btn-lg"
                                    ng-click="Openbillclosedayip()">ພິມບິນປິດຍອດກະ
                                    <?php if(isset($_SESSION['shift_id_old'])){echo $_SESSION['shift_id_old'];} ?></button>

                                <hr />
                                <?php } ?>



                                <?php if($_SESSION['user_type'] < '9'){ ?>
                                <h1><b>ເປີດກະໃໝ່</b></h1>
                                <br>
                                <input type="number" ng-model="shift_money_start" class="form-control"
                                    placeholder="ເງິນໃນລີ້ນຊັກເລີ່ມຕົ້ນ x.xx"
                                    style="font-size:25px;font-weight:bold;width:350px;height:60px;" />
                                <br>
                                <button ng-show="shift_money_start" ng-click="Openshiftnow()"
                                    class="btn btn-lg btn-info"
                                    style="font-size:50px;font-weight:bold">ເປີດກະໃໝ່</button>
                                <h1> <?php echo date('d/m/Y H:i:s',time()); ?> </h1>

                                <?php }else{
	echo '<h1><b> ກະລຸນາເປີດກະ</b></h1>';
} ?>




                            </center>


                            <?php } ?>


                            <div ng-show="shiftnow == '1' && confirmcloseshiftnowok == '0'"
                                class="col-sm-4 col-sm-4 col-md-3" ng-repeat="x in tablelist | filter:searchtablename">



                                <span ng-if="x.table_id == null" class="btn btn-default" ng-click="Selecttable(x)"
                                    style="width: 100%;">
                                    <b style="float:right;color:#000;">ວ່າງ</b>
                                    <center>

                                        <h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


                                        <h4>{{x.food_table_seat}} <?=$lang_seat?></h4>
                                        <br />
                                    </center>
                                </span>


                                <span ng-if="x.table_id != null && x.number_of_order=='0' && x.food_table_status=='0'"
                                    class="btn btn-primary" ng-click="Selecttable(x)" style="width: 100%;">
                                    <b style="float:right;color:#fff;">ກຳລັງຮັບປະທານ</b>
                                    <center>

                                        <h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


                                        <h4>{{x.food_table_seat}} <?=$lang_seat?></h4>

                                        {{Getdatenowtotime(datenow - x.adddate)}}

                                    </center>
                                </span>

                                <span ng-if="x.table_id != null && x.number_of_order!='0' && x.food_table_status=='0'"
                                    class="btn btn-warning" ng-click="Selecttable(x)" style="width: 100%;">
                                    <b style="float:right;color:#fff;">{{x.number_of_order}} ອໍເດີໃໝ່</b>

                                    <center>

                                        <h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


                                        <h4>{{x.food_table_seat}} <?=$lang_seat?></h4>
                                        {{Getdatenowtotime(datenow - x.adddate)}}

                                    </center>
                                </span>


                                <span ng-if="x.table_id != null && x.food_table_status!='0'" class="btn btn-info"
                                    ng-click="Selecttable(x)" style="width: 100%;">
                                    <b style="float:right;color:#fff;">ເຊັກບິນແລ້ວ</b>

                                    <center>

                                        <h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


                                        <h4>{{x.food_table_seat}} <?=$lang_seat?></h4>

                                        {{Getdatenowtotime(datenow - x.adddate)}}
                                    </center>
                                </span>





                                <br /><br />
                            </div>




                        </div>
                        <div class="modal-footer">

                            <center>
                                <a href="<?php echo $base_url;?>" class="btn btn-lg btn-default">
                                    ໄປໜ້າທຳອິດ
                                </a>


                                <a href="<?php echo $base_url;?>/logout" class="btn btn-lg btn-default">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                    ອອກຈາກລະບົບ</a>
                            </center>

                        </div>
                    </div>
                </div>
            </div>









            <div class="modal fade" id="Opentablecus2mer">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">


                        </div>
                        <div class="modal-body">

                            <div ng-repeat="x in tablelist">


                                <span
                                    ng-if="x.food_table_id == '<?php if(isset($_SESSION['food_table_id'])){ echo $_SESSION['food_table_id'];} ?>'"
                                    class="btn btn-default" ng-click="Selecttable(x)" style="width: 100%;">
                                    <center>

                                        <h1 style="font-weight: bold;">{{x.food_table_name}}</h1>


                                        <h4>{{x.food_table_seat}} <?=$lang_seat?></h4>

                                    </center>
                                </span>


                            </div>




                        </div>
                        <div class="modal-footer">


                        </div>
                    </div>
                </div>
            </div>







            <div class="modal fade" id="Openselectproductnum">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><?=$lang_qty?> </h4>
                        </div>
                        <div class="modal-body">

                            <table class="table" width="100%">
                                <tr>
                                    <td valign="top">
                                        <center>
                                            <h1>{{product_name_num}}</h1>

                                            <!-- <select ng-model="productaddqty" class="form-control" style="font-size: 50px;font-weight: bold;text-align: center;width: 100px;height: 70px;background-color:orange;color:#fff;">

	<?php
// for($i=1;$i<=100;$i++){
// echo '<option value="'.$i.'">'.$i.'</option>';
// }
	?>


</select> -->

                                            <!-- =================== -->



                                            <div class="form-group">
                                                <input ng-model="productaddqty" type="text" class="form-control"
                                                    style="font-size: 50px;font-weight: bold;text-align: center;width: 300px;height: 70px;background-color:orange;color:#fff;">
                                            </div>


                                            <!--  =====================================-->



                                            <br />
                                            <br />

                                            <textarea class="form-control" ng-model="note_order"
                                                placeholder="ໂນດ... ເຜັດ ບໍ່ເຜັດ... ອາຫານນອກເມນູ">
</textarea>

                                        </center>

                                    </td>
                                    <td ng-if="getproductpotlist.length!='0' || getproductpotlistshowall.length!='0'"
                                        width="30%" valign="top">
                                        <div style="height: 250px;overflow: auto;">

                                            <span
                                                ng-if="getproductpotlist.length!='0' || getproductpotlistshowall.length!='0'">ອ໋ອບຊັນ
                                                <br />
                                            </span>

                                            <span ng-repeat="x in getproductpotlist">
                                                <button ng-click="Addpottoproduct(x)" class="btn btn-warning btn-lg"
                                                    style="margin-right: 2px;margin-bottom: 2px;">
                                                    + {{x.product_ot_name}}
                                                    ({{x.product_ot_price | number}})
                                                </button>
                                                <br />
                                            </span>

                                            <span ng-if="getproductpotlistshowall.length!='0'">
                                                <br />
                                            </span>

                                            <span ng-repeat="x in getproductpotlistshowall">
                                                <button ng-click="Addpottoproduct(x)" class="btn btn-warning btn-lg"
                                                    style="margin-right: 2px;margin-bottom: 2px;">
                                                    + {{x.product_ot_name}}
                                                    ({{x.product_ot_price | number}})
                                                </button>
                                                <br />
                                            </span>

                                        </div>

                                    </td>
                                </tr>
                            </table>



                            <center>

                                <button type="button" id="addpushproductcodeid" class="btn btn-success btn-lg"
                                    ng-click="Addpushproductcode(productcode)"
                                    style="font-size:50px;font-weight:bold;"><?=$lang_confirm?></button>

                                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"
                                    style="font-size:50px;font-weight:bold;">ຍົກເລີກ</button>
                            </center>

                        </div>
                        <div class="modal-footer">


                        </div>
                    </div>
                </div>
            </div>











            <div class="modal fade" id="Opentablemove">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">ຍ້າຍຈາກໂຕະ <b>{{table_name}}</b> ໄປທີ່ໂຕະ ຫຼື ລວມກັບໂຕະ</h4>
                        </div>
                        <div class="modal-body" style="height: 450px;overflow: scroll;">


                            <div class="col-sm-4 col-sm-4 col-md-3" ng-repeat="x in tablelist">

                                <div ng-if="x.table_id == null" class="col-md-12 btn btn-default"
                                    ng-click="Selecttablemove(x)" style="width: 100%;">
                                    <span style="float:right;">ว่าง</span>
                                    <center>

                                        <h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


                                        <h4>{{x.food_table_seat}} <?=$lang_seat?></h4>

                                    </center>
                                </div>


                                <div ng-if="x.table_id != null" class="col-md-12 btn btn-primary"
                                    ng-click="Selecttablemove(x)" style="width: 100%;">
                                    <span style="float:right;">ບໍ່ວ່າງ</span>
                                    <center>

                                        <h3 style="font-weight: bold;">{{x.food_table_name}}</h3>


                                        <h4>{{x.food_table_seat}} <?=$lang_seat?></h4>

                                    </center>
                                </div>


                                <div class="col-md-12">
                                    <BR />
                                </div>
                            </div>




                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>




            <!-- ======= check bill =============================== -->

            <div class="modal fade" id="Opencheckbill" style="visibility: hidden;">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                        <div class="modal-body">
                            <!-- origin -->
                            <!-- <div  id="section-to-print"> -->
                            <!-- update new  -->
                            <div id="section-to-print-checkbill">
                                <!-- update new  -->

                                <center>
                                    <table>
                                        <tr>
                                            <td align="center">
                                                <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
                                            </td>
                                        </tr>
                                    </table>

                                    <b><span style="font-size: 18px;"> <?php echo $_SESSION['owner_name']; ?></span>
                                    </b>



                                    <?php if($_SESSION['owner_tax_number'] != ''){ ?>
                                    <br />
                                    <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
                                    <?php } ?>



                                    <br />
                                    <?php echo $_SESSION['owner_address']; ?>
                                    <br />
                                    <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

                                    <br />
                                    ________________
                                    <br />
                                    <b><?=$lang_bill?></b>
                                    <br />
                                    <b><?=$lang_table?>: {{table_name}}</b>
                                </center>


                                <table class="table" style="width: 100%;font-size:14px;">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="x in listsale">
                                            <td align="left">{{x.product_sale_num}} {{x.product_name}}</td>
                                            <td colspan="2" align="right">
                                                {{(x.product_price-x.product_price_discount)*x.product_sale_num | number:2}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right">

                                                <?=$lang_all?>:
                                            </td>
                                            <td align="right">

                                                {{Sumsaleprice() | number:2}}
                                            </td>
                                        </tr>





                                        <?php
if($_SESSION['owner_vat_status']=='2'){
?>
                                        <tr>
                                            <td colspan="2" align="right">
                                                <?=$lang_vat?>
                                                <?=$_SESSION['owner_vat']?> %
                                            <td align="right" style="font-weight: bold;">
                                                {{(Sumsaleprice() * <?=$_SESSION['owner_vat']?>/100) | number:2 }}
                                            </td>

                                        </tr>


                                        <tr>
                                            <td colspan="2" align="right">
                                                ยอดรวม vat
                                            <td align="right" style="font-weight: bold;">
                                                {{(Sumsaleprice() * <?=$_SESSION['owner_vat']?>/100)+Sumsaleprice() | number:2 }}
                                            </td>

                                        </tr>



                                        <?php
}
?>



                                        <tr>
                                            <td colspan="2" align="right">
                                                <?=$lang_discount?>:
                                            </td>
                                            <td align="right">

                                                <span ng-show="discount_percent=='0'">
                                                    {{discount_last | number:2 }}
                                                </span>

                                                <span ng-show="discount_percent=='1'">
                                                    {{Sumsaleprice()*(discount_last_percent/100) | number:2 }}
                                                </span>

                                            </td>
                                        </tr>




                                        <tr>
                                            <td colspan="2" align="right" style="font-size: 18px;font-weight: bold;">
                                                <?=$lang_payment?>:
                                            </td>
                                            <td align="right" style="font-size: 18px;font-weight: bold;">
                                                <span ng-show="discount_percent=='0'">
                                                    {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - discount_last | number:2 }}
                                                </span>

                                                <span ng-show="discount_percent=='1'">
                                                    {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - ((Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100)) | number:2 }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <center>
                                    ________________
                                    <br />
                                    <?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
                                    <br />

                                    <?=$lang_day?>: <?php echo date('d-m-Y',time())?>

                                    <br />
                                    ________________
                                </center>



                            </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"
                                ng-click="printDiv2()"><?=$lang_print?></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- ======= check bill =============================== -->




            <div class="modal fade" id="Openbillcloseday">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                        <div class="modal-body">
                            <form class="form-inline">
                                <div class="form-group">
                                </div>

                                <!-- <div class="form-group">
<button type="submit" ng-click="Openbillcloseday()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div> -->



                            </form>
                            <div id="section-to-print">
                                <center>
                                    <table style="table-layout: fixed;">
                                        <tr>
                                            <td width="150px" align="center">
                                                <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
                                            </td>
                                        </tr>
                                    </table>
                                    <b><span style="font-size: 18px;"> <?php echo $_SESSION['owner_name']; ?></span>
                                    </b>


                                    <?php if($_SESSION['owner_tax_number'] != ''){ ?>
                                    <br />
                                    <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
                                    <?php } ?>


                                    <br />

                                    <?php echo $_SESSION['owner_address']; ?>
                                    <br />
                                    <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

                                    <br />
                                    ________________
                                    <br />
                                    <?=$lang_billclostday?> ກະທີ
                                    <?php if(isset($_SESSION['shift_id_old'])){ echo $_SESSION['shift_id_old'];}?>
                                    <br />
                                    ເລີ່ມ:
                                    <?php if(isset($_SESSION['shift_start_time_old'])){ echo $_SESSION['shift_start_time_old'];}?>
                                    <br />
                                    ເຖິງ:
                                    <?php if(isset($_SESSION['shift_end_time_old'])){ echo $_SESSION['shift_end_time_old'];}?>
                                    <br />
                                    <?php
if(isset($_SESSION['shift_id_old'])){
$moneyshiftchange = number_format($_SESSION['shift_money_end_old']-$_SESSION['shift_money_start_old'],2);
echo 'ເງິນໃນລີ້ນຊັກສຸດທ້າຍ( '.number_format($_SESSION['shift_money_end_old'],2).' )
<br /> ເງິນເລີ່ມຕົ້ນ( '.number_format($_SESSION['shift_money_start_old'],2).' )
<br />= ສ່ວນຕ່າງ( '.$moneyshiftchange.' )';
}
?>
                                    <br />

                                    <span ng-if="shiftclose_addwallet[0].money_add != null">
                                        ..............................
                                        <br />
                                        ເພີ່ມເງິນເຂົ້າກະເປົາ Wallet ({{shiftclose_addwallet[0].money_add | number}})
                                        <br />
                                    </span>
                                    ..............................

                                </center>

                                <table class="" style="width: 100%;" ng-repeat="x in openbillclosedaylista">

                                    <tbody>
                                        <tr style="font-weight:bold;">
                                            <td><i>{{x.product_category_name2}}</i></td>
                                            <td>
                                                {{x.product_sale_num2}}
                                            </td>
                                            <td align="right">{{x.product_price2 | number:2}}</td>
                                        </tr>
                                        <tr ng-repeat="y in openbillclosedaylist_product"
                                            ng-if="y.product_category_id2==x.product_category_id2">
                                            <td>
                                                <li>- {{y.product_name2}} </li>
                                            </td>
                                            <td>{{y.product_sale_num2}}</td>
                                            <td align="right">{{y.product_price2 | number:2}}</td>
                                        </tr>

                                    </tbody>
                                </table>

                                <center>..............................</center>
                                <table class="" style="width: 100%;">

                                    <tbody>

                                        <tr ng-repeat="x in openbillclosedaylistb">
                                            <td><?=$lang_discount?></td>
                                            <td align="right">{{x.discount_last2 | number:2}}</td>

                                        </tr>
                                    </tbody>
                                </table>

                                <center>..............................</center>
                                <table class="" style="width: 100%;">

                                    <tbody>
                                        <tr ng-repeat="x in openbillclosedaylistc">
                                            <td>
                                                <span ng-if="x.pay_type=='1'"><?=$lang_cash?></span>
                                                <span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
                                                <span ng-if="x.pay_type=='5'"><?=$lang_qrpayment?></span>
                                                <span ng-if="x.pay_type=='6'">ກະເປົາເງິນ Wallet</span>
                                            </td>

                                            <td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <center>..............................</center>
                                <table class="" style="width: 100%;">
                                    <tbody>
                                        <tr ng-repeat="x in openbillclosedaylistb">
                                            <td><?=$lang_all?></td>
                                            <td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <center>
                                    ________________
                                    <br />
                                    <?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
                                    <br />

                                    <?=$lang_day?><?=$lang_print?>: <?php echo date('d-m-Y H:i:s',time())?>

                                    <br />
                                    ________________
                                </center>


                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"
                                ng-click="printDiv2()"><?=$lang_print?></button>


                            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
                        </div>
                    </div>
                </div>
            </div>















            <div style="position: absolute; opacity: 0.0;">

                <div class="modal fade" id="Openbillclosedayip">
                    <div class="modal-dialog" style="width: 790px;">
                        <div class="modal-content">

                            <div class="modal-body">
                                <form class="form-inline">
                                    <div class="form-group">

                                        <center>
                                            <button ng-show="printer_ul !='0'" ng-click="printDiv2ip('billclose')"
                                                type="button" class="btn btn-primary"><?=$lang_print?></button>
                                        </center>

                                    </div>


                                </form>


                                <div id="section-to-print-billclose"
                                    style="width: <?php echo $pt_width;?>;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">

                                    <center>
                                        <td width="250px" align="center">
                                            <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="200px">
                                        </td>
                                        </tr>
                                        </table>
                                    </center>

                                    <b><span style="font-size: 30px;"> <?php echo $_SESSION['owner_name']; ?></span>
                                    </b>

                                    <br />
                                    <?php echo $_SESSION['owner_address']; ?>
                                    <br />
                                    <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

                                    <br />
                                    ____________________________________________
                                    <br />
                                    <?=$lang_billclostday?>
                                    ກະທີ<?php if(isset($_SESSION['shift_id_old'])){ echo $_SESSION['shift_id_old'];}?>
                                    <br />
                                    เริ่ม:
                                    <?php if(isset($_SESSION['shift_start_time_old'])){ echo $_SESSION['shift_start_time_old'];}?>
                                    <br />
                                    ถึง:
                                    <?php if(isset($_SESSION['shift_end_time_old'])){ echo $_SESSION['shift_end_time_old'];}?>
                                    <br />
                                    <?php
if(isset($_SESSION['shift_id_old'])){
$moneyshiftchange = number_format($_SESSION['shift_money_end_old']-$_SESSION['shift_money_start_old'],2);
echo 'ເງິນໃນລີ້ນຊັກສຸດທ້າຍ( '.number_format($_SESSION['shift_money_end_old'],2).' )
<br /> ເງິນເລີ່ມຕົ້ນ( '.number_format($_SESSION['shift_money_start_old'],2).' )
<br /> ສ່ວນຕ່າງ( '.$moneyshiftchange.' )';
}
?>
                                    <br />
                                    <span ng-if="shiftclose_addwallet[0].money_add != null">
                                        ____________________________________________
                                        <br />
                                        ເພີ່ມເງິນເຂົ້າກະເປົາ Wallet ({{shiftclose_addwallet[0].money_add | number}})
                                        <br />
                                    </span>
                                    ____________________________________________


                                    <table class="" style="width: 100%;" ng-repeat="x in openbillclosedaylista">

                                        <tbody>
                                            <tr style="font-weight:bold;">
                                                <td><i>{{x.product_category_name2}}</i></td>
                                                <td>
                                                    {{x.product_sale_num2}}
                                                </td>
                                                <td align="right">{{x.product_price2 | number:2}}</td>
                                            </tr>
                                            <tr ng-repeat="y in openbillclosedaylist_product"
                                                ng-if="y.product_category_id2==x.product_category_id2">
                                                <td>
                                                    <li>- {{y.product_name2}} </li>
                                                </td>
                                                <td>{{y.product_sale_num2}}</td>
                                                <td align="right">{{y.product_price2 | number:2}}</td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    ____________________________________________
                                    <table style="width: 100%;">

                                        <tbody>

                                            <tr ng-repeat="x in openbillclosedaylistb">
                                                <td><?=$lang_discount?></td>
                                                <td align="right">{{x.discount_last2 | number:2}}</td>

                                            </tr>
                                        </tbody>
                                    </table>

                                    ____________________________________________
                                    <table style="width: 100%;">

                                        <tbody>
                                            <tr ng-repeat="x in openbillclosedaylistc">
                                                <td>
                                                    <span ng-if="x.pay_type=='1'"><?=$lang_cash?></span>
                                                    <span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
                                                    <span ng-if="x.pay_type=='5'">QR Payment</span>
                                                    <span ng-if="x.pay_type=='6'">ກະເປົາເງິນ Wallet</span>
                                                </td>

                                                <td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    ____________________________________________
                                    <table style="width: 100%;">
                                        <tbody>
                                            <tr ng-repeat="x in openbillclosedaylistb">
                                                <td><?=$lang_all?></td>
                                                <td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    ____________________________________________
                                    <table width="100%">
                                        <tr>
                                            <td style="text-align: left;"><?=$lang_sales?> </td>
                                            <td style="text-align: left;"><?php echo $_SESSION['name']; ?></td>
                                            <td> </td>
                                        </tr>

                                    </table>

                                    <?=$lang_day?>: <?php echo date('d-m-Y H:i:s',time())?>
                                    <br />
                                    ____________________________________________



                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" ng-if="printer_ul =='0'" class="btn btn-primary"
                                    ng-click="printDiv2()"><?=$lang_print?></button>




                                <button type="button" class="btn btn-default"
                                    data-dismiss="modal"><?=$lang_close?></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
















            <div class="modal fade" id="Editpushmodal">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">ແກ້ໄຂ {{product_name_edit}}</h4>
                        </div>
                        <div class="modal-body">



                            <center ng-show="checkadminpassedit=='1'">
                                ยืนยันการแก้ไข {{dataforedit.product_name}} <br />ກະລຸນາໃສ່ ລະຫັດຜ່ານ Admin ຮ້ານ
                                <br />
                                <input type="password" ng-model="adminpass" class="form-control">
                                <br />
                                <button type="button" class="btn btn-success btn-lg"
                                    ng-click="Editpush(dataforedit)">ຢືນຢັນ</button>
                                <span ng-if="addminpasswrongedit=='1'" style="color: red;">
                                    <br />
                                    ລະຫັດຜ່ານ Admin ຮ້ານ ຜິດ ກະລຸນາໃສ່ໃໝ່
                                </span>
                            </center>





                            <center ng-show="checkadminpassedit==''">
                                <h1>
                                    <input type="text" ng-model="product_name_edit" class="form-control"
                                        style="font-size: 30px;height: 50px;">
                                </h1>


                                note
                                <textarea ng-model="product_note_order_edit" class="form-control"
                                    placeholder="ໂນດ ເຜັດ ບໍ່ເຜັດ ອາຫານນອກເມນູ">
</textarea>
                                <br />
                                ລາຄາ
                                <input type="text" ng-model="product_price_edit" class="form-control"
                                    style="width: 200px;font-size: 30px;text-align: right;height: 50px;">
                                <br />
                                ຈຳນວນ
                                <select ng-model="product_sale_num_edit" class="form-control"
                                    style="width: 100px;font-size: 30px;height: 50px;">


                                    <?php
for($i=1;$i<=100;$i++){
echo '<option value="'.$i.'">'.$i.'</option>';
}
	?>


                                </select>
                                <br />
                                <button class="btn btn-success btn-lg" ng-click="Editpushsave()">ບັນທຶກ</button>
                            </center>




                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>





            <div class="modal fade" id="printorder">
                <div class="modal-dialog modal-sm" style="width:<?php echo $slipwidth;?>;">
                    <div class="modal-content">
                        <div class="modal-body">


                            <button ng-repeat="x in listorder_cat" class="btn btn-default"
                                ng-click="Showordercat_print(x)">
                                {{x.product_category_name}}
                            </button>

                            <button class="btn btn-warning" ng-click="Showordeprint_slit()">
                                ປ່ຽນແບບ
                            </button>


                            <div id="section-to-print2">
                                <center>
                                    <h3><b><?=$lang_table?>: {{table_name}}</b></h3>

                                    {{product_category_name_order}}
                                </center>


                                <div ng-if="orderprint_slit =='0'">

                                    <table class="table" style="width: 100%;font-size: 18px;font-weight: bold;">
                                        <tbody>
                                            <tr ng-repeat="x in listorder"
                                                ng-if="product_category_id_order=='' || product_category_id_order==x.product_category_id">
                                                <td align="left">
                                                    <span style="font-size: 12px;">#{{x.s_ID}}</span>
                                                    <br />
                                                    {{x.product_name}}
                                                    <span ng-if="x.note_order !=''">({{x.note_order}})</span>
                                                </td>
                                                <td align="right">{{x.product_sale_num}}</td>
                                            </tr>



                                        </tbody>
                                    </table>
                                    <center style="font-size: 12px;">
                                        ກະ <?php echo $_SESSION['shift_id'];?> by:<?php echo $_SESSION['name'];?>
                                        <br />
                                        {{listorder[0].adddate}}
                                        <br />
                                        ---------------
                                    </center>

                                </div>


                                <div ng-if="orderprint_slit =='1'">
                                    <center>---------------</center>
                                    <table ng-repeat="x in listorder"
                                        style="width: 100%;font-size: 18px;font-weight: bold;">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" align="center">
                                                    <h4><b><?=$lang_table?>: {{table_name}}</b></h4>
                                                    <span style="font-size: 12px;">#{{x.s_ID}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left">{{x.product_name}}
                                                    <span ng-if="x.note_order !=''">({{x.note_order}})</span>
                                                </td>
                                                <td align="right">{{x.product_sale_num}}</td>
                                            </tr>

                                            <tr>
                                                <td colspan="2">
                                                    <center style="font-size: 12px;font-weight:100;">
                                                        ກະ<?php echo $_SESSION['shift_id'];?>
                                                        by:<?php echo $_SESSION['name'];?>
                                                        <br />
                                                        {{listorder[0].adddate}}
                                                        <br />
                                                        ---------------
                                                    </center>
                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>

                                </div>











                            </div>





                        </div>
                        <div class="modal-footer">
                            <center>

                                <button type="button" class="btn btn-primary"
                                    ng-click="printDiv2()"><?=$lang_print?></button>
                                <br /><br /><br /><br />
                                <button type="button" class="btn btn-default"
                                    data-dismiss="modal"><?=$lang_close?></button>

                            </center>

                        </div>
                    </div>
                </div>
            </div>











            <div style="position: absolute; opacity: 0.0;">
                <div class="modal fade" id="printorderipmodal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">


                                <button ng-repeat="x in listorder_cat" class="btn btn-default"
                                    ng-click="Showordercat_print(x)">
                                    {{x.product_category_name}}
                                </button>

                                <div id="section-to-print-order"
                                    style="width: <?php echo $pt_width;?>;font-size: 26px;text-align: left;background-color: #fff;overflow:visible !important;">


                                    <b style="float:left;font-size:30px;"><?=$lang_table?>: {{table_name}}</b>


                                    {{product_category_name_order}}



                                    <table class="table table-hover" width="100%">
                                        <tr ng-repeat="x in listorder"
                                            ng-if="product_category_id_order=='' || product_category_id_order==x.product_category_id">
                                            <td style="float:left;">{{x.product_name}} [by {{x.name}}]

                                                <i ng-if="x.note_order !=''">
                                                    <br />
                                                    ({{x.note_order}})</i>
                                            </td>

                                            <td align="left">{{x.product_sale_num | number}}</td>
                                        </tr>




                                    </table>
                                    <center>
                                        {{listorder[0].adddate}}

                                        <br />
                                        ________
                                    </center>



                                </div>





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary"
                                    ng-click="printDiv2()"><?=$lang_print?></button>
                                <button type="button" class="btn btn-default"
                                    data-dismiss="modal"><?=$lang_close?></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

















            <div style="position: absolute; opacity: 0.0;">
                <div class="modal fade" id="Opencheckbillip">
                    <div class="modal-dialog modal-lg" style="margin-top: 0px;margin-bottom: 0px;">
                        <div class="modal-content">

                            <div class="modal-body">

                                <div id="section-to-print-bill"
                                    style="width: <?php echo $pt_width;?>;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">

                                    <table width="100%">
                                        <tr>
                                            <td width="250px" align="center">
                                                <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="200px">
                                            </td>
                                        </tr>
                                    </table>


                                    <b> <?php echo $_SESSION['owner_name']; ?> </b>

                                    <br /><?php echo $_SESSION['owner_address']; ?>


                                    <br /> <?php echo $_SESSION['owner_tel']; ?>

                                    <br />

                                    ________________________________________________________

                                    <table width="100%">
                                        <tr>
                                            <td width="33%"></td>
                                            <td width="33%"><b><?=$lang_bill?></b></td>
                                            <td width="33%"></td>
                                        </tr>
                                        <tr>
                                            <td width="33%"></td>
                                            <td width="33%"><b><?=$lang_table?>: {{table_name}}</b></td>
                                            <td width="33%"></td>
                                        </tr>
                                    </table>

                                    ________________________________________________________

                                    <table style="width: 100%;font-size: 30px;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="x in listsale">
                                                <td style="text-align: left;width:50%;">{{x.product_name}}</td>
                                                <td align="left" style="font-size: 25px;">{{x.product_sale_num}} x
                                                    {{x.product_price|number:2}}</td>
                                                <td align="right" style="font-size: 25px;">
                                                    {{(x.product_price-x.product_price_discount)*x.product_sale_num | number:2}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="text-align: left;">

                                                    <?=$lang_all?>:
                                                </td>
                                                <td align="right">

                                                    {{Sumsaleprice() | number:2}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="text-align: left;">
                                                    <?=$lang_discount?>:
                                                </td>
                                                <td align="right">

                                                    <span ng-show="discount_percent=='0'">
                                                        {{discount_last | number:2 }}
                                                    </span>

                                                    <span ng-show="discount_percent=='1'">
                                                        {{Sumsaleprice()*(discount_last_percent/100) | number:2 }}
                                                    </span>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="font-size: 35px;font-weight: bold;text-align: left;">
                                                    <?=$lang_payment?>

                                                </td>


                                                <td ng-show="discount_percent=='0'" align="right"
                                                    style="font-size: 40px;font-weight: bold;text-align: right;">
                                                    {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - discount_last | number:2 }}
                                                </td>

                                                <td ng-show="discount_percent=='1'" align="right"
                                                    style="font-size: 40px;font-weight: bold;text-align: right;">
                                                    {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - ((Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100)) | number:2 }}
                                                </td>


                                            </tr>
                                        </tbody>
                                    </table>


                                    ________________________________________________________
                                    <table width="100%">
                                        <tr>
                                            <td style="text-align: left;"><?=$lang_sales?> </td>
                                            <td style="text-align: left;"><?php echo $_SESSION['name']; ?></td>
                                            <td> </td>
                                        </tr>

                                    </table>

                                    <?=$lang_day?>: <?php echo date('d-m-Y',time())?>

                                    <br />
                                    ________________________________________________________




                                </div>




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary"
                                    ng-click="printDiv2()"><?=$lang_print?></button>
                                <button type="button" class="btn btn-default"
                                    data-dismiss="modal"><?=$lang_close?></button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>







            <div style="position: absolute; opacity: 0.0;">
                <div class="modal fade" id="Openoneminiip">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div id="section-to-print-slip"
                                    style="width: <?php echo $pt_width;?>;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">

                                    <table width="100%">
                                        <tr>
                                            <td width="250px" align="center">
                                                <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="200px">
                                            </td>
                                        </tr>
                                    </table>

                                    <b><span> <?php echo $_SESSION['owner_name']; ?></span> </b>
                                    <!--<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?> -->
                                    <br />
                                    <?php echo $_SESSION['owner_address']; ?>
                                    <br />
                                    <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
                                    <br />

                                    <?php if($_SESSION['owner_tax_number']!=''){?>
                                    <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
                                    <br />
                                    <?php } ?>
                                    ________________________________________________________

                                    <br />

                                    <span ng-if="cus_id != null">
                                        <table width="100%">
                                            <tr>
                                                <td><?=$lang_cusname?></td>
                                                <td>{{cus_name}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><?=$lang_address?>: {{cus_address_all}}</td>
                                            </tr>
                                            <tr>
                                                <td>ເງິນໃນກະເປົາ</td>
                                                <td>{{cus_wallet | number}}</td>
                                            </tr>
                                            <tr>
                                                <td>ຄະແນນສະສົມ</td>
                                                <td>{{cus_score | number}}</td>
                                            </tr>
                                        </table>

                                        ________________________________________________________
                                    </span>

                                    <table width="100%">
                                        <tr>
                                            <td width="30%"></td>
                                            <td width="60%"><b><?=$lang_receipt?></b></td>
                                            <td width="30%"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%"></td>
                                            <td width="60%"><?=$lang_table?>: {{table_name}}</td>
                                            <td width="30%"></td>
                                        </tr>
                                    </table>

                                    ຊຳລະໂດຍ:
                                    <span ng-if="pay_type_slip=='1'">ເງິນສົດ</span>
                                    <span ng-if="pay_type_slip=='2'"><?=$lang_transfer?></span>
                                    <span ng-if="pay_type_slip=='3'"><?=$lang_creditcard?></span>
                                    <span ng-if="pay_type_slip=='4'"><?=$lang_owe?></span>
                                    <span ng-if="pay_type_slip=='5'"><?=$lang_qrpayment?></span>
                                    <span ng-if="pay_type_slip=='6'">ກະເປົາເງິນ Wallet</span>

                                    <br />
                                    ________________________________________________________

                                    <table style="width: 100%;font-size: 30px;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="x in listone">

                                                <td style="text-align: left;width:50%;"> {{x.product_name}}</td>
                                                <td align="left" style="font-size: 25px;">{{x.product_sale_num}} x
                                                    {{x.product_price|number:2}}</td>
                                                <td align="right" style="font-size: 25px;">
                                                    {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}
                                                </td>
                                            </tr>
                                            <tr>

                                                <td colspan="2" style="text-align: left;"><?=$lang_summary?>:</td>


                                                <td align="right">{{sumsale_price | number:2}}</td>
                                            </tr>




                                            <?php
if($_SESSION['owner_vat_status']!='0'){
?>
                                            <tr>
                                                <td><?=$lang_vat?> <?=$_SESSION['owner_vat']?> %</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><?=$lang_pricebeforvat?></td>
                                                <td align="right">
                                                    {{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}
                                                </td>
                                            </tr>
                                            <?php } ?>

                                            <!-- <tr ng-if="vat3 > '0'">
<td><?=$lang_vat?> {{vat3}} %</td>
		<td  style="font-weight: bold;" align="right">
		{{sumsale_price*(vat3/100) | number:2}}</td>
		</tr>


		<tr  ng-if="vat3 > '0'">
		<td><?=$lang_pricesumvat?></td>
		<td align="right">
		{{sumsalevat | number:2}}</td>
		</tr> -->

                                            <tr>

                                                <td colspan="2" style="text-align: left;"><?=$lang_discount?>:</td>
                                                <td align="right">{{discount_last2 | number:2}}</td>
                                            </tr>

                                            <tr>

                                                <td colspan="2" style="text-align: left;"><?=$lang_sumall?>:</td>
                                                <td align="right" style="font-weight: bold;">
                                                    {{sumsalevat-discount_last2 | number:2}}</td>
                                            </tr>


                                            <tr>

                                                <td colspan="2" style="text-align: left;"><?=$lang_getmoney?>:</td>
                                                <td align="right">{{money_from_customer3 | number:2}}</td>
                                            </tr>
                                            <tr>

                                                <td colspan="2" style="text-align: left;"><?=$lang_moneychange?>:</td>
                                                <td align="right">
                                                    {{money_from_customer3 -(sumsalevat-discount_last2) | number:2}}
                                                </td>
                                            </tr>


                                            <?php
if($_SESSION['owner_vat']!='0'){
?>
                                            <tr>
                                                <td colspan="2" align="right"><?=$lang_vat?> <?=$_SESSION['owner_vat']?>
                                                    %</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}
                                                </td>
                                            </tr>


                                            <tr>
                                                <td colspan="2" align="right"><?=$lang_pricebeforvat?></td>
                                                <td align="right">
                                                    {{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}
                                                </td>
                                            </tr>
                                            <?php } ?>


                                        </tbody>
                                    </table>
                                    <!-- __________________________________________
<table width="100%">
	<tbody>
		<tr ng-repeat="c in lastbillcat">
			<td style="text-align: left;">{{c.catname}}</td>
			<td>{{c.num}}</td>
			<td>{{c.pricevalue}}</td>
		</tr>

	</tbody>
</table> -->
                                    ________________________________________________________
                                    <table width="100%">
                                        <tbody>

                                            <tr style="font-size: 40px;">

                                                <td style="text-align: left;"><?=$lang_sumall?>:</td>
                                                <td align="right" style="font-weight: bold;">
                                                    {{sumsalevat-discount_last2 | number:2}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    ________________________________________________________
                                    <table width="100%">
                                        <tr>
                                            <td style="text-align: left;"><?=$lang_sales?> </td>
                                            <td style="text-align: left;"><?php echo $_SESSION['name']; ?></td>
                                            <td> </td>
                                        </tr>

                                    </table>
                                    Order: {{sale_runno}}
                                    <br />
                                    <?=$lang_day?>: {{adddate}}
                                    <br />
                                    <span style="text-align:left;"><?=$_SESSION['footer_slip']?></span>
                                    <br />
                                    ________________________________________________________
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary">
                                    <?=$lang_print?></button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                    aria-hidden="true">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>










            <div class="modal fade" id="Openbillclosedayx">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                        <div class="modal-body">
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" id="daynow" name="daynow" ng-model="daynow" class="form-control"
                                        placeholder="<?=$lang_day?>" ng-change="Openbillcloseday()"
                                        style="text-align: center;font-size: 18px;font-weight: bold;width: 100%;">
                                </div>

                                <!-- <div class="form-group">
<button type="submit" ng-click="Openbillcloseday()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div> -->



                            </form>
                            <div id="section-to-print-billclosex">
                                <center>
                                    <b><span style="font-size: 18px;"> <?php echo $_SESSION['owner_name']; ?></span>
                                    </b>

                                    <br />
                                    <?php echo $_SESSION['owner_address']; ?>
                                    <br />
                                    <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

                                    <br />
                                    ___________________________
                                    <br />
                                    <?=$lang_billclostday?>
                                    <br />
                                    <?=$lang_day?>: {{daynow}}

                                    <br />.....................................................
                                </center>

                                <table class="" style="width: 100%;" ng-repeat="x in openbillclosedaylista">

                                    <tbody>
                                        <tr style="font-weight:bold;">
                                            <td><i>{{x.product_category_name2}}</i></td>
                                            <td>
                                                {{x.product_sale_num2}}
                                            </td>
                                            <td align="right">{{x.product_price2 | number:2}}</td>
                                        </tr>
                                        <tr ng-repeat="y in openbillclosedaylist_product"
                                            ng-if="y.product_category_id2==x.product_category_id2">
                                            <td>
                                                <li>- {{y.product_name2}} </li>
                                            </td>
                                            <td>{{y.product_sale_num2}}</td>
                                            <td align="right">{{y.product_price2 | number:2}}</td>
                                        </tr>

                                    </tbody>
                                </table>




                                <center>.....................................................</center>
                                <table class="" style="width: 100%;">

                                    <tbody>

                                        <tr ng-repeat="x in openbillclosedaylistb">
                                            <td><?=$lang_discount?></td>
                                            <td align="right">{{x.discount_last2 | number:2}}</td>

                                        </tr>
                                    </tbody>
                                </table>

                                <center>.....................................................</center>
                                <table class="" style="width: 100%;">

                                    <tbody>
                                        <tr ng-repeat="x in openbillclosedaylistc">
                                            <td>
                                                <span ng-if="x.pay_type=='1'"><?=$lang_cash?></span>
                                                <span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
                                            </td>

                                            <td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <center>.....................................................</center>
                                <table class="" style="width: 100%;">
                                    <tbody>
                                        <tr ng-repeat="x in openbillclosedaylistb">
                                            <td><?=$lang_all?></td>
                                            <td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <center>
                                    ___________________________
                                    <br />
                                    <?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
                                    <br />

                                    <?=$lang_day?><?=$lang_print?>: {{adddate}}

                                    <br />
                                    ___________________________
                                </center>


                            </div>

                        </div>
                        <div class="modal-footer">
                            <button ng-if="printer_ul =='0'" type="button" class="btn btn-primary"
                                ng-click="printbillclose()"><?=$lang_print?></button>

                            <button ng-if="printer_ul !='0'" type="button" class="btn btn-primary"
                                ng-click="printbillcloseip()"><?=$lang_print?></button>


                            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
                        </div>
                    </div>
                </div>
            </div>


















            <div class="modal fade" id="printing">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <center>
                                <h1 style="color: orange;font-weight: bold;">ກຳລັງ Print...</h1>
                            </center>
                        </div>

                    </div>
                </div>
            </div>



            <div class="modal fade" id="printingorder">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body">
                            <center>
                                <h1 style="color: blue;font-weight: bold;">ກຳລັງ Print...Order</h1>
                            </center>


                        </div>


                    </div>
                </div>
            </div>







            <!-- =================  Test cut out to prevent check admin pass ============================ -->

            <div class="modal fade" id="Checkadminpass">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">


                            <center>
                                &#3746;&#3767;&#3737;&#3746;&#3761;&#3737;&#3713;&#3762;&#3737;&#3749;&#3766;&#3738;
                                {{datafordelete.product_name}}
                                <br />&#3713;&#3760;&#3749;&#3768;&#3737;&#3762;&#3779;&#3754;&#3784;
                                &#3749;&#3760;&#3755;&#3761;&#3732;&#3740;&#3784;&#3762;&#3737; Admin
                                &#3758;&#3785;&#3762;&#3737;
                                <br />
                                <input type="password" ng-model="adminpass" class="form-control">
                                <br />
                                <button type="button" class="btn btn-success btn-lg"
                                    ng-click="Deletepush(datafordelete)">&#3746;&#3767;&#3737;&#3746;&#3761;&#3737;</button>
                                <span ng-if="addminpasswrong=='1'" style="color: red;">
                                    <br />
                                    &#3749;&#3760;&#3755;&#3761;&#3732;&#3740;&#3784;&#3762;&#3737; Admin
                                    &#3758;&#3785;&#3762;&#3737; &#3740;&#3764;&#3732;
                                    &#3713;&#3760;&#3749;&#3768;&#3737;&#3762;&#3779;&#3754;&#3784;&#3779;&#3805;&#3784;
                                </span>
                            </center>



                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= End Test cut out to prevent check admin pass ============================ -->





















        </div>



</font>

<script language='VBScript'>
Sub Print()
OLECMDID_PRINT = 6
OLECMDEXECOPT_DONTPROMPTUSER = 2
OLECMDEXECOPT_PROMPTUSER = 1
call WB.ExecWB(OLECMDID_PRINT, OLECMDEXECOPT_DONTPROMPTUSER, 1)
End Sub
document.write "<object ID='WB' WIDTH=0 HEIGHT=0 CLASSID='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>"
</script>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope, $http, $location) {
    $scope.customer_name = '';
    $scope.cus_address_all = '';
    $scope.listsale = [];
    $scope.money_from_customer = '';
    $scope.customer_id = '0';
    $scope.product_code = '';
    $scope.listone = [];


    $scope.addvat = false;
    $scope.vatnumber = 0;

    $scope.sale_type = '1';
    $scope.pay_type = '1';
    $scope.discount_last = 0;
    $scope.reserv = '0';

    $scope.discount_percent = '0';
    $scope.discount_last_percent = 0;

    $scope.product_category_id = '0';

    $scope.table_name = '';
    $scope.table_id = '';


    $scope.productaddqty = '1';

    $("#daynow").datetimepicker({
        timepicker: false,
        format: 'd-m-Y',
        lang: 'th' // แสดงภาษาไทย
        //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        //inline:true

    });

    $scope.daynow = '<?php echo date('d-m-Y',time());?>';


    $("#daynow2").datetimepicker({
        timepicker: false,
        format: 'd-m-Y',
        lang: 'th' // แสดงภาษาไทย
        //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        //inline:true

    });

    $scope.daynow2 = '<?php echo date('d-m-Y',time());?>';




    $scope.ParsefloatFunc = function(data) {
        return parseFloat(data);
    };

    $scope.MathceilFunc = function(data) {
        return Math.ceil(data);
    };






    $(window).keydown(function(event) {
        if (event.keyCode == 120) {
            console.log('F9 was pressed');

            $scope.Opengetmoneymodal();
            setTimeout(function() {
                $("#money_from_customer_id").focus();
            }, 1000);


        }




        if (event.keyCode == 27) {
            console.log('esc was pressed');
            $scope.clickokafterpay();
            $("#product_code_id").focus();
            location.reload();
        }


        if (event.keyCode == 13) {
            console.log('Enter was pressed');

            if ($scope.listsale == '' || $scope.listsale[0].product_id == '0') {
                toastr.warning('<?=$lang_addproductlistplz?>');
            } else if ($scope.money_from_customer == '') {
                //toastr.warning('<?=$lang_getmoneyplz?>');
            } else if ($scope.pay_type != '4' && $scope.money_from_customer < $scope.Sumsalepricevat() -
                $scope.discount_last) {
                toastr.warning('<?=$lang_getmoneymoreplz?>');
            } else if ($scope.pay_type == '4' && $scope.money_from_customer > $scope.Sumsalepricevat() -
                $scope.discount_last) {
                toastr.warning('กรุณารับเงินให้น้อยกว่าหรือเท่ากับราคาขาย');
            } else if (isNaN($scope.money_from_customer) == true) {
                toastr.warning('<?=$lang_getmoneynumberplz?>');
            } else if ($scope.money_from_customer - $scope.Sumsalepricevat() >=
                100000000000000000000000000) {
                toastr.warning('<?=$lang_moneychangenotmore1000?>');
            } else {
                $scope.Savesale();
                setTimeout(function() {
                    if ($scope.printer_ul == '0') {
                        //$scope.printDivmini();
                    } else {
                        //$scope.printDivminiip();
                    }
                }, 1000);
            }

        }



    });






    $scope.Getuser_ordering = function() {
        $http.get('<?php echo $base_url;?>/sale/salepic/Getuser_ordering')
            .then(function(response) {
                $scope.getuser_ordering_list = response.data;
                $scope.user_ordering_id = '0';
            });

    }
    $scope.Getuser_ordering();



    $scope.Getuser_ordering_table = function() {

        $http.post("Salepic/Getuser_ordering_table", {
            table_id: $scope.table_id
        }).success(function(data) {
            if (data != '') {
                $scope.user_ordering_id = data[0].user_id;
            } else {
                $scope.user_ordering_id = '0';
            }
        });

    };









    $scope.Saveuser_ordering = function() {

        $http.post("Salepic/Saveuser_ordering", {
            user_id: $scope.user_ordering_id,
            table_id: $scope.table_id
        }).success(function(data) {
            toastr.success('<?=$lang_success?>');
        });

    };





    <?php
if($_SESSION['owner_vat_status']=='0' || $_SESSION['owner_vat_status']=='1'){
?>

    $scope.vatnumber = 0;

    <?php
}else if($_SESSION['owner_vat_status']=='2'){
?>

    $scope.vatnumber = <?=$_SESSION['owner_vat']?>;

    <?php
}
?>










    $scope.Getdiscountfrombuy = function() {

        $http.get('<?php echo $base_url;?>/salesetting/setting_etc/getdiscountfrombuy')
            .then(function(response) {
                $scope.discountfrombuylist = response.data[0];
                console.log($scope.discountfrombuylist.money_if);
                console.log($scope.discountfrombuylist.money_will_discount);
            });
    };
    $scope.Getdiscountfrombuy();


    $scope.Getservicechargevat = function() {

        $http.get('<?php echo $base_url;?>/salesetting/setting_etc/getservicecharge')
            .then(function(response) {
                $scope.servicechargelist = response.data[0];
            });


        $http.get('<?php echo $base_url;?>/salesetting/setting_etc/getvat')
            .then(function(response) {
                $scope.vatlist = response.data[0];
            });


    };
    $scope.Getservicechargevat();









    $scope.Addproductrank = function() {
        $('#Addproductrankmodal').modal('show');
        $scope.getproductlist();
        $scope.searchproductrank = '';
    };

    $scope.Searchproductranklist = function(s) {

        if (s == '') {

            $scope.productranklist = [];

        } else {
            $http.post("Salepic/Searchproductlist", {
                searchproduct: s
            }).success(function(data) {
                $scope.productranklist = data;

            });

        }

    };

    $scope.Addproductranksave = function(x) {

        console.log($scope.productlist);
        if ($scope.productlist.length != '0') {
            rank = $scope.productlist.length - 1;
            product_rank = $scope.productlist[rank].product_rank + 1;
        } else {
            product_rank = '1';
        }

        $http.post("Salepic/Addproductranksave", {
            product_rank: product_rank,
            product_id: x.product_id
        }).success(function(data) {
            toastr.success('<?=$lang_success?>');
            $scope.getproductlist();
            $scope.Searchproductranklist($scope.searchproductrank);
        });

    };




    $scope.Delproductrank = function() {
        $('#Delproductrankmodal').modal('show');
        $scope.getproductlist();
    };


    $scope.Delproductranksave = function(x) {

        $http.post("Salepic/Delproductranksave", {
            product_id: x.product_id
        }).success(function(data) {
            toastr.success('<?=$lang_success?>');
            $scope.getproductlist();
        });

    };


    $scope.Getdatatable = function() {
        $http.get('<?php echo $base_url;?>/food/Food_order/get_table')
            .then(function(response) {
                $scope.tablelist = response.data.list;

            });

    };








    $scope.Product_price_discount_func = function() {
        var total = 0;

        angular.forEach($scope.listsale, function(item) {
            total += parseFloat(item.product_price_discount * item.product_sale_num);
        });

        return total;
    };

    $scope.Discountcategory_ok = function(category_id, percent) {

        $http.post("Salepic/Discountcategory_ok", {
            table_id: $scope.table_id,
            product_category_id: category_id,
            percent: percent
        }).success(function(data) {
            toastr.success('<?=$lang_success?>');
            $('#discountcategory').modal('show');
            $('#discountcategory').modal('hide');


            $http.post("Salepic/Getproductlisttable", {
                table_id: $scope.table_id
            }).success(function(data2) {

                $scope.listsale = data2;
                $scope.Checkcountorder();
                $scope.discount_last = $scope.discount_last + $scope
                    .Product_price_discount_func();

            });








            $http.post("Salepic/Discountcategory_ok", {
                table_id: $scope.table_id,
                product_category_id: category_id,
                percent: '0'
            }).success(function(data) {


                $http.post("Salepic/Getproductlisttable", {
                    table_id: $scope.table_id
                }).success(function(data2) {

                    $scope.listsale = data2;
                    $scope.Checkcountorder();
                    //alert(data);
                });


            });







        });





    };




    $scope.Opentablecus2mer = function() {
        $('#Opentablecus2mer').modal({
            backdrop: "static",
            keyboard: false
        });
        $scope.Getdatatable();

    };








    $scope.Selecttable = function(x) {


        $scope.listsale = [];
        $scope.loading = true;
        $('#Opentable').modal('hide');
        $('#Opentablecus2mer').modal('hide');

        $scope.table_name = x.food_table_name;
        $scope.table_id = x.food_table_id;
        $scope.opentablemodal = '0';

        $scope.Getuser_ordering_table();
        $scope.Sale_table_discount_last('1');

        $http.post("Salepic/Getproductlisttable", {
            table_id: x.table_id
        }).success(function(data) {

            $scope.listsale = data;
            $scope.Checkcountorder();
            $scope.loading = false;
            //alert(data);


        });

    };



    $scope.Selecttablerload = function() {

        $http.post("Salepic/Getproductlisttable", {
            table_id: $scope.table_id
        }).success(function(data) {

            $scope.listsale = data;
            $scope.Checkcountorder();
            //alert(data);
        });

    };


    $scope.Getdatenowtotime = function(x) {

        var sec_num = parseInt(x, 10); // don't forget the second param
        var hours = Math.floor(sec_num / 3600);
        var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
        var seconds = sec_num - (hours * 3600) - (minutes * 60);

        if (hours < 10) {
            hours = "0" + hours;
        }
        if (minutes < 10) {
            minutes = "0" + minutes;
        }
        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        return hours + ' ຊມ. ' + minutes + ' ນາທີ ' + seconds + ' ວິນາທີ';
    }



    $scope.Getdatenow = function() {
        $scope.datenow = Math.round(+new Date() / 1000);
    };

    $scope.opentablemodal = '1';
    $scope.Getdatatable();
    $scope.Getdatenow();

    $scope.Closeopentablemodal = function() {
        $scope.opentablemodal = '0';
        $('#Opentable').modal('hide');
    }





    $scope.Opentable = function() {
        $('#Opentable').modal({
            backdrop: "static",
            keyboard: false
        });
        $scope.Getdatatable();

        $scope.Getdatenow();
        $scope.Reloadtablelist();

        $scope.opentablemodal = '1';
    };





    $scope.Showproduct_pointmodal = function() {
        $('#Showproduct_pointmodal').modal('show');
        $http.get('<?php echo $base_url;?>/salesetting/Product_point/get')
            .then(function(response) {
                $scope.product_point_list = response.data.list;

            });

    }





    $scope.Reloadtablelist = function() {
        $http.get('<?php echo $base_url;?>/food/Food_order/get_table_reload')
            .then(function(response) {
                $scope.tablelist = $scope.tablelist;

            });
    }









    <?php if(isset($_SESSION['shift_id'])){?>
    setInterval(function() {
        if ($scope.opentablemodal != '1') {
            $scope.Selecttablerload();
        }

        <?php if($_SESSION['user_type']<'10'){?>
        if ($scope.opentablemodal == '1') {
            $scope.Getdatatable();

        }
        <?php } ?>


    }, 10000000);



    setInterval(function() {

        <?php if($_SESSION['user_type']<'10'){?>
        if ($scope.opentablemodal == '1') {
            $scope.Getdatenow();
            $scope.Reloadtablelist();
        }
        <?php } ?>



    }, 1000);
    <?php } ?>



    $scope.Opentablemove = function() {
        $('#Opentablemove').modal('show');
        $http.get('<?php echo $base_url;?>/food/Food_order/get_table')
            .then(function(response) {
                $scope.tablelist = response.data.list;

            });
    };

    $scope.Selecttablemove = function(x) {
        $scope.loading = true;
        $scope.listsale = [];
        $http.post("Salepic/Moveproductlisttable", {
            old_table_id: $scope.table_id,
            new_table_id: x.food_table_id
        }).success(function(data) {

            $scope.listsale = data;
            $scope.Checkcountorder();
            $scope.loading = false;

        });


        $('#Opentablemove').modal('hide');
        $scope.table_name = x.food_table_name;
        $scope.table_id = x.food_table_id;
        $scope.Getuser_ordering_table();
        $scope.Sale_table_discount_last('1');
    };



    $scope.Sale_table_discount_last = function(selecttable) {
        if (selecttable == '1') {
            $scope.selecttable = 1;
        } else {
            $scope.selecttable = 0;
        }

        //alert($scope.discount_last_percent);
        if ($scope.discount_last_percent != 0) {
            $scope.discount_last = ($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber /
                100)) * ($scope.discount_last_percent / 100);
            //alert($scope.discount_last);
        }

        $http.post("Salepic/Sale_table_discount_last", {
            table_id: $scope.table_id,
            discount_last: $scope.discount_last,
            discount_percent: $scope.discount_percent,
            customer_id: $scope.customer_id,
            customer_name: $scope.customer_name,
            customer_product_score_all: $scope.customer_product_score_all,
            customer_wallet: $scope.customer_wallet,
            cus_address_all: $scope.cus_address_all,
            selecttable: $scope.selecttable
        }).success(function(data) {

            if (data != '') {
                $scope.discount_percent = data[0].discount_percent;
                $scope.customer_id = data[0].customer_id;
                $scope.customer_name = data[0].customer_name;
                $scope.customer_product_score_all = data[0].customer_product_score_all;
                $scope.customer_wallet = data[0].customer_wallet;
                $scope.cus_address_all = data[0].cus_address_all;


                $scope.discount_last = parseFloat(data[0].discount_last);
                $scope.discount_percent = '0';


            } else {

                $scope.customer_id = '0';
                $scope.customer_name = '';
                $scope.cus_address_all = '';
                $scope.customer_wallet = '0';
                $scope.customer_product_score_all = false;

            }


        });



    }




    $scope.Settablestatusone = function() {
        $http.post("Salepic/Settablestatusone", {
            food_table_id: $scope.table_id
        }).success(function(data) {});

    }


    // === old one can not print 1 page ============
    // $scope.Checkbill = function(){
    // $('#Opencheckbill').modal('show');
    // $scope.Settablestatusone();
    // $scope.Sale_table_discount_last();
    // setTimeout(function(){
    // $scope.printDiv2();
    //  }, 1000);


    //  setTimeout(function(){
    //  $('#Opencheckbill').modal('hide');
    // }, 1000);


    // };

    // add new ==============
    $scope.Checkbill = function() {
        $('#Opencheckbill').modal('show');
        $scope.Settablestatusone();
        $scope.Sale_table_discount_last();
        setTimeout(function() {
            //$scope.printDiv2();
            Openprint_checkbill();
        }, 1000);


        setTimeout(function() {
            $('#Opencheckbill').modal('hide');
        }, 1000);


    };

    // add new ==============



    $scope.Checkbillip = function() {
        $('#Opencheckbillip').modal('show');

        $scope.Settablestatusone();
        $scope.Sale_table_discount_last();

        setTimeout(function() {
            $scope.printDiv2ip('bill');
        }, 1000);

    };



    $scope.printbillcloseip = function() {
        $('#Openbillclosedayip').modal('show');
        setTimeout(function() {
            $scope.printDiv2ip('billclose');
        }, 1000);

    };



    $scope.Openbillcloseday = function() {
        $('#Openbillcloseday').modal('show');



        $http.post("Salepic/Openbillclosedaylist_product", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylist_product = data;

        });



        $http.post("Salepic/Openbillclosedaylista", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylista = data;

        });

        $http.post("Salepic/Openbillclosedaylistb", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylistb = data;

        });


        $http.post("Salepic/Openbillclosedaylistc", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylistc = data;

        });



        $http.post("Salepic/Shiftclose_addwallet", {
            daynow: $scope.daynow2,
        }).success(function(data) {

            $scope.shiftclose_addwallet = data;

        });




    };




    $scope.Openbillclosedayip = function() {
        $('#Openbillclosedayip').modal('show');


        $http.post("Salepic/Openbillclosedaylist_product", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylist_product = data;

        });



        $http.post("Salepic/Openbillclosedaylista", {
            daynow: $scope.daynow2,
        }).success(function(data) {

            $scope.openbillclosedaylista = data;

        });

        $http.post("Salepic/Openbillclosedaylistb", {
            daynow: $scope.daynow2,
        }).success(function(data) {

            $scope.openbillclosedaylistb = data;

        });


        $http.post("Salepic/Openbillclosedaylistc", {
            daynow: $scope.daynow2,
        }).success(function(data) {

            $scope.openbillclosedaylistc = data;

        });



        $http.post("Salepic/Shiftclose_addwallet", {
            daynow: $scope.daynow2,
        }).success(function(data) {

            $scope.shiftclose_addwallet = data;

        });






        setTimeout(function() {
            $scope.printDiv2ip('billclose');
        }, 1000);



    };










    $scope.getcategory = function() {

        $http.get('<?php echo $base_url;?>/warehouse/Productcategory/get')
            .then(function(response) {
                $scope.categorylist = response.data.list;

            });
    };
    $scope.getcategory();




    $scope.Searchcustomer = function() {
        $http.post("Salepage/Customer", {
            cus_name: $scope.customer_name
        }).success(function(data) {
            $scope.customerlist = data;

        });
    };



    $scope.orderprint_slit = '0';
    $scope.Showordeprint_slit = function() {
        if ($scope.orderprint_slit == '0') {
            $scope.orderprint_slit = '1';
        } else {
            $scope.orderprint_slit = '0';
        }

    }



    $scope.clickokafterpay = function() {
        $('#Openchangemoney').modal('hide');
        $('#Openonemini').modal('hide');
    };


    $scope.printDiv = function() {
        window.scrollTo(0, 0);
        window.print();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: 1,
            url: '127.0.0.1:8088/open',
            error: function() {
                //alert('Could not open cash drawer');
            },
            success: function() {
                //do something else
            }
        });
    };





    $scope.getcashierprinterip = function() {

        $http.get('<?php echo $base_url;?>/printer/Printercategory/getcashier')
            .then(function(response) {
                $scope.cashier_printer_ip = response.data[0].cashier_printer_ip;
                $scope.printer_ul = response.data[0].printer_ul;
                $scope.printer_name = response.data[0].printer_name;
                $scope.printer_order_type = response.data[0].printer_order_type;

            });
    };
    $scope.getcashierprinterip();





    $scope.printDiv2ip = function(x) {
        window.scrollTo(0, 0);
        //window.print();
        //$('#Openbillcloseday').modal('show');

        toastr.info('กำลังปริ้น...');

        if (x == 'bill') {

            var element = $("#section-to-print-bill"); // global variable
        } else if (x == 'slip') {

            var element = $("#section-to-print-slip");
            //$scope.Opencashdrawer();
        } else if (x == 'billclose') {

            var element = $("#section-to-print-billclose");

        } else if (x == 'order') {

            var element = $("#section-to-print-order");

        } else if (x == 'addwallet') {

            var element = $("#section-to-print-addwallet");

        }


        console.log(element);

        var getCanvas; // global variable
        html2canvas(element, {
            width: 1000,
            height: 10000,
            onrendered: function(canvas) {
                // $("#previewImage").append(canvas);
                getCanvas = canvas;



                var imgageData = getCanvas.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/(png|jpg);base64,/, "");



                $.ajax({
                    url: '<?php echo $base_url;?>/printer/example/interface/lan.php',
                    data: {
                        imgdata: newData,
                        cashier_printer_ip: $scope.cashier_printer_ip,
                        printer_ul: $scope.printer_ul,
                        printer_name: $scope.printer_name,
                        x: x
                    },
                    type: 'post',
                    success: function(response) {
                        console.log(response);
                        $('#printing').modal('hide');
                        $('#Opencheckbillip').modal('hide');
                        //$('#Openbillclosedayip').modal('hide');
                        $('#Openoneminiip').modal('hide');
                        $('#printorderipmodal').modal('hide');
                        $('#Addwalletmodalprint').modal('hide');

                    }
                });
                $('#Opencheckbillip').modal('hide');
                //$('#Openbillclosedayip').modal('hide');
                $('#Openoneminiip').modal('hide');
                $('#Addwalletmodalprint').modal('hide');

            }
        });





    };









    $scope.Printorderip = function() {

        $scope.clickprintorder = true;

        $http.post("Salepic/Getproductlistorder", {
            table_id: $scope.table_id
        }).success(function(data) {

            toastr.info('ກຳລັງສົ່ງອໍເດີ້...');

            url_order = '<?php echo $base_url;?>/printer/example/interface/order.php';

            $http.post(url_order, {
                data: data,
                base_url: '<?php echo $base_url;?>'
            }).success(function(data2) {
                $scope.Deleteallorder()
                $scope.listorder = data;
                $scope.clickprintorder = false;
            });




        });





        $('#printingorder').modal('hide');



    };






    $scope.printDiv2 = function() {
        window.scrollTo(0, 0);
        window.print();

    };

    $scope.printDivfull = function() {
        $('#Openone').modal('show');
        $scope.Getone($scope.list[0]);
        setTimeout(function() {
            $scope.printDiv();
        }, 1000);
    };



    $scope.printDivmini = function() {
        $('#Openonemini').modal('show');
        $scope.Getonemini($scope.list[0]);
        setTimeout(function() {
            $scope.printDiv();
        }, 1000);


    };



    $scope.printDivminiip = function() {
        $('#Openoneminiip').modal('show');
        $scope.Getonemini($scope.list[0]);
        setTimeout(function() {
            $scope.printDiv2ip('slip');
        }, 1000);

    };






    $scope.printDivmini2 = function(x) {
        $('#Openonemini').modal('show');
        $('#Openonemini').css('visibility', '');
        $scope.Getonemini(x);
        setTimeout(function() {
            $scope.printDiv();
        }, 1000);


    };



    $scope.printDivminiip2 = function(x) {
        $('#Openoneminiip').modal('show');
        $scope.Getonemini(x);
        setTimeout(function() {
            $scope.printDiv2ip('slip');
        }, 1000);

    };




    $scope.Openfull = function() {
        $('#Openfull').modal({
            backdrop: "static",
            keyboard: false
        });
    };

    $scope.Opencustomer = function() {
        $scope.customer_id = '0';
        $scope.customer_name = '';
        $scope.cus_address_all = '';
        $scope.customer_wallet = '0';
        $scope.customer_product_score_all = '0';
        $('#Opencustomer').modal('show');
        $scope.Searchcustomer();
    };


    $scope.Addwalletmodal = function(x) {

        $scope.addwallet_cus_id = x.cus_id;
        $scope.addwallet_cus_name = x.cus_name;
        $scope.addwallet_cus_add_time = x.cus_add_time;
        $scope.addwallet_wallet = x.wallet;


        $('#Addwalletmodal').modal('show');

    };




    $scope.Addwalletconfirm = function() {
        console.log(parseFloat($scope.addwallet_wallet) + parseFloat($scope.addwallet_money));
        if (parseFloat($scope.addwallet_wallet) + parseFloat($scope.addwallet_money) < 0) {
            toastr.warning('กรอกตัวเลขไม่ถูกต้อง...');
        } else {
            $http.post("Salepic/Addwalletconfirm", {
                cus_id: $scope.addwallet_cus_id,
                wallet: $scope.addwallet_money
            }).success(function(data) {
                toastr.success('เติมเงินสำเร็จ...');
                $('#Addwalletmodal').modal('hide');
                $('#Addwalletmodalprint').modal('show');
                $scope.Searchcustomer();

                setTimeout(function() {
                    $scope.printDiv2ip('addwallet');
                }, 1000);

                //	$scope.addwallet_money = null;

            });

        }



    };





    $scope.Selectcustomer = function(x) {
        $scope.customer_id = x.cus_id;
        $scope.customer_name = x.cus_name;
        $scope.customer_product_score_all = x.product_score_all;
        $scope.customer_wallet = x.wallet;
        $scope.cus_address_all = x.cus_address + ' ' + ' <?=$lang_tel?>: ' + x.cus_tel;
        $('#Opencustomer').modal('hide');
        $('#customer_name').prop('disabled', true);
        $('#cus_address_all').prop('disabled', true);

        $scope.Sale_table_discount_last();
        console.log($scope.customer_product_score_all);
    };

    $scope.Refresh = function() {
        $scope.customer_id = '0';
        $scope.customer_name = '';
        $scope.cus_address_all = '';
        $scope.customer_wallet = '0';
        $scope.customer_product_score_all = false;
        $scope.discount_last = 0;
        $scope.discount_last_percent = 0;
        $scope.discount_percent = 0;

        $scope.Sale_table_discount_last();
        $scope.Getquotation();

    };

    $scope.getproductlist = function() {

        $http.get('Salepage/Getproductlist')
            .then(function(response) {
                $scope.productlist = response.data;

            });
    };
    $scope.getproductlist();


    $scope.Selectcat = function(id) {
        if (id == '0') {
            $scope.getproductlist();
        } else {

            $http.post("Salepic/Getproductlistcat", {
                product_category_id: id
            }).success(function(data) {
                $scope.productlist = data;

            });

        }

    };


    $scope.searchproductlist = function(searchproduct) {

        $http.post("Salepic/Searchproductlist", {
            searchproduct: searchproduct
        }).success(function(data) {
            $scope.productlist = data;

        });
    };





    $scope.Addpushproduct = function() {
        $scope.listsale.push({
            product_id: '0',
            product_name: '<?=$lang_selectproduct?>',
            product_price: '0',
            product_score: '0',
            product_sale_num: '1',
            product_price_discount: '0'
        });
    };


    $scope.Openselectproductnum = function(x, index) {
        $scope.productaddqty = '1';
        $scope.productcode = x.product_code;
        $scope.product_name_num = x.product_name;
        $scope.product_price = x.product_price;
        $('#Openselectproductnum').modal('show');
        $scope.note_order = '';

        $scope.product_price_add = 0;
        $scope.productdataindex = index;
        $http.post("<?php echo $base_url;?>/warehouse/Productlist/getpotlist", {
            product_id: x.product_id
        }).success(function(data) {

            $scope.getproductpotlist = data;


        });


        $http.post("<?php echo $base_url;?>/warehouse/Productlist/getpotlistshowall", {}).success(function(
            data) {

            $scope.getproductpotlistshowall = data;
        });




    };






    $scope.Addpottoproduct = function(x) {

        $scope.product_price_add = parseFloat($scope.product_price_add) + parseFloat(x.product_ot_price);

        if (x.product_ot_price == 0) {
            x.product_ot_price = '';
        }

        //$scope.product_name_num = $scope.product_name_num + ' [' +x.product_ot_name+' '+x.product_ot_price+']';
        $scope.product_name_num = $scope.product_name_num + ' [' + x.product_ot_name + ']';

    };












    $scope.Addpushproductcode = function(product_code, x, servicecharge, vat) {


        $('#addpushproductcodeid').prop('disabled', true);


        $http.post("Salepage/Findproduct", {
            cus_id: $scope.customer_id,
            product_code: product_code
        }).success(function(data) {

            $scope.Findproductone = data;
            if (data == '') {


                alert(data);


                $scope.cannotfindproduct = true;
                $('#addpushproductcodeid').prop('disabled', false);
            } else {

                if ($scope.sale_type == '1') {
                    product_price = data[0].product_price;
                } else if ($scope.sale_type == '2') {
                    product_price = data[0].product_wholesale_price;
                }



                if (x) {
                    $('#Showproduct_pointmodal').modal('hide');
                    product_price = '0';
                    $scope.customer_product_score_all = $scope.customer_product_score_all - x
                        .point_use;



                    $http.post("Salepic/Useproductpoint", {
                        cus_id: $scope.customer_id,
                        gift_id: x.gift_id,
                        product_id: x.product_id,
                        product_code: x.product_code,
                        product_name: x.product_name,
                        point_use: x.point_use
                    }).success(function(data) {


                    });






                }


                if (servicecharge == 'servicecharge') {

                    $scope.product_name_num = $scope.servicechargelist.product_name + ' ' + $scope
                        .servicechargelist.servicecharge_percent + '%';
                    $scope.product_price_add = Math.round($scope.Sumsaleprice() * ($scope
                        .servicechargelist.servicecharge_percent / 100));

                }


                if (vat == 'vat') {

                    $scope.product_name_num = $scope.vatlist.product_name + ' ' + $scope.vatlist
                        .vat_percent + '%';
                    $scope.product_price_add = Math.round($scope.Sumsaleprice() * ($scope.vatlist
                        .vat_percent / 100));

                }




                if ($scope.product_name_num) {
                    $scope.product_name_num = $scope.product_name_num;
                    $scope.product_price_add = $scope.product_price_add;
                } else if (data[0].product_name) {
                    $scope.product_name_num = data[0].product_name;
                    $scope.product_price_add = '0';
                } else {
                    $scope.product_name_num = x.product_name;
                    $scope.product_price_add = '0';
                }

                $scope.listsale.push({
                    product_id: data[0].product_id,
                    product_code: data[0].product_code,
                    product_name: $scope.product_name_num,
                    product_score: data[0].product_score,
                    product_price: parseFloat(product_price) + parseFloat($scope
                        .product_price_add),
                    product_sale_num: $scope.productaddqty,
                    product_price_discount: data[0].product_price_discount
                });


                $http.post("Salepic/Addproductlisttable", {
                    table_id: $scope.table_id,
                    product_category_id: data[0].product_category_id,
                    product_id: data[0].product_id,
                    product_code: data[0].product_code,
                    product_name: $scope.product_name_num,
                    product_score: data[0].product_score,
                    product_price: parseFloat(product_price) + parseFloat($scope
                        .product_price_add),
                    product_sale_num: $scope.productaddqty,
                    product_price_discount: data[0].product_price_discount,
                    note_order: $scope.note_order
                }).success(function(data) {
                    $scope.listsale = [];
                    $scope.listsale = data;
                    $scope.Checkcountorder();
                    //alert(data);
                    $('#Openselectproductnum').modal('hide');
                    $('#addpushproductcodeid').prop('disabled', false);

                });










                $scope.cannotfindproduct = false;

            }
            $scope.product_code = '';
            $scope.product_name_num = false;
            $('#Openfulltable').scrollTop($('#Openfulltable')[0].scrollHeight, 1000000);
        });





    };





    $scope.checkadminpassedit = '';
    $scope.Editpush = function(x) {

        $scope.dataforedit = x;

        $('#Editpushmodal').modal({
            show: true
        });

        $scope.s_ID_edit = x.s_ID;
        $scope.product_name_edit = x.product_name;
        $scope.product_id_edit = x.product_id;
        $scope.product_price_edit = x.product_price;
        $scope.product_sale_num_edit = x.product_sale_num;
        $scope.product_code_edit = x.product_code;
        $scope.product_price_discount_edit = x.product_price_discount;
        $scope.product_score_edit = x.product_score;



        if ($scope.adminpass == '') {

            $scope.checkadminpassedit = '1';

        } else {

            //$scope.listsale.splice(index, 1);

            $http.post("Salepic/Checkadminpass", {
                adminpass: $scope.adminpass
            }).success(function(data) {

                console.log(data);

                if (data > '0') {

                    $scope.adminpass = '';
                    $scope.addminpasswrongedit = '';
                    $scope.checkadminpassedit = '';

                } else {

                    $scope.addminpasswrongedit = '1';
                    $scope.adminpass = '';

                }



            });



        }







    };













    $scope.Editpushadmin = function(x) {
        $('#Editpushmodal').modal({
            show: true
        });
        $scope.s_ID_edit = x.s_ID;
        $scope.product_name_edit = x.product_name;
        $scope.product_id_edit = x.product_id;
        $scope.product_price_edit = x.product_price;
        $scope.product_sale_num_edit = x.product_sale_num;
        $scope.product_code_edit = x.product_code;
        $scope.product_price_discount_edit = x.product_price_discount;
        $scope.product_score_edit = x.product_score;
        $scope.product_note_order_edit = x.note_order;


    };











    $scope.Editpushsave = function() {
        $('#Editpushmodal').modal('hide');


        $http.post("Salepic/Editpushsavetable", {
            s_ID: $scope.s_ID_edit,
            table_id: $scope.table_id,
            product_id: $scope.product_id_edit,
            product_name: $scope.product_name_edit,
            product_price: $scope.product_price_edit,
            product_sale_num: $scope.product_sale_num_edit,
            product_code: $scope.product_code_edit,
            product_price_discount: $scope.product_price_discount_edit,
            product_score: $scope.product_score_edit,
            note_order: $scope.product_note_order_edit
        }).success(function(data) {

            $scope.listsale = data;

        });
    };



    $scope.adminpass = '';

    $scope.Deletepush = function(x) {
        $('#delproductbut' + x.s_ID).prop('disabled', true);
        $scope.datafordelete = x;

        if ($scope.adminpass == '') {

            $('#Checkadminpass').modal('show');

        } else {

            //$scope.listsale.splice(index, 1);

            $http.post("Salepic/Checkadminpass", {
                adminpass: $scope.adminpass
            }).success(function(data) {

                console.log(data);

                if (data > '0') {

                    $http.post("Salepic/Delproductlisttable", {
                        table_id: $scope.table_id,
                        table_name: $scope.table_name,
                        s_ID: x.s_ID,
                        product_id: x.product_id,
                        product_name: x.product_name,
                        product_sale_num: x.product_sale_num2
                    }).success(function(data) {

                        $scope.listsale = data;
                        $scope.Checkcountorder();
                        //alert(data);
                        $('#Checkadminpass').modal('hide');
                        $scope.adminpass = '';
                        $scope.addminpasswrong = '';
                    });

                } else {

                    $scope.addminpasswrong = '1';
                    $scope.adminpass = '';

                }



            });



        }




    };








    $scope.Deletepushadmin = function(x) {
        $('#delproductbut' + x.s_ID).prop('disabled', true);
        $http.post("Salepic/Delproductlisttable", {
            table_id: $scope.table_id,
            table_name: $scope.table_name,
            s_ID: x.s_ID,
            product_id: x.product_id,
            product_name: x.product_name,
            product_sale_num: x.product_sale_num2
        }).success(function(data) {
            $scope.listsale = [];
            $scope.listsale = data;
            $scope.Checkcountorder();

        });


    };







    $scope.Checkcountorder = function() {
        $http.post("Salepic/Checkproductlisttable", {
            table_id: $scope.table_id
        }).success(function(data) {

            $scope.checkorder = data[0].check_order;

            //alert(data);

        });

    };













    $scope.Deleteallorder = function(key) {
        if (key == 'savesale') {
            savesale = '1';
        } else {
            savesale = '0';
        }

        $http.post("Salepic/Printproductlisttable", {
            table_id: $scope.table_id,
            savesale: savesale
        }).success(function(data) {

            $scope.listsale = data;
            $scope.Checkcountorder();
            //alert(data);

        });

    };



    $scope.Printorder = function() {

        $scope.clickprintorder = true;

        $http.post("Salepic/Getproductlistorder", {
            table_id: $scope.table_id
        }).success(function(data) {

            $scope.Deleteallorder();
            $scope.listorder = data;
            $('#printorder').modal({
                backdrop: "static",
                keyboard: false
            });
            $scope.clickprintorder = false;
            /*setTimeout(function(){
            $scope.printDiv2();
             }, 1000);*/

        });




        $http.post("Salepic/Getproductlistorder_cat", {
            table_id: $scope.table_id
        }).success(function(data) {
            $scope.listorder_cat = data;

        });

        $scope.product_category_id_order = '';
        $scope.product_category_name_order = '';

    };











    $scope.Printorderipmodal = function() {

        $scope.clickprintorder = true;


        $http.post("Salepic/Getproductlistorder", {
            table_id: $scope.table_id
        }).success(function(data) {

            $scope.Deleteallorder();
            $scope.listorder = data;
            $('#printorderipmodal').modal('show');

            setTimeout(function() {
                $scope.printDiv2ip('order');
            }, 1000);

            $scope.clickprintorder = false;

        });





        $http.post("Salepic/Getproductlistorder_cat", {
            table_id: $scope.table_id
        }).success(function(data) {
            $scope.listorder_cat = data;

        });

        $scope.product_category_id_order = '';
        $scope.product_category_name_order = '';

    };



    $scope.Showordercat_print = function(x) {
        $scope.product_category_id_order = x.product_category_id;
        $scope.product_category_name_order = x.product_category_name;
    };






    $scope.Modalproduct = function(index) {
        $('#Modalproduct').modal({
            show: true
        });
        $scope.indexrow = index;
    };

    $scope.Selectproduct = function(y, index) {
        $scope.listsale[index].product_id = y.product_id;
        $scope.listsale[index].product_code = y.product_code;
        $scope.listsale[index].product_name = y.product_name;
        $scope.listsale[index].product_price = y.product_price;
        $scope.listsale[index].product_price_discount = y.product_price_discount;
        $('#Modalproduct').modal('hide');

    };



    $scope.Sumsalenum = function() {
        var total = 0;

        angular.forEach($scope.listsale, function(item) {
            total += parseFloat(item.product_sale_num);
        });
        return total;
    };


    $scope.Sumsalediscount = function() {
        var total = 0;

        angular.forEach($scope.listsale, function(item) {
            total += parseFloat(item.product_price_discount);
        });
        return total;
    };


    $scope.Sumproduct_score = function() {
        var total = 0;

        angular.forEach($scope.listsale, function(item) {
            total += parseFloat(item.product_score * item.product_sale_num);
        });
        return total;
    };


    $scope.Sumsaleprice = function() {
        var total = 0;

        angular.forEach($scope.listsale, function(item) {
            total += parseFloat((item.product_price - item.product_price_discount) * item
                .product_sale_num);

        });

        return total;

    };









    $scope.Sumsalepricevat = function() {
        var total = 0;
        angular.forEach($scope.listsale, function(item) {
            total += parseFloat((item.product_price - item.product_price_discount) * item
                .product_sale_num);
        });
        total2 = total + (total * ($scope.vatnumber / 100));

        return total2;
    };


    $scope.Mathceil = function(x) {
        return Math.ceil(x);

    };

    $scope.Mathceildown = function(x) {
        return Math.floor(x);

    };

    $scope.Savesale = function(wallet, sumsalepricevat, discount_last) {

        if (wallet == 'wallet') {
            if ($scope.customer_wallet >= ($scope.Sumsalepricevat() - $scope.discount_last)) {
                $scope.money_from_customer = $scope.Sumsalepricevat() - $scope.discount_last;
                $scope.pay_type = '6';
            } else {
                toastr.warning('กรุณาเติมเงินในกระเป๋าก่อนชำระเงิน...');
            }


        }

        if ($scope.discount_last_percent != 0) {
            $scope.discount_last = ($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber /
                100)) * ($scope.discount_last_percent / 100);

        }

        if ($scope.listsale == '' || $scope.listsale[0].product_id == '0') {
            toastr.warning('<?=$lang_addproductlistplz?>');
        } else if ($scope.money_from_customer == '') {
            toastr.warning('<?=$lang_getmoneyplz?>');
        } else if ($scope.money_from_customer < $scope.Sumsalepricevat() - $scope.discount_last) {
            toastr.warning('<?=$lang_getmoneymoreplz?>');
        } else if (isNaN($scope.money_from_customer) == true) {
            toastr.warning('<?=$lang_getmoneynumberplz?>');
        } else if ($scope.money_from_customer - $scope.Sumsalepricevat() >= 100000000000000000) {
            toastr.warning('<?=$lang_moneychangenotmore1000?>');
        } else {

            if ($scope.discount_last_percent != 0) {
                $scope.discount_last = ($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber /
                    100)) * ($scope.discount_last_percent / 100);
            }

            $('#Opengetmoneymodal').modal('hide');
            $('#Opengetmoneyfromwalletmodal').modal('hide');

            toastr.info('ກຳລັງບັນທຶກການຂາຍ...');

            $('#savesale').prop('disabled', true);
            $('#savesale2').prop('disabled', true);
            $('#money_from_customer').prop('disabled', true);
            $('#money_from_customer2').prop('disabled', true);
            $http.post("Salepage/Savesale", {
                listsale: $scope.listsale,
                table_id: $scope.table_id,
                table_name: $scope.table_name,
                cus_name: $scope.customer_name,
                cus_id: $scope.customer_id,
                cus_address_all: $scope.cus_address_all,
                sumsale_discount: $scope.Sumsalediscount(),
                sumsale_num: $scope.Sumsalenum(),
                vat: $scope.vatnumber,
                product_score_all: $scope.Sumproduct_score(),
                sumsale_price: $scope.Sumsaleprice(),
                money_from_customer: $scope.money_from_customer,
                money_changeto_customer: $scope.money_from_customer - ($scope.Sumsalepricevat() -
                    $scope.discount_last),
                sale_type: $scope.sale_type,
                pay_type: $scope.pay_type,
                reserv: $scope.reserv,
                user_ordering_id: $scope.user_ordering_id,
                discount_last: $scope.discount_last,
                adddate: (Date.now() / 1000).toFixed(0),
                shift_id: '<?php if(isset($_SESSION['shift_id'])){ echo $_SESSION['shift_id']; }?>'
            }).success(function(data) {

                toastr.success('ບັນທຶກການຂາຍສຳເລັດ...');

                $scope.changemoney = $scope.money_from_customer - ($scope.Sumsalepricevat() - $scope
                    .discount_last);

                $('#Openchangemoney').modal({
                    backdrop: "static",
                    keyboard: false
                });
                $('#savesale').prop('disabled', false);
                $('#savesale2').prop('disabled', false);
                $('#money_from_customer').prop('disabled', false);
                $('#money_from_customer2').prop('disabled', false);

                $scope.Deletequotationlist($scope.quotation);
                $scope.Refresh();
                $scope.getlist();
                $scope.Deleteallorder('savesale');
                $scope.Checkcountorder();
                $scope.pay_type = '1';
                $scope.discount_last = 0;
                $scope.listsale = [];
                $scope.money_from_customer = '';

            });
        }

    };







    $scope.Savequotation = function(changemoney, sumsalepricevat, discount_last) {

        if ($scope.listsale == '' || $scope.listsale[0].product_id == '0') {
            toastr.warning('<?=$lang_addproductlistplz?>');
        } else {

            if ($scope.discount_last_percent != 0) {
                $scope.discount_last = ($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber /
                    100)) * ($scope.discount_last_percent / 100);
            }

            toastr.info('กำลังบันทึก...');

            $('#savequotation').prop('disabled', true);
            $('#savesale2').prop('disabled', true);
            $('#money_from_customer').prop('disabled', true);
            $('#money_from_customer2').prop('disabled', true);
            $http.post("Salepage/Savequotation", {
                listsale: $scope.listsale,
                table_id: $scope.table_id,
                table_name: $scope.table_name,
                cus_name: $scope.customer_name,
                cus_id: $scope.customer_id,
                cus_address_all: $scope.cus_address_all,
                sumsale_discount: $scope.Sumsalediscount(),
                sumsale_num: $scope.Sumsalenum(),
                vat: $scope.vatnumber,
                product_score_all: $scope.Sumproduct_score(),
                sumsale_price: $scope.Sumsaleprice(),
                money_from_customer: $scope.money_from_customer,
                money_changeto_customer: $scope.money_from_customer - ($scope.Sumsalepricevat() -
                    $scope.discount_last),
                sale_type: $scope.sale_type,
                pay_type: $scope.pay_type,
                reserv: $scope.reserv,
                discount_last: $scope.discount_last,
                adddate: (Date.now() / 1000).toFixed(0),
                shift_id: '<?php if(isset($_SESSION['shift_id'])){ echo $_SESSION['shift_id']; }?>'
            }).success(function(data) {
                //toastr.success('<?=$lang_success?>');

                $('#Opengetmoneymodal').modal('hide');

                toastr.success('บันทึกสำเร็จ');

                $scope.changemoney = $scope.money_from_customer - ($scope.Sumsalepricevat() - $scope
                    .discount_last);

                //$('#Openchangemoney').modal({backdrop: "static", keyboard: false});
                $('#savequotation').prop('disabled', false);
                $('#savesale2').prop('disabled', false);
                $('#money_from_customer').prop('disabled', false);
                $('#money_from_customer2').prop('disabled', false);

                $scope.Refresh();
                $scope.getlist();
                $scope.Deleteallorder('savesale');
                $scope.Checkcountorder();
                $scope.pay_type = '1';
                $scope.discount_last = 0;
                $scope.listsale = [];


            });
        }

    };





    $scope.Getquotation = function() {
        $http.post("Salepage/getquotation", {}).success(function(data) {
            $scope.quotationlist = data;

        });

    };
    $scope.Getquotation();


    $scope.Showquotationlist = function() {
        $scope.Getquotation();
        $('#Showquotationlistmodal').modal('show');

    };







    $scope.Getonequotation = function(x) {
        $('#Openonequotation').modal('show');
        $http.post("Salelist/Getonequotation", {
            sale_runno: x.sale_runno
        }).success(function(response) {
            $scope.listone = response;
            $scope.cus_name = x.cus_name;
            $scope.cus_address_all_2 = x.cus_address_all;
            $scope.sale_runno = x.sale_runno;
            $scope.sumsale_discount = x.sumsale_discount;
            $scope.sumsale_num = x.sumsale_num;
            $scope.sumsale_price = x.sumsale_price;
            $scope.money_from_customer3 = x.money_from_customer;
            $scope.vat3 = x.vat;
            $scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat) / 100)) +
                parseFloat(x.sumsale_price);
            $scope.money_changeto_customer = x.money_changeto_customer;
            $scope.adddate = x.adddate;
            $scope.discount_last2 = x.discount_last;
            $scope.pay_type = x.pay_type;
            $scope.number_for_cus = x.number_for_cus;
        });

        setTimeout(function() {
            $scope.printDiv();
        }, 1000);

        setTimeout(function() {
            $('#Openonequotation').modal('hide');
        }, 1000);


    };







    $scope.Getonequotation2pay = function(x) {

        $scope.quotation = x;

        $http.post("Salelist/Getonequotation", {
            sale_runno: x.sale_runno
        }).success(function(response) {
            $scope.listsale = response;

            if (x.cus_id == null) {
                $scope.customer_id = '';
            } else {
                $scope.customer_id = x.cus_id;
            }

            if (x.cus_name == null) {
                $scope.customer_name = '';
            } else {
                $scope.customer_name = x.cus_name;
            }

            $scope.cus_address_all = x.cus_address_all;

            $scope.vat3 = x.vat;
            $scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat) / 100)) +
                parseFloat(x.sumsale_price);

            $scope.discount_last = parseFloat(x.discount_last);
            $scope.pay_type = x.pay_type;

        });

        $('#Showquotationlistmodal').modal('hide');


    };









    $scope.Opengetmoneymodal = function() {
        $('#Opengetmoneymodal').modal('show');
        $scope.money_from_customer = '';

    };


    $scope.Opengetmoneyfromwalletmodal = function() {

        if ($scope.customer_wallet >= ($scope.Sumsalepricevat() - $scope.discount_last)) {
            $('#Opengetmoneyfromwalletmodal').modal('show');
        } else {
            toastr.warning('กรุณาเติมเงินในกระเป๋าก่อนชำระเงิน...');
        }


    };








    $scope.Addnumbermoney = function(x) {

        if ($scope.money_from_customer == '' && x == 0) {
            $scope.money_from_customer = '';
        } else if (x < 10) {
            $scope.money_from_customer = $scope.money_from_customer + x;
        } else if (x > 10) {

            $scope.money_from_customer = x;
        } else if (x == 'x') {
            $scope.money_from_customer = '';
        } else {

        }


    };





    $scope.perpage = '10';
    $scope.getlist = function(searchtext, page, perpage) {
        if (!searchtext) {
            searchtext = '';
        }


        if (!page) {
            var page = '1';
        }

        if (!perpage) {
            var perpage = '10';
        }

        $http.post("Salepage/gettoday", {
            searchtext: searchtext,
            page: page,
            perpage: perpage
        }).success(function(data) {
            $scope.list = data.list;
            $scope.pageall = data.pageall;
            $scope.numall = data.numall;

            $scope.pagealladd = [];
            for (i = 1; i <= $scope.pageall; i++) {
                $scope.pagealladd.push({
                    a: i
                });
            }

            $scope.selectpage = page;
            $scope.selectthispage = page;

        });

    };
    $scope.getlist('', '1');



    $scope.Getone = function(x) {
        $('#Openone').modal('show');
        $http.post("Salelist/Getone", {
            sale_runno: x.sale_runno
        }).success(function(response) {
            $scope.table_name_getone = x.table_name;
            $scope.listone = response;
            $scope.cus_name = x.cus_name;
            $scope.cus_address_all = x.cus_address_all;
            $scope.sale_runno = x.sale_runno;
            $scope.sumsale_discount = x.sumsale_discount;
            $scope.sumsale_num = x.sumsale_num;
            $scope.sumsale_price = x.sumsale_price;
            $scope.money_from_customer3 = x.money_from_customer;
            $scope.vat3 = x.vat;
            $scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat) / 100)) +
                parseFloat(x.sumsale_price);
            $scope.money_changeto_customer = x.money_changeto_customer;
            $scope.adddate = x.adddate;
            $scope.discount_last2 = x.discount_last;
        });




    };


    $scope.Getonemini = function(x) {
        $http.post("Salelist/Getone", {
            sale_runno: x.sale_runno
        }).success(function(response) {
            $scope.listone = response;
            $scope.cus_id = x.cus_id;
            $scope.cus_name = x.cus_name;
            $scope.cus_score = x.cus_score;
            $scope.cus_wallet = x.wallet;
            $scope.cus_address_all = x.cus_address_all;
            $scope.sale_runno = x.sale_runno;
            $scope.sumsale_discount = x.sumsale_discount;
            $scope.sumsale_num = x.sumsale_num;
            $scope.sumsale_price = x.sumsale_price;
            $scope.money_from_customer3 = x.money_from_customer;
            $scope.vat3 = x.vat;
            $scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat) / 100)) +
                parseFloat(x.sumsale_price);
            $scope.money_changeto_customer = x.money_changeto_customer;
            $scope.adddate = x.adddate;
            $scope.discount_last2 = x.discount_last;
            $scope.pay_type_slip = x.pay_type;
        });


        $http.post("Salelist/Getonecat", {
            sale_runno: x.sale_runno
        }).success(function(response) {
            $scope.lastbillcat = response;
            //console.log(response);
        });

    };


    $scope.Deletelist = function(x) {
        $('#delbut' + x.ID).prop('disabled', true);
        $http.post("Salelist/Deletelist", {
            ID: x.ID,
            sale_runno: x.sale_runno,
            product_score_all: x.product_score_all,
            cus_id: x.cus_id
        }).success(function(response) {
            toastr.success('<?=$lang_success?>');
            $scope.getlist();
        });

    };


    $('.lodingbefor').css('display', 'block');








    $scope.shiftnow = '0';
    $scope.confirmcloseshiftnowok = '0';
    $scope.cshiftnow = '0';

    <?php if(isset($_SESSION['shift_id'])) {?>
    $scope.shiftnow = '1';
    $scope.cshiftnow = '0';
    <?php } ?>

    $scope.Openshiftnow = function() {

        if (isNaN($scope.shift_money_start) == true) {
            toastr.warning('กรุณากรอกตัวเลข');
        } else {

            $http.post("Salepic/Openshiftnow", {
                shift_money_start: $scope.shift_money_start
            }).success(function(response) {

                window.location.href = '<?php echo $base_url;?>/sale/salepic';
            });

        }


    };


    $scope.Confirmcloseshiftnow = function() {
        $('#Opentable').modal({
            backdrop: "static",
            keyboard: false
        });
        $scope.shiftnow = '0';
        $scope.cshiftnow = '1';
        $scope.table_id = '';
        $scope.confirmcloseshiftnowok = '0';


        if (isNaN($scope.shift_money_end) == true) {
            toastr.warning('ກະລຸນາໃສ່ໂຕເລກ');
        } else {
            $http.post("Salepic/Confirmcloseshiftnow", {
                shift_money_end: $scope.shift_money_end
            }).success(function(response) {
                // console.log(shift_id, 'check shift id...');

                window.location.href = '<?php echo $base_url;?>/sale/salepic';


            });
        }




    };


    $scope.Closeshiftnow = function() {
        $('#Opentable').modal({
            backdrop: "static",
            keyboard: false
        });
        $scope.confirmcloseshiftnowok = '1';
    };

    $scope.Canclecloseshiftnow = function() {
        $scope.shiftnow = '1';
        $scope.confirmcloseshiftnowok = '0';
        $scope.cshiftnow = '0';
    };








    $scope.Discount_lastfunc = function() {
        var total3 = 0;

        angular.forEach($scope.listsale, function(item) {
            total3 += parseFloat((item.product_price - item.product_price_discount) * item
                .product_sale_num);

        });

        if ($scope.discountfrombuylist && $scope.discountfrombuylist.money_will_discount != '0') {
            $scope.discount_last = Math.ceil(parseFloat(total3 * parseFloat($scope.discountfrombuylist
                .money_will_discount)) / parseFloat($scope.discountfrombuylist.money_if));
        }

    };




    <?php if($_SESSION['user_type']=='10'){?>
    if ($scope.table_name == '') {
        $scope.Opentablecus2mer();
    }
    <?php } ?>


    <?php if($_SESSION['user_type']!='10'){?>
    if ($scope.table_name == '') {
        $scope.Opentable();
    }
    <?php } ?>





    $scope.Deletequotationlist = function(x) {
        if (x) {


            $('#delbut' + x.ID).prop('disabled', true);
            $http.post("Salelist/Deletequotationlist", {
                ID: x.ID,
                sale_runno: x.sale_runno,
                product_score_all: x.product_score_all,
                cus_id: x.cus_id
            }).success(function(response) {
                //	toastr.success('<?=$lang_success?>');
                //$scope.Showquotationlist();
            });

        }


    };






});
</script>

<!-- update new for check bill print -->
<script>
function fnExcelReport() {
    $("#headerTable").c2mpos({
        exclude: ".noExl",
        name: "Excel Document Name"
    });

}




function Openprintdiv1() {
    var divToPrint = document.getElementById('openprint1'); // เลือก div id ที่เราต้องการพิมพ์
    var html = '<html>' + // 
        '<head>' +
        '<link href="<?php echo $base_url; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">' +
        '<link href="<?php echo $base_url; ?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">' +
        '<link href="<?php echo $base_url; ?>/css/css2.css" rel="stylesheet" type="text/css">' +
        '</head>' +
        '<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>' +
        '</html>';

    var popupWin = window.open();
    popupWin.document.open();
    popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
    popupWin.document.close();
}




function Openprint_slip() {
    var divToPrint = document.getElementById('section-to-print-slip'); // เลือก div id ที่เราต้องการพิมพ์
    var html = '<html>' + // 
        '<head>' +
        '<link href="<?php echo $base_url; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">' +
        '<link href="<?php echo $base_url; ?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">' +
        '<link href="<?php echo $base_url; ?>/css/css2.css" rel="stylesheet" type="text/css">' +
        '</head>' +
        '<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>' +
        '<style> body{font-family: "Sarabun", sans-serif;}</style>' +
        '</html>';

    var popupWin = window.open();
    popupWin.document.open();
    popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
    popupWin.document.close();
}

function Openprint_checkbill() {
    var divToPrint = document.getElementById('section-to-print-checkbill'); // เลือก div id ที่เราต้องการพิมพ์
    var html = '<html>' + // 
        '<head>' +
        '<link href="<?php echo $base_url; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">' +
        '<link href="<?php echo $base_url; ?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">' +
        '<link href="<?php echo $base_url; ?>/css/css2.css" rel="stylesheet" type="text/css">' +
        '</head>' +
        '<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>' +
        '<style> body{font-family: "Phetsarath OT";}</style>' +
        '</html>';

    var popupWin = window.open();
    popupWin.document.open();
    popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
    popupWin.document.close();
}

function Openprint_order() {
    var divToPrint = document.getElementById('section-to-print-order'); // เลือก div id ที่เราต้องการพิมพ์
    var html = '<html>' + // 
        '<head>' +
        '<link href="<?php echo $base_url; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">' +
        '<link href="<?php echo $base_url; ?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">' +
        '<link href="<?php echo $base_url; ?>/css/css2.css" rel="stylesheet" type="text/css">' +
        '</head>' +
        '<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>' +
        '<style> body{font-family: "Sarabun", sans-serif;}</style>' +
        '</html>';

    var popupWin = window.open();
    popupWin.document.open();
    popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
    popupWin.document.close();
}




function Openprint_billcloseday() {
    var divToPrint = document.getElementById('section-to-print-billcloseday'); // เลือก div id ที่เราต้องการพิมพ์
    var html = '<html>' + // 
        '<head>' +
        '<link href="<?php echo $base_url; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">' +
        '<link href="<?php echo $base_url; ?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">' +
        '<link href="<?php echo $base_url; ?>/css/css2.css" rel="stylesheet" type="text/css">' +
        '</head>' +
        '<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>' +
        '<style> body{font-family: "Sarabun", sans-serif;}</style>' +
        '</html>';

    var popupWin = window.open();
    popupWin.document.open();
    popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
    popupWin.document.close();
}
</script>


<!-- update new for check bill print -->