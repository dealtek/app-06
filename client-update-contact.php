<!DOCTYPE html>
<html>
<head>
<title>Independent Drivers Consortium Client Update Contact</title>

<meta name="viewport" content="width=device-width, initial-scale=1"> 


<!--  -->
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
  

<form action="client-update-contactr.php" method="post" name="thisform" id="thisform" >


<table border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td>
    <p class="print_data_14">
   
     <h1> <span class="red1"> <strong>



     </strong></span>
          
 </h1>
    
<a rel="external" href="client-update.php" class="buttonlink2 center1">Back to Update Index</a> <br>
    
    
    
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
     <span class="red2">*</span>  <span class="print_data_22">First Name: (
     <?php echo $_SESSION["nowuser"]; ?>
     )<br>
</span><div id='thisform_firstname_errorloc' class="error_strings"></div>
      <input name="firstname" type="text" class="print_data_22" value="<?php echo $getclient_row->getField('cl_emp::First'); ?>"></td>
  </tr>
  
<span id="cl_emp_First"></span>
<span id="cl_emp_Last"></span>

  
  <tr>
    <td align="left" valign="top"><span class="red2">*</span> <span class="print_data_22">Last Name:<br>
</span>
<div id='thisform_lastname_errorloc' class="error_strings"></div>
<input name="lastname" type="text" class="print_data_22" value="<?php echo $getclient_row->getField('cl_emp::Last'); ?>"></td>
  </tr>
  
  
  
 
  
  
  
  
  <tr>
    <td align="left" valign="top"><span class="red2">*</span> <span class="print_data_22">Cellphone:<br>
</span>
<div id='thisform_cellphone_errorloc' class="error_strings"></div>
<input name="cellphone" type="text" value="<?php echo $getclient_row->getField('cl_emp::Notify_PhoneVoice'); ?>" class="print_data_22"></td>
  </tr>
 
  
  
<tr align="left" valign="top">
     <td align="left"><span class="print_data_22">
       <span class="red2">*</span> Email Address:<br /></span>
       <div id='thisform_email_errorloc' class="error_strings"></div>
       <span class="print_data_22">
       <input name="email" type="text" value="<?php echo $getclient_row->getField('cl_emp::Notify_Email'); ?>"  class="print_data_22" />
       
 </span></td>
 
  </tr>  
 
 
 
 
 
   <tr>
    <td align="center" valign="top">
      
      <input rel="external" name="new_submit" type="submit" class="buttonform2_24" value="- Continue -" />    </td>
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
$plus365=$t[0]+(86400*365);
$today=date('m/d/Y',$t[0]);
$nextyear=date('m/d/Y',$plus365);
 ?>
      <input name="expdate" type="hidden" value="<?php echo $nextyear; ?>" />
      
      
      <input name="tocnum" type="hidden" value="<?php echo $gettoc_row->getField('type of company number'); ?>" />
      
      
      <?php
	  
	  
$_SESSION["amount"] = $gettoc_row->getField('cert_fee_signup');

$_SESSION["renewamt"] = $gettoc_row->getField('cert_fee_renewal');
	  
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

	
	 frmvalidator.addValidation("email","req","Please enter your Email Address");


//]]></script>

<!--
frmvalidator.addValidation("socialsecnum","req","Please enter your social security number");
    frmvalidator.addValidation("socialsecnum","maxlen=12", "Max length for social security number is 12");
	
 -->

<script>






