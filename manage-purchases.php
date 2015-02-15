<?php
include('class/db.php');
$purchases=$con->get_rows("select * from t_purchase order by pur_id DESC", TRUE);
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
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							My Billing
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<!-- #sidebar-shortcuts -->
					<?php include('links.php');
					
					?>
					<!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

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
							<li>
								<i class="icon-home home-icon"></i>
							<a href="/">Home</a></li>
							<li class="active">Purchase Page</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
                    <div class="page-header">
							<h1>
								Manage Purchases
								<small>
									<i class="icon-double-angle-right"></i>
									View Saved & Update Purchases
								</small>
							</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									
                                    <table id="table1" class="table table-bordered table-striped table-condensed">
                                    <thead>	
                                    	<tr>
                                        	<th>Sno</th>
                                       	  <th>Bill #</th>
                                       	  <th>Client</th>
                                       	  <th>Date</th>
                                       	  <th>Bill Amount</th>
                                       	  <th>Bill Discount</th>
                                            <th>Tax</th>
                                            <th>Paid Amount</th>
                                            <th>Pending Amount</th>
                                            
                                          <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
	<tfoot>
<tr>
                                        	<th>Sno</th>
                                       	  <th>Bill #</th>
                                       	  <th>Client</th>
                                       	  <th>Date</th>
                                       	  <th>Bill Amount</th>
                                       	  <th>Bill Discount</th>
                                            <th>Tax</th>
                                            <th>Paid Amount</th>
                                            <th>Pending Amount</th>
                                            
                                        
                                        </tr>
	</tfoot>
                                    <tbody>
                                    	<?php
									
										$i=1;
										foreach($purchases as $pur){
											$cli=client_name($pur['pur_cli_id']);
											$tax=$pur['pur_total'] * $pur['pur_tax'] /100;
											echo "<tr>
											<td>$i</td>
											<td>".$pur['pur_bill']."</td>
											<td>".$cli['cli_name']."<span title='' data-content='".$cli['cli_name'].", ".$cli['cli_address'].", ".$cli['cli_phone']."' data-placement='right' data-trigger='hover' data-rel='popover' class='help-button' data-original-title='Popover on hover'>?</span></td>
											<td>".date('d-m-Y',$pur['pur_date'])."</td>
											<td>".$pur['pur_total']."</td>
											<td>".$pur['pur_discount']."</td>
											<td>".$pur['pur_tax']."% <small> (".$pur['pur_taxamt'].")</small></td>
											<td>".$pur['pur_paid']."</td>
											<td>".$pur['pur_pend']."</td>
										
											<td><a class='btn btn-xs btn-primary ' href='view-invoice.php?id=".$pur['pur_id']."&app=".md5("billing".time())."'><i class='icon-search'></i>View</a>
											<a  class='btn  btn-xs btn-info fancybox  fancybox.ajax' href='view-pur-prod.php?id=".$pur['pur_id']."' title='Purchased Products for bill ".$pur['pur_bill']." date: ".date('F j, Y',$pur['pur_date'])." '>Products</a>
										<a  class='btn  btn-xs btn-info   ' href='edit-purchase.php?edit=".$pur['pur_id']."' title='Purchased Products for bill ".$pur['pur_bill']." date: ".date('F j, Y',$pur['pur_date'])." '>Edit</a>
										
											</td>
											</tr>";
											$i++;
										}
										?>
                                    </tbody>
                                    </table>
                                 
								<!-- 	<a id='".$pur['pur_id']."'   class='prod btn btn-xs btn-info ' href='Javascript:'><i class='icon-search'></i>Products</a>
                                PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

			
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
            <div class="modal fade in " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">×</button>
												<h4 class="blue bigger">Purchased Products</h4>
											</div>
        <div class="modal-body overflow-visible">
        </div>
        </div><!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

		</div><!-- /.main-container -->
        
		<?php include('basic-scripts.php'); ?>

		<script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/lightbox.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="assets/js/jquery.dataTables.columnFilter.js"></script>
       <script src="assets/js/tabletool.js"></script>
        <link rel="stylesheet" href="assets/css/lightbox.css">
        <link rel="stylesheet" href="assets/css/tabletool.css">
        <script src=""></script>
        	<script type="text/javascript">
			jQuery(function($) {
			/*	var oTable1 = $('#table1').dataTable().columnFilter({
			aoColumns: [{type: "text"},{type:"text" },{type:"text" },{ type: "text" },{ type: "text" },{type:"text" },{type:"text" },{ type: "text" },{ type: "text" }
				]

			});*/
			/*	.columnFilter({
			aoColumns: [{type: "text"},{type:"text" },{type:"text" },{ type: "text" },{ type: "text" },{type:"text" },{type:"text" },{ type: "text" },{ type: "text" }
				]
targets: 1
			});*/
					$('[data-rel=popover]').popover({container:'body'});
		})
		
		$(document).ready(function() {
			
			 var table = $('#table1').dataTable({}).columnFilter();
   			 var tt = new $.fn.dataTable.TableTools( table );
 			 $( tt.fnContainer()).insertBefore('div.dataTables_wrapper');
			/*$('#table1').dataTable({
				sDom: 'T<"clear">lfrtip',"oTableTools": {
            "aButtons": [
                "copy",
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": "Save",
                    "aButtons":    [ "csv", "xls", "pdf" ]
                }
            ]
        }
		}).columnFilter();*/
		$(".fancybox").fancybox({
    helpers : {
        overlay : {
            css : {
                'background' : 'rgba(58, 42, 45, 0.50)'
            }
        }
    }
});
	});
	

		</script>

		<!-- inline scripts related to this page -->
	</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 21 Feb 2014 16:00:37 GMT -->
</html>
