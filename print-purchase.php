<?php
include('class/db.php');
$pur=$con->get_row("select * from t_purchase where pur_id='".form('id')."'", true);
$cust=client_name($pur['pur_cli_id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php echo css(); ?>   
</head>

<body>
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
													<span class="red"># CTD2384</span>

													<br>
													<span class="invoice-info-label">Date:</span>
													<span class="blue">July 4, 2014</span>
												</div>

												<div class="widget-toolbar hidden-480">
													<a href="#">
														<i class="icon-print"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
											  <div class="widget-main padding-24">
													<div class="row">
														<div class="col-sm-6">
															

															<div class="row">
                                                            <b>Padmanaban</b>
																<ul class="list-unstyled spaced">
																	<li>
																		<i class="icon-caret-right blue"></i>
																		25 SE St Velachery Main Road																	</li>
																	<li>
																		<i class="icon-caret-right blue"></i>
																		9715463636																	</li>	<li>
																		<i class="icon-caret-right blue"></i>
																		Padhumaer@gmail.com																	</li>
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
																	<th>Description</th>
																	<th>Quantity</th>
																	<th>Price</th>
                                                                    <th>Total</th>
																</tr>
															</thead>
<tbody>
<tr>
	<td>1</td>
	<td>Polo full sleeves</td>
	<td>40 xl</td>
	<td>10</td>
	<td> 2800</td>
	<td>28000</td>
	</tr></tbody>
<tfoot>
<tr>
	<td align="right" colspan="5"><strong>Total</strong></td>
    <td>28000</td>
</tr>
</tfoot>
															
														</table>
													</div>

													<div class="hr hr8 hr-double hr-dotted"></div>

													<div class="row">
														<div class="col-sm-5 pull-right">
															<h5 class="pull-right">
																Discount amount :
																<span class="red">0</span>
															</h5>
														</div>
														
													</div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h5 class="pull-right">
																Subtotal:
																<span class="red">28000</span>
															</h5>
														</div>
														
													</div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h5 class="pull-right">
																Tax amount :
																<span class="red">0</span>
															</h5>
														</div>
														
													</div>
<div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Total amount :
																<span class="red">28000</span>
															</h4>
														</div>
														
												</div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Paid amount :
																<span class="red">28000</span>
															</h4>
														</div>
														
													</div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Pending amount :
																<span class="red">0</span>
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
</body>
</html>