//document.getElementById('Contact_First').textContent = localStorage.getItem("Contact_First");
//document.getElementById('Contact_Last').textContent = localStorage.getItem("Contact_Last");
document.getElementById('Client_ID').textContent = localStorage.getItem("Client_ID");
document.getElementById('Company').textContent = localStorage.getItem("Company");	
//document.getElementById('Phone1').textContent = localStorage.getItem("Phone1");
document.getElementById('Phone2').textContent = localStorage.getItem("Phone2");
//document.getElementById('Fax').textContent = localStorage.getItem("Fax");
//document.getElementById('Address').textContent = localStorage.getItem("Address");
//document.getElementById('City').textContent = localStorage.getItem("City");
//document.getElementById('State').textContent = localStorage.getItem("State");
//document.getElementById('Zip').textContent = localStorage.getItem("Zip");
document.getElementById('Billing_Company_Name').textContent = localStorage.getItem("Billing_Company_Name");
document.getElementById('F_Name_Billing').textContent = localStorage.getItem("F_Name_Billing");
document.getElementById('L_Name_Billing').textContent = localStorage.getItem("L_Name_Billing");
document.getElementById('Billing_Address').textContent = localStorage.getItem("Billing_Address");
document.getElementById('Billing_City').textContent = localStorage.getItem("Billing_City");
document.getElementById('Billing_State').textContent = localStorage.getItem("Billing_State");
document.getElementById('Billing_Zip').textContent = localStorage.getItem("Billing_Zip");
document.getElementById('Billing_Phone').textContent = localStorage.getItem("Billing_Phone");
//document.getElementById('Billing_Fax').textContent = localStorage.getItem("Billing_Fax");

document.getElementById('email_Billing_Address').textContent = localStorage.getItem("email_Billing_Address");

document.getElementById('cl_emp_First').textContent = localStorage.getItem("cl_emp_First");
document.getElementById('cl_emp_Last').textContent = localStorage.getItem("cl_emp_Last");


document.getElementById('cl_emp_City_Taxi_Permit_No').textContent = localStorage.getItem("cl_emp_City_Taxi_Permit_No");

document.getElementById('cl_emp_City_Taxi_Permit_Expiration').textContent = localStorage.getItem("cl_emp_City_Taxi_Permit_Expiration");

document.getElementById('cl_emp_PUC_Number').textContent = localStorage.getItem("cl_emp_PUC_Number");


















/*
						
				

//document.getElementById('Contact_First').innerHTML = localStorage.getItem("Contact_First");
//document.getElementById('Contact_Last').innerHTML = localStorage.getItem("Contact_Last");
document.getElementById('Client_ID').innerHTML = localStorage.getItem("Client_ID");
document.getElementById('Company').innerHTML = localStorage.getItem("Company");	
//document.getElementById('Phone1').innerHTML = localStorage.getItem("Phone1");
document.getElementById('Phone2').innerHTML = localStorage.getItem("Phone2");
//document.getElementById('Fax').innerHTML = localStorage.getItem("Fax");
//document.getElementById('Address').innerHTML = localStorage.getItem("Address");
//document.getElementById('City').innerHTML = localStorage.getItem("City");
//document.getElementById('State').innerHTML = localStorage.getItem("State");
//document.getElementById('Zip').innerHTML = localStorage.getItem("Zip");
document.getElementById('Billing_Company_Name').innerHTML = localStorage.getItem("Billing_Company_Name");
document.getElementById('F_Name_Billing').innerHTML = localStorage.getItem("F_Name_Billing");
document.getElementById('L_Name_Billing').innerHTML = localStorage.getItem("L_Name_Billing");
document.getElementById('Billing_Address').innerHTML = localStorage.getItem("Billing_Address");
document.getElementById('Billing_City').innerHTML = localStorage.getItem("Billing_City");
document.getElementById('Billing_State').innerHTML = localStorage.getItem("Billing_State");
document.getElementById('Billing_Zip').innerHTML = localStorage.getItem("Billing_Zip");
document.getElementById('Billing_Phone').innerHTML = localStorage.getItem("Billing_Phone");
//document.getElementById('Billing_Fax').innerHTML = localStorage.getItem("Billing_Fax");

document.getElementById('email_Billing_Address').innerHTML = localStorage.getItem("email_Billing_Address");

document.getElementById('cl_emp_First').innerHTML = localStorage.getItem("cl_emp_First");
document.getElementById('cl_emp_Last').innerHTML = localStorage.getItem("cl_emp_Last");

*/	


</script>







 
 
 
 
 
 
 
 
 
 
 
 
 


<!--INSERT END -->

</div><!-- end .box -->
</div><!-- end .content -->
</div><!-- /ui-content -->
  
</section><!-- /page -->
<!--
<footer data-role="footer" class="ui-barNAH" data-position="fixed" data-theme="a">
<div class="ui-grid-c boxblue">
foot
</div>
</footer> -->

<!-- /footer -->

</body>
</html>
