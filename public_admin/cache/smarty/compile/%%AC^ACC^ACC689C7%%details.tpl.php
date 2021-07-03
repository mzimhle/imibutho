<?php /* Smarty version 2.6.20, created on 2015-07-20 21:57:35
         compiled from video/details.tpl */ ?>
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
			<li><a href="/video/" title="Video">Video</a></li>
			<li><?php if (isset ( $this->_tpl_vars['videoData'] )): ?><?php echo $this->_tpl_vars['videoData']['video_name']; ?>
<?php else: ?>Add an Video<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['videoData'] )): ?><?php echo $this->_tpl_vars['videoData']['video_name']; ?>
<?php else: ?>Add an Video<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['videoData'] )): ?>/video/comments.php?code=<?php echo $this->_tpl_vars['videoData']['video_code']; ?>
<?php endif; ?>" title="Comments">Comments</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/video/details.php<?php if (isset ( $this->_tpl_vars['videoData'] )): ?>?code=<?php echo $this->_tpl_vars['videoData']['video_code']; ?>
<?php endif; ?>" method="post" >
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Name:</h4><br />
				<input type="text" name="video_name" id="video_name" value="<?php echo $this->_tpl_vars['videoData']['video_name']; ?>
" size="120" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['video_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['video_name']; ?>
</span><?php else: ?><br />Video description<?php endif; ?>
			</td>			
          </tr>
          <tr>
			<td>
				<h4 class="error">URL link:</h4><br />
				<input type="text" name="video_url" id="video_url" value="<?php echo $this->_tpl_vars['videoData']['video_url']; ?>
" size="120" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['video_url'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['video_url']; ?>
</span><?php else: ?><br />Please add a valid video link, i.e. http://www.youtube.com/embed/CY_r9jcFajg<?php endif; ?>
			</td>			
          </tr>
		  <?php if (isset ( $this->_tpl_vars['videoData'] )): ?>
			<tr>
				<td>
					<h4>YouTube video:</h4><br />
					<iframe title="<?php echo $this->_tpl_vars['videoData']['video_name']; ?>
" class="youtube-player" type="text/html" width="640" height="390" src="<?php echo $this->_tpl_vars['videoData']['video_url']; ?>
" frameborder="0" allowFullScreen></iframe>
				</td>			
			</tr>	
			<?php endif; ?>			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/video/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>