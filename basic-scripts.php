<!-- basic scripts -->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
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
<script>
$(document).ready(function(e) {
	var users='<?php echo(($_SESSION['user']=='' ?  ' Guest' : $_SESSION['user'])); ?>';
$("#navbar-container").append('<div class="navbar-header pull-right" role="navigation"><ul class="nav ace-nav"><li class="purple open"><a class="dropdown-toggle" href="?logout=1" ><i class="icon-bell-alt"></i>Logout</a></li><li class="light-blue"><a href="Javascript:">Welcome '+users+'</a></li></ul></div>');

});
</script>