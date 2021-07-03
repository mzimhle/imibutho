<?php

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/** Standard includes */
require_once 'config/database.php';
require_once 'config/smarty.php';

//include the Zend class for Authentification
require_once 'Zend/Session.php';

// Set up the namespace
$zfsession = new Zend_Session_Namespace('FrontendUser');

// Check if logged in, otherwise redirect
if (!isset($zfsession->identity) || is_null($zfsession->identity) || $zfsession->identity == '') {
	header('Location: /');
	exit;
} else {
	//instantiate the users class
	require_once 'class/account.php';
	$accountObject 	= new class_account();
	
	//get user details by username
	$accountData = $accountObject->getByCode($zfsession->identity);
	
	if($accountData) {
		$smarty->assign('accountData', $accountData);
	} else {
		//header('Location: /');
		//exit;		
	}
}

//display template
$smarty->display('registration/complete/default.tpl');
?>