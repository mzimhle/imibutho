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
require_once 'class/event.php';
require_once 'class/comment.php';

$eventObject		= new class_event();
$commentObject 	= new class_comment();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$eventData = $eventObject->getByCode($code);

	if($eventData) {
		$smarty->assign('eventData', $eventData);
		
		$commentData = $commentObject->getByEvent($eventData['event_code']);

		if($commentData) {
			$smarty->assign('commentData', $commentData);
		}	
	} else {
		header('Location: /event/');
		exit;	
	}
	
} else {
	header('Location: /event/');
	exit;	
}

/* Display the template */	
$smarty->display('event/comments.tpl');
?>