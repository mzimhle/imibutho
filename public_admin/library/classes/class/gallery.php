<?php

//custom account item class as account table abstraction
class class_gallery extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name 			= 'gallery';
	protected $_primary		= 'gallery_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	 public function insert(array $data)
    {
        // add a timestamp
        $data['gallery_added'] = date('Y-m-d H:i:s');
		$data['gallery_code']		= $this->createCode();
        
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
        $data['gallery_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	/**
	 * get job by job gallery Id
 	 * @param string job id
     * @return object
	 */
	public function getByCode($code) {
		
		$select = $this->_db->select()	
					->from(array('gallery' => 'gallery'))
					->where('gallery_deleted = 0')
					->where('gallery_code = ?', $code)
					->limit(1);
       
	   $result = $this->_db->fetchRow($select);
        return ($result == false) ? false : $result = $result;

	}
	
	public function getByProject($code = '', $gallery = '') {
		
		if($code == '') {
			$select = $this->_db->select()	
						->from(array('gallery' => 'gallery'))
						->joinLeft(array('galleryimage' => 'galleryimage'), 'galleryimage.gallery_code = gallery.gallery_code and galleryimage_primary = 1', array('galleryimage_code', 'galleryimage_filename', 'galleryimage_primary', 'galleryimage_path', 'galleryimage_ext'))
						->joinLeft(array('project' => 'project'), 'project.project_code = gallery.project_code')	
						->joinLeft(array('account' => 'account'), 'account.account_code = project.account_code')	
						->where('gallery_deleted = 0 and project_deleted = 0 and account_deleted = 0')
						->order('gallery_added desc');
		} else {
			$select = $this->_db->select()	
						->from(array('gallery' => 'gallery'))
						->joinLeft(array('galleryimage' => 'galleryimage'), 'galleryimage.gallery_code = gallery.gallery_code and galleryimage_primary = 1', array('galleryimage_code', 'galleryimage_filename', 'galleryimage_primary', 'galleryimage_path', 'galleryimage_ext'))
						->joinLeft(array('project' => 'project'), 'project.project_code = gallery.project_code')	
						->joinLeft(array('account' => 'account'), 'account.account_code = project.account_code')	
						->where('gallery_deleted = 0 and project_deleted = 0 and account_deleted = 0')
						->where('gallery.project_code = ?', $code)
						->order('gallery_added desc');			
		}
		
		$result = $this->_db->fetchAll($select);
		return ($result == false) ? false : $result = $result;
	}
	
	public function getProjectGallery($code) {
		
			$select = $this->_db->select()	
						->from(array('gallery' => 'gallery'))
						->joinLeft(array('galleryimage' => 'galleryimage'), 'galleryimage.gallery_code = gallery.gallery_code and galleryimage_primary = 1', array('galleryimage_code', 'galleryimage_filename', 'galleryimage_primary', 'galleryimage_path', 'galleryimage_ext'))
						->joinLeft(array('project' => 'project'), 'project.project_code = gallery.project_code')	
						->joinLeft(array('account' => 'account'), 'account.account_code = project.account_code')	
						->where('gallery_deleted = 0 and project_deleted = 0 and account_deleted = 0')
						->where('gallery.gallery_code = ?', $code)
						->order('gallery_added desc');
		
		$result = $this->_db->fetchRow($select);
		return ($result == false) ? false : $result = $result;
	}
	
	public function getByEvent($code = '') {
		
		if($code == '') {
			$select = $this->_db->select()	
						->from(array('gallery' => 'gallery'))
						->joinLeft(array('galleryimage' => 'galleryimage'), 'galleryimage.gallery_code = gallery.gallery_code and galleryimage_primary = 1', array('galleryimage_code', 'galleryimage_filename', 'galleryimage_primary', 'galleryimage_path', 'galleryimage_ext'))
						->joinLeft(array('event' => 'event'), 'event.event_code = gallery.event_code')	
						->joinLeft(array('account' => 'account'), 'account.account_code = event.account_code')	
						->where('gallery_deleted = 0 and event_deleted = 0 and account_deleted = 0')
						->order('gallery_added desc');
		} else {
			$select = $this->_db->select()	
						->from(array('gallery' => 'gallery'))
						->joinLeft(array('galleryimage' => 'galleryimage'), 'galleryimage.gallery_code = gallery.gallery_code and galleryimage_primary = 1', array('galleryimage_code', 'galleryimage_filename', 'galleryimage_primary', 'galleryimage_path', 'galleryimage_ext'))
						->joinLeft(array('event' => 'event'), 'event.event_code = gallery.event_code')	
						->joinLeft(array('account' => 'account'), 'account.account_code = event.account_code')	
						->where('gallery_deleted = 0 and event_deleted = 0 and account_deleted = 0')
						->where('gallery.event_code = ?', $code)
						->order('gallery_added desc');			
		}
		$result = $this->_db->fetchAll($select);
		return ($result == false) ? false : $result = $result;
	}
	
	public function getAll() {
	
		$select = $this->_db->select()	
					->from(array('gallery' => 'gallery'))
					->joinLeft(array('galleryimage' => 'galleryimage'), 'galleryimage.gallery_code = gallery.gallery_code and galleryimage_primary = 1', array('galleryimage_code', 'galleryimage_filename', 'galleryimage_primary', 'galleryimage_path', 'galleryimage_ext'))
					->where('gallery_deleted = 0')
					->where("gallery.event_code = '' or gallery.event_code is null")
					->where("gallery.project_code = '' or gallery.project_code is null")
					->order('gallery_added desc');	

		$result = $this->_db->fetchAll($select);
		return ($result == false) ? false : $result = $result;	
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($code) {
		$select = $this->_db->select()	
					->from(array('gallery' => 'gallery'))	
					   ->where('gallery_code = ?', $code)
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