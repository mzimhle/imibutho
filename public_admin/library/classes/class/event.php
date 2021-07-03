<?php

//custom account item class as account table abstraction
class class_event extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'event';
	protected $_primary			= 'event_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['event_added']		= date('Y-m-d H:i:s');
        $data['event_code']		= $this->createCode();
		$data['event_url']			= $this->toUrl($data['event_name']);

		return parent::insert($data);
		
    }
	
	/**
	 * Update the database record
	 * example: $table->update($data, $where);
	 * @param query string $where
	 * @param array $data
     * @return boolean
	 */
    public function update(array $data, $where) {
        // add a timestamp
        $data['event_updated']	= date('Y-m-d H:i:s');
		if(isset($data['event_name'])) $data['event_url']	= $this->toUrl($data['event_name']);
		
        return parent::update($data, $where);
		
    }
	
	public function getSearch($search, $start, $length)
	{
		if($search == '') {
			$select = $this->_db->select()	
					->from(array('event' => 'event'))
					->where('event.event_deleted = 0')
					->where("event.project_code = '' or event.project_code is null")
					->order('event.event_name desc');
		} else {
			$select = $this->_db->select()	
					->from(array('event' => 'event'))
					->where('event.event_deleted = 0')
					->where("event.project_code = '' or event.project_code is null")
					->where("lower(event.event_name) like lower(?)", "%$search%")
					->order("LOCATE('$search', event.event_name)");			
		}

		$result_count = $this->_db->fetchRow("select count(*) as query_count from ($select) as query");

		if ($start == '' || $length == '') { 
			$result = $this->_db->fetchAll($select);
		} else { 
			$result = $this->_db->fetchAll($select . " limit $start, $length");
		}
		
		return ($result === false) ? false : $result = array('count'=>$result_count['query_count'],'displayrecords'=>count($result),'records'=>$result);	
	}
	
	public function getProjectSearch($search, $start, $length)
	{
		if($search == '') {
			$select = $this->_db->select()	
					->from(array('event' => 'event'))
					->joinLeft('project', 'project.project_code = event.project_code', array('project_name'))	
					->joinLeft('account', 'account.account_code = project.account_code', array('account_name'))	
					->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code', array('areapost_name'))		
					->where('event.event_deleted = 0 and project_deleted = 0')
					->order('event.event_name desc');
		} else {
			$select = $this->_db->select()
					->from(array('event' => 'event'))
					->joinLeft('project', 'project.project_code = event.project_code', array('project_name'))
					->joinLeft('account', 'account.account_code = project.account_code', array('account_name'))	
					->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code', array('areapost_name'))					
					->where('event.event_deleted = 0 and project_deleted = 0')
					->where("lower(event.event_name) like lower(?)", "%$search%")
					->order("LOCATE('$search', event.event_name)");			
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
	public function getByCode($code)
	{
			$select = $this->_db->select()
				->from(array('event' => 'event'))
				->joinLeft('project', 'project.project_code = event.project_code and project_deleted = 0')
				->joinLeft('account', 'account.account_code = project.account_code and account_deleted = 0')	
				->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code')	
				->where('event_deleted = 0')
				->where('event_code = ?', $code)
				->limit(1);

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
						->from(array('event' => 'event'))
						->where('event_code = ?', $code)
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

	public function toUrl($title) {
	
		$name = strtolower(trim($title));
		$name = str_replace(' ' , '_' , $name);
		$name = str_replace('__' , '_' , $name);
		$name = str_replace(' ' , '_' , $name);
		$name = str_replace("é", "e", $name);
		$name = str_replace("è", "e", $name);
		$name = str_replace("`", "", $name);
		$name = str_replace("/", "_", $name);
		$name = str_replace("\\", "_", $name);
		$name = str_replace("'", "", $name);
		$name = str_replace("(", "", $name);
		$name = str_replace(")", "", $name);
		$name = str_replace("-", "_", $name);
		$name = str_replace(".", "_", $name);
		$name = str_replace("ë", "e", $name);	
		$name = str_replace("â€“", "ae", $name);	
		$name = str_replace("â", "a", $name);	
		$name = str_replace("€", "e", $name);	
		$name = str_replace("“", "", $name);	
		$name = str_replace("#", "", $name);	
		$name = str_replace("$", "", $name);	
		$name = str_replace("@", "", $name);	
		$name = str_replace("!", "", $name);	
		$name = str_replace("&", "", $name);	
		$name = str_replace(';' , '_' , $name);		
		$name = str_replace(':' , '_' , $name);		
		$name = str_replace('[' , '_' , $name);		
		$name = str_replace(']' , '_' , $name);		
		$name = str_replace('|' , '_' , $name);		
		$name = str_replace('\\' , '_' , $name);		
		$name = str_replace('%' , '_' , $name);	
		$name = str_replace(';' , '' , $name);		
		$name = str_replace(' ' , '_' , $name);
		$name = str_replace('__' , '_' , $name);
		$name = str_replace(' ' , '' , $name);	
		
		return $name;
		
	}
	
}
?>