<?php
if(!session_id()) session_start();
echo '<?xml version="1.0" encoding="utf-8"?>';
require_once('../Connections/userbasic.php');

//had to rearrange top lines to kill errors
//ini_set('display_errors', 1);
//ini_set('display_errors', 0);
//error_reporting(E_ALL | E_STRICT);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

$gettoc_find = $userbasic->newFindCommand('toc');
$gettoc_findCriterions = array('type of company number'=>'=='.$_GET['id'],);
foreach($gettoc_findCriterions as $key=>$value) {
    $gettoc_find->AddFindCriterion($key,$value);
}

fmsSetPage($gettoc_find,'gettoc',10); 

$gettoc_result = $gettoc_find->execute(); 

if(FileMaker::isError($gettoc_result)) fmsTrapError($gettoc_result,"error.php"); 

fmsSetLastPage($gettoc_result,'gettoc',10);
$gettoc_row = current($gettoc_result->getRecords());


$_SESSION["new_reg"] = ''; // set clear

//set more

//
$_SESSION['nowtocname'] = $gettoc_row->getField('CommonName');
//
$_SESSION['nowtocnum'] = $gettoc_row->getField('type of company number');

$_SESSION['nowtoctype'] = $gettoc_row->getField('type of consortium');


// FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>


<!DOCTYPE html>
<html>
<head>
<title>Independent Drivers Consortium - Reg 1</title>

<meta name="viewport" content="width=device-width, initial-scale=1"> 
<!--

jqm clash and stops submit


<link rel="stylesheet" href="inc/jq/themes/theme-02.min.css" />
<link rel="stylesheet" href="inc/jq/themes/jquery.mobile.icons.min.css" />

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
 <script>
	$(function(){
		$( "[data-role='header'], [data-role='footer']" ).toolbar();
		});
    </script> -->

<link href="mob.css" rel="stylesheet" type="text/css" />





<style type="text/css" xml:space="preserve">
BODY, P,TD{ font-family: Arial,Verdana,Helvetica, sans-serif; font-size: 10pt }
A{font-family: Arial,Verdana,Helvetica, sans-serif;}
B {	font-family : Arial, Helvetica, sans-serif;	font-size : 12px;	font-weight : bold;}
.error_strings{ font-family:Verdana; font-size:14px; color:#F00; }
</style><script language="JavaScript" src="../admin/inc/gen_validatorv4.js"
type="text/javascript" xml:space="preserve"></script>



<style type="text/css">

input999
{
	-moz-border-radius: 11px;
	border-radius: 11px;
	border: 1px solid #CCC;
	padding: .2em;
 	margin: .2em 0;
	
}

.label_16g999 {
	color: #999999;
	font-size: 16px;
}

.big24999 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFF;
	background-color: #6290ee;
	font-size: 24px;
}

</style>


  
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
  

<form action="new-client-application-register2_newrec.php" method="post" name="thisform" id="thisform" >


<table border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td>
   
    
     <h1> <span class="red1"> <strong>
	 
	 <?php echo $_SESSION['nowtocname']; ?>
	 
	 <?php // echo $gettoc_row->getField('CommonName'); ?>
     
     </strong></span>
          
 </h1>
    
    
    
    
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
   <!--
    tmppppp gum
    
    <?php 
	
	$gum = '1111dd11';
	echo $gum; 
	
	
	//$_COOKIE['gum'] = $gum;
	
	setcookie('gum', $gum );
	
	//echo $_COOKIE['gum'];


	?> -->
    
  <!--  <br><br>
    
  cell  <?php // echo $_COOKIE['idc_client_cellphone']; ?>
   
   dl <?php // echo $_COOKIE['driverslicense']; ?>
    -->

    
    
    
    
     <span class="red2">*</span>  <span class="label_16g">First Name:<br>
</span><div id='thisform_firstname_errorloc' class="error_strings"></div>
      <input name="firstname" type="text" class="print_data_22" value=""></td>
  </tr>
  <tr>
    <td align="left" valign="top"><span class="red2">*</span> <span class="label_16g">Last Name:<br>
</span>
<div id='thisform_lastname_errorloc' class="error_strings"></div>
<input name="lastname" type="text" class="print_data_22" value=""></td>
  </tr>
  <tr>
    <td align="left" valign="top"><span class="red2">*</span> <span class="label_16g">Social Security Number: <!--(optional) --><br>
</span>

<div id='thisform_socialsecnum_errorloc' class="error_strings"></div>
<input name="socialsecnum" type="text" value=""  class="print_data_22" /> 


</td>
  </tr>
  
 
  
  
  <tr>
    <td align="left" valign="top"><span class="red2">*</span> <span class="label_18g">Cellphone:<br>
