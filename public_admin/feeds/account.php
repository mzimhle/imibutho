<?php
/* Add this on all pages on top. */
set_include_path(realpath($_SERVER['DOCUMENT_ROOT']).PATH_SEPARATOR.realpath($_SERVER['DOCUMENT_ROOT']).'/library/classes/');

/**
 * Standard includes
 */
require_once 'config/database.php';
require_once 'config/smarty.php';

require_once 'class/account.php';

$accountObject	= new class_account();

$results 				= array();
$list						= array();	

if(isset($_REQUEST['term'])) {

	$q			= trim($_REQUEST['term']); 
	
	$accountData	= $accountObject->search($q);	

	if($accountData) {
		for($i = 0; $i < count($accountData); $i++) {
			$list[] = array(
				"id" 		=> $accountData[$i]["account_code"],
				"label" 	=> $accountData[$i]['account_name'].' in '.$accountData[$i]['areapost_name'],
				"value" 		=> $accountData[$i]['account_name'].' in '.$accountData[$i]['areapost_name'],
			);			
		}	
	}
}

if(count($list) > 0) {
	echo json_encode($list); 
	exit;
} else {
	echo json_encode(array('id' => '', 'label' => 'no results')); 
	exit;
}
exit;

?>