<?php /* Smarty version 2.6.20, created on 2015-07-19 17:57:53
         compiled from project/gallery/details.tpl */ ?>
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
			<li><a href="/project/" title="Project">Project</a></li>
			<li><a href="/project/gallery/" title="Gallery">Gallery</a></li>
			<li><?php if (isset ( $this->_tpl_vars['galleryData'] )): ?>Edit Gallery<?php else: ?>Add a Gallery<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
<div class="inner"> 
      <h2><?php if (isset ( $this->_tpl_vars['galleryData'] )): ?>Edit Gallery<?php else: ?>Add a Gallery<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['galleryData'] )): ?>/project/gallery/image.php?code=<?php echo $this->_tpl_vars['galleryData']['gallery_code']; ?>
<?php else: ?>#<?php endif; ?>" title="Images">Images</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/project/gallery/details.php<?php if (isset ( $this->_tpl_vars['galleryData'] )): ?>?code=<?php echo $this->_tpl_vars['galleryData']['gallery_code']; ?>
<?php endif; ?>" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td><h4 class="error">Name:</h4>
				<br /><input type="text" name="gallery_name" id="gallery_name" value="<?php echo $this->_tpl_vars['galleryData']['gallery_name']; ?>
" size="60" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['gallery_name'] )): ?><br /><em class="error"><?php echo $this->_tpl_vars['errorArray']['gallery_name']; ?>
<em><?php else: ?><br /><em>Gallery name</em><?php endif; ?>
			</td>	
		</tr>
		<tr>
			<td>
				<h4 class="error">Project Name:</h4><br />
				<?php if (! isset ( $this->_tpl_vars['galleryData'] )): ?>
				<input type="text" name="project_name" id="project_name" value="<?php echo $this->_tpl_vars['galleryData']['project_name']; ?>
" size="120" />
				<input type="hidden" name="project_code" id="project_code" value="<?php echo $this->_tpl_vars['galleryData']['project_code']; ?>
" />
				<?php else: ?>
				<span class="success"><?php echo $this->_tpl_vars['galleryData']['project_name']; ?>
</span>
				<input type="hidden" name="project_code" id="project_code" value="<?php echo $this->_tpl_vars['galleryData']['project_code']; ?>
" />				
				<?php endif; ?>				
				<?php if (isset ( $this->_tpl_vars['errorArray']['project_code'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['project_code']; ?>
</span><?php else: ?><br />Project name of the gallery<?php endif; ?>
			</td>			
		</tr>
		<tr>
			<td><h4 class="error">Description:</h4><br />
				<textarea id="gallery_description" name="gallery_description" cols="100" rows="2"><?php echo $this->_tpl_vars['galleryData']['gallery_description']; ?>
</textarea>
				<?php if (isset ( $this->_tpl_vars['errorArray']['gallery_description'] )): ?><br /><em id="charcount" class="error"><?php echo $this->_tpl_vars['errorArray']['gallery_description']; ?>
<em><?php else: ?><br /><em id="charcount" class="error">0 characters entered.</em><?php endif; ?>
			</td>		
		</tr>
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
	<div class="mrg_top_10">
	  <a href="/project/gallery/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
	  <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
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

$(document).ready(function() {
	
	$("#gallery_description").keyup(function () {
		var i = $("#gallery_description").val().length;
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
<?php if (! isset ( $this->_tpl_vars['galleryData'] )): ?><?php echo '
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
<?php endif; ?><?php echo '
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>