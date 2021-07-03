<?php

//custom account item class as account table abstraction
class class_poll extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name 			= 'poll';
	protected $_primary		= 'poll_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	 public function insert(array $data)
    {
        // add a timestamp
        $data['poll_added'] = date('Y-m-d H:i:s');
		$data['poll_code']		= $this->createCode();
        
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
        $data['poll_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	/**
	 * get job by job poll Id
 	 * @param string job id
     * @return object
	 */
	public function getByCode($code) {
		
		$select = $this->_db->select()	
					->from(array('poll' => 'poll'))
					->where('poll_deleted = 0')
					->where('poll_code = ?', $code)
					->limit(1);
       
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;

	}
	
	public function getSearch($search, $start, $length)
	{	
		if($search == '') {
			$select = $this->_db->select()	
							->from(array('poll' => 'poll'))
							->where('poll.poll_deleted = 0')
						   ->order('poll.poll_question desc');
		} else {
			$select = $this->_db->select()	
							->from(array('poll' => 'poll'))
							->where('poll.poll_deleted = 0')
						   ->where("lower(poll.poll_question) = like lower(?)", "%$search%")
						   ->order("LOCATE('$search', poll.poll_question)");			
		}

		$result_count = $this->_db->fetchRow("select count(*) as query_count from ($select) as query");

		if ($start == '' || $length == '') { 
			$result = $this->_db->fetchAll($select);
		} else { 
			$result = $this->_db->fetchAll($select . " limit $start, $length");
		}
		
		return ($result === false) ? false : $result = array('count'=>$result_count['query_count'],'displayrecords'=>count($result),'records'=>$result);	
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($code) {
		$select = $this->_db->select()	
					->from(array('poll' => 'poll'))	
					   ->where('poll_code = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New code. */
		$code = "";
		$codeAlphabet = "1234567890";

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