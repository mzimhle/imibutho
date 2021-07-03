<?php

//custom account item class as account table abstraction
class class_pollquestion extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name 			= 'pollquestion';
	protected $_primary 		= 'pollquestion_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 
	 public function insert(array $data)
    {
        // add a timestamp
		$data['pollquestion_code']		= $this->createCode();
        $data['pollquestion_added'] 	= date('Y-m-d H:i:s');        

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
        $data['pollquestion_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getByCode($code) {	
		$select = $this->_db->select()	
					->from(array('pollquestion' => 'pollquestion'))	
					->joinLeft(array('poll' => 'poll'), 'poll.poll_code = pollquestion.poll_code')	
					->where('pollquestion_deleted = 0 and poll_deleted = 0')
					->where('pollquestion_code = ?', $code)
					->limit(1);
       
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;

	}	
	
	public function getByPoll($code)
	{
		
		$select = $this->_db->select()	
					->from(array('pollquestion' => 'pollquestion'))	
					->joinLeft(array('poll' => 'poll'), 'poll.poll_code = pollquestion.poll_code')	
					->where('pollquestion.poll_code = ?', $code)
					->where('pollquestion_deleted = 0 and poll_deleted = 0');			

		$result = $this->_db->fetchAll($select);
		return ($result == false) ? false : $result = $result;
	}
	
	public function getPrimaryByPoll($code) {
		
		$select = $this->_db->select()	
					->from(array('pollquestion' => 'pollquestion'))	
					->joinLeft(array('poll' => 'poll'), 'poll.poll_code = pollquestion.poll_code')	
					->where('pollquestion.poll_code = ?', $code)
					->where('pollquestion_deleted = 0')
					->where('pollquestion_correct = 1')
					->order('pollquestion_added DESC')
					->limit(1);
       
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;	
	}
	
	public function updatePrimaryByPoll($code, $pollcode) {
		
		$item = $this->getPrimaryByPoll($pollcode);
		
		if($item) {
			$data = array();
			$where = null;
			$data['pollquestion_correct'] = 0;
			
			$where		= $this->getAdapter()->quoteInto('pollquestion_code = ?', $item['pollquestion_code']);
			$success	= $this->update($data, $where);				
		}

		$data = array();
		$data['pollquestion_correct'] = 1;
			
		$where		= $this->getAdapter()->quoteInto('pollquestion_code = ?', $code);
		$success	= $this->update($data, $where);
		
		return $success;
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($code)
	{
		$select = $this->_db->select()	
				->from(array('pollquestion' => 'pollquestion'))	
				->where('pollquestion_code = ?', $code)
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