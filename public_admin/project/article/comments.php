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
require_once 'class/article.php';
require_once 'class/comment.php';

$articleObject		= new class_article();
$commentObject 	= new class_comment();

if (isset($_GET['code']) && trim($_GET['code']) != '') {
	
	$code = trim($_GET['code']);
	
	$articleData = $articleObject->getByCode($code);

	if($articleData) {
		$smarty->assign('articleData', $articleData);
		
		$commentData = $commentObject->getByArticle($articleData['article_code']);

		if($commentData) {
			$smarty->assign('commentData', $commentData);
		}	
	} else {
		header('Location: /project/article/');
		exit;	
	}
	
} else {
	header('Location: /project/article/');
	exit;	
}

/* Display the template */	
$smarty->display('project/article/comments.tpl');
?>