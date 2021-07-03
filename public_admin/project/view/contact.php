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
require_once 'class/project.php';
require_once 'class/projectcontact.php';

$projectObject			= new class_project();
$projectcontactObject 	= new class_projectcontact();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$projectData = $projectObject->getByCode($code);

	if($projectData) {
		$smarty->assign('projectData', $projectData);
		
		$projectcontactData = $projectcontactObject->getByProject($projectData['project_code']);

		if($projectcontactData) {
			$smarty->assign('projectcontactData', $projectcontactData);
		}	
	} else {
		header('Location: /project/view/');
		exit;	
	}
	
} else {
	header('Location: /project/view/');
	exit;	
}

/* Check posted data. */
if(isset($_GET['projectcontact_code_delete'])) {
	
	$errorArray				= array();
	$errorArray['error']	= '';
	$errorArray['result']	= 0;	
	$formValid				= true;
	$success					= NULL;
	$itemcode					= trim($_GET['projectcontact_code_delete']);
		
	if($errorArray['error']  == '' && $errorArray['result']  == 0 ) {	
		$data	= array();
		$data['projectcontact_deleted'] = 1;
		
		$where		= array();
		$where[]	= $projectcontactObject->getAdapter()->quoteInto('projectcontact_code = ?', $itemcode);
		$where[]	= $projectcontactObject->getAdapter()->quoteInto('project_code = ?', $projectData['project_code']);
		
		$success	= $projectcontactObject->update($data, $where);	
		
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
if(isset($_GET['projectcontact_code_update'])) {
	
	$errorArray				= array();
	$errorArray['error']	= '';
	$errorArray['result']	= 0;
	$data 						= array();
	$success					= NULL;
	$error						= array();
	$itemcode					= trim($_GET['projectcontact_code_update']);

	if(isset($_GET['projectcontact_name']) && trim($_GET['projectcontact_name']) == '') {
		$error[] = 'Full name is required';	
	}

	if(isset($_GET['projectcontact_position']) && trim($_GET['projectcontact_position']) == '') {
		$error[] = 'Position is required';	
	}

	if(isset($_GET['projectcontact_email']) && trim($_GET['projectcontact_email']) != '') {
		if($projectcontactObject->validateEmail(trim($_GET['projectcontact_email'])) == '') {
			$error[] = 'Needs to be a valid email address';
		}
	} else {
		$error[] = 'Email is required';	
	}
	
	if(count($error) == 0) {

		if(isset($_GET['projectcontact_primary']) && trim($_GET['projectcontact_primary']) == $itemcode) {			
			$projectcontactObject->updatePrimaryByProject(trim($_GET['projectcontact_primary']), $projectData['project_code']);			
		}
		
		$data 	= array();		
		$data['projectcontact_name']			= isset($_GET['projectcontact_name']) && trim($_GET['projectcontact_name']) != '' ? trim($_GET['projectcontact_name']) : '';			
		$data['projectcontact_position']		= isset($_GET['projectcontact_position']) && trim($_GET['projectcontact_position']) != '' ? trim($_GET['projectcontact_position']) : '';			
		$data['projectcontact_email']			= isset($_GET['projectcontact_email']) && trim($_GET['projectcontact_email']) != '' ? trim($_GET['projectcontact_email']) : '';			
		$data['projectcontact_cellphone']	= isset($_GET['projectcontact_cellphone']) && trim($_GET['projectcontact_cellphone']) != '' ? trim($_GET['projectcontact_cellphone']) : '';			
		
		$where		= array();
		$where[]	= $projectcontactObject->getAdapter()->quoteInto('projectcontact_code = ?', $itemcode);
		$where[]	= $projectcontactObject->getAdapter()->quoteInto('project_code = ?', $projectData['project_code']);
		$success	= $projectcontactObject->update($data, $where);	

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

	if(isset($_POST['projectcontact_name']) && trim($_POST['projectcontact_name']) == '') {
		$errorArray['projectcontact_name'] = 'Full name is required';
		$formValid = false;		
	}

	if(isset($_POST['projectcontact_position']) && trim($_POST['projectcontact_position']) == '') {
		$errorArray['projectcontact_position'] = 'Position is required';
		$formValid = false;		
	}

	if(isset($_POST['projectcontact_email']) && trim($_POST['projectcontact_email']) != '') {
		if($projectcontactObject->validateEmail(trim($_POST['projectcontact_email'])) == '') {
			$errorArray['projectcontact_email'] = 'Needs to be a valid email address';
			$formValid = false;	
		}
	} else {
		$errorArray['projectcontact_email'] = 'Email is required';
		$formValid = false;		
	}
	
	if(count($errorArray) == 0 && $formValid == true) {
		
		$data = array();
		$data['projectcontact_name']			= trim($_POST['projectcontact_name']);
		$data['projectcontact_position']		= trim($_POST['projectcontact_position']);
		$data['projectcontact_email']			= trim($_POST['projectcontact_email']);
		$data['projectcontact_cellphone']	= trim($_POST['projectcontact_cellphone']);
		$data['project_code']						= $projectData['project_code'];
		
		/* Check for other images. */
		$primary = $projectcontactObject->getPrimaryByProject($projectData['project_code']);		
		
		if($primary) {
			$data['projectcontact_primary']	= 0;
		} else {
			$data['projectcontact_primary']	= 1;
		}
				
		$success	= $projectcontactObject->insert($data);
		
		if($success) {
			header('Location: /project/view/contact.php?code='.$projectData['project_code']);
			exit;		
		}
	}
	
	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);
}

/* Display the template */	
$smarty->display('project/view/contact.tpl');
?>