<?php
if(!session_id()) session_start();

//require_once('../Connections/userbasic.php');

//ini_set('display_errors', 1);
//ini_set('display_errors', 1);
//error_reporting(E_ALL | E_STRICT);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

// add space!
$findthis = array("[","]","(",")","/", "-", "," , "."," ");
$dfixthis = array("","","","","", "", "", "","");


//$_POST['cellphone'] = 
$cell_mod = str_replace($findthis, $dfixthis, $_POST['cellphone']);


//$_POST['driverslicense'] = 

$dl_mod = str_replace($findthis, $dfixthis, $_POST['driverslicense']);

$mes = "PLEASE NOTE: It seems you are already in the IDC system.";

$getclient_find = $userbasic->newFindCommand('clients1');
//$getclient_find = $userbasic->newFindCommand('clientsemp1');
$getclient_findCriterions = array(


'type_of_company_number'=>$_POST['conum'],

//'cl_emp::Drivers_License_No'=>'=='.$_POST["driverslicense"],
//'cl_emp::Notify_PhoneText'=>'=='.$_POST["cellphone"],

//'cl_emp::Drivers_License_No'=>'=='.$dl_mod,


//better w no spaces
'pass_c'=>'=='.$dl_mod,
//now have phonecalc w no spaces
'cl_emp::Notify_PhoneText_c'=>'=='.$cell_mod,

);
foreach($getclient_findCriterions as $key=>$value) {
    $getclient_find->AddFindCriterion($key,$value);
}

fmsSetPage($getclient_find,'getclient',10); 

//$getclient_find->SetPreCommandScript('cc_new_client_emp_inv',$randstuff); 

$getclient_result = $getclient_find->execute(); 

//if(FileMaker::isError($getclient_result)) fmsTrapError($getclient_result,"error.php");


if (FileMaker::isError($getclient_result)  == 401  ) {
    $mes = "Proceed.
	<br /><br />"; 
	
	//$_COOKIE['idc_client_id'] = '';
	
	//setcookie('idc_client_id', '');
	
}else{
fmsSetLastPage($getclient_result,'sites',99); 

//$pay_row = current($pay_result->getRecords());

//$pay__Clients_portal = fmsRelatedRecord($pay_row, 'Clients');

fmsSetLastPage($getclient_result,'getclient',10); 

$getclient_row = current($getclient_result->getRecords());

//new 2015

setcookie('idc_client_id', $getclient_row->getField('Client_ID') );
setcookie('nowuser', $getclient_row->getField('Client_ID') );


//$_COOKIE['idc_client_id'] = $getclient_row->getField('Client_ID');
//$_SESSION['nowuser'] = $getclient_row->getField('Client_ID');

}

//set for now

//$mes = "PLEASE NOTE: It seems you are already in the system click to login to your account here.";

//set cookies....


//$_COOKIE['idc_client_id'] = $getclient_row->getField('Client_ID');

// cookies lost on login - why?

//$_COOKIE['idc_client_cellphone'] = $_POST['cellphone'];



//$_COOKIE['idc_client_pass'] = $_POST['driverslicense'];

setcookie('idc_client_cellphone', $_POST['cellphone'] );

//setcookie('idc_client_pass', $_POST['driverslicense'] );
// just do one
setcookie('driverslicense', $_POST['driverslicense'] );


//$_COOKIE['idc_client_pass'] = '222';
//$_COOKIE['idc_client_id'] = '111';

//
$_SESSION['newflag1'] = 'yes';
$_SESSION['nowtoc'] = $_POST['conum'];
$_SESSION['nowlicense'] = $_POST['driverslicense'];
$_SESSION['nowpass'] = $_POST['driverslicense'];
$_SESSION['nowcellphone'] = $_POST['cellphone'];

?>