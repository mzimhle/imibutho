<?php /* Smarty version 2.6.20, created on 2015-07-20 22:33:05
         compiled from project/event/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'project/event/details.tpl', 65, false),)), $this); ?>
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
			<li><a href="/project/event/" title="Events">Events</a></li>
			<li><?php if (isset ( $this->_tpl_vars['eventData'] )): ?><?php echo $this->_tpl_vars['eventData']['event_name']; ?>
<?php else: ?>Add an Event<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['eventData'] )): ?><?php echo $this->_tpl_vars['eventData']['event_name']; ?>
<?php else: ?>Add an Event<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['eventData'] )): ?>/project/event/comments.php?code=<?php echo $this->_tpl_vars['eventData']['event_code']; ?>
<?php endif; ?>" title="Comments">Comments</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/project/event/details.php<?php if (isset ( $this->_tpl_vars['eventData'] )): ?>?code=<?php echo $this->_tpl_vars['eventData']['event_code']; ?>
<?php endif; ?>" method="post" >
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td colspan="3">
				<h4 class="error">Name:</h4><br />
				<input type="text" name="event_name" id="event_name" value="<?php echo $this->_tpl_vars['eventData']['event_name']; ?>
" size="60" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['event_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['event_name']; ?>
</span><?php else: ?><br />Event full name(s)<?php endif; ?>
			</td>			
          </tr>
		  <tr>
			<td colspan="3">				
				<h4 class="error">Project:</h4><br />
				<?php if (! isset ( $this->_tpl_vars['eventData'] )): ?> 
				<input type="text" name="project_name" id="project_name" value="<?php echo $this->_tpl_vars['eventData']['project_name']; ?>
" size="120" />
				<input type="hidden" name="project_code" id="project_code" value="<?php echo $this->_tpl_vars['eventData']['project_code']; ?>
" />
				<?php else: ?>
				<span class="success"><?php echo $this->_tpl_vars['eventData']['project_name']; ?>
</span>
				<input type="hidden" name="project_code" id="project_code" value="<?php echo $this->_tpl_vars['eventData']['project_code']; ?>
" />				
				<?php endif; ?>
				<?php if (isset ( $this->_tpl_vars['errorArray']['project_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['project_code']; ?>
</span><?php else: ?><br />Project owner of the event<?php endif; ?>
			</td>			  
		  </tr>		  
          <tr>	
			<td colspan="3" valign="top">
				<h4 class="error">Short Description:</h4><br />
				<textarea name="event_description" id="event_description" cols="80" rows="4"><?php echo $this->_tpl_vars['eventData']['event_description']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['event_description'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['event_description']; ?>
</span><?php endif; ?>
				<p id="charcount" class="error">0 characters entered.</p>
			</td>						
          </tr>
          <tr>
			<td valign="top">
				<h4 class="error">Start Date:</h4><br />
				<input type="text" name="event_date_start" id="event_date_start" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['eventData']['event_date_start'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M')); ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['event_date_start'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['event_date_start']; ?>
</span><?php endif; ?>
				<br /><br />
				<h4 class="error">End Date:</h4><br />
				<input type="text" name="event_date_end" id="event_date_end" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['eventData']['event_date_end'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M')); ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['event_date_end'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['event_date_end']; ?>
</span><?php endif; ?>				
			</td>							
          </tr>		  
          <tr>
			<td colspan="3">
				<h4 class="error">Event Page:</h4><br />
				<textarea id="event_page" name="event_page" cols="130" rows="50"><?php echo $this->_tpl_vars['eventData']['event_page']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['event_page'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['event_page']; ?>
</span><?php endif; ?>
			</td>
          </tr>			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/project/event/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	nicEditors.findEditor(\'event_page\').saveContent();
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
		
	new nicEditor({
		iconsPath	: \'/library/javascript/nicedit/nicEditorIcons.gif\',
		uploadURI : \'/library/javascript/nicedit/nicUpload.php\',
	}).panelInstance(\'event_page\');				


	$("#event_description").keyup(function () {
		var i = $("#event_description").val().length;
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
	
	'; ?>
<?php if (! isset ( $this->_tpl_vars['articleData'] )): ?> <?php echo '
	$( "#project_name" ).autocomplete({
		source: "/feeds/project.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == \'\') {
				$(\'#project_name\').html(\'\');
				$(\'#project_code\').val(\'\');					
			} else {
				$(\'#project_name\').html(\'<b>\' + ui.item.value + \'</b>\');
				$(\'#project_code\').val(ui.item.id);	
			}
			$(\'#project_name\').val(\'\');										
		}
	});
	'; ?>
<?php endif; ?> <?php echo '
	
	$( "#event_date_start" ).datetimepicker({
		dateFormat: \'yy-mm-dd\',
		changeMonth: true, 
		changeYear: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#event_date_end" ).datetimepicker( "option", "minDate", selectedDate );
		}
	});
	
	$( "#event_date_end" ).datetimepicker({
		dateFormat: \'yy-mm-dd\',
		changeMonth: true, 
		changeYear: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#event_date_start" ).datetimepicker( "option", "maxDate", selectedDate );
		}
	});
	
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>