<?php require_once('../Connections/userbasic.php');
//ini_set('display_errors', 1);
ini_set('display_errors', 0);
error_reporting(E_ALL | E_STRICT);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// YO SOON STRIP SPACES!!!


?>
<?php

$nownum = "";
if(isset($_POST['conum'])) {
$nownum = $_POST['conum'];
}

$gettoc_find = $userbasic->newFindCommand('toc');
$gettoc_findCriterions = array('OnlinePay'=>'=='.'1','type of company number'=>'=='.$nownum);
foreach($gettoc_findCriterions as $key=>$value) {
    $gettoc_find->AddFindCriterion($key,$value);
}

fmsSetPage($gettoc_find,'gettoc',332); 

$gettoc_result = $gettoc_find->execute(); 

if(FileMaker::isError($gettoc_result)) fmsTrapError($gettoc_result,"error-toc.php"); 

fmsSetLastPage($gettoc_result,'gettoc',332); 

$gettoc_row = current($gettoc_result->getRecords());


//new 2015 maybe no need
//$_SESSION["amount"] = $gettoc_row->getField('cert_fee_signup');

$datastuff = 'This is some text to read';


//new search


require_once('new-client-search.php');





 
?>

<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>

<!DOCTYPE html>
<html>
<head>
<title>Independent Drivers Consortium new app cart 1</title>

<meta name="viewport" content="width=device-width, initial-scale=1"> 

<!--<link rel="stylesheet" href="inc/jq/themes/theme-02.min.css" />
<link rel="stylesheet" href="inc/jq/themes/jquery.mobile.icons.min.css" />
 -->
 
 <!--
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
 <script>
	$(function(){
		$( "[data-role='header'], [data-role='footer']" ).toolbar();
		});
    </script> -->

<link href="mob.css" rel="stylesheet" type="text/css" />

  
</head>
<body>

<div data-role="header" data-position="fixed" data-theme="a">
<div class="box1" center1>
<img class="center" src="pics/appbanner-320x60-main.png" ></div>
<!--<h1>Page head Title</h1> -->
</div><!-- /header -->

<section id="page01111" data-role="page">
    


<div role="main" class="ui-content">
<div class="content" >
<div class="box1 center1" >
  
      
<!--INSERT START  width="320" -->
          
<table align="center" border="0">
 
  <tr>
    <td width="10" valign="TOP" background="pics/bk2.jpg"><?php // require_once('nav_left.php'); ?></td>
    <td valign="TOP" align="LEFT" background="pics/stripes_teal_bkgrnd.gif">
    
    
    
    
    <table border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="2" align="center">
    
    
    
      <?php
	  
	
?>    </td>
    <td>&nbsp;</td>
  </tr>
  <?php foreach($gettoc_result->getRecords() as $gettoc_row){ ?>
    <tr>
    <td>
      <span class="big22">
      
      <strong><?php echo $gettoc_row->getField('CommonName'); ?> (<?php echo $gettoc_row->getField('type of company number'); ?>)</strong>
 </span>
   <br />  <br /> 
     
    
   
    
    
  </td>
      <td></td>
      
      <td>&nbsp;</td>
    </tr>
    <?php } ?>
</table>



<div align="center">


 <span class="print_data_18"></span>
 
 <br><br>

 
 
 
<?php if (FileMaker::isError($getclient_result)  == 401  ) { 
// did not find so proceed
?> 
   <strong><span class="print_data_22"><span class="big20">
  <?php echo $mes; ?>
  </span></span> </strong> 
  
  
  
  
  
  

<strong>If This Is Your Contractor Company...</strong><!-- click continue -->

<span class="big22">
<a class="buttonlink2 center1" href="new-client-application-register1.php?id=<?php echo $gettoc_row->getField('type of company number'); ?>" title="cart2">- Continue -</a></span>
    

<strong>Not Your Company?</strong><br />
 
 
<span class="big18"><a class="buttonlink2 center1" href="new-client-application-form-start.php">Go Back</a></span>
  <!--    
<br />

PLEASE READ<br><br>


ADDITIONAL type of Co text here<br><br> -->

</div>
  
  
  
  
  
  
  <?php }else{ 
  ?> 
 
<span class="print_data_20"> <strong><?php echo $mes; ?><br><br>
 <a class="buttonlink2 center1" href="login.php">Click Here to Login to Your IDC Account</a> <br></span>
</strong>
<br>
<strong>Not Your Company?</strong><br />

<span class="big18"><a class="buttonlink2 center1" href="new-client-application-form-start.php">Go Back</a></span>

 
 <?php } 
  ?> 
 
  <!--  
<br>
  modz
  <?php 
echo $cell_mod.'--';
echo $dl_mod;

 ?>
  <br>
  -->
  
 <!-- 
  cook
  
 cell <?php echo $_COOKIE['idc_client_cellphone']; ?>
   
    pass <?php echo $_COOKIE['idc_client_pass']; ?>
   
  DL <?php echo $_COOKIE['driverslicense']; ?>
   
   ID <?php echo $_COOKIE['idc_client_id']; ?>
     -->
    
 <!--<?php 
echo $_COOKIE['idc_client_id'];
echo $_COOKIE['idc_client_pass'];

 ?><br>funn<br>
 
  <?php 
echo $_POST["driverslicense"];
echo $_POST["cellphone"];

 ?>
  -->
 
 
<strong>
<?php 

//echo $datastuff; 

//toc_salestext

//echo nl2br($gettoc_row->getField('toc_salestext')); 




?> </strong>
 </span>





<br />


</td>
  </tr>
</table>







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
</footer>
 -->
<!-- /footer -->

</body>
</html>
