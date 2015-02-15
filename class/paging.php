<?PHP

class Pageing {
	
	var $CurrRow = 0;
	var $size=3; // No. of Records per page
	var $MaxPage = 0;
	var $pageno = 1;
	var $totalrc = 0;
	var $rc1 = 0;
	var $functionflag = true ;
	var $formid = 0;
	var $extrapage=false;

	function Pageing($size,$extrapage=false) {
		$this->size = $size;
		if($extrapage) {
			$this->extrapage = true;
		}
	}

	function setForm($formid) {
		$this->formid = $formid;
	}

	function setPagesize($size) {
		$this->size = $size;
	}

	function getLimit($PageNo,$totalrc) {
		$this->size;
		$this->totalrc = $totalrc;
		$this->MaxPage = ceil($this->totalrc/$this->size);
		$this->pageno = ($this->MaxPage >= $PageNo)?$PageNo:1;
		$this->CurrRow = ($this->pageno - 1) * $this->size;
		$limit = " LIMIT"." ".$this->CurrRow.",".$this->size ;
		return $limit;
	}

	function showPageing($extraflag=false) {

		$StartPage = $this->pageno;
		if((($StartPage+10) > $this->MaxPage)&&($this->MaxPage >= 10)) {
			$StartPage = $this->MaxPage - 9 ;
		}
		$EndPage = $StartPage+10;
		if($this->MaxPage <= 10) {
			$EndPage = $this->MaxPage+1;
			$StartPage=1;
		} 

		if($extraflag=="ajax_paging") {
			echo $pre = ($this->pageno==1)?"<span class='pager2'>&nbsp;Prev&nbsp;</span>&nbsp;":"<a href='#' onclick='javascript:return ajax_paging(\"".($this->pageno - 1)."\")'&nbsp;Prev&nbsp;</a>&nbsp;";
			for($i=$StartPage;$i<$EndPage;$i++) {
				$startrec = ($i-1)*$this->size;
				$endrec = $startrec + $this->size; 
				if($i==$EndPage-1){$hifstr="";}else{$hifstr="&nbsp;";}
				if ($this->pageno == $i){echo "<span class='pager2'><b> ".$i." </b></span> $hifstr";}
				else{echo '<a href="#" onclick="javascript:return ajax_paging(\''.$i.'\')"> '.$i.' </a> '.$hifstr ;} 
			}
			echo $next = ($this->MaxPage==$this->pageno)?"<span class='pager2'>&nbsp;Next&nbsp;</span>&nbsp;":"&nbsp;<a href='#' onclick='javascript:return ajax_paging(\"".($this->pageno + 1)."\")'>&nbsp;Next&nbsp;</a>&nbsp;";
			if($this->functionflag) {
				echo '<input type="hidden" name="Ajax_PageNo" id="Ajax_PageNo" value="'.$this->pageno.'">';
				//echo '<script language="javascript">function paging(n){ alert(n);return false; //return changePaging(n);}</script>';
				$this->functionflag = false ;			
			}
		} elseif($extraflag) {
			echo $pre = ($this->pageno==1)?"<span class='pager2'>&nbsp;Prev&nbsp;</span>&nbsp;":"<a href='#' onclick='javascript:return paging1(document.getElementById(\"".$this->formid."\"),\"".($this->pageno - 1)."\")'>&nbsp;Prev&nbsp;</a>&nbsp;";
	

			for($i=$StartPage;$i<$EndPage;$i++) {

				$startrec = ($i-1)*$this->size;

				$endrec = $startrec + $this->size; 

				if($i==$EndPage-1){$hifstr="";}else{$hifstr="&nbsp;";}

				if ($this->pageno == $i){echo "<span class='pager2'><b> ".$i." </b></span> $hifstr";}

				else{echo '<a href="#" onclick="javascript:return paging1(document.getElementById(\''.$this->formid.'\'),\''.$i.'\')"> '.$i.' </a> '.$hifstr ;} 

			}

			echo $next = ($this->MaxPage==$this->pageno)?"<span class='pager2'>&nbsp;Next&nbsp;</span>&nbsp;":"&nbsp;<a href='#' onclick='javascript:return paging1(document.getElementById(\"".$this->formid."\"),\"".($this->pageno + 1)."\")'>Next&nbsp;</a>&nbsp;";

			if($this->functionflag) {

				echo '<input type="hidden" name="PageNo1" value="'.$this->pageno.'">';

				echo '<script language="javascript">function paging1(formobj,n){formobj.PageNo1.value = n;formobj.action="";formobj.submit();return false;}</script>';

				$this->functionflag = false ;			

			}

		} else {

			echo $pre = ($this->pageno==1)?"<span class='pager2'>&nbsp;Prev&nbsp;</span>&nbsp;":"<a href='#' onclick='javascript:return paging(document.getElementById(\"".$this->formid."\"),\"".($this->pageno - 1)."\")'>&nbsp;Prev&nbsp;</a>&nbsp;";

			

			for($i=$StartPage;$i<$EndPage;$i++) {

				$startrec = ($i-1)*$this->size;

				$endrec = $startrec + $this->size; 

				if($i==$EndPage-1){$hifstr="";}else{$hifstr="&nbsp;";}

				if ($this->pageno == $i){echo "<span class='pager2'><b> ".$i." </b></span> $hifstr";}

				else{echo '<a href="#" onclick="javascript:return paging(document.getElementById(\''.$this->formid.'\'),\''.$i.'\')"> '.$i.' </a> '.$hifstr ;} 

			}

			echo $next = ($this->MaxPage==$this->pageno)?"<span class='pager2'>&nbsp;Next&nbsp;</span>&nbsp;":"&nbsp;<a href='#' onclick='javascript:return paging(document.getElementById(\"".$this->formid."\"),\"".($this->pageno + 1)."\")'>&nbsp;Next&nbsp;</a>&nbsp;";

			if($this->functionflag) {

				echo '<input type="hidden" name="PageNo" value="'.$this->pageno.'">';

				echo '<script language="javascript">function paging(formobj,n){formobj.PageNo.value = n;formobj.action="";formobj.submit();return false;}</script>';

				$this->functionflag = false ;			

			}

		}

	}



