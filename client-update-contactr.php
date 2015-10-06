<?php
if(!session_id()) session_start();
require_once('../Connections/userbasic.php');

//ini_set('display_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
error_reporting(E_ERROR | E_WARNING | E_PARSE);


// use main as billing

// new


//2015


$findthis = array("/", "-", "," , ".");
$dfixthis = array("", "", "", "");


$_POST['socialsecnum'] = $ss_mod = str_replace($findthis, $dfixthis, $_POST['socialsecnum']);


$_POST['driverslicense'] = $dl_mod = str_replace($findthis, $dfixthis, $_POST['driverslicense']);



//

if( $_POST['socialsecnum'] == '' ){
$_POST['socialsecnum'] = 'DL_'.$_POST['driverslicense'];
}


	
//for new driver signup
// this was OLD YO $_POST['password'] = $_POST['driverslicense'];
//now diff so use temp

//$_POST['password'] = $_POST['cellphone'];

$_POST['password'] = $_POST['driverslicense'];

//$_POST['driverslicense'] = 'tmp';

// new client




$co = $_POST['firstname'].' '.$_POST['lastname'];

// rev 2015 tmp


$getclient_find = $userbasic->newFindCommand('clients1');
//$getclient_find = $userbasic->newFindCommand('clientsemp1');
$getclient_findCriterions = array(


'Client_ID'=>'=='.$_SESSION["nowuser"],


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



//new 2014
// now update from previous

$editclient_edit = $userbasic->newEditCommand('clients1',$getclient_row->getRecordId());


$editclient_fields = array(

//'Phone1'=>$_POST["cellphone"],

//more


// maybe too powerful?

'cl_emp::First'=>$_POST['firstname'],
'cl_emp::Last'=>$_POST['lastname'],



'Billing Company Name'=>$co,
'F Name Billing'=>$_POST['firstname'],
'L Name Billing'=>$_POST['lastname'],

'Company'=>$co,
'cl_emp::telephone'=>$_POST['cellphone'],
'cl_emp::Notify_PhoneVoice'=>$_POST['cellphone'],
'cl_emp::Notify_PhoneText'=>$_POST['cellphone'],
//'Phone1'=>$_POST["cellphone"],
'Phone2'=>$_POST["cellphone"],
'Billing Phone'=>$_POST["cellphone"],

//hmmm these?
'email_Confidential Email'=>$_POST["email"],
//'email_Employee_List Address'=>$_POST["email"],
'cl_emp::Notify_Email'=>$_POST['email'],
'email_Billing Address'=>$_POST['email'],
'client E Mail'=>$_POST['email'],
//'cl_emp::City_Taxi_Permit_No'=>$_POST['permitnum'],
//'cl_emp::City_Taxi_Permit_Expiration'=>$_POST['permitexp'],



//more


//
//'password'=>$_POST['driverslicense'], //hmmm
//"cl_emp::Social_Security"=>$_POST['driverslicense'], //hmmm


//'cl_emp::Drivers_License_No'=>$_POST['driverslicense'], //hmmm



);
foreach($editclient_fields as $key=>$value) {
    $editclient_edit->setField($key,$value);
}

$editclient_result = $editclient_edit->execute(); 

//if(FileMaker::isError($editclient_result)) fmsTrapError($editclient_result,"error.php"); 

$editclient_row = current($editclient_result->getRecords());


// set var here for new reg for automation - after success
//$_SESSION["new_reg"] = 'yes99999';



$_SESSION["now_co"] = $co;


// FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>




<!DOCTYPE html>
<html>
<head>
<!-- 
<meta http-equiv="refresh" content="0; url=client-update-1.php">
-->
<title>Independent Drivers Consortium Update Contractor</title>

<meta name="viewport" content="width=device-width, initial-scale=1"> 

<link rel="stylesheet" href="inc/jq/themes/theme-02.min.css" />
<link rel="stylesheet" href="inc/jq/themes/jquery.mobile.icons.min.css" />

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
 <script>
	$(function(){
		$( "[data-role='header'], [data-role='footer']" ).toolbar();
		});
    </script><!-- -->

<link href="mob.css" rel="stylesheet" type="text/css" />

  
</head>
<body>

<div data-role="header" data-position="fixed" data-theme="a">
<div class="box1" center1>
<img class="center" src="pics/appbanner-320x60-main.png" ></div>
<!--<h1>Page head Title</h1> -->
</div><!-- /header -->

<section id="page01111" data-role="page">
    
<!--	
<div class="box1 center1" >this box fill all<br><br>
<br>
</div> 
-->

<div role="main" class="ui-content">
<div class="content" >
<div class="box1 center1" >
  
      
<!--INSERT START -->

<table border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
   <td  align="center" valign="top">
   
 <!--rrrrrr  <?php //echo $_SESSION["new_reg"]; ?> -->

  <span class="print_data_20">
  
  <br>
  
  - Update Successful - <br>
<br>

<a rel="external" href="client-update.php" class="buttonlink2 center1">Back to Update Index</a> <br>





    
    
    
</span></td>
    </tr>
    
 
  
  
</table>




<br><br>


 


<!--INSERT END -->

</div><!-- end .box -->
</div><!-- end .content -->
</div><!-- /ui-content -->
  
</section><!-- /page -->

<footer data-role="footer" class="ui-barNAH" data-position="fixed" data-theme="a">
<div class="ui-grid-c boxblue">
<?php include('footer-inc.php'); ?>
</div>
</footer>



<!-- /footer -->

</body>
</html>
