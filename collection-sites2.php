<?php require_once('../Connections/userbasic.php');
// this for medtox or other 

/**/
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
error_reporting(E_ERROR | E_WARNING | E_PARSE);


?>
<?php

$drugsites_find = $userbasic->newFindCommand('col_sites');
$drugsites_findCriterions = array(

'toc_drug'=>$_SESSION['nowtocnum'],


);
foreach($drugsites_findCriterions as $key=>$value) {
    $drugsites_find->AddFindCriterion($key,$value);
}

fmsSetPage($drugsites_find,'drugsites',10); 

//$sites_find->addSortRule('Zip',1,FILEMAKER_SORT_ASCEND);
$drugsites_find->addSortRule('City',1,FILEMAKER_SORT_ASCEND); 

$drugsites_result = $drugsites_find->execute(); 

if (FileMaker::isError($drugsites_result)  == 401  ) {
    $noresultsites = "NOTE: No DRUG sites were found.
	<br /><br />
You may want to call the office."; }
	else{
		fmsSetLastPage($drugsites_result,'sites',99); 

fmsSetLastPage($drugsites_result,'drugsites',10); 

$drugsites_row = current($drugsites_result->getRecords());

}


// ALC


$alcsites_find = $userbasic->newFindCommand('col_sites');
$alcsites_findCriterions = array(

'toc_alco'=>$_SESSION['nowtocnum'],


);
foreach($alcsites_findCriterions as $key=>$value) {
    $alcsites_find->AddFindCriterion($key,$value);
}

fmsSetPage($alcsites_find,'alcsites',10); 

//$sites_find->addSortRule('Zip',1,FILEMAKER_SORT_ASCEND);
$alcsites_find->addSortRule('City',1,FILEMAKER_SORT_ASCEND); 

$alcsites_result = $alcsites_find->execute(); 

if (FileMaker::isError($alcsites_result)  == 401  ) {
    $noresultsites2 = "<br>
<br>
NOTE: No ALCOHOL sites were found.
	<br /><br />
You may want to call the office."; }
	else{
		fmsSetLastPage($alcsites_result,'sites',99); 

fmsSetLastPage($alcsites_result,'alcsites',10); 

$alcsites_row = current($alcsites_result->getRecords());

}



// FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>


<!DOCTYPE html>
<html>
<head>
<title>Independent Drivers Consortium Search for a Lab - COLLECTION SITES</title>

<meta name="viewport" content="width=device-width, initial-scale=1"> 


<!--
 -->
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

<?php include('header-inc.php'); ?>

<!--<h1>Page head Title</h1> -->
</div><!-- /header -->

<section id="page01111" data-role="page">


<div role="main" class="ui-content">
<div class="content" >
<div class="box1 center1" >
  
      
<!--INSERT START -->

<!--<?php //echo $_SESSION['nowtocnum']; ?>
 -->
<strong> 

 
 
<tr>
<td>

</td>


<td>


<form action="" method="get">


<table width="100%" border="0" cellspacing="2" cellpadding="2">
<tr>
<td>


</td>
<td>


</td>
</tr>
</table>





</form>

</td>

<td>



</td>






</tr>
<tr>
<td></td>
<td >


<span class="print_data_16"><strong>You Need A Pre-Employment Drug Test
To Be An Active Driver in the IDC.


<br>

Be Sure To Show The Collectors Notice To Your Collector.
</strong></span>

<br>

<a class="buttonlink7" href="client-testing.php" rel="external"> <span class="bigfont2">Collectors Notice</span> </a><br>

<a class="buttonlink2" href="collection-sites.php" rel="external"> <span class="bigfont2">Drug Testing Collection Sites</span> </a>



</td>
<td></td>
</tr>
</table>



</div>





<?php if (FileMaker::isError($drugsites_result)  == 401  ) { ?> 
   <strong><span class="print_data_22"><span class="big20">
  <?php echo $noresultsites; ?>
  </span></span> </strong> 
  
  <?php }else{ 
  ?> 

<table width="100%" border="0" cellspacing="2" cellpadding="2" background="pics/bk3.jpg">

<tr>
<td></td>
<td align="left"><strong class="big24">DRUG COLLECTION SITES</strong></td>


</tr>


<tr>
<td>MAP</td>
<td align="left">Name</td>


</tr>

<?php foreach($drugsites_result->getRecords() as $drugsites_row){ ?>
 
<tr>
<td width="55" align="center" valign="top" style="background-color: #FFFFFF;">





</td>
<td align="left" valign="top" style="background-color: #FFFFFF;">


 
<!-- toccc 
<?php echo $drugsites_row->getField('toc_links'); ?><br> -->

<!--  no name anymore - now back  -->
<strong>
<?php echo strtoupper($drugsites_row->getField('Name')); ?><br>
</strong>
<!--ucwords strtoupper -->

TEL: 
<?php echo $drugsites_row->getField('Phone'); ?><br>
<?php echo strtoupper($drugsites_row->getField('Address')); ?><br>
 
<strong><?php echo strtoupper($drugsites_row->getField('City')); ?>
, 
<?php echo strtoupper($drugsites_row->getField('State')); ?>
</strong> 
<?php echo $drugsites_row->getField('Zip'); ?><br>
<?php echo $drugsites_row->getField('Days'); ?><br>
<?php echo $drugsites_row->getField('Hours'); ?>


</td>


</tr>

 
 <?php } ?>



</table>


<?php 
	
	} ?>


<?php if (FileMaker::isError($alcsites_result)  == 401  ) { ?> 
   <strong><span class="print_data_22"><span class="big20">
  <?php echo $noresultsites2; ?>
  </span></span> </strong> 
  
  <?php }else{ 
  ?> 

<table width="100%" border="0" cellspacing="2" cellpadding="2" background="pics/bk3.jpg">

<tr>
<td></td>
<td align="left"><strong class="big22">ALCOHOL COLLECTION SITES</strong></td>


</tr>


<tr>
<td>MAP</td>
<td align="left">Name</td>



</tr>

<?php foreach($alcsites_result->getRecords() as $alcsites_row){ ?>
 
<tr>
<td width="55" align="center" valign="top" style="background-color: #FFFFFF;">


</td>
<td align="left" valign="top" style="background-color: #FFFFFF;">



 
<!-- toccc 
<?php echo $alcsites_row->getField('toc_links'); ?><br> -->

<!--<strong> no name anymore now back -->
<?php echo strtoupper($alcsites_row->getField('Name')); ?><br>
</strong>
<!--ucwords strtoupper -->


TEL: <?php echo $alcsites_row->getField('Phone'); ?><br>
<?php echo strtoupper($alcsites_row->getField('Address')); ?><br>
 
<strong><?php echo strtoupper($alcsites_row->getField('City')); ?>, <?php echo strtoupper($alcsites_row->getField('State')); ?></strong> 
<?php echo $alcsites_row->getField('Zip'); ?><br>
<?php echo $alcsites_row->getField('Days'); ?><br>
<?php echo $alcsites_row->getField('Hours'); ?>


</td>


</tr>

 
 <?php } ?>


</table>



<?php 
	
	} ?>






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
