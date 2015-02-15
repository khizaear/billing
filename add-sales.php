<?php include('class/db.php'); 

if(form('but3')!=''){
	
	$purdat=array();
	$purdat['sal_date']=strtotime(form('date'));
	$purdat['sal_total']=form('total');
	$purdat['sal_tax']=form('tax');
	$purdat['sal_discount']=form('discamt');
	$purdat['sal_paid']=form('paid');
	$purdat['sal_invoice']=form('bill');
	$purdat['sal_pending']=form('pend');
	$purdat['sal_customer']=form('customer');
	$purdat['sal_subtotal']=form('subamth');
	$purdat['sal_tamamt']=form('disptaxhid');
	$id=$con->insert("t_sales",$purdat);
	$products=$_POST['data']['sales'] ;
	foreach($products as $parpro){
					$productid=explode(")",$parpro['salpr_pro_id']);					
					$data['salpr_sal_id']=$id;
					//$data['pid_cus_id']=$this->request->data['invoice']['inv_cus_id'];
					$data['salpr_pro_id']=$productid[0];
					$data['salpr_amt']=$parpro['salpr_amt'];
					//$data['pid_date']=$this->request->data['invoice']['inv_date'];
					$data['salpr_qty']=$parpro['salpr_qty'];
					$data['salpr_total']=$parpro['salpr_total'];
					$con->insert("t_saleprod",$data);	
									
					$product=$con->get_row("select * from tbl_stock where prod_id='$productid[0]'",TRUE);
					$stkwhr=array('prod_id=' => $product['prod_id']);
					$stock['stk_qty']=$product['stk_qty']-$parpro['qty'];
					$con->update('tbl_stock',$stock,$stkwhr);
					
					
	}

echo redirect('manage-purchases.php');
die();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>My Billing</title>
<?php echo css(); ?>
</head>

<body>
<div class="navbar navbar-default" id="navbar"> 
  <script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
  <div class="navbar-container" id="navbar-container">
    <div class="navbar-header pull-left"> <a href="#" class="navbar-brand"> <small> <i class="icon-leaf"></i> My Billing </small> </a><!-- /.brand --> 
    </div>
    <!-- /.navbar-header --> 
    
    <!-- /.navbar-header --> 
  </div>
  <!-- /.container --> 
</div>
<div class="main-container" id="main-container"> 
  <script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
  <div class="main-container-inner"> <a class="menu-toggler" id="menu-toggler" href="#"> <span class="menu-text"></span> </a>
    <div class="sidebar" id="sidebar"> 
      <script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script> 
      
      <!-- #sidebar-shortcuts -->
      <?php include('links.php'); ?>
      <!-- /.nav-list -->
      
      <div class="sidebar-collapse" id="sidebar-collapse"> <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i> </div>
      <script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script> 
    </div>
    <div class="main-content">
      <div class="breadcrumbs" id="breadcrumbs"> 
        <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
        <ul class="breadcrumb">
          <li> <i class="icon-home home-icon"></i> <a href="/">Home</a> </li>
          <li> <a href="manage-sales.php">Sales</a></li>
        </ul>
        <!-- .breadcrumb -->
        
        <div class="nav-search" id="nav-search">
          <form class="form-search">
            <span class="input-icon">
            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
            <i class="icon-search nav-search-icon"></i> </span>
          </form>
        </div>
        <!-- #nav-search --> 
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Add New Sales <small> <i class="icon-double-angle-right"></i> Create New Sales purchase </small> </h1>
        </div>
        <div class="row">
          <div class="col-xs-12"> 
            <!-- PAGE CONTENT BEGINS -->
            <form name="form1" method="post" action="">
          
              <table class="table table-striped table-bordered">
                <tr>
                  <td>Enter Customer Details</td>
                  <td>Invoice #</td>
                  <td>Date </td>
                </tr>
                <tr>
                  <td>
                <textarea class="form-control" name="customer"></textarea>
                 </td>
                  <td><input name="invoice" type="text" required class="form-control" id="invoice"></td>
                  <td><div class="input-group">
																	<input name="date" type="text" class="form-control date-picker" id="id-date-picker-1" value="<?php echo date("d-m-Y",time()); ?>" data-date-format="dd-mm-yyyy">
																	<span class="input-group-addon">
																		<i class="icon-calendar bigger-110"></i>
																	</span>
																</div></td>
                </tr>
              </table>
             <table class="table table-condensed table-striped" width="100%"   id="addprods">
                  <tr>
                    <td width="65%" ><strong>Product Name</strong></td>
                    <td width="11%"   ><strong>Price</strong></td>
                    <td width="10%" ><strong>Qty</strong></td>
                    <td width="13%"  ><strong>Total</strong></td>
                    <td width="1%" > - </td>
                  </tr>
                  <tr  id="tr0">
                    <td valign="top"><input style="width:100%"    type="text"  autocomplete="off" class="prod form-control"  name="data[sales][0][salpr_pro_id]" required  list="prods" title="0"  />
                      <datalist id="prods">
                        <?php	
						   $product=$con->get_rows("select * from t_prod", TRUE);					
						 foreach($product as $prod){			
							echo '<option value="'.$prod['pro_id'].') '.$prod['pro_code'].'  '.$prod['pro_name'].'  '.$prod['pro_spec'].'  Rs '.$prod['pro_mrp'].'">'; 
							 
						}
						 ?>
                      </datalist></td>
                    <td valign="top"><input name="data[sales][0][salpr_amt]" type="text" required class="form-control" id="price0" size="20" /></td>
                    <td valign="top"><input type="text" class="qty form-control"  name="data[sales][0][salpr_qty]" required  id="qty" onblur="gettot(0,this.value)" /></td>
                    <td><input  class="prtot form-control"  onblur="tot()"  type="text" name="data[sales][0][salpr_total]"    required="required" id="tot0" /></td>
                    <td>&nbsp;</td>
                  </tr>
              </table>
             <input style="margin-top:-10px" type="button" onClick="tot()" value="+" id="addprod" class="btn btn-mini btn-info" />
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            
                  <tr>
                    <td id="selectedprod" width="50%">&nbsp;</td>
                    <td width="59%"><table   width="100%" class="table table-condensed table-hover">
                                            <tr>
                          <td style="text-align: right"> Discount in amount</td>
                          <td><input name="discamt"  type="text"  id="discamt" onblur="tot()" class="form-control" value="0"></td>
                        </tr>
                                            <tr>
                          <td style="text-align: right">Sub Total<input type="hidden" name="subamth" id="subamth" value=""></td>
                          <td id="subamt">0.0</td>
                        </tr>
                        <tr >
                          <td width="52%" style="text-align: right">Tax in %</td>
                          <td width="48%"><input name="tax"  type="text"  id="tax" onblur="tot()" class="form-control" value="0"></td>
                        </tr>
                        <tr>
                          <td style="text-align: right">Tax Rs. <input name="disptaxhid" id="disptaxhid" value="0" type="hidden" /></td>
                          <td id="disptax">0.0</td>
                         
                        </tr>

                        <tr>
                          <td style="text-align: right">Total</td>
                          <td><input name="total" type="text" class="form-control" id="tos" value="0"></td>
                        </tr>
                        <tr>
                          <td style="text-align: right">Paid</td>
                          <td><input name="paid" type="text" class="form-control" id="paid" value="0"></td>
                        </tr>
                        <tr>
                          <td style="text-align: right">Pending</td>
                          <td><input name="pend" type="text" class="form-control" id="pend" value="0" readonly></td>
                        </tr>
                        <tr>
                          <td style="text-align: right"><input type="submit" name="but3" value="Add Purchase" class="btn btn-primary btn-success">&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                      </table></td>
                  </tr>
              </table>
            </form>
            <!-- PAGE CONTENT ENDS --> 
          </div>
          <!-- /.col --> 
        </div>
        <!-- /.row --> 
      </div>
      <!-- /.page-content --> 
    </div>
    <!-- /.main-content --> 
    
  </div>
  <!-- /.main-container-inner --> 
  
  <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="icon-double-angle-up icon-only bigger-110"></i> </a> </div>
<!-- /.main-container --> 

<!-- basic scripts --> 

<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
<script>
  $(document).ready(function(e) {
	$("#addprod").click(function(e) {
		cnt = cnt + 1;
        $("#addprods").append('<tr id="tr'+cnt+'"><td><input required="required" title="'+cnt+'" type="text" class="prod form-control"  name="data[sales]['+cnt+'][salpr_pro_id]" autocomplete="off"  list="prods" /></td><td><input required="required" type="text" name="data[sales]['+cnt+'][salpr_amt]"  id="price'+cnt+'"  class="form-control"  /> </td><td><input  class="form-control"  required="required" type="text" name="data[sales]['+cnt+'][salpr_qty]" id="data[sales][qty][]" onblur="gettot('+cnt+',this.value)" /></td><td><input type="text" class="prtot form-control" name="data[sales]['+cnt+'][salpr_total]"  onblur="tot()"   required="required" id="tot'+cnt+'" /></td><td><a class="btn btn-sm btn-danger rnr"  title="'+cnt+'" onclick="removetab('+cnt+')"  href="javascript:" ><i class="icon-remove " ></i></a></i></td></tr>');
		
$("#addprods tbody tr .prod").blur(function(e) {
	if($(this).val()!=''){
		var prt=$(this).attr("title");	
		var brk=$(this).val();
		var ans =brk.split("Rs");
		var mds="price"+prt
		$("#"+mds).val(ans[1]);
	}
});		
    });

var cnt=0;
		
		
$("#paid").blur(function(e) {
    totamt=$("#tos").val()
	paidamt=$("#paid").val();
	$("#pend").val(totamt-paidamt);
});		

$("#addprods tbody tr .prod").blur(function(e) {
	if($(this).val()!=''){
		var prt=$(this).attr("title");	
		var brk=$(this).val();
		var ans =brk.split("Rs");
		var mds="price"+prt
		$("#"+mds).val(ans[1]);
	}
});	
$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
});
  </script>
  
    <script>
	function gettot(id,qty){
		var ids=id;
		var quan=qty;
		var mds="price"+ids
		var ele="tot"+ids
		var price=$("#"+mds).val();
		totamt=parseInt(price * quan );
		$("#"+ele).val(totamt);
		
		
	}
	</script>
    <script>
function tot(){
   
    var sum = 0;
	      $('.prtot').each(function() {
         sum += parseInt($(this).val()) || 0
    });

	var discamt=$("#discamt").val();
	
	var tax= $("#tax").val();
	tottax = parseInt(sum * tax) /100
	$("#disptax").html(tottax );
	$("#disptaxhid").val(tottax );
	$("#subamth").val(parseInt(sum - discamt));
	
	$("#tos").val(sum-discamt+tottax);
   $("#subamt").html(parseInt(sum - discamt));



}
</script> 
<script>
	function removetab(ids){
		
		var trid='tr'+ids; 
		//alert(trid);
		document.getElementById(trid).style.backgroundColor='#EAEAEA';
		document.getElementById(trid).innerHTML='';
		tot();
		
	}

</script>
		<!-- <![endif]--> 

<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]--> 

<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/typeahead-bs2.min.js"></script> 

<!-- page specific plugin scripts --> 

<!-- ace scripts --> 

<script src="assets/js/ace-elements.min.js"></script> 
<script src="assets/js/ace.min.js"></script> 

		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/date-time/moment.min.js"></script>
		<script src="assets/js/date-time/daterangepicker.min.js"></script>

<!-- inline scripts related to this page -->
</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 21 Feb 2014 16:00:37 GMT -->
</html>
