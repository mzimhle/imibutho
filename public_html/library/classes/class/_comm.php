<?php

//custom account item class as account table abstraction
class class_comm extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name 		= '_comm';
	protected $_primary	= '_comm_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['_comm_added'] 	= date('Y-m-d H:i:s');
        $data['_comm_code'] 	= isset($data['_comm_code']) ? $data['_comm_code'] : $this->createCode();        		
		
		return parent::insert($data);		
    }
	
	/**
	 * get job by job _comm Id
 	 * @param string job id
     * @return object
	 */
	public function viewComm($code) {
		$select = $this->_db->select()	
					->from(array('_comm' => '_comm'))				
					->joinLeft('account', 'account.account_code = _comm.account_code and account_deleted = 0')	
					->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = account.areapost_code')					
					->where('_comm_code = ?', $code)					
					->limit(1);
       
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;
	}	
	
	/**
	 * get job by job _comm Id
 	 * @param string job id
     * @return object
	 */
	public function getByCode($code)
	{		
		$select = $this->_db->select()	
					->from(array('_comm' => '_comm'))				
					->joinLeft('account', 'account.account_code = _comm.account_code and account_deleted = 0')	
					->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = account.areapost_code')					
					->where('_comm_code = ?', $code)					
					->limit(1);
       
		$result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;

	}
	
	public function sendEmail($account, $message, $reference, $subject, $file) {

		// require 'config/smarty.php';
		global $smarty;
		
		require_once('Zend/Mail.php');
		
		$mail = new Zend_Mail();
		
		$data						= array();
		$data['_comm_code']	= $this->createCode();
		
		$smarty->assign('tracking', $data['_comm_code']);
		$smarty->assign('account', $account);
		$smarty->assign('message', $message);
		
		$template = $smarty->fetch($file);
		
		$mail->setFrom('info@imibutho.co.za', 'Imibutho Forum'); //EDIT!!											
		$mail->addTo($account['account_email']);
		$mail->setSubject($subject);
		$mail->setBodyHtml($template);			

		/* Save data to the comms table. */
		$data['account_code']				= $account['account_code'];
		$data['_comm_type']					= 'EMAIL';
		$data['_comm_name']				= $account['account_name'];
		$data['_comm_sent']					= null;
		$data['_comm_email']				= $account['account_email'];
		$data['_comm_html']					= $template;
		$data['_comm_reference']			= $reference;

		$this->insert($data);

		try {		
			$mail->send();
			$data['_comm_sent']	= 1;	
			$data['_comm_output']	= 'Email Sent!';
			
		} catch (Exception $e) {
			$data['_comm_sent']		= 0;	
			$data['_comm_output']	= $e->getMessage();
		}
		
		$where = $this->getAdapter()->quoteInto('_comm_code = ?', $data['_comm_code']);
		$success = $this->update($data, $where);
		
		$mail = null; unset($mail);
		$return = $data['_comm_sent'] == 1 ? $data['_comm_code'] : false;
		return $return;
	}
	
	public function sendAccount($accountData, $reference, $subject, $file) {

		// require 'config/smarty.php';
		global $smarty;
		
		require_once('Zend/Mail.php');
		
		$mail = new Zend_Mail();
		
		$data						= array();
		$data['_comm_code']	= $this->createCode();
		
		$smarty->assign('tracking', $data['_comm_code']);
		$smarty->assign('accountData', $accountData);
		
		$template = $smarty->fetch($file);
		
		$mail->setFrom('info@imibutho.co.za', 'Imibutho Forum'); //EDIT!!											
		$mail->addTo($accountData['account_email']);
		$mail->setSubject($subject);
		$mail->setBodyHtml($template);			

		/* Save data to the comms table. */
		$data['account_code']				= $accountData['account_code'];
		$data['_comm_type']					= 'EMAIL';
		$data['_comm_name']				= $accountData['account_name'];
		$data['_comm_sent']					= null;
		$data['_comm_email']				= $accountData['account_email'];
		$data['_comm_html']					= $template;
		$data['_comm_reference']			= $reference;

		$this->insert($data);

		try {		
			$mail->send();
			$data['_comm_sent']	= 1;	
			$data['_comm_output']	= 'Email Sent!';
			
		} catch (Exception $e) {
			$data['_comm_sent']		= 0;	
			$data['_comm_output']	= $e->getMessage();
		}
		
		$where = $this->getAdapter()->quoteInto('_comm_code = ?', $data['_comm_code']);
		$success = $this->update($data, $where);
		
		$mail = null; unset($mail);
		$return = $data['_comm_sent'] == 1 ? $data['_comm_code'] : false;
		return $return;
	}
	
	public function getByAccountReference($reference, $category) {
		$select = $this->_db->select()	
					->from(array('_comm' => '_comm'))	
					->joinLeft('account', 'account.account_code = _comm.account_code and account_deleted = 0')	
					->joinLeft(array('areapost' => 'areapost'), 'areapost.areapost_code = account.areapost_code')
					->where('account.account_reference = ?', $reference)
					->where('account.account_category = ?', $category);	

		$result = $this->_db->fetchAll($select);
		return ($result == false) ? false : $result = $result;	
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($reference)
	{
		$select = $this->_db->select()	
						->from(array('_comm' => '_comm'))		
					   ->where('_comm_code = ?', $reference)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;				   		
	}
	
	function createCode() {
		/* New reference. */
		$reference = "";
		$codeAlphabet = "123456789";

		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<10;$i++) {
			$reference .= $codeAlphabet[rand(0,$count)];
		}
		
		/* First check if it exists or not. */
		$itemCheck = $this->getCode($reference);
		
		if($itemCheck) {
			/* It exists. check again. */
			$this->createCode();
		} else {
			return $reference;
		}
	}

	function reference() {
		return date('Y-m-d-H:i:s');
	}	
}
?>