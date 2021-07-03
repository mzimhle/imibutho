<?php /* Smarty version 2.6.20, created on 2015-07-20 18:02:32
         compiled from project/view/details.tpl */ ?>
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

  	<br />
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/project/" title="Members">Members</a></li>
			<li><a href="/project/view/" title="Members">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['projectData'] )): ?><?php echo $this->_tpl_vars['projectData']['project_name']; ?>
 <?php echo $this->_tpl_vars['projectData']['project_surname']; ?>
<?php else: ?>Add a Member<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['projectData'] )): ?><?php echo $this->_tpl_vars['projectData']['project_name']; ?>
 <?php echo $this->_tpl_vars['projectData']['project_surname']; ?>
<?php else: ?>Add a Member<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['projectData'] )): ?>/project/view/contact.php?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
<?php endif; ?>" title="Contacts">Contacts</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['projectData'] )): ?>/project/view/subscriber.php?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
<?php endif; ?>" title="Subscribers">Subscribers</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['projectData'] )): ?>/project/view/volunteer.php?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
<?php endif; ?>" title="Volunteers">Volunteers</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/project/view/details.php<?php if (isset ( $this->_tpl_vars['projectData'] )): ?>?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td colspan="3">
				<h4 class="error">Name:</h4><br />
				<input type="text" name="project_name" id="project_name" value="<?php echo $this->_tpl_vars['projectData']['project_name']; ?>
" size="120" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['project_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['project_name']; ?>
</span><?php else: ?><br />Project full name(s)<?php endif; ?>
			</td>			
          </tr>
		  <tr>
			<td colspan="3">
				<h4 class="error">Account:</h4><br />
				<input type="text" name="account_name" id="account_name" value="<?php echo $this->_tpl_vars['projectData']['account_name']; ?>
" size="120" />
				<input type="hidden" name="account_code" id="account_code" value="<?php echo $this->_tpl_vars['projectData']['account_code']; ?>
" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['account_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['account_code']; ?>
</span><?php else: ?><br />Account owner of the project<?php endif; ?>
			</td>			  
		  </tr>
          <tr>
			<td valign="top">
				<h4 class="error">Start Date:</h4><br />
				<input type="text" name="project_date_start" id="project_date_start" value="<?php echo $this->_tpl_vars['projectData']['project_date_start']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['project_date_start'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['project_date_start']; ?>
</span><?php endif; ?>
				<br /><br />
				<h4>End Date:</h4><br />
				<input type="text" name="project_date_end" id="project_date_end" value="<?php echo $this->_tpl_vars['projectData']['project_date_end']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['project_date_end'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['project_date_end']; ?>
</span><?php endif; ?>				
			</td>	
			<td colspan="2" valign="top">
				<h4 class="error">Short Description:</h4><br />
				<textarea name="project_description" id="project_description" cols="80" rows="4"><?php echo $this->_tpl_vars['projectData']['project_description']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['project_description'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['project_description']; ?>
</span><?php endif; ?>
				<p id="charcount" class="error">0 characters entered.</p>
			</td>						
          </tr>
          <tr>			  
			<td colspan="3">
				<h4 class="error">Area:</h4><br />
				<input type="text" name="areapost_name" id="areapost_name" value="<?php echo $this->_tpl_vars['projectData']['areapost_name']; ?>
" size="120" />
				<input type="hidden" name="areapost_code" id="areapost_code" value="<?php echo $this->_tpl_vars['projectData']['areapost_code']; ?>
" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['areapost_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['areapost_code']; ?>
</span><?php endif; ?>
			</td>				
          </tr>	  
          <tr>
			<td valign="top">
				<h4 <?php if (isset ( $this->_tpl_vars['errorArray']['profileimage'] )): ?>class="error"<?php endif; ?> >User Image:</h4> Images to upload: gif, png, jpg and jpeg<br /><br />
				<input type="file" id="profileimage" name="profileimage" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['profileimage'] )): ?><br /><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['profileimage']; ?>
</span><?php endif; ?>
			</td>
			<td colspan="2">
				<?php if (! isset ( $this->_tpl_vars['projectData'] )): ?> 
					<img src="/images/avatar.jpg" width="120" />
				<?php else: ?>
					<?php if ($this->_tpl_vars['projectData']['project_image_path'] == ''): ?>
						<img src="/images/avatar.jpg" width="120" />
					<?php else: ?>
						<img src="http://www.imibutho.co.za<?php echo $this->_tpl_vars['projectData']['project_image_path']; ?>
tmb_<?php echo $this->_tpl_vars['projectData']['project_image_name']; ?>
<?php echo $this->_tpl_vars['projectData']['project_image_ext']; ?>
" />
					<?php endif; ?>
				<?php endif; ?>			
			</td>
          </tr>
          <tr>
			<td colspan="3">
				<h4 class="error">Project Page:</h4><br />
				<textarea id="project_page" name="project_page" cols="130" rows="50"><?php echo $this->_tpl_vars['projectData']['project_page']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['project_page'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['project_page']; ?>
</span><?php endif; ?>
			</td>
          </tr>			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/project/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
        </div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<?php echo '
<script type="text/javascript" language="javascript">

function submitForm() {
	nicEditors.findEditor(\'project_page\').saveContent();
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
		
	new nicEditor({
		iconsPath	: \'/library/javascript/nicedit/nicEditorIcons.gif\',
		uploadURI : \'/library/javascript/nicedit/nicUpload.php\',
	}).panelInstance(\'project_page\');				
	
	$("#project_description").keyup(function () {
		var i = $("#project_description").val().length;
		$("#charcount").html(i+\' characters entered.\');
		if (i > 255) {
			$(\'#charcount\').removeClass(\'success\');
			$(\'#charcount\').addClass(\'error\');
		} else if(i == 0) {
			$(\'#charcount\').removeClass(\'success\');
			$(\'#charcount\').addClass(\'error\');
		} else {
			$(\'#charcount\').removeClass(\'error\');
			$(\'#charcount\').addClass(\'success\');
		} 
	});
	
	$( "#project_date_start" ).datepicker({
		dateFormat: \'yy-mm-dd\',
		changeMonth: true, 
		changeYear: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#project_date_end" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	
	$( "#project_date_end" ).datepicker({
		dateFormat: \'yy-mm-dd\',
		changeMonth: true, 
		changeYear: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#project_date_start" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
	$( "#areapost_name" ).autocomplete({
		source: "/feeds/areapost.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#areapost_name\').html(\'\');
				$(\'#areapost_code\').val(\'\');					
			} else {
				$(\'#areapost_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#areapost_code\').val(ui.item.id);	
			}
			$(\'#areapost_name\').val(\'\');										
		}
	});
	
	$( "#account_name" ).autocomplete({
		source: "/feeds/account.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#account_name\').html(\'\');
				$(\'#account_code\').val(\'\');					
			} else {
				$(\'#account_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#account_code\').val(ui.item.id);	
			}
			$(\'#account_name\').val(\'\');										
		}
	});
	
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>