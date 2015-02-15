<?php
include('class/db.php');
$products=$con->get_rows("select * from t_prod order by pro_id DESC", true);
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
                    <div class="page-header">
							<h1>
								Manage Products
								<small>
									<i class="icon-double-angle-right"></i>
									View Saved & Update PRoducts
								</small>
							</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									
                                    <table id="table1" class="table table-bordered table-striped table-condensed">
                                    <thead>	
                                    	<tr>
                                        	<th>#</th><th>Code</th><th>Name</th><th>Specifications</th><th>Price</th><th>Mrp</th><th>Stock</th><th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        	<th>#</th><th>Code</th><th>Name</th><th>Specifications</th><th>Price</th><th>Mrp</th><th >Stock</th>
                                        </tr
                                    </tfoot>
                                    <tbody>
                                    	<?php
									
										$i=1;
										foreach($products as $prod){
											echo "<tr>
											<td>$i</td>
											<td>".$prod['pro_code']."</td>
											<td>".$prod['pro_name']."</td>
											<td>".$prod['pro_spec']."</td>
											<td>".$prod['pro_price']."</td>
											<td>".$prod['pro_mrp']."</td>
											<td>".get_stock($prod['pro_id'])."</td>
											
											<td><a class='btn btn-xs btn-primary ' href='update-products.php?id=".$prod['pro_id']."&app=".md5("billing".time())."'><i class='icon-edit'></i>Edit</a></td>
											</tr>";
											$i++;
										}
										?>
                                    </tbody>
                                    </table>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
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
		
		$(document).ready(function(e) {
            var oTable1 = $('#table1').dataTable().columnFilter();
				
        });
		</script>
                <script src="assets/js/jquery.dataTables.columnFilter.js"></script>
		<!-- inline scripts related to this page -->
	</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 21 Feb 2014 16:00:37 GMT -->
</html>
