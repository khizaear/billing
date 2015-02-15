<?php
include('class/db.php');
include("dompdf/dompdf_config.inc.php");
ob_start();
$pur=$con->get_row("select * from t_sales where sal_id='".form('id')."'", true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
		<title>My Billing</title>

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
													<span class="red"># <?php echo $pur['pur_bill'];?></span>

													<br>
													<span class="invoice-info-label">Date:</span>
													<span class="blue"><?php echo date('F j, Y',$pur['pur_date']);?></span>
												</div>

												
											</div>

											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">
														<div class="col-sm-6">
															

															<div class="row">
                                                            <b><?php echo nl2br($pur['sal_customer']);?></b>
																
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
$pprod=$con->get_rows("select * from t_saleprod where salpr_sal_id='".form('id')."'", true);
$i=1;
foreach($pprod as $prod){
	$prodname=prod_info($prod['salpr_pro_id']);
	
	echo '<tr>
	<td>'.$i.'</td>
	<td>'.$prodname['pro_name'].'</td>
	<td>'.$prodname['pro_spec'].'</td>
	<td>'.$prod['salpr_qty'].'</td>
	<td>'.$prod['salpr_amt'].'</td>
	<td>'.$prod['salpr_total'].'</td>
	</tr>';
	$i++;
}
?>
</tbody>
<tfoot>
<tr>
	<td colspan="5" align="right"><strong>Total</strong></td>
    <td><?php echo ($pur['sal_subtotal']+$pur['sal_discount']); ?></td>
</tr>
</tfoot>
															
														</table>
													</div>

													<div class="hr hr8 hr-double hr-dotted"></div>

													
                                                    
                                                    

                                                    
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h5 class="pull-right">
																Discount amount :
																<span class="red"><?php echo ($pur['sal_discount']); ?></span>
															</h5>
														</div>
														
													</div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h5 class="pull-right">
																Subtotal:
																<span class="red"><?php echo ($pur['sal_subtotal']); ?></span>
															</h5>
														</div>
														
													</div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h5 class="pull-right">
																Tax amount :
																<span class="red"><?php echo ($pur['sal_tamamt']); ?></span>
															</h5>
														</div>
														
													</div>
                                                    <div class="row">
                                                                                                            <div class="col-sm-5 pull-right">
                                                                                                                <h4 class="pull-right">
                                                                                                                    Total amount :
                                                                                                                    <span class="red"><?php echo ($pur['sal_total']); ?></span>
                                                                                                                </h4>
                                                                                                            </div>
                                                                                                            
                                                                                                      </div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Paid amount :
																<span class="red"><?php echo ($pur['sal_paid']); ?></span>
															</h4>
														</div>
														
													</div>
                                                    <div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Pending amount :
																<span class="red"><?php echo ($pur['sal_pending']); ?></span>
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
<!--<script language="javascript">window.print();</script>-->
<!-- Mirrored from 198.74.61.72/themes/preview/ace/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 21 Feb 2014 16:00:37 GMT -->
</html>
<?php
$html = ob_get_clean();
echo $html;
/*$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("print-invoice.pdf");*/
?>


