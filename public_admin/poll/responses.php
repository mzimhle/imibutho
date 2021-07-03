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
require_once 'class/pollresponse.php';

$pollObject			= new class_poll();
$pollresponseObject 	= new class_pollresponse();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$pollData = $pollObject->getByCode($code);

	if($pollData) {
		$smarty->assign('pollData', $pollData);
		
		$pollresponseData = $pollresponseObject->getByPoll($pollData['poll_code']);

		if($pollresponseData) {
			$smarty->assign('pollresponseData', $pollresponseData);
		}	
	} else {
		header('Location: /poll/');
		exit;	
	}
	
} else {
	header('Location: /poll/');
	exit;	
}


/* Display the template */	
$smarty->display('poll/answers.tpl');
?>