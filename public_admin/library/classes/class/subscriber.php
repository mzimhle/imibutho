<?php

//custom account item class as account table abstraction
class class_subscriber extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name 			= 'subscriber';
	protected $_primary 		= 'subscriber_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 
	 public function insert(array $data)
    {
        // add a timestamp
		$data['subscriber_code']		= $this->createCode();
        $data['subscriber_added'] 	= date('Y-m-d H:i:s');        

		return parent::insert($data);
		
    }
	
	/**
	 * Update the database record
	 * example: $table->update($data, $where);
	 * @param query string $where
	 * @param array $data
     * @return boolean
	 */
    public function update(array $data, $where)
    {
        // add a timestamp
        $data['subscriber_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getByCode($code) {	
		$select = $this->_db->select()	
					->from(array('subscriber' => 'subscriber'))	
					->joinLeft(array('account' => 'account'), 'account.account_code = subscriber.account_code')	
					->joinLeft(array('project' => 'project'), 'project.project_code = subscriber.project_code and project_deleted = 0')	
					->where('subscriber_deleted = 0 and account_deleted = 0 and account_active = 1')
					->where('subscriber_code = ?', $code)
					->limit(1);
       
		$result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;

	}	
	
	public function getByProject($code)
	{		
		$select = $this->_db->select()	
					->from(array('subscriber' => 'subscriber'))	
					->joinLeft(array('account' => 'account'), 'account.account_code = subscriber.account_code')	
					->joinLeft(array('project' => 'project'), 'project.project_code = subscriber.project_code and project_deleted = 0')	
					->where('subscriber_deleted = 0 and account_deleted = 0 and account_active = 1')
					->where('subscriber.project_code = ?', $code)
					->order('subscriber_added desc');					

		$result = $this->_db->fetchAll($select);
		return ($result == false) ? false : $result = $result;
	}
	
	public function getByWebsite($code) {		
		$select = $this->_db->select()	
					->from(array('subscriber' => 'subscriber'))	
					->joinLeft(array('account' => 'account'), 'account.account_code = subscriber.account_code')	
					->joinLeft(array('project' => 'project'), 'project.project_code = subscriber.project_code and project_deleted = 0')	
					->where('subscriber_deleted = 0 and account_deleted = 0 and account_active = 1')
					->where("subscriber.project_code = '' or subscriber.project_code = null")
					->order('subscriber_added desc');					

		$result = $this->_db->fetchAll($select);
		return ($result == false) ? false : $result = $result;
	}
	
	public function checkEmail($email, $project = '') {
		
		if($project == '') {
			$select = $this->_db->select()	
						->from(array('subscriber' => 'subscriber'))	
						->joinLeft(array('account' => 'account'), 'account.account_code = subscriber.account_code')
						->where('subscriber_deleted = 0 and account_deleted = 0 and account_active = 1')
						->where("subscriber.project_code = '' or subscriber.project_code = null")
						->where('subscriber.subscriber_email = ?', $email);		
		} else {
			$select = $this->_db->select()	
						->from(array('subscriber' => 'subscriber'))	
						->joinLeft(array('account' => 'account'), 'account.account_code = subscriber.account_code')
						->where('subscriber_deleted = 0 and account_deleted = 0 and account_active = 1')
						->where('subscriber.project_code = ?', $project)
						->where('subscriber.subscriber_email = ?', $email);
		}
		
		$result = $this->_db->fetchRow($select);
		return ($result == false) ? false : $result = $result;
		
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($code)
	{
		$select = $this->_db->select()	
				->from(array('subscriber' => 'subscriber'))	
				->where('subscriber_code = ?', $code)
				->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New code. */
		$code = "";
		$codeAlphabet = '123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<5;$i++){
			$code .= $codeAlphabet[rand(0,$count)];
		}
		
		$code = time().$code;
		
		/* First check if it exists or not. */
		$itemCheck = $this->getCode($code);
		
		if($itemCheck) {
			/* It exists. check again. */
			$this->createCode();
		} else {
			return $code;
		}
	}
}
?>