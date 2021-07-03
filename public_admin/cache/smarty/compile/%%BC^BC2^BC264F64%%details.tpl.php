<?php /* Smarty version 2.6.20, created on 2015-07-20 21:00:01
         compiled from poll/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'poll/details.tpl', 46, false),)), $this); ?>
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
			<li><a href="/poll/" title="Polls">Polls</a></li>
			<li><?php if (isset ( $this->_tpl_vars['pollData'] )): ?><?php echo $this->_tpl_vars['pollData']['poll_question']; ?>
<?php else: ?>Add a poll<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['pollData'] )): ?><?php echo $this->_tpl_vars['pollData']['poll_question']; ?>
<?php else: ?>Add a poll<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['pollData'] )): ?>/poll/answers.php?code=<?php echo $this->_tpl_vars['pollData']['poll_code']; ?>
<?php endif; ?>" title="Answers">Answers</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['pollData'] )): ?>/poll/responses.php?code=<?php echo $this->_tpl_vars['pollData']['poll_code']; ?>
<?php endif; ?>" title="Responses">Responses</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/poll/details.php<?php if (isset ( $this->_tpl_vars['pollData'] )): ?>?code=<?php echo $this->_tpl_vars['pollData']['poll_code']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Question:</h4><br />
					<textarea name="poll_question" id="poll_question" cols="120" rows="2"><?php echo $this->_tpl_vars['pollData']['poll_question']; ?>
</textarea>
					<?php if (isset ( $this->_tpl_vars['errorArray']['poll_question'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['poll_question']; ?>
</span><?php endif; ?>
					<p id="charcount" class="error">0 characters entered.</p>
			</td>			
          </tr>
          <tr>
			<td valign="top">
				<h4 class="error">Start Date:</h4><br />
				<input type="text" name="poll_date_start" id="poll_date_start" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pollData']['poll_date_start'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['poll_date_start'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['poll_date_start']; ?>
</span><?php endif; ?>
				<br /><br />
				<h4 class="error">End Date:</h4><br />
				<input type="text" name="poll_date_end" id="poll_date_end" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pollData']['poll_date_end'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['poll_date_end'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['poll_date_end']; ?>
</span><?php endif; ?>				
			</td>							
          </tr>		  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/poll/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {		
	
	$("#poll_question").keyup(function () {
		var i = $("#poll_question").val().length;
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
	
	$( "#poll_date_start" ).datepicker({
		dateFormat: \'yy-mm-dd\',
		changeMonth: true, 
		changeYear: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#poll_date_end" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	
	$( "#poll_date_end" ).datepicker({
		dateFormat: \'yy-mm-dd\',
		changeMonth: true, 
		changeYear: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#poll_date_start" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>