<?php
if(!session_id()) session_start();
require_once('../Connections/userbasic.php');

//ini_set('display_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
error_reporting(E_ERROR | E_WARNING | E_PARSE);




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


$editclient_edit = $userbasic->newEditCommand('clients1',$getclient_row->getRecordId());


$editclient_fields = array(

'PUC Number'=>$_POST["PUC_Number"],


);
foreach($editclient_fields as $key=>$value) {
    $editclient_edit->setField($key,$value);
}

$editclient_result = $editclient_edit->execute(); 

if(FileMaker::isError($editclient_result)) fmsTrapError($editclient_result,"error.php"); 

$editclient_row = current($editclient_result->getRecords());




// FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>

<!DOCTYPE html>
<html>
<head>


<?php // if (isset($_SESSION["new_reg"]) && $_SESSION["new_reg"] == 'yes')
//$_SESSION["new_reg"] = ''; // set clear YES HERE
//echo '<meta http-equiv="refresh" content="0; url=client-update-info.php">'; ?>

<!--<meta http-equiv="refresh" content="0; url=new-client-application-payprep.php">
 -->
 
<!--<meta http-equiv="refresh" content="0; url=client-contact-info.php">

 -->

<title>Independent Drivers Consortium -  Update Contact Info 4</title>
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

<span class="print_data_22"> <br>
<br>
- Update Successful - <br>
<br>
<a rel="external" href="client-update.php" class="buttonlink2 center1">Back to Update Index</a> <br>
<br>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</span> 

<!-- 
pass

<?php echo $_SESSION["nowpass"]; ?>
<br>user
<?php echo $_SESSION["nowuser"]; ?>

<br>co 
<?php echo $_SESSION["now_co"]; ?>

<br>
--
make edit page
dumppp<br>

<br>

find it

found co 
<?php // echo $client_row->getField('Company'); ?>

<?php // echo $client_row->getField('Contact_First'); ?>



HERE !!!!!!!!!!!!<br>

f <?php echo $_POST['firstname']; ?> - 
l <?php echo $_POST['lastname']; ?> - 
ph <?php echo $_POST['address1']; ?>

<?php echo $_POST['city1']; ?> - 
<?php echo $_POST['state1']; ?> - 
<?php echo $_POST['zip1']; ?>
etc...........

<br><br><br>
  
--> 
<!-- 

<table border="1" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>First Name
    put next here
    </td>
    <td>
    
    
    
<br>

    
    <input name="Contact_First" type="text" value="<?php // echo $getclient_row->getField('Contact_First'); ?>"></td>
  </tr>
  
  
  
</table>

--> 

<!--INSERT END --> 

</div>
<!-- end .box --> 
</div>
<!-- end .content --> 
</div>
<!-- /ui-content --> 

</section>
<!-- /page --> 

<footer data-role="footer" class="ui-barNAH" data-position="fixed" data-theme="a">
<div class="ui-grid-c boxblue">
<?php include('footer-inc.php'); ?>
</div>
</footer>

<!-- /footer -->

</body>
</html>
