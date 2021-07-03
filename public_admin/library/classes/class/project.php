<?php


//custom account item class as account table abstraction
class class_project extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'project';
	protected $_primary			= 'project_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['project_added']	= date('Y-m-d H:i:s');
        $data['project_code']		= $this->createCode();
		
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
         $data['project_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
		
    }
	
	public function search($query, $limit = 20) {
		
		if($type == '') {
			$select = $this->_db->select()	
							->from(array('project' => 'project'))	
							->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code', array('areapost_name'))		
							->joinLeft('account', 'account.account_code = project.account_code', array('account_name'))										
							->where('project.project_deleted = 0 and account_deleted = 0')			
						   ->limit($limit)
						   ->order("LOCATE('$query', project.project_name)");
		} else {
			$select = $this->_db->select()	
							->from(array('project' => 'project'))	
							->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code', array('areapost_name'))		
							->joinLeft('account', 'account.account_code = project.account_code', array('account_name'))										
							->where('project.project_deleted = 0 and account_deleted = 0')
						   ->where("lower(concat_ws(project.project_name, ' ', project.project_email, ' ', areapost.areapost_name, ' ', account.account_name)) like lower(?)", "%$query%")
							->limit($limit)
							->order("LOCATE('$query', project.project_name)");		
		}
		
		$result = $this->_db->fetchAll($select);	
        return ($result == false) ? false : $result = $result;					

	}
	
	public function getSearch($search, $start, $length)
	{	
		if($search == '') {
			$select = $this->_db->select()	
							->from(array('project' => 'project'))	
							->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code', array('areapost_name'))		
							->joinLeft('account', 'account.account_code = project.account_code', array('account_name'))										
							->where('project.project_deleted = 0 and account_deleted = 0')
							->order('project.project_name desc');
		} else {
			$select = $this->_db->select()	
							->from(array('project' => 'project'))	
							->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code', array('areapost_name'))		
							->joinLeft('account', 'account.account_code = project.account_code', array('account_name'))										
							->where('project.project_deleted = 0 and account_deleted = 0')
						   ->where("lower(concat_ws(project.project_name, ' ', project.project_email, ' ', areapost.areapost_name, ' ', account.account_name)) like lower(?)", "%$search%")
						   ->order("LOCATE('$search', project.project_name)");			
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
	 * get all administrators ordered by column name
	 * example: $collection->getAlladministrators('administrator_title');
	 * @param string $order
     * @return object
	 */
	public function checkLogin($username = '', $password= '')
	{
		
		$select = $this->_db->select()	
							->from(array('project' => 'project'))	
							->where('project_email = ?', $username)
							->where('project_active = 1')
							->where('project_deleted = 0')
							->where('project_password = ?', $password);

	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByCode($reference)
	{
		$select = $this->_db->select()	
						->from(array('project' => 'project'))	
						->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code')
						->joinLeft('account', 'account.account_code = project.account_code')					   
					   ->where('project_deleted = 0 and account_deleted = 0')
					   ->where('project_code = ?', $reference)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
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
						->from(array('project' => 'project'))	
						->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code')
						->where('project_code = ?', $reference)
						->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createPassword() {
		/* New code. */
		$password = "";
		$codeAlphabet = "abcdefghigklmnopqrstuvwxyz";
		$codeAlphabet .= "0123456789";
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<5;$i++){
			$password .= $codeAlphabet[rand(0,$count)];
		}
		
		return $password;

	}
	
	
	function createCode() {
		/* New code. */
		$code = "";
		// $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
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

	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getFile($file)
	{
		$select = $this->_db->select()	
						->from(array('project' => 'project'))	
						->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code')
					   ->where('project_image_name = ?', $file)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createFile() {
		/* New code. */
		$code = "";
		$codeAlphabet = '123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<15;$i++){
			$code .= $codeAlphabet[rand(0,$count)];
		}
		
		/* First check if it exists or not. */
		$itemCheck = $this->getFile($code);
		
		if($itemCheck) {
			/* It exists. check again. */
			$this->createFile();
		} else {
			return $code;
		}
	}
	
	
	/**
	 * get job by job project Id
 	 * @param string job id
     * @return object
	 */
	public function getByCell($cell, $code = null) {
	
		if($code == null) {
			$select = $this->_db->select()	
						->from(array('project' => 'project'))	
						->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code')
						->where('project_cellphone = ?', $cell)
						->where('project_deleted = 0')
						->limit(1);
       } else {
			$select = $this->_db->select()	
						->from(array('project' => 'project'))	
						->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code')
						->where('project_cellphone = ?', $cell)
						->where('project_code != ?', $code)
						->where('project_deleted = 0')
						->limit(1);		
	   }
	   
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;
	}
	
	/**
	 * get job by job project Id
 	 * @param string job id
     * @return object
	 */
	public function getByEmail($email, $code = null) {
	
		if($code == null) {
			$select = $this->_db->select()	
						->from(array('project' => 'project'))	
						->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code')
						->where('project_email = ?', $email)
						->where('project_deleted = 0')
						->limit(1);
       } else {
			$select = $this->_db->select()	
						->from(array('project' => 'project'))	
						->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code')
						->where('project_email = ?', $email)
						->where('project_code != ?', $code)
						->where('project_deleted = 0')
						->limit(1);		
	   }
	   
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;
	}
		
	public function validateEmail($string) {
		if(!filter_var($string, FILTER_VALIDATE_EMAIL)) {
			return '';
		} else {
			return trim($string);
		}
	}
	
	public function validateCell($string) {
		if(preg_match('/^0[0-9]{9}$/', $this->onlyCellNumber(trim($string)))) {
			return $this->onlyCellNumber(trim($string));
		} else {
			return '';
		}
	}
	
	public function onlyCellNumber($string) {

		/* Remove some weird charactors that windows dont like. */
		$string = strtolower($string);
		$string = str_replace(' ' , '' , $string);
		$string = str_replace('__' , '' , $string);
		$string = str_replace(' ' , '' , $string);
		$string = str_replace("é", "", $string);
		$string = str_replace("è", "", $string);
		$string = str_replace("`", "", $string);
		$string = str_replace("/", "", $string);
		$string = str_replace("\\", "", $string);
		$string = str_replace("'", "", $string);
		$string = str_replace("(", "", $string);
		$string = str_replace(")", "", $string);
		$string = str_replace("-", "", $string);
		$string = str_replace(".", "", $string);
		$string = str_replace("ë", "", $string);	
		$string = str_replace('___' , '' , $string);
		$string = str_replace('__' , '' , $string);	
		$string = str_replace(' ' , '' , $string);
		$string = str_replace('__' , '' , $string);
		$string = str_replace(' ' , '' , $string);
		$string = str_replace("é", "", $string);
		$string = str_replace("è", "", $string);
		$string = str_replace("`", "", $string);
		$string = str_replace("/", "", $string);
		$string = str_replace("\\", "", $string);
		$string = str_replace("'", "", $string);
		$string = str_replace("(", "", $string);
		$string = str_replace(")", "", $string);
		$string = str_replace("-", "", $string);
		$string = str_replace(".", "", $string);
		$string = str_replace("ë", "", $string);	
		$string = str_replace("â€“", "", $string);	
		$string = str_replace("â", "", $string);	
		$string = str_replace("€", "", $string);	
		$string = str_replace("“", "", $string);	
		$string = str_replace("#", "", $string);	
		$string = str_replace("$", "", $string);	
		$string = str_replace("@", "", $string);	
		$string = str_replace("!", "", $string);	
		$string = str_replace("&", "", $string);	
		$string = str_replace(';' , '' , $string);		
		$string = str_replace(':' , '' , $string);		
		$string = str_replace('[' , '' , $string);		
		$string = str_replace(']' , '' , $string);		
		$string = str_replace('|' , '' , $string);		
		$string = str_replace('\\' , '' , $string);		
		$string = str_replace('%' , '' , $string);	
		$string = str_replace(';' , '' , $string);		
		$string = str_replace(' ' , '' , $string);
		$string = str_replace('__' , '' , $string);
		$string = str_replace(' ' , '' , $string);	
		$string = str_replace('-' , '' , $string);	
		$string = str_replace('+27' , '0' , $string);	
		$string = str_replace('(0)' , '' , $string);	
		
		$string = preg_replace('/^00/', '0', $string);
		$string = preg_replace('/^27/', '0', $string);
		
		$string = preg_replace('!\s+!',"", strip_tags($string));
		
		return $string;
				
	}
}
?>