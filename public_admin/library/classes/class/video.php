<?php

//custom account item class as account table abstraction
class class_video extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'video';
	protected $_primary			= 'video_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['video_added']		= date('Y-m-d H:i:s');
        $data['video_code']		= $this->createCode();

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
        $data['video_updated']	= date('Y-m-d H:i:s');
		
        return parent::update($data, $where);
		
    }
	
	public function getSearch($search, $start, $length)
	{
		if($search == '') {
			$select = $this->_db->select()	
					->from(array('video' => 'video'))
					->where('video.video_deleted = 0')
					->where("video.project_code = '' or video.project_code is null")
					->order('video.video_name desc');
		} else {
			$select = $this->_db->select()	
					->from(array('video' => 'video'))
					->where('video.video_deleted = 0')
					->where("video.project_code = '' or video.project_code is null")
					->where("lower(video.video_name) like lower(?)", "%$search%")
					->order("LOCATE('$search', video.video_name)");			
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
					->from(array('video' => 'video'))
					->joinLeft('project', 'project.project_code = video.project_code', array('project_name'))	
					->joinLeft('account', 'account.account_code = project.account_code', array('account_name'))	
					->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code', array('areapost_name'))		
					->where('video.video_deleted = 0 and project_deleted = 0')
					->order('video.video_name desc');
		} else {
			$select = $this->_db->select()
					->from(array('video' => 'video'))
					->joinLeft('project', 'project.project_code = video.project_code', array('project_name'))
					->joinLeft('account', 'account.account_code = project.account_code', array('account_name'))	
					->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code', array('areapost_name'))					
					->where('video.video_deleted = 0 and project_deleted = 0')
					->where("lower(video.video_name) like lower(?)", "%$search%")
					->order("LOCATE('$search', video.video_name)");			
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
				->from(array('video' => 'video'))
				->joinLeft('project', 'project.project_code = video.project_code and project_deleted = 0')
				->joinLeft('account', 'account.account_code = project.account_code and account_deleted = 0')	
				->joinLeft('areapost', 'areapost.areapost_code = project.areapost_code')	
				->where('video_deleted = 0')
				->where('video_code = ?', $code)
				->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	public function validateUrl($string) {

		$valid = preg_match("/^(http\:\/\/)?(www\.)?(youtube\.com)\/embed\/[\w|\-]+$/", $string);

		if ($valid) {
			return $string;
		} else {
			return '';
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
						->from(array('video' => 'video'))
						->where('video_code = ?', $code)
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