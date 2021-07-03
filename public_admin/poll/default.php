<?php

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/*** Standard includes */
require_once 'config/database.php';
require_once 'config/smarty.php';

/**
 * Check for login
 */
require_once 'includes/auth.php';
require_once 'class/poll.php';

$pollObject = new class_poll();
 
 if(isset($_GET['delete_code'])) {
	
	$errorArray				= array();
	$errorArray['error']	= '';
	$errorArray['result']	= 0;	
	$formValid				= true;
	$success					= NULL;
	$code						= trim($_GET['delete_code']);
		
	if($errorArray['error']  == '' && $errorArray['result']  == 0 ) {
		$data	= array();
		$data['poll_deleted'] = 1;
		$data['poll_code'] = $code;
		
		$where = $pollObject->getAdapter()->quoteInto('poll_code = ?', $code);
		$success	= $pollObject->update($data, $where);	
		
		if(is_numeric($success) && $success > 0) {
			$errorArray['error']	= '';
			$errorArray['result']	= 1;			
		} else {
			$errorArray['error']	= 'Could not delete, please try again.';
			$errorArray['result']	= 0;				
		}
	}
	
	echo json_encode($errorArray);
	exit;
}

/* Setup Pagination. */
if(isset($_GET['action']) && trim($_GET['action']) == 'pollsearch') {

	$search = isset($_REQUEST['search']) && trim($_REQUEST['search']) != '' ? trim($_REQUEST['search']) : null;
	$start 	= isset($_REQUEST['iDisplayStart']) ? $_REQUEST['iDisplayStart'] : 0;
	$length = isset($_REQUEST['iDisplayLength']) ? $_REQUEST['iDisplayLength'] : 20;
	
	$jobData = $pollObject->getSearch($search, $start, $length);
	$alljobs = array();

	if($jobData) {
		for($i = 0; $i < count($jobData['records']); $i++) {
			$item = $jobData['records'][$i];
			$alljobs[$i] = array(
						$item['poll_added'],						
						'<a class="'.($item['poll_active'] == 0 ? 'error' : 'success').'" href="/poll/details.php?code='.$item['poll_code'].'">'.$item['poll_question'].'</a>', 
						$item['poll_date_start'],
						$item['poll_date_end'],
						'<button onclick="javascript:deleteitem(\''.$item['poll_code'].'\');">Delete</button>');
		}
	}
				
	if($jobData) {
		$response['sEcho'] = $_REQUEST['sEcho'];
		$response['iTotalRecords'] = $jobData['displayrecords'];		
		$response['iTotalDisplayRecords'] = $jobData['count'];
		$response['aaData']	= $alljobs;
	} else {
		$response['result'] 	= false;
		$response['message']	= 'There are no items to show.';			
	}
	
    echo json_encode($response);
    die();	
}
/* End Pagination Setup. */

$smarty->display('poll/default.tpl');
?>