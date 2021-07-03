<?php

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/*** Standard includes */
require_once 'config/database.php';
require_once 'config/smarty.php';

/*** Check for login */
require_once 'includes/auth.php';

/* objects. */
require_once 'class/poll.php';

$pollObject	= new class_poll();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$pollData = $pollObject->getByCode($code);
	
	if($pollData) {
		$smarty->assign('pollData', $pollData);
	} else {
		header('Location: /poll/');
		exit;		
	}
}


/* Check posted data. */
if(count($_POST) > 0) {

	$errorArray		= array();
	$data 				= array();
	$formValid		= true;
	$success			= NULL;
	
	if(isset($_POST['poll_question']) && trim($_POST['poll_question']) == '' ) {
		$errorArray['poll_question'] = 'Please add a question';
		$formValid = false;		
	} else if(strlen(trim($_POST['poll_question'])) > 255) {
		$errorArray['poll_question'] = 'characters need to be less than 255 characters';
		$formValid = false;			
	}
	
	if(isset($_POST['poll_date_start']) && trim($_POST['poll_date_start']) != '') {
		if(trim($_POST['poll_date_start']) != date('Y-m-d', strtotime(trim($_POST['poll_date_start'])))) {
			$errorArray['poll_date_start'] = 'Please add a valid start date';
			$formValid = false;		
		}
	} else {
		$errorArray['poll_date_start'] = 'Please add a start date for the poll';
		$formValid = false;
	}
	
	if(isset($_POST['poll_date_end']) && trim($_POST['poll_date_end']) != '') {
		if(trim($_POST['poll_date_end']) != date('Y-m-d', strtotime(trim($_POST['poll_date_end'])))) {
			$errorArray['poll_date_end'] = 'Please add a valid end date';
			$formValid = false;		
		}
	} else {
		$errorArray['poll_date_end'] = 'Please add an end date for the poll';
		$formValid = false;
	}
	
	if(count($errorArray) == 0 && $formValid == true) {
		
		$data 	= array();				
		$data['poll_question']		= trim($_POST['poll_question']);					
		$data['poll_date_start']	= trim($_POST['poll_date_start']).' 00:00:00';		
		$data['poll_date_end']	= trim($_POST['poll_date_end']).' 23:59:59';		
		
		if(!isset($pollData)) {			
			$success = $pollObject->insert($data);				
		} else {
			$where		= $pollObject->getAdapter()->quoteInto('poll_code = ?', $pollData['poll_code']);
			$pollObject->update($data, $where);		
			$success 	= $pollData['poll_code'];			
		}
		
		if(count($errorArray) == 0) {
			header('Location: /poll/');	
			exit;		
		}	
			
	}
	
	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);	
}

$smarty->display('poll/details.tpl');

?>