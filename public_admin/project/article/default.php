<?php/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');/*** Standard includes */require_once 'config/database.php';
require_once 'config/smarty.php';/** * Check for login */require_once 'includes/auth.php';require_once 'class/article.php';$articleObject = new class_article();  if(isset($_GET['delete_code'])) {		$errorArray				= array();	$errorArray['error']	= '';	$errorArray['result']	= 0;		$formValid				= true;	$success					= NULL;	$code						= trim($_GET['delete_code']);			if($errorArray['error']  == '' && $errorArray['result']  == 0 ) {			$data	= array();		$data['article_deleted'] = 1;				$where = $articleObject->getAdapter()->quoteInto('article_code = ?', $code);		$success	= $articleObject->update($data, $where);					if(is_numeric($success) && $success > 0) {			$errorArray['error']	= '';			$errorArray['result']	= 1;					} else {			$errorArray['error']	= 'Could not delete, please try again.';			$errorArray['result']	= 0;						}	}		echo json_encode($errorArray);	exit;}/* Setup Pagination. */if(isset($_GET['action']) && trim($_GET['action']) == 'articlesearch') {	$search = isset($_REQUEST['search']) && trim($_REQUEST['search']) != '' ? trim($_REQUEST['search']) : null;	$start 	= isset($_REQUEST['iDisplayStart']) ? $_REQUEST['iDisplayStart'] : 0;	$length = isset($_REQUEST['iDisplayLength']) ? $_REQUEST['iDisplayLength'] : 20;		$jobData = $articleObject->getProjectSearch($search, $start, $length);	$alljobs = array();	if($jobData) {		for($i = 0; $i < count($jobData['records']); $i++) {			$item = $jobData['records'][$i];			$alljobs[$i] = array(						$item['article_added'],						$item['project_name'],						'<a href="/project/article/details.php?code='.$item['article_code'].'">'.$item['article_name'].'</a>',						$item['article_description'], 						'<button onclick="javascript:deleteitem(\''.$item['article_code'].'\');">Delete</button>');		}	}					if($jobData) {		$response['sEcho'] = $_REQUEST['sEcho'];		$response['iTotalRecords'] = $jobData['displayrecords'];				$response['iTotalDisplayRecords'] = $jobData['count'];		$response['aaData']	= $alljobs;	} else {		$response['result'] 	= false;		$response['message']	= 'There are no items to show.';				}	    echo json_encode($response);    die();	}/* End Pagination Setup. */$smarty->display('project/article/default.tpl');?>