<?php /* Smarty version 2.6.20, created on 2015-07-18 20:03:36
         compiled from project/view/contact.tpl */ ?>
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
			<li><a href="/project/" title="Projects">Projects</a></li>
			<li><a href="/project/view/" title="View">View</a></li>
			<li><?php echo $this->_tpl_vars['projectData']['project_name']; ?>
</li>
			<li>Contact List</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2><?php echo $this->_tpl_vars['projectData']['project_name']; ?>
</h2>

    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
            <li><a href="/project/view/contact.php?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Contacts">Contacts</a></li>
			<li><a href="/project/view/subscriber.php?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
" title="Subscribers">Subscribers</a></li>
			<li><a href="/project/view/volunteer.php?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
" title="Volunteers">Volunteers</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<form id="addForm" name="addForm" action="/project/view/contact.php?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
" method="post">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">	
	   <tbody>
		  <tr>
			<th>Full Name</th>
			<th>Position</th>
			<th>Email</th>
			<th>Cellphone</th>
			<th>Primary</th>
			<th></th>
			<th></th>
		   </tr>	   
	  <?php $_from = $this->_tpl_vars['projectcontactData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	  <tr>											
		<td>
			<input type="text" name="projectcontact_name_<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
" id="projectcontact_name_<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
" value="<?php echo $this->_tpl_vars['item']['projectcontact_name']; ?>
" size="20" />
		</td>	
		<td>
			<input type="text" name="projectcontact_position_<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
" id="projectcontact_position_<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
" value="<?php echo $this->_tpl_vars['item']['projectcontact_position']; ?>
" size="20" />
		</td>
		<td>
			<input type="text" name="projectcontact_email_<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
" id="projectcontact_email_<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
" value="<?php echo $this->_tpl_vars['item']['projectcontact_email']; ?>
" size="20" />
		</td>
		<td>
			<input type="text" name="projectcontact_cellphone_<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
" id="projectcontact_cellphone_<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
" value="<?php echo $this->_tpl_vars['item']['projectcontact_cellphone']; ?>
" size="20" />
		</td>		
		<td>
			<input type="radio" name="projectcontact_primary" id="projectcontact_primary_<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
" value="<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
" <?php if ($this->_tpl_vars['item']['projectcontact_primary'] == 1): ?> checked="checked"<?php endif; ?> />
		</td>		
		<td>	
			<button onclick="javascript:updateForm('<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
'); return false;" >Update</button>
		</td>	
		<td>
			<?php if ($this->_tpl_vars['item']['projectcontact_primary'] == '0'): ?>
			<button onclick="javascript:deleteForm('<?php echo $this->_tpl_vars['item']['projectcontact_code']; ?>
'); return false;" >Delete</button>
			<?php else: ?>
			N/A
			<?php endif; ?>		
		</td>		
	  </tr>
	  <?php endforeach; else: ?>
		<tr>
			<td colspan="7" class="error">There are no current items in the system.</td>
		</tr>
	  <?php endif; unset($_from); ?> 
		  <tr>
			<th>Full Name</th>
			<th>Position</th>
			<th>Email</th>
			<th>Cellphone</th>
			<th colspan="3"></th>
		   </tr>
		<tr>
			<td>
				<input type="text" id="projectcontact_name" name="projectcontact_name" size="20" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['projectcontact_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['projectcontact_name']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<input type="text" id="projectcontact_position" name="projectcontact_position" size="20" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['projectcontact_position'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['projectcontact_position']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<input type="text" id="projectcontact_email" name="projectcontact_email" size="20" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['projectcontact_email'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['projectcontact_email']; ?>
</span><?php endif; ?>
			</td>	
			<td>
				<input type="text" id="projectcontact_cellphone" name="projectcontact_cellphone" size="20" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['projectcontact_cellphone'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['projectcontact_cellphone']; ?>
</span><?php endif; ?>
			</td>			
			<td colspan="3"><button onclick="addItemForm(); return false;">Add Item</button></td>
		</tr>	  
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
		if($(\'#projectcontact_primary_\'+id).is(\':checked\')) {
			primary = id;
		}			
		
		$.ajax({ 
				type: "GET",
				url: "contact.php",
				data: "code='; ?>
<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
<?php echo '&projectcontact_code_update="+id+"&projectcontact_primary="+primary + "&projectcontact_name="+$(\'#projectcontact_name_\'+id).val() + "&projectcontact_position="+$(\'#projectcontact_position_\'+id).val() + "&projectcontact_email="+$(\'#projectcontact_email_\'+id).val() + "&projectcontact_cellphone="+$(\'#projectcontact_cellphone_\'+id).val(),
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
<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
<?php echo '&projectcontact_code_delete="+id,
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