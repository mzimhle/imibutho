<?php

//custom account item class as account table abstraction
class class_volunteer extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name 			= 'volunteer';
	protected $_primary 		= 'volunteer_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 
	 public function insert(array $data)
    {
        // add a timestamp
		$data['volunteer_code']		= $this->createCode();
        $data['volunteer_added'] 	= date('Y-m-d H:i:s');        

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
        $data['volunteer_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getByCode($code) {	
		$select = $this->_db->select()	
					->from(array('volunteer' => 'volunteer'))	
					->joinLeft(array('account' => 'account'), 'account.account_code = volunteer.account_code')	
					->joinLeft(array('project' => 'project'), 'project.project_code = volunteer.project_code and project_deleted = 0')	
					->where('volunteer_deleted = 0 and account_deleted = 0 and account_active = 1')
					->where('volunteer_code = ?', $code)
					->limit(1);
       
		$result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;

	}	
	
	public function getByVolunteers($project = '', $event = '') {
		
		if($project == '' && $event == '') {
		
			$select = $this->_db->select()	
						->from(array('volunteer' => 'volunteer'))	
						->joinLeft(array('account' => 'account'), 'account.account_code = volunteer.account_code')
						->where('volunteer_deleted = 0 and account_deleted = 0 and account_active = 1')
						->where("volunteer.project_code = '' or volunteer.project_code = null")
						->where("volunteer.event_code = '' or volunteer.event_code = null");	
						
		} else if($project != '' && $event == ''){
		
			$select = $this->_db->select()
						->from(array('volunteer' => 'volunteer'))	
						->joinLeft(array('account' => 'account'), 'account.account_code = volunteer.account_code')
						->where('volunteer_deleted = 0 and account_deleted = 0 and account_active = 1')
						->where("volunteer.event_code = '' or volunteer.event_code = null")
						->where('volunteer.project_code = ?', $project);
						
		} else if($event != '' && $project == ''){
		
			$select = $this->_db->select()
						->from(array('volunteer' => 'volunteer'))	
						->joinLeft(array('account' => 'account'), 'account.account_code = volunteer.account_code')
						->where('volunteer_deleted = 0 and account_deleted = 0 and account_active = 1')
						->where("volunteer.project_code = '' or volunteer.project_code = null")
						->where('volunteer.event_code = ?', $event);	

		}
		
		$result = $this->_db->fetchAll($select);
		return ($result == false) ? false : $result = $result;
		
	}
	
	public function checkEmail($email, $project = '', $event = '') {
		
		if($project == '' && $event == '') {
		
			$select = $this->_db->select()	
						->from(array('volunteer' => 'volunteer'))	
						->joinLeft(array('account' => 'account'), 'account.account_code = volunteer.account_code')
						->where('volunteer_deleted = 0 and account_deleted = 0 and account_active = 1')
						->where("volunteer.project_code = '' or volunteer.project_code = null")
						->where("volunteer.event_code = '' or volunteer.event_code = null")
						->where('volunteer.volunteer_email = ?', $email);	
						
		} else if($project != '' && $event == ''){
		
			$select = $this->_db->select()
						->from(array('volunteer' => 'volunteer'))	
						->joinLeft(array('account' => 'account'), 'account.account_code = volunteer.account_code')
						->where('volunteer_deleted = 0 and account_deleted = 0 and account_active = 1')
						->where("volunteer.event_code = '' or volunteer.event_code = null")
						->where('volunteer.project_code = ?', $project)
						->where('volunteer.volunteer_email = ?', $email);
						
		} else if($event != '' && $project == ''){
		
			$select = $this->_db->select()
						->from(array('volunteer' => 'volunteer'))	
						->joinLeft(array('account' => 'account'), 'account.account_code = volunteer.account_code')
						->where('volunteer_deleted = 0 and account_deleted = 0 and account_active = 1')
						->where("volunteer.project_code = '' or volunteer.project_code = null")
						->where('volunteer.event_code = ?', $event)
						->where('volunteer.volunteer_email = ?', $email);	

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
				->from(array('volunteer' => 'volunteer'))	
				->where('volunteer_code = ?', $code)
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