<?php
if(!session_id()) session_start();
echo '<?xml version="1.0" encoding="utf-8"?>';
require_once('../Connections/userbasic.php');

//ini_set('display_errors', 1);
//error_reporting(E_ALL | E_STRICT);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

$getclient_find = $userbasic->newFindCommand('clients1');
//$getclient_find = $userbasic->newFindCommand('clientsemp1');
$getclient_findCriterions = array(

//
'Client_ID'=>'=='.$_SESSION["nowuser"],

//'Client_ID'=>'=='.'44864 ',

//'z_webtmp'=>'=='.$rand,

);
foreach($getclient_findCriterions as $key=>$value) {
    $getclient_find->AddFindCriterion($key,$value);
}

fmsSetPage($getclient_find,'getclient',10); 

//$getclient_find->SetPreCommandScript('cc_new_client_emp_inv',$randstuff); 

$getclient_result = $getclient_find->execute(); 

if(FileMaker::isError($getclient_result)) fmsTrapError($getclient_result,"error.php"); 

fmsSetLastPage($getclient_result,'getclient',10); 

$getclient_row = current($getclient_result->getRecords());


// FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>

<!DOCTYPE html>
<html>
<head>
<title>Independent Drivers Consortium Update Main Info 1</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 

this kills submit fixxxxxxx  
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





<style type="text/css" xml:space="preserve">
BODY, P,TD{ font-family: Arial,Verdana,Helvetica, sans-serif; font-size: 10pt }
A{font-family: Arial,Verdana,Helvetica, sans-serif;}
B {	font-family : Arial, Helvetica, sans-serif;	font-size : 12px;	font-weight : bold;}
.error_strings{ font-family:Verdana; font-size:14px; color:#F00; }
</style><script language="JavaScript" src="../admin/inc/gen_validatorv4.js"
type="text/javascript" xml:space="preserve"></script>




</head>
<body>
<div data-role="header" data-position="fixed" data-theme="a">
<div class="box1" center1> <img class="center" src="pics/appbanner-320x60-main.png" ></div>
<!--<h1>Page head Title</h1> --> 
</div>
<!-- /header -->

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
<br>
<a rel="external" href="client-update.php" class="buttonlink2 center1">Back to Update Index</a> <br>
<table width="320" align="center" border="0">
<!-- <tr>
    <td colspan="2" valign="TOP"></td>
  </tr> -->
<tr>
<td width="1" valign="TOP" background="pics/bk2.jpg"></td>
<td valign="TOP" align="center" background="pics/stripes_teal_bkgrnd.gif"><table width="95%" border="0" cellspacing="2" cellpadding="2">
<form action="client-update-4r.php" method="post" name="thisform" id="thisform">

<tr align="left" valign="top">
<td align="center">



<span class="print_data_20">
Fill out your  <br>
<strong>CA PUC TCP Number</strong> <br>
- then click CONTINUE </span>
<!--<span class="red2">* = Required</span> -->

</td>
</tr>
<tr align="left" valign="top">
<td align="left"></td>
</tr>


<tr align="left" valign="top">
<td align="left"><span class="print_data_22"><span class="red2">*</span> CA PUC TCP Number: 
<!--(ID: <?php // echo $_SESSION["nowuser"]; ?>) --><br />

<!-- YO DUPES IN HERE FOR NOW ok<br> update 1 reg is temp fpr temp fields

-->
</span>
<div id='thisform_address1_errorloc' class="error_strings"></div>
<span class="print_data_22">
<input name="PUC_Number" type="text" class="print_data_22" value="<?php echo $getclient_row->getField('PUC Number'); ?>"  />
</span></td>
</tr>


<!--

<tr align="left" valign="top">
<td align="left"><span class="print_data_22"><span class="red2">* </span>PUC Number:<br />
</span>
<div id='thisform_city1_errorloc' class="error_strings"></div>
<span class="print_data_22">
<input name="PUC Number" type="text" value="<?php echo $getclient_row->getField('PUC Number'); ?>" class="print_data_22" />
</span></td>
</tr> -->



<tr align="left" valign="top">
<td align="center"><span class="print_data_22"> Submit: <br />
<input rel="external" name="new_submit" type="submit" class="buttonform2_24" value="- Continue -" />

<!--hidden -->


<br></td>
</tr>
</form>
<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("thisform");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
<!--
    frmvalidator.addValidation("firstname","req","Please enter your First Name");
    frmvalidator.addValidation("firstname","maxlen=30",	"Max length for FirstName is 30");
	
	frmvalidator.addValidation("lastname","req","Please enter your Last Name");
    frmvalidator.addValidation("lastname","maxlen=30",	"Max length for Last Name is 30");
	
	frmvalidator.addValidation("address1","req","Please enter your address1 ");
    frmvalidator.addValidation("address1","maxlen=60",	"Max length for address1 is 60");
	
	
	
	frmvalidator.addValidation("city1","req","Please enter your city1 ");
    frmvalidator.addValidation("city1","maxlen=30",	"Max length for city1  is 30");
	
	
	frmvalidator.addValidation("zip1","req","Please enter your zip1 ");
    frmvalidator.addValidation("zip1","maxlen=20",	"Max length for zip1  is 20");
	
	
	

	frmvalidator.addValidation("cellphone","req","Please enter your cellphone");
    frmvalidator.addValidation("cellphone","maxlen=20", "Max length for cellphone is 20");

	frmvalidator.addValidation("driverslicense","req","Please enter your driverslicense");
    frmvalidator.addValidation("driverslicense","maxlen=20", "Max length for driverslicense is 20");

	frmvalidator.addValidation("socialsecnum","req","Please enter your social security number");
    frmvalidator.addValidation("socialsecnum","maxlen=12", "Max length for social security number is 12");
 -->

//]]></script>
</table></td>
</tr>
</table>

<!--INSERT END --> 

</div>
<!-- end .box --> 
</div>
<!-- end .content --> 
</div>
<!-- /ui-content --> 

</section>
<!-- /page --> 
<!--
<footer data-role="footer" class="ui-barNAH" data-position="fixed" data-theme="a">
<div class="ui-grid-c boxblue">
<?php include('footer-inc.php'); ?>
</div>
</footer>

 -->

<!-- /footer -->

</body>
</html>
