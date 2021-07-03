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
require_once 'class/volunteer.php';

$projectObject		= new class_project();
$volunteerObject 	= new class_volunteer();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$projectData = $projectObject->getByCode($code);

	if($projectData) {
		$smarty->assign('projectData', $projectData);
		
		$volunteerData = $volunteerObject->getByVolunteers($projectData['project_code']);

		if($volunteerData) {
			$smarty->assign('volunteerData', $volunteerData);
		}	
	} else {
		header('Location: /project/view/');
		exit;	
	}
	
} else {
	header('Location: /project/view/');
	exit;	
}

/* Display the template */	
$smarty->display('project/view/volunteer.tpl');
?>