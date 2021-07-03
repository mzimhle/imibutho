<?php

/* Add this on all pages on top. */
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/library/classes/');

/*** Standard includes */
require_once 'config/database.php';
require_once 'config/smarty.php';

/* objects. */
require_once 'class/account.php';
require_once 'class/File.php';

require_once 'global_functions.php';

/* include the Zend class for Authentification */
require_once 'Zend/Session.php';

/* Set up the namespace */
if(isset($zfsession)) {
	$zfsession = $zfsession->identity = null; 
	unset($zfsession, $zfsession->identity);
}

$zfsession 			= new Zend_Session_Namespace('FrontendUser');

$accountObject 			= new class_account();
$fileObject 			= new File(array('gif', 'png', 'jpg', 'jpeg', 'gif'));

/* Check posted data. */
if(count($_POST) > 0) {
	$errorArray		= array();
	$data 				= array();
	$formValid		= true;
	$success			= NULL;
	$areaByName	= NULL;
	
	if(isset($_POST['areapost_code']) && trim($_POST['areapost_code']) == '') {
		$errorArray['areapost_code'] = 'required';
		$formValid = false;		
	}
	
	if(isset($_POST['account_name']) && trim($_POST['account_name']) == '') {
		$errorArray['account_name'] = "required";
		$formValid = false;		
	}
	
	if(isset($_POST['account_email']) && trim($_POST['account_email']) != '') {
		if($accountObject->validateEmail(trim($_POST['account_email'])) == '') {
			$errorArray['account_email'] = 'invalid';
			$formValid = false;	
		} else {

			$emailData = $accountObject->getByEmail(trim($_POST['account_email']));
			
			if($emailData) {
				$errorArray['account_email'] = 'Email already being used by another account';
				$formValid = false;				
			}
		}
	} else {
		$errorArray['account_email'] = 'An email is required';
		$formValid = false;				
	}
	
	if(isset($_FILES['profileimage'])) {
		/* Check validity of the CV. */
		if((int)$_FILES['profileimage']['size'] != 0 && trim($_FILES['profileimage']['name']) != '') {
			/* Check if its the right file. */
			$ext = $fileObject->file_extention($_FILES['profileimage']['name']); 

			if($ext != '') {				
				$checkExt = $fileObject->getValidateExtention('profileimage', $ext);	
		
				if(!$checkExt) {
					$errorArray['profileimage'] = 'Invalid file type.';
					$formValid = false;						
				}
			} else {
				$errorArray['profileimage'] = 'Invalid file type';
				$formValid = false;									
			}
		} else {			
			switch((int)$_FILES['profileimage']['error']) {
				case 1 : $errorArray['profileimage'] = 'The uploaded file exceeds the maximum upload file size, should be less than 1M'; $formValid = false; break;
				case 2 : $errorArray['profileimage'] = 'File size exceeds the maximum file size'; $formValid = false; break;
				case 3 : $errorArray['profileimage'] = 'File was only partically uploaded, please try again'; $formValid = false; break;
				//case 4 : $errorArray['profileimage'] = 'No file was uploaded'; $formValid = false; break;
				case 6 : $errorArray['profileimage'] = 'Missing a temporary folder'; $formValid = false; break;
				case 7 : $errorArray['profileimage'] = 'Faild to write file to disk'; $formValid = false; break;
			}
		}
	}
	
	if(count($errorArray) == 0 && $formValid == true) {
		
		$data 	= array();				
		$data['account_name']	= trim($_POST['account_name']);		
		$data['account_email']	= trim($_POST['account_email']);			
		$data['areapost_code']	= trim($_POST['areapost_code']);
		$data['account_active']	= 0;

		$success = $accountObject->insert($data);	
		$zfsession->identity		= $success;			
		
		/* Upload image if its added. */
		if((int)$_FILES['profileimage']['size'] != 0 && trim($_FILES['profileimage']['name']) != '') {
			
			$image = array();
			$image['account_image_name']	= $accountObject->createFile();
			$image['account_image_path']		= '';
			$image['account_image_ext']		= '';
			
			$ext 						= strtolower($fileObject->file_extention($_FILES['profileimage']['name']));					
			$filename				= $image['account_image_name'].'.'.$ext;			
			$directory				= $_SERVER['DOCUMENT_ROOT'].'/media/account/'.$success.'/';
			$file						= $directory.$filename;	
			
			if(!is_dir($directory)) mkdir($directory, 0777, true);

			/* Create files for this product type. */
			foreach($fileObject->image as $item) {
				
				$newfilename = str_replace($filename, $item['code'].$filename, $file);
				
				/* Create new file and rename it. */
				$uploadObject	= PhpThumbFactory::create($_FILES['profileimage']['tmp_name']);
				$uploadObject->resize($item['width'], $item['height']);
				$uploadObject->save($newfilename);
			
			}

			$image['account_image_path']	= '/media/account/'.$success.'/';
			$image['account_image_ext']		= '.'.$ext;
			$image['account_code'] 				= $success;
			
			$where = $accountObject->getAdapter()->quoteInto('account_code = ?', $success);
			$accountObject->update($image, $where);			
		
		}
		
		if(count($errorArray) == 0) {
			// redirect to the success page. 
			header('Location: /registration/complete/');
			exit;
		}	
			
	}
	
	/* if we are here there are errors. */
	$smarty->assign('errorArray', $errorArray);	
}

/* Display the template */	
$smarty->display('default.tpl');
?>