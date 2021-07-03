<?php

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/**
 * Standard includes
 */
require_once 'config/database.php';
require_once 'config/smarty.php';

require_once 'includes/auth.php';

/* objects. */
require_once 'class/poll.php';
require_once 'class/pollquestion.php';

$pollObject			= new class_poll();
$pollquestionObject 	= new class_pollquestion();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$pollData = $pollObject->getByCode($code);

	if($pollData) {
		$smarty->assign('pollData', $pollData);
		
		$pollquestionData = $pollquestionObject->getByPoll($pollData['poll_code']);

		if($pollquestionData) {
			$smarty->assign('pollquestionData', $pollquestionData);
		}	
	} else {
		header('Location: /poll/');
		exit;	
	}
	
} else {
	header('Location: /poll/');
	exit;	
}

/* Check posted data. */
if(isset($_GET['pollquestion_code_delete'])) {
	
	$errorArray				= array();
	$errorArray['error']	= '';
	$errorArray['result']	= 0;	
	$formValid				= true;
	$success					= NULL;
	$itemcode					= trim($_GET['pollquestion_code_delete']);
		
	if($errorArray['error']  == '' && $errorArray['result']  == 0 ) {	
		$data	= array();
		$data['pollquestion_deleted'] = 1;
		
		$where		= array();
		$where[]	= $pollquestionObject->getAdapter()->quoteInto('pollquestion_code = ?', $itemcode);
		$where[]	= $pollquestionObject->getAdapter()->quoteInto('poll_code = ?', $pollData['poll_code']);
		
		$success	= $pollquestionObject->update($data, $where);	
		
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

/* Check posted data. */
if(isset($_GET['pollquestion_code_update'])) {
	
	$errorArray				= array();
	$errorArray['error']	= '';
	$errorArray['result']	= 0;
	$data 						= array();
	$success					= NULL;
	$error						= array();
	$itemcode					= trim($_GET['pollquestion_code_update']);

	if(isset($_GET['pollquestion_text']) && trim($_GET['pollquestion_text']) == '') {
		$error[] = 'An answer to the question is required';	
	}
	
	if(count($error) == 0) {

		if(isset($_GET['pollquestion_correct']) && trim($_GET['pollquestion_correct']) == $itemcode) {			
			$pollquestionObject->updatePrimaryByPoll(trim($_GET['pollquestion_correct']), $pollData['poll_code']);			
		}
		
		$data 	= array();		
		$data['pollquestion_text']			= isset($_GET['pollquestion_text']) && trim($_GET['pollquestion_text']) != '' ? trim($_GET['pollquestion_text']) : '';				
		
		$where		= array();
		$where[]	= $pollquestionObject->getAdapter()->quoteInto('pollquestion_code = ?', $itemcode);
		$where[]	= $pollquestionObject->getAdapter()->quoteInto('poll_code = ?', $pollData['poll_code']);
		$success	= $pollquestionObject->update($data, $where);	

		if(is_numeric($success)) {		
			$errorArray['error']	= '';
			$errorArray['result']	= 1;			
		} else {
			$errorArray['error']	= 'Could not update, please try again.';
			$errorArray['result']	= 0;				
		}
	}
	
	$errorArray['error'] = count($error) > 0 ? implode("\r\n",$error) : '';
	
	echo json_encode($errorArray);
	exit;
}

/* Check posted data. */
if(count($_POST) > 0) {

	$errorArray	= array();
	$data 			= array();
	$formValid	= true;
	$success		= NULL;

	if(isset($_POST['pollquestion_text']) && trim($_POST['pollquestion_text']) == '') {
		$errorArray['pollquestion_text'] = 'Please add an optional response to the question';
		$formValid = false;		
	}
	
	if(count($errorArray) == 0 && $formValid == true) {
		
		$data = array();
		$data['pollquestion_text']	= trim($_POST['pollquestion_text']);
		$data['poll_code']				= $pollData['poll_code'];
		
		/* Check for other images. */
		$primary = $pollquestionObject->getPrimaryByPoll($pollData['poll_code']);		
		
		if($primary) {
			$data['pollquestion_correct']	= 0;
		} else {
			$data['pollquestion_correct']	= 1;
		}
				
		$success	= $pollquestionObject->insert($data);
		
		if($success) {
			header('Location: /poll/answers.php?code='.$pollData['poll_code']);
			exit;		
		}
	}
	
	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);
}

/* Display the template */	
$smarty->display('poll/answers.tpl');
?>