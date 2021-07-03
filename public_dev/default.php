<?php

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/*** Standard includes */
require_once 'config/database.php';
require_once 'config/smarty.php';

/* objects. */
require_once 'class/participant.php';
require_once 'class/File.php';

require_once 'global_functions.php';

/* include the Zend class for Authentification */
require_once 'Zend/Session.php';

/* Set up the namespace */
if(isset($zfsession)) {
	$zfsession = $zfsession->identity = null; 
	unset($zfsession, $zfsession->identity);
}

$zfsession 			= new Zend_Session_Namespace('FrontendUser');

$participantObject 	= new class_participant();

/* Check posted data. */
if(count($_POST) > 0) {
	$errorArray		= array();
	$data 				= array();
	$formValid		= true;
	$success			= NULL;
	$submit				= isset($_REQUEST['formSubmission']) && trim($_REQUEST['formSubmission']) != '' ? trim($_REQUEST['formSubmission']) : null;
	
	if($submit == 'initiative') {
		/* Submission as an initiative. */	
		if(isset($_POST['initiative_name']) && trim($_POST['initiative_name']) == '') {
			$errorArray['initiative_name'] = 'Required';
			$formValid = false;		
		}
		
		if(isset($_POST['initiative_email']) && trim($_POST['initiative_email']) != '') {
			if($participantObject->validateEmail(trim($_POST['initiative_email'])) == '') {
				$errorArray['initiative_email'] = 'Valid email required';
				$formValid = false;	
			}
		} else {
			$errorArray['initiative_email'] = 'Required';
			$formValid = false;			
		}
		
		if(isset($_POST['initiative_areapostcode']) && trim($_POST['initiative_areapostcode']) == '') {
			$errorArray['initiative_areapostcode'] = 'Required';
			$formValid = false;		
		}
		
		if(isset($_POST['initiative_description']) && trim($_POST['initiative_description']) == '') {
			$errorArray['initiative_description'] = 'Required';
			$formValid = false;		
		}
		
		if(count($errorArray) == 0 && $formValid == true) {

			$data 	= array();	
			$data['participant_name']			= trim($_POST['initiative_name']);	
			$data['participant_email']			= trim($_POST['initiative_email']);
			$data['areapost_code']				= trim($_POST['initiative_areapostcode']);
			$data['participant_description']	= trim($_POST['initiative_description']);
			$data['participant_reference']		= 'INITIATIVE';
			$data['participant_active']	= 0;
			
			$success = $participantObject->insertParticipant($data, 'EMAIL');		
			
			if($success) {
				/* Setup the login variables. */
				$zfsession->identity		= $success;
				
				// redirect to the success page. 
				header('Location: /registration/complete/');
				exit;		
			}
				
		}
	} else if($submit == 'volunteer') {
		/* Submission as an volunteer. */	
		if(isset($_POST['participant_name']) && trim($_POST['participant_name']) == '') {
			$errorArray['participant_name'] = 'Required';
			$formValid = false;		
		}
		
		if(isset($_POST['participant_email']) && trim($_POST['participant_email']) != '') {
			if($participantObject->validateEmail(trim($_POST['participant_email'])) == '') {
				$errorArray['participant_email'] = 'Valid email required';
				$formValid = false;	
			}
		} else {
			$errorArray['participant_email'] = 'Required';
			$formValid = false;			
		}
		
		if(isset($_POST['areapost_code']) && trim($_POST['areapost_code']) == '') {
			$errorArray['areapost_code'] = 'Required';
			$formValid = false;		
		}
		
		if(count($errorArray) == 0 && $formValid == true) {

			$data 	= array();	
			$data['participant_name']			= trim($_POST['participant_name']);	
			$data['participant_email']			= trim($_POST['participant_email']);
			$data['areapost_code']				= trim($_POST['areapost_code']);
			$data['participant_reference']		= 'VOLUNTEER';
			$data['participant_active']	= 0;
			
			$success = $participantObject->insertParticipant($data, 'EMAIL');		
			
			if($success) {
				/* Setup the login variables. */
				$zfsession->identity		= $success;
				
				// redirect to the success page. 
				header('Location: /registration/complete/');
				exit;		
			}	
		}	
	}
	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);	
}

/* Display the template */	
$smarty->display('default.tpl');
?>