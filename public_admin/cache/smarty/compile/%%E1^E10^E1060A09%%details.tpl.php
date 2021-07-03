<?php /* Smarty version 2.6.20, created on 2015-07-19 17:39:09
         compiled from project/article/details.tpl */ ?>
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
			<li><a href="/project/" title="Projects">Projects</a></li>
			<li><a href="/project/article/" title="Articles">Articles</a></li>
			<li><?php if (isset ( $this->_tpl_vars['articleData'] )): ?><?php echo $this->_tpl_vars['articleData']['article_name']; ?>
<?php else: ?>Add an Article<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['articleData'] )): ?><?php echo $this->_tpl_vars['articleData']['article_name']; ?>
<?php else: ?>Add an Article<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['articleData'] )): ?>/project/article/comments.php?code=<?php echo $this->_tpl_vars['articleData']['article_code']; ?>
<?php endif; ?>" title="Comments">Comments</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/project/article/details.php<?php if (isset ( $this->_tpl_vars['articleData'] )): ?>?code=<?php echo $this->_tpl_vars['articleData']['article_code']; ?>
<?php endif; ?>" method="post" >
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td colspan="3">
				<h4 class="error">Name:</h4><br />
				<input type="text" name="article_name" id="article_name" value="<?php echo $this->_tpl_vars['articleData']['article_name']; ?>
" size="120" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['article_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['article_name']; ?>
</span><?php else: ?><br />Article full name(s)<?php endif; ?>
			</td>			
          </tr>
		  <tr>
			<td colspan="3">				
				<h4>Project:</h4><br />
				<?php if (! isset ( $this->_tpl_vars['articleData'] )): ?> 
				<input type="text" name="project_name" id="project_name" value="<?php echo $this->_tpl_vars['articleData']['project_name']; ?>
" size="120" />
				<input type="hidden" name="project_code" id="project_code" value="<?php echo $this->_tpl_vars['articleData']['project_code']; ?>
" />
				<?php else: ?>
				<span class="success"><?php echo $this->_tpl_vars['articleData']['project_name']; ?>
</span>
				<input type="hidden" name="project_code" id="project_code" value="<?php echo $this->_tpl_vars['articleData']['project_code']; ?>
" />				
				<?php endif; ?>
				<?php if (isset ( $this->_tpl_vars['errorArray']['project_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['project_code']; ?>
</span><?php else: ?><br />Project owner of the article<?php endif; ?>
			</td>			  
		  </tr>
          <tr>	
			<td colspan="3" valign="top">
				<h4 class="error">Short Description:</h4><br />
				<textarea name="article_description" id="article_description" cols="80" rows="4"><?php echo $this->_tpl_vars['articleData']['article_description']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['article_description'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['article_description']; ?>
</span><?php endif; ?>
				<p id="charcount" class="error">0 characters entered.</p>
			</td>						
          </tr>
          <tr>
			<td colspan="3">
				<h4 class="error">Article Page:</h4><br />
				<textarea id="article_page" name="article_page" cols="130" rows="50"><?php echo $this->_tpl_vars['articleData']['article_page']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['article_page'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['article_page']; ?>
</span><?php endif; ?>
			</td>
          </tr>			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/project/article/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	nicEditors.findEditor(\'article_page\').saveContent();
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
		
	new nicEditor({
		iconsPath	: \'/library/javascript/nicedit/nicEditorIcons.gif\',
		uploadURI : \'/library/javascript/nicedit/nicUpload.php\',
	}).panelInstance(\'article_page\');				


	$("#article_description").keyup(function () {
		var i = $("#article_description").val().length;
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
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>