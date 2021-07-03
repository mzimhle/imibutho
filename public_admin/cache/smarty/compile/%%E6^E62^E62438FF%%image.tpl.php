<?php /* Smarty version 2.6.20, created on 2015-07-19 18:36:03
         compiled from gallery/image.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imibutho Forum</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content recruiter -->
  <div id="content">
 
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/gallery/" title="">Gallery</a></li>
			<li><a href="/gallery/details.php?code=<?php echo $this->_tpl_vars['galleryData']['gallery_code']; ?>
" title=""><?php echo $this->_tpl_vars['galleryData']['gallery_name']; ?>
</a></li>
			<li>Images</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2><?php echo $this->_tpl_vars['galleryData']['gallery_name']; ?>
</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
			<li><a href="/gallery/details.php?code=<?php echo $this->_tpl_vars['galleryData']['gallery_code']; ?>
" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Images">Images</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<form id="addForm" name="addForm" action="/gallery/image.php?code=<?php echo $this->_tpl_vars['galleryData']['gallery_code']; ?>
" method="post" enctype="multipart/form-data">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<th colspan="4">Upload</th>
			<th></th>
		   </tr>
		<tr>
			<td colspan="4">
				<input type="file" id="imagefile[]" name="imagefile[]" multiple />
				<?php if (isset ( $this->_tpl_vars['errorArray'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']; ?>
</span><?php endif; ?>
			</td>
			<td><button onclick="addItemForm(); return false;">Add Item</button></td>
		</tr>	
	   <tbody>
		  <tr>
			<th width="12%">Image</th>
			<th width="40%">Name</th>					
			<th width="10%">Primary</th>
			<th width="*" class="rgt"></th>
			<th width="*" class="rgt"></th>
		   </tr>	   
	  <?php $_from = $this->_tpl_vars['galleryimageData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	  <tr>
		<td><a target="_blank" href="http://www.imibutho.co.za<?php echo $this->_tpl_vars['item']['galleryimage_path']; ?>
/big_<?php echo $this->_tpl_vars['item']['galleryimage_code']; ?>
<?php echo $this->_tpl_vars['item']['galleryimage_ext']; ?>
"><img src="http://www.imibutho.co.za<?php echo $this->_tpl_vars['item']['galleryimage_path']; ?>
/tny_<?php echo $this->_tpl_vars['item']['galleryimage_code']; ?>
<?php echo $this->_tpl_vars['item']['galleryimage_ext']; ?>
" /></a></td>											
		<td><input type="text" name="galleryimage_description_<?php echo $this->_tpl_vars['item']['galleryimage_code']; ?>
" id="galleryimage_description_<?php echo $this->_tpl_vars['item']['galleryimage_code']; ?>
" value="<?php echo $this->_tpl_vars['item']['galleryimage_description']; ?>
" size="60" /></td>									
		<td>
			<input type="radio" name="galleryimage_primary" id="galleryimage_primary_<?php echo $this->_tpl_vars['item']['galleryimage_code']; ?>
" value="<?php echo $this->_tpl_vars['item']['galleryimage_code']; ?>
" <?php if ($this->_tpl_vars['item']['galleryimage_primary'] == 1): ?> checked="checked"<?php endif; ?> />
		</td>			
		<td>	
			<button onclick="javascript:updateForm('<?php echo $this->_tpl_vars['item']['galleryimage_code']; ?>
'); return false;" >Update</button>
		</td>	
		<td>
			<?php if ($this->_tpl_vars['item']['galleryimage_primary'] == '0'): ?>
			<button onclick="javascript:deleteForm('<?php echo $this->_tpl_vars['item']['galleryimage_code']; ?>
'); return false;" >Delete</button>
			<?php else: ?>
			N/A
			<?php endif; ?>		
		</td>		
	  </tr>
	  <?php endforeach; else: ?>
		<tr>
			<td colspan="5" class="error">There are no current items in the system.</td>
		</tr>
	  <?php endif; unset($_from); ?>  								
		</tbody>						
	</table>
	</form>
	</div>
	<div class="clearer"><!-- --></div>	

    </div><!--inner-->
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<?php echo '
<script type="text/javascript">
function addItemForm() {
	document.forms.addForm.submit();				 
}			
	
function updateForm(id) {
	if(confirm(\'Are you sure you want to update this file ?\')) {
		var primary = \'\';
		if($(\'#galleryimage_primary_\'+id).is(\':checked\')) {
			primary = id;
		}			
		
		$.ajax({ 
				type: "GET",
				url: "image.php",
				data: "code='; ?>
<?php echo $this->_tpl_vars['galleryData']['gallery_code']; ?>
<?php echo '&galleryimage_code_update="+id+"&galleryimage_primary="+primary + "&galleryimage_description="+$(\'#galleryimage_description_\'+id).val(),
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert(\'Updated\');
							window.location.href = window.location.href;
						} else {
							alert(data.error);
						}
				}
		});							
	}
	
	return false;
}	
	
function deleteForm(id) {	
	if(confirm(\'Are you sure you want to delete this file?\')) {
			$.ajax({ 
					type: "GET",
					url: "image.php",
					data: "code='; ?>
<?php echo $this->_tpl_vars['galleryData']['gallery_code']; ?>
<?php echo '&galleryimage_code_delete="+id,
					dataType: "json",
					success: function(data){
							if(data.result == 1) {
								alert(\'Deleted\');
								window.location.href = window.location.href;
							} else {
								alert(data.error);
							}
					}
			});								
		}
	return false;
}
</script>
'; ?>

<!-- End Main Container -->
</body>
</html>