<?php
/* Add this on all pages on top. */
set_include_path(realpath($_SERVER['DOCUMENT_ROOT']).PATH_SEPARATOR.realpath($_SERVER['DOCUMENT_ROOT']).'/library/classes/');

/**
 * Standard includes
 */
require_once 'config/database.php';
require_once 'config/smarty.php';

require_once 'class/project.php';

$projectObject	= new class_project();

$results 				= array();
$list						= array();	

if(isset($_REQUEST['term'])) {

	$q			= trim($_REQUEST['term']); 
	
	$projectData	= $projectObject->search($q);	

	if($projectData) {
		for($i = 0; $i < count($projectData); $i++) {
			$list[] = array(
				"id" 		=> $projectData[$i]["project_code"],
				"label" 	=> $projectData[$i]['project_name'].' by '.$projectData[$i]['account_name'],
				"value" 		=> $projectData[$i]['project_name'].' by '.$projectData[$i]['account_name'],
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