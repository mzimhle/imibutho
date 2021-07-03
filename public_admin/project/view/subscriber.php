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
require_once 'class/subscriber.php';

$projectObject		= new class_project();
$subscriberObject 	= new class_subscriber();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$projectData = $projectObject->getByCode($code);

	if($projectData) {
		$smarty->assign('projectData', $projectData);
		
		$subscriberData = $subscriberObject->getByProject($projectData['project_code']);

		if($subscriberData) {
			$smarty->assign('subscriberData', $subscriberData);
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
$smarty->display('project/view/subscriber.tpl');
?>