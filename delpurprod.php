<?php
include('class/db.php');
if(form("id")!=''){
 con->delete("t_purprod",array('ppr_id'=>form("id")));
}
?>