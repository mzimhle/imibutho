<?php

//custom account item class as account table abstraction
class class_projectcontact extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name 			= 'projectcontact';
	protected $_primary 		= 'projectcontact_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 
	 public function insert(array $data)
    {
        // add a timestamp
		$data['projectcontact_code']		= $this->createCode();
        $data['projectcontact_added'] 	= date('Y-m-d H:i:s');        

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
        $data['projectcontact_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getByCode($code) {	
		$select = $this->_db->select()	
					->from(array('projectcontact' => 'projectcontact'))	
					->joinLeft(array('project' => 'project'), 'project.project_code = projectcontact.project_code')	
					->where('projectcontact_deleted = 0')
					->where('projectcontact_code = ?', $code)
					->limit(1);
       
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;

	}	
	
	public function getByProject($code)
	{
		
		$select = $this->_db->select()	
					->from(array('projectcontact' => 'projectcontact'))	
					->joinLeft(array('project' => 'project'), 'project.project_code = projectcontact.project_code')	
					->where('projectcontact.project_code = ?', $code)
					->where('projectcontact_deleted = 0')
					->order('projectcontact_added DESC');					

		$result = $this->_db->fetchAll($select);
		return ($result == false) ? false : $result = $result;
	}
	
	public function getPrimaryByProject($code) {
		
		$select = $this->_db->select()	
					->from(array('projectcontact' => 'projectcontact'))	
					->joinLeft(array('project' => 'project'), 'project.project_code = projectcontact.project_code')	
					->where('projectcontact.project_code = ?', $code)
					->where('projectcontact_deleted = 0')
					->where('projectcontact_primary = 1')
					->order('projectcontact_added DESC')
					->limit(1);
       
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;	
	}
	
	public function updatePrimaryByProject($code, $projectcode) {
		
		$item = $this->getPrimaryByProject($projectcode);
		
		if($item) {
			$data = array();
			$where = null;
			$data['projectcontact_primary'] = 0;
			
			$where		= $this->getAdapter()->quoteInto('projectcontact_code = ?', $item['projectcontact_code']);
			$success	= $this->update($data, $where);				
		}

		$data = array();
		$data['projectcontact_primary'] = 1;
			
		$where		= $this->getAdapter()->quoteInto('projectcontact_code = ?', $code);
		$success	= $this->update($data, $where);
		
		return $success;
	}	

	public function validateEmail($string) {
		if(!filter_var($string, FILTER_VALIDATE_EMAIL)) {
			return '';
		} else {
			return trim($string);
		}
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($code)
	{
		$select = $this->_db->select()	
				->from(array('projectcontact' => 'projectcontact'))	
				->where('projectcontact_code = ?', $code)
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