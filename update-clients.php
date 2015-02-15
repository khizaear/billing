<?php
include('class/db.php');
$id=form('id');

$pro=$con->get_row("select * from t_clients where cli_id='".$id."'");
if(form('but3')!=''){
	$product=$_POST['data'];
	$where=array('cli_id=' => $id);
	$con->update('t_clients',$_POST['data'],$where,FALSE);
	echo redirect("manage-clients.php");
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
								<a href="/">Home</a>
							</li>

							<li>
								<a href="manage-products.php">Products</a>
							</li>
							<li class="active">New Product</li>
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
								Add New Products
								<small>
									<i class="icon-double-angle-right"></i>
									Create New Products
								</small>
							</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                            
								
								<form name="form1" method="post" action="">
                                
								  <table width="10%" class="table table-bordered table-striped table-condensed" id="table1">
								    <tbody>
								      <tr>
								        <th width="30%">Name</th>
								        <td width="70%"><input class="form-control" required type="text"  value="<?php echo $pro['cli_name'] ;?>" name="data[cli_name]" id="data[cli_name]"></td>
								        
							          </tr>
								      <tr>
								        <th>Address</th>
								        <td><input type="text"  class="form-control" value="<?php echo $pro['cli_address'] ;?>" name="data[cli_address]" id="data[cli_address]"></td>
								        
							          </tr>
								      <tr>
								        <th>Phone</th>
								        <td><input type="text"  class="form-control" value="<?php echo $pro['cli_phone'] ;?>" name="data[cli_phone]" id="data[cli_phone]"></td>
							          </tr>
								      <tr>
								        <th>Email</th>
								        <td><input type="text"  class="form-control" value="<?php echo $pro['cli_email'] ;?>" name="data[cli_email]" id="data[cli_email]"></td>
							          </tr>
	
								      <tr>
								        <td colspan="2"><input  type="submit" name="but3" class="btn btn-success" id="Save" value="Submit"></td>
								       
								       
							          </tr>
							     
								    
							        </tbody>
							      </table>
						      </form>
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

	
		<!-- inline scripts related to this page -->
	</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 21 Feb 2014 16:00:37 GMT -->
</html>