</span>
<div id='thisform_cellphone_errorloc' class="error_strings"></div>
<input name="cellphone" type="text" value="<?php echo $_COOKIE['idc_client_cellphone']; ?>" class="print_data_22"></td>
  </tr>
  
  
  
   

    
  
  
<tr align="left" valign="top">
     <td align="left"><span class="label_18g">
       <span class="red2">*</span> Driver's License Number:<br />
 
       
       </span>
       <div id='thisform_driverslicense_errorloc' class="error_strings"></div>
       <span class="print_data_22">
       
       
        <input name="driverslicense" type="text" value="<?php echo $_COOKIE['driverslicense']; ?>"  class="print_data_22" /> 
        
 </span></td>
  </tr>  

  
<tr align="left" valign="top">
     <td align="left"><span class="label_18g">
       <span class="red2">*</span> Email Address:<br /></span>
       <div id='thisform_email_errorloc' class="error_strings"></div>
       <span class="print_data_22">
       <input name="email" type="text" value=""  class="print_data_22" />
        
 </span></td>
 
  </tr>  
  
  
  
<tr align="left" valign="top">
     <td align="left"><span class="label_18g">
       <span class="red2">*</span> CA PUC Number: (optional)<br /></span>
       <div id='thisform_email_errorloc' class="error_strings"></div>
       <span class="print_data_22">
       <input name="PUC_Number" type="text" value=""  class="print_data_22" />
        
 </span></td>
 
  </tr>  
 
 
 
 
   <tr>
    <td align="left" valign="top">
      
      <input name="new_submit" type="submit" class="buttonform2_24" value="- Continue -" />    </td>
    </tr>
  
  
  
  <tr>
    <td>
    
    
   
    <!--HIDDEN -->
      
    <!--  no need now but maybe later -->
      
      <input name="optmailinv" type="hidden" value="" />
      
      <input name="password" type="hidden" value="" />
      
      
  
      
      <?php  
	  
date_default_timezone_set("America/Los_Angeles");
$t=getdate();
$plus365=$t[0]+(86400*366); // add 1 more day 366
$today=date('m/d/Y',$t[0]);
$nextyear=date('m/d/Y',$plus365);
 ?>
      <input name="expdate" type="hidden" value="<?php echo $nextyear; ?>" />
      
      
      <input name="tocnum" type="hidden" value="<?php echo $gettoc_row->getField('type of company number'); ?>" />
      
      
      <?php
	  
	  
$_SESSION['amount'] = $gettoc_row->getField('cert_fee_signup');

$_SESSION['renewamt'] = $gettoc_row->getField('cert_fee_renewal');
	  
	   //echo $gettoc_row->getField('cert_fee_signup');
	  // echo $_SESSION["fee"];
	   
	    ?>
      
      <!-- don't need certfeesignup? YES WE DO FOR CARD-->
      
      <input name="certfeesignup" type="hidden" value="<?php echo $_SESSION["amount"]; ?>" />
      
      <input name="datetoday" type="hidden" value="<?php echo $today; ?>" />
      
      <input name="zweb_nopay" type="hidden" value="1" />  
     
  <input name="password" type="hidden" value="111">
     
  <?php // echo $today; ?>
   
      
</td>
  </tr>
  
</table>


</form>



<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("thisform");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("firstname","req","Please enter your First Name");
    frmvalidator.addValidation("firstname","maxlen=30",	"Max length for FirstName is 30");
	
	frmvalidator.addValidation("lastname","req","Please enter your Last Name");
    frmvalidator.addValidation("lastname","maxlen=30",	"Max length for Last Name is 30");
	
	
	
	
	

	frmvalidator.addValidation("cellphone","req","Please enter your cellphone");
    frmvalidator.addValidation("cellphone","maxlen=20", "Max length for cellphone is 20");

	frmvalidator.addValidation("driverslicense","req","Please enter your drivers license");
    frmvalidator.addValidation("driverslicense","maxlen=20", "Max length for drivers license is 20");

	
	 
	 frmvalidator.addValidation("socialsecnum","req","Please enter your social security number");
    frmvalidator.addValidation("socialsecnum","maxlen=12", "Max length for social security number is 12");


//]]></script>

<!--frmvalidator.addValidation("email","req","Please enter your Email Address"); -->



<br>

<!--INSERT END -->

</div><!-- end .box -->
</div><!-- end .content -->
</div><!-- /ui-content -->
  
</section><!-- /page -->
<!--
<footer data-role="footer" class="ui-barNAH" data-position="fixed" data-theme="a">
<div class="ui-grid-c boxblue">
<?php include('footer-inc.php'); ?>
</div>
</footer> -->

<!-- /footer -->

</body>
</html>
