<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
include("sqlite.php");
define("URL",basename(__FILE__));
$con=new SQLite3Database("sqlite/microbilings");
$con->connect();
if(!headers_sent()){
	session_start();
}

if(basename($_SERVER['SCRIPT_FILENAME'])!='login.php'){
	$fn=basename($_SERVER['SCRIPT_FILENAME']);
	if($_SESSION['user']=='' ){
		echo redirect('login.php?file='.$fn);
	}
}

if(form("logout")!=''){
	session_destroy();
	echo redirect('login.php');
}

function pr($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
	
}
function client_name($id){
	global $con;
	$res=$con->get_row("select * from t_clients where cli_id='$id'",TRUE);
	return $res;
}

function prod_info($id){
	global $con;
	$res=$con->get_row("select * from t_prod where pro_id='$id'",TRUE);
	return $res;
}
function get_stock($id){
	global $con;
	$res=$con->get_row("select * from tbl_stock where prod_id='$id'",TRUE);
	return $res['stk_qty'];
}
function css(){
	return (include('basic-css.php'));
}
function form($key, $defval=""){

		if(isset($_POST[$key]))
			return $_POST[$key];
		else if(isset($_GET[$key]))
			return $_GET[$key];
		else
			return $defval;
	}

function redirect($url){
	return "<script>window.location.href='".$url."';</script>";
}


function getrequirements($data){
	$ser=unserialize($data);
	$out='<table class="table table-bordered table-condensed" width="100%" cellpadding="2" cellspacing="1" border="0" ><tr>';
	foreach($ser as $key=>$val){
		$out.="<td valign='top' nowrap='nowrap' ><ul style=' list-style:inside'>";
		$out.= str_replace("req","Users Details",$key);
		$out.= str_replace("option","Requirements Details",$key);
		
		foreach($val as $ck=>$cval){
			$out.= "<li> ". $ck ." = ".$cval ."</li> ";
		}
	$out.="</ul></td>";
		
	}
	$out.= "</tr><table	/>";
	return $out;
}



function moneyFormatIndia($num){
    $explrestunits = "" ;
    if(strlen($num)>3){
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++){
            // creates each of the 2's group and adds a comma to the end
            if($i==0)
            {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            }else{
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash ; // writes the final format where $currency is the currency symbol.
}
function no_to_words($no){
	$words = 
	array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred ','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
	if($no == 0)
		return ' ';
		else {
		$novalue='';
		$highno=$no;
		$remainno=0;
		$value=100;
		$value1=1000;
		while($no>=100) {
		if(($value <= $no) &&($no < $value1)) {
		$novalue=$words["$value"];
		$highno = (int)($no/$value);
		$remainno = $no % $value;
		break;
	}
		$value= $value1;
		$value1 = $value * 100;
	}
		if(array_key_exists("$highno",$words))
		return $words["$highno"]." ".$novalue." ".no_to_words($remainno);
		else {
		$unit=$highno%10;
		$ten =(int)($highno/10)*10;
		return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);
		}
	}
}





?>
