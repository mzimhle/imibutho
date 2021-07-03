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
require_once 'class/video.php';
require_once 'class/comment.php';

$videoObject		= new class_video();
$commentObject 	= new class_comment();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$videoData = $videoObject->getByCode($code);

	if($videoData) {
		$smarty->assign('videoData', $videoData);
		
		$commentData = $commentObject->getByVideo($videoData['video_code']);

		if($commentData) {
			$smarty->assign('commentData', $commentData);
		}	
	} else {
		header('Location: /project/video/');
		exit;	
	}
	
} else {
	header('Location: /project/video/');
	exit;	
}

/* Display the template */	
$smarty->display('project/video/comments.tpl');
?>