<?php include("class/db.php");;?>



		



<div class="modal-body">
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
	<td>'.$prodname['pro_name'].' ('.$prodname['pro_code'].')</td>
	<td>'.$prodname['pro_spec'].'</td>
	<td>'.$prod['salpr_qty'].'</td>
	<td>'.$prod['salpr_amt'].'</td>
	<td>'.$prod['salpr_total'].'</td>
	</tr>';
	$i++;
}
?>
</tbody>

															
														</table>
</div>
	
		

		<?php echo'<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<script src="assets/js/ace-extra.min.js"></script>';?>