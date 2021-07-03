<?php /* Smarty version 2.6.20, created on 2015-07-20 19:03:10
         compiled from poll/answers.tpl */ ?>
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
			<li><a href="/poll/" title="Polls">Polls</a></li>
			<li><?php echo $this->_tpl_vars['pollData']['poll_question']; ?>
</li>
			<li>Answer List</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2><?php echo $this->_tpl_vars['pollData']['poll_question']; ?>
</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
            <li><a href="/poll/details.php?code=<?php echo $this->_tpl_vars['pollData']['poll_code']; ?>
" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Answers">Answers</a></li>
			<li><a href="/poll/responses.php?code=<?php echo $this->_tpl_vars['pollData']['poll_code']; ?>
" title="Responses">Responses</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<form id="addForm" name="addForm" action="/poll/answers.php?code=<?php echo $this->_tpl_vars['pollData']['poll_code']; ?>
" method="post">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">	
	   <tbody>
		  <tr>
			<th>Optional Response</th>
			<th>Correct response</th>
			<th></th>
			<th></th>
		   </tr>	   
	  <?php $_from = $this->_tpl_vars['pollquestionData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	  <tr>											
		<td>
			<input type="text" name="pollquestion_text_<?php echo $this->_tpl_vars['item']['pollquestion_code']; ?>
" id="pollquestion_text_<?php echo $this->_tpl_vars['item']['pollquestion_code']; ?>
" value="<?php echo $this->_tpl_vars['item']['pollquestion_text']; ?>
" size="80" />
		</td>		
		<td>
			<input type="radio" name="pollquestion_correct" id="pollquestion_correct_<?php echo $this->_tpl_vars['item']['pollquestion_code']; ?>
" value="<?php echo $this->_tpl_vars['item']['pollquestion_code']; ?>
" <?php if ($this->_tpl_vars['item']['pollquestion_correct'] == 1): ?> checked="checked"<?php endif; ?> />
		</td>		
		<td>	
			<button onclick="javascript:updateForm('<?php echo $this->_tpl_vars['item']['pollquestion_code']; ?>
'); return false;" >Update</button>
		</td>	
		<td>
			<?php if ($this->_tpl_vars['item']['pollquestion_correct'] == '0'): ?>
			<button onclick="javascript:deleteForm('<?php echo $this->_tpl_vars['item']['pollquestion_code']; ?>
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
			<th>Optional Response</th>
			<th colspan="3"></th>
		   </tr>
		<tr>
			<td>
				<input type="text" id="pollquestion_text" name="pollquestion_text" size="80" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['pollquestion_text'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['pollquestion_text']; ?>
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
		if($(\'#pollquestion_correct_\'+id).is(\':checked\')) {
			primary = id;
		}			
		
		$.ajax({ 
				type: "GET",
				url: "answers.php",
				data: "code='; ?>
<?php echo $this->_tpl_vars['pollData']['poll_code']; ?>
<?php echo '&pollquestion_code_update="+id+"&pollquestion_correct="+primary + "&pollquestion_text="+$(\'#pollquestion_text_\'+id).val(),
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
<?php echo $this->_tpl_vars['pollData']['poll_code']; ?>
<?php echo '&pollquestion_code_delete="+id,
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