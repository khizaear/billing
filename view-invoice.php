<?php
include('class/db.php');
$pur=$con->get_row("select * from t_purchase where pur_id='".form('id')."'", true);
$cust=client_name($pur['pur_cli_id']);
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
							<li class="active">Products Page</li>
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
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="space-6"></div>

								<div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										<div class="widget-box transparent invoice-box">
											<div class="widget-header widget-header-large">
												<h3 class="grey lighter pull-left position-relative">
													<i class="icon-leaf green"></i>
													Customer Invoice
												</h3>

												<div class="widget-toolbar no-border invoice-info">
													<span class="invoice-info-label">Invoice:</span>
													<span class="red"># <?php echo $pur['pur_bill'];?></span>

													<br>
													<span class="invoice-info-label">Date:</span>
													<span class="blue"><?php echo date('F j, Y',$pur['pur_date']);?></span>
												</div>

												<div class="widget-toolbar hidden-480">
													<a href="print-purchase.php?id=<?php echo form('id');?>">
														<i class="icon-print"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">
														<div class="col-sm-6">
															

															<div class="row">
                                                            <b><?php echo $cust['cli_name'];?></b>
																<ul class="list-unstyled spaced">
																	<li>
																		<i class="icon-caret-right blue"></i>
																		<?php echo $cust['cli_address'];?>
																	</li>
																	<li>
																		<i class="icon-caret-right blue"></i>
																		<?php echo $cust['cli_phone'];?>
																	</li>	<li>
																		<i class="icon-caret-right blue"></i>
																		<?php echo $cust['cli_email'];?>
																	</li>
																</ul>
															</div>
														</div><!-- /span -->

													<!-- /span -->
													</div><!-- row -->

													<div class="space"></div>

													<div>
														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">#</th>
																	<th>Product</th>
																	<th >Description</th>
																	<th>Quantity</th>
																	<th>Price</th>
                                                                    <th>Total</th>
																</tr>
															</thead>
<tbody>
<?php
$pprod=$con->get_rows("select * from t_purprod where ppr_pur_id='".form('id')."'", true);
$i=1;
foreach($pprod as $prod){
	$prodname=prod_info($prod['ppr_pro_id']);
	
	echo '<tr>
	<td>'.$i.'</td>
	<td>'.$prodname['pro_name'].'</td>
	<td>'.$prodname['pro_spec'].'</td>
	<td>'.$prod['ppr_qty'].'</td>
	<td>'.$prod['ppr_amt'].'</td>
	<td>'.$prod['ppr_prtot'].'</td>
	</tr>';
	$i++;
}
?>
</tbody>
<tfoot>
<tr>
	<td colspan="5" align="right"><strong>Total</strong></td>
    <td><?php echo ($pur['pur_subtotal']+$pur['pur_discount']); ?></td>
</tr>
</tfoot>
															
														</table>
													</div>

													<div class="hr hr8 hr-double hr-dotted"></div>

													<div class="row">
														<div class="col-sm-5 pull-right">
															<h5 class="pull-right">
																Discount amount :
																<span class="red"><?php echo ($pur['pur_discount']); ?></span>
															</h5>
														</div>
														
													</div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h5 class="pull-right">
																Subtotal:
																<span class="red"><?php echo ($pur['pur_subtotal']); ?></span>
															</h5>
														</div>
														
													</div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h5 class="pull-right">
																Tax amount :
																<span class="red"><?php echo ($pur['pur_taxamt']); ?></span>
															</h5>
														</div>
														
													</div>
<div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Total amount :
																<span class="red"><?php echo ($pur['pur_total']); ?></span>
															</h4>
														</div>
														
												  </div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Paid amount :
																<span class="red"><?php echo ($pur['pur_total']); ?></span>
															</h4>
														</div>
														
													</div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Pending amount :
																<span class="red"><?php echo ($pur['pur_pend']); ?></span>
															</h4>
														</div>
														
													</div>
												  <div class="space-6"></div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
				<!-- /.page-content -->
				</div><!-- /.main-content -->

			
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<?php include('basic-scripts.php'); ?>

		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        	<script type="text/javascript">
			jQuery(function($) {
				var oTable1 = $('#table1').dataTable();
				
		})
		</script>
		<!-- inline scripts related to this page -->
	</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 21 Feb 2014 16:00:37 GMT -->
</html>