	function showPagingbox($extraflag=false) {

		$StartPage = $this->pageno;

		if((($StartPage+10) > $this->MaxPage)&&($this->MaxPage >= 10)) {

			$StartPage = $this->MaxPage - 9 ;

		}

		$EndPage = $StartPage+10;

		if($this->MaxPage <= 10) {

			$EndPage = $this->MaxPage+1;

			$StartPage=1;

		} 

		if(!$extraflag) {

		if($this->pageno!=1) {

			echo '<td width="30" onmouseover="javascript: tdpaging(this,true);" onmouseout="javascript: tdpaging(this,false);" class="paging" onclick="javascript:return paging(document.getElementById(\''.$this->formid.'\'),\''.($this->pageno -1).'\')">&nbsp;Prev</td>';

		} 

		



		for($i=$StartPage;$i<$EndPage;$i++) {

			$pgno = ($i < 10)?"&nbsp;".$i."&nbsp;":$i;

			if ($this->pageno == $i) {

				echo '<td align="center" class="currentpage" ><b>'. $pgno.'</b></td>';

			} else {

				echo '<td align="center" onmouseover="javascript: tdpaging(this,true);" onmouseout="javascript: tdpaging(this,false);" class="paging"';

				echo 'onclick="javascript:return paging(document.getElementById(\''.$this->formid.'\'),\''.$i.'\')"'.$i.'>'.$pgno.'</td>';	

			} 

		}



		if($this->MaxPage!=$this->pageno) {

			echo '<td width="35" onmouseover="javascript: tdpaging(this,true);" onmouseout="javascript: tdpaging(this,false);" class="paging" onclick="javascript:return paging(document.getElementById(\''.$this->formid.'\'),\''.($this->pageno + 1).'\')">Next&nbsp;</td>';

		} 

		

		if($this->functionflag)

		{

		echo '<input type="hidden" name="PageNo" value="'.$this->pageno.'">';

		echo '<script language="javascript">function paging(formobj,n){formobj.PageNo.value = n;formobj.action="";formobj.submit();return false;}</script>';

		$this->functionflag = false ;

		}

		}

	}

}

?>