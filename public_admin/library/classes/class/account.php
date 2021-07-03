<?php

require_once '_comm.php';
require_once 'File.php';

//custom account item class as account table abstraction
class class_account extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'account';
	protected $_primary			= 'account_code';
	
	public $_comm						= null;
	public $_File							= null;
	
	function init()	{
		$this->_comm					= new class_comm();
		$this->_File						= new File(array('png', 'jpg', 'jpeg'));
	}
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['account_added']		= date('Y-m-d H:i:s');
        $data['account_code']		= $this->createCode();
		$data['account_hashcode']	= md5(date('Y-m-d H:i:s'));
		
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
         $data['account_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
		
    }
	
	/**
	 * get job by job account Id
 	 * @param string job id
     * @return object
	 */
	public function checkEmail($email) {	
		$select = $this->_db->select()	
							->from(array('account' => 'account'))	
							->where('account_email = ?', $email)
							->where('account_deleted = 0');

	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;
	}
	
	public function search($query, $limit = 20) {

		if($query == '') {
			$select = $this->_db->select()	
							->from(array('account' => 'account'))
							->joinLeft('areapost', 'areapost.areapost_code = account.areapost_code', array('areapost_name'))										
							->where('account.account_deleted = 0')				
						   ->limit($limit)
						   ->order("LOCATE('$query', account.account_name)");
		} else {
			$select = $this->_db->select()	
							->from(array('account' => 'account'))
							->joinLeft('areapost', 'areapost.areapost_code = account.areapost_code', array('areapost_name'))										
							->where('account.account_deleted = 0')
						   ->where("lower(concat_ws(account.account_name, ' ', account.account_email, ' ', areapost.areapost_name)) like lower(?)", "%$query%")
							->limit($limit)
							->order("LOCATE('$query', account.account_name)");		
		}

		$result = $this->_db->fetchAll($select);	
        return ($result == false) ? false : $result = $result;					

	}
	
	public function getSearch($search, $start, $length)
	{	
		if($search == '') {
			$select = $this->_db->select()	
							->from(array('account' => 'account'))
							->joinLeft('areapost', 'areapost.areapost_code = account.areapost_code', array('areapost_name'))										
							->where('account.account_deleted = 0')
						   ->order('account.account_name desc');
		} else {
			$select = $this->_db->select()	
							->from(array('account' => 'account'))
							->joinLeft('areapost', 'areapost.areapost_code = account.areapost_code', array('areapost_name'))										
							->where('account.account_deleted = 0')
						   ->where("lower(concat_ws(account.account_name, ' ', account.account_email, ' ', areapost.areapost_name)) like lower(?)", "%$search%")
						   ->order("LOCATE('$search', account.account_name)");			
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
							->from(array('account' => 'account'))	
							->where('account_email = ?', $username)
							->where('account_active = 1')
							->where('account_deleted = 0')
							->where('account_password = ?', $password);

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
						->from(array('account' => 'account'))	
						->joinLeft('areapost', 'areapost.areapost_code = account.areapost_code')
					   ->where('account_code = ?', $reference)
					   ->where('account_deleted = 0')
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
						->from(array('account' => 'account'))	
						->joinLeft('areapost', 'areapost.areapost_code = account.areapost_code')
						->where('account_code = ?', $reference)
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
						->from(array('account' => 'account'))	
						->joinLeft('areapost', 'areapost.areapost_code = account.areapost_code')
					   ->where('account_image_name = ?', $file)
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
	 * get job by job account Id
 	 * @param string job id
     * @return object
	 */
	public function getByCell($cell, $code = null) {
	
		if($code == null) {
			$select = $this->_db->select()	
						->from(array('account' => 'account'))	
						->joinLeft('areapost', 'areapost.areapost_code = account.areapost_code')
						->where('account_cellphone = ?', $cell)
						->where('account_deleted = 0')
						->limit(1);
       } else {
			$select = $this->_db->select()	
						->from(array('account' => 'account'))	
						->joinLeft('areapost', 'areapost.areapost_code = account.areapost_code')
						->where('account_cellphone = ?', $cell)
						->where('account_code != ?', $code)
						->where('account_deleted = 0')
						->limit(1);		
	   }
	   
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;
	}
	
	/**
	 * get job by job account Id
 	 * @param string job id
     * @return object
	 */
	public function getByEmail($email, $code = null) {
	
		if($code == null) {
			$select = $this->_db->select()	
						->from(array('account' => 'account'))	
						->joinLeft('areapost', 'areapost.areapost_code = account.areapost_code')
						->where('account_email = ?', $email)
						->where('account_deleted = 0')
						->limit(1);
       } else {
			$select = $this->_db->select()	
						->from(array('account' => 'account'))	
						->joinLeft('areapost', 'areapost.areapost_code = account.areapost_code')
						->where('account_email = ?', $email)
						->where('account_code != ?', $code)
						->where('account_deleted = 0')
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