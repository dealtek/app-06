<?php
if(!session_id()) session_start();
require_once('../Connections/userbasic.php');

//ini_set('display_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
error_reporting(E_ERROR | E_WARNING | E_PARSE);


// 06-11-15 (09-07-14 AM) doc said just auto fill in billing

// set as always is yes no choice
$_POST['bill-from-add'] = 'yes';

// use main as billing

// new
	




	
	

$getclient_find = $userbasic->newFindCommand('clients1');
//$getclient_find = $userbasic->newFindCommand('clientsemp1');
$getclient_findCriterions = array(

'Client_ID'=>'=='.$_SESSION["nowuser"],

//'Client_ID'=>'=='.'44864',



//'z_webtmp'=>'=='.$rand,

);
foreach($getclient_findCriterions as $key=>$value) {
    $getclient_find->AddFindCriterion($key,$value);
}

fmsSetPage($getclient_find,'getclient',10); 

//$getclient_find->SetPreCommandScript('cc_new_client_emp_inv',$randstuff); 

$getclient_result = $getclient_find->execute(); 

//if(FileMaker::isError($getclient_result)) fmsTrapError($getclient_result,"error.php"); 

fmsSetLastPage($getclient_result,'getclient',10); 

$getclient_row = current($getclient_result->getRecords());




// new here 06-10-15 (09-44-00 AM)


// this is here again after reg2newrec
//$co = $_POST['firstname'].' '.$_POST['lastname'];

if( $_POST['bill-from-add'] == 'yes' ){
$_POST['address2'] = $_POST['address1'];
$_POST['city2'] = $_POST['city1'];
$_POST['state2'] = $_POST['state1'];
$_POST['zip2'] = $_POST['zip1'];
	}
	




//new 2014
// now update from previous

$editclient_edit = $userbasic->newEditCommand('clients1',$getclient_row->getRecordId());




if( $_POST['bill-from-add'] == 'yes' ){
	


// with BILLING


$editclient_fields = array(


//what part should be employee?

//'cl_emp::First'=>$_POST['firstname'],
//'cl_emp::Last'=>$_POST["lastname"],

//'Company'=>$co,


// these ARE for drivers info (THESE ARE FOR DR OWNER FIELD DATA for NON TAXI)

'Address'=>$_POST["address1"],
'City'=>$_POST["city1"],
'State'=>$_POST["state1"],
'Zip'=>$_POST["zip1"],


//'F Name Billing'=>$_POST['firstname'],
//'L Name Billing'=>$_POST['lastname'],


//'Billing Company Name'=>$co,
//'Billing Phone'=>$_POST["Phone2"],
//'Billing Fax'=>$_POST["otherphone"],
'Billing Address'=>$_POST['address2'],
'Billing City'=>$_POST['city2'],
'Billing State'=>$_POST['state2'],
'Billing Zip'=>$_POST['zip2'],


);
	
	// end bill
	
	}else{
		
		

$editclient_fields = array(


//what part should be employee?

//'cl_emp::First'=>$_POST['firstname'],
//'cl_emp::Last'=>$_POST["lastname"],
// hmm both place
//'Billing Company Name'=>$co,

// REAL for taxi use these - non taxi - do not

'Address'=>$_POST["address1"],
'City'=>$_POST["city1"],
'State'=>$_POST["state1"],
'Zip'=>$_POST["zip1"],

);		
		
		
} // end if 

foreach($editclient_fields as $key=>$value) {
    $editclient_edit->setField($key,$value);
}

$editclient_result = $editclient_edit->execute(); 

//if(FileMaker::isError($editclient_result)) fmsTrapError($editclient_result,"error.php"); 

$editclient_row = current($editclient_result->getRecords());

// FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>

<!DOCTYPE html>
<html>
<head>
<?php if (isset($_SESSION["new_reg"]) && $_SESSION["new_reg"] == 'yes')
//$_SESSION["new_reg"] = ''; // set clear
echo '<meta http-equiv="refresh" content="0; url=new-client-application-payprep.php">';
 ?>
 
<title>Independent Drivers Consortium -  Reg 4</title>
<meta name="viewport" content="width=device-width, initial-scale=1">





<!-- 
<link rel="stylesheet" href="inc/jq/themes/theme-02.min.css" />
<link rel="stylesheet" href="inc/jq/themes/jquery.mobile.icons.min.css" />

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
 <script>
	$(function(){
		$( "[data-role='header'], [data-role='footer']" ).toolbar();
		});
    </script>
    
-->   
    
    

<link href="mob.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div data-role="header" data-position="fixed" data-theme="a">
<div class="box1" center1> <img class="center" src="pics/appbanner-320x60-main.png" ></div>
<!--<h1>Page head Title</h1> --> 
</div>
<!-- /header -->

<section id="page01111" data-role="page"> 


<div role="main" class="ui-content">
<div class="content" >
<div class="box1 center1" > 

<!--INSERT START --> 

<span class="print_data_22"> <br>
<br>

<br>
</span> 


<!--INSERT END --> 

</div>
<!-- end .box --> 
</div>
<!-- end .content --> 
</div>
<!-- /ui-content --> 

</section>
<!-- /page --> 

<!--<footer data-role="footer" class="ui-barNAH" data-position="fixed" data-theme="a">
<div class="ui-grid-c boxblue">
<?php include('footer-inc.php'); ?>
</div>
</footer>
 -->
<!-- /footer -->

</body>
</html>
