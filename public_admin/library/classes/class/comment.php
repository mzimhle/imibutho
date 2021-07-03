<?php

//custom account item class as account table abstraction
class class_comment extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name 			= 'comment';
	protected $_primary 		= 'comment_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 
	 public function insert(array $data)
    {
        // add a timestamp
		$data['comment_code']		= $this->createCode();
        $data['comment_added'] 	= date('Y-m-d H:i:s');        

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
        $data['comment_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getByCode($code) {	
		$select = $this->_db->select()	
					->from(array('comment' => 'comment'))	
					->joinLeft(array('article' => 'article'), 'article.article_code = comment.article_code')	
					->joinLeft(array('account' => 'account'), 'account.account_code = comment.account_code')	
					->where('comment_deleted = 0 and article_deleted = 0 and account_deleted = 0')
					->where('comment_code = ?', $code)
					->limit(1);
       
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;

	}	
	
	public function getByArticle($code) {
	
		$select = $this->_db->select()	
					->from(array('comment' => 'comment'))	
					->joinLeft(array('article' => 'article'), 'article.article_code = comment.article_code')	
					->joinLeft(array('account' => 'account'), 'account.account_code = comment.account_code')	
					->where('comment_deleted = 0 and article_deleted = 0 and account_deleted = 0')
					->where('comment.article_code = ?', $code)
					->where("comment_parent = '' or comment_parent is null")
					->order('comment_added desc');					

		$result = $this->_db->fetchAll($select);
		
		if($result) {
			for($i = 0; $i < count($result); $i++) {
				$comments = $this->getByParent($result['article_code']);
				if($comments) {					
					$result[$i]['comments'] = $comments;					
				} else {
					$result[$i]['comments'] = array();
				}
			}
		}
		
		return ($result == false) ? false : $result = $result;
	}
		
	public function getByVideo($code) {
	
		$select = $this->_db->select()	
					->from(array('comment' => 'comment'))	
					->joinLeft(array('video' => 'video'), 'video.video_code = comment.video_code')	
					->joinLeft(array('account' => 'account'), 'account.account_code = comment.account_code')	
					->where('comment_deleted = 0 and video_deleted = 0 and account_deleted = 0')
					->where('comment.video_code = ?', $code)
					->where("comment_parent = '' or comment_parent is null")
					->order('comment_added desc');					

		$result = $this->_db->fetchAll($select);
		
		if($result) {
			for($i = 0; $i < count($result); $i++) {
				$comments = $this->getByParent($result['article_code']);
				if($comments) {					
					$result[$i]['comments'] = $comments;					
				} else {
					$result[$i]['comments'] = array();
				}
			}
		}
		
		return ($result == false) ? false : $result = $result;
	}
	
	public function getByEvent($code) {
	
		$select = $this->_db->select()	
					->from(array('comment' => 'comment'))	
					->joinLeft(array('event' => 'event'), 'event.event_code = comment.event_code')	
					->joinLeft(array('account' => 'account'), 'account.account_code = comment.account_code')	
					->where('comment_deleted = 0 and event_deleted = 0 and account_deleted = 0')
					->where('comment.event_code = ?', $code)
					->where("comment_parent = '' or comment_parent is null")
					->order('comment_added desc');					

		$result = $this->_db->fetchAll($select);
		
		if($result) {
			for($i = 0; $i < count($result); $i++) {
				$comments = $this->getByParent($result['article_code']);
				if($comments) {					
					$result[$i]['comments'] = $comments;					
				} else {
					$result[$i]['comments'] = array();
				}
			}
		}
		
		return ($result == false) ? false : $result = $result;
	}
	
	public function getByParent($code) {
			
		$select = $this->_db->select()	
					->from(array('comment' => 'comment'))
					->joinLeft(array('account' => 'account'), 'account.account_code = comment.account_code')	
					->where('comment_deleted = 0 and account_deleted = 0')
					->where('comment.comment_parent = ?', $code)
					->order('comment_added desc');					

		$result = $this->_db->fetchAll($select);			
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
				->from(array('comment' => 'comment'))	
				->where('comment_code = ?', $code)
				->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New code. */
		$code = "";
		$codeAlphabet = '123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<7;$i++){
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