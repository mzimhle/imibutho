<?php /* Smarty version 2.6.20, created on 2015-07-18 13:37:37
         compiled from account/view/details.tpl */ ?>
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
			<li><a href="/account/" title="Members">Members</a></li>
			<li><a href="/account/view/" title="Members">View</a></li>
			<li><?php if (isset ( $this->_tpl_vars['accountData'] )): ?><?php echo $this->_tpl_vars['accountData']['account_name']; ?>
 <?php echo $this->_tpl_vars['accountData']['account_surname']; ?>
<?php else: ?>Add a Member<?php endif; ?></li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php if (isset ( $this->_tpl_vars['accountData'] )): ?><?php echo $this->_tpl_vars['accountData']['account_name']; ?>
 <?php echo $this->_tpl_vars['accountData']['account_surname']; ?>
<?php else: ?>Add a Member<?php endif; ?></h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['accountData'] )): ?>/account/view/login.php?code=<?php echo $this->_tpl_vars['accountData']['account_code']; ?>
<?php endif; ?>" title="Login">Login</a></li>
			<li><a href="<?php if (isset ( $this->_tpl_vars['accountData'] )): ?>/account/view/mail.php?code=<?php echo $this->_tpl_vars['accountData']['account_code']; ?>
<?php endif; ?>" title="Mailers">Mailers</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/account/view/details.php<?php if (isset ( $this->_tpl_vars['accountData'] )): ?>?code=<?php echo $this->_tpl_vars['accountData']['account_code']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Name:</h4><br />
				<input type="text" name="account_name" id="account_name" value="<?php echo $this->_tpl_vars['accountData']['account_name']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['account_name'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['account_name']; ?>
</span><?php else: ?><br />Members name(s)<?php endif; ?>
			</td>		
			<td>
				<h4 class="error">Email:</h4><br />
				<input type="text" name="account_email" id="account_email" value="<?php echo $this->_tpl_vars['accountData']['account_email']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['account_email'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['account_email']; ?>
</span><?php endif; ?>
			</td>
			<td>
				<h4>Cellphone:</h4><br />
				<input type="text" name="account_cellphone" id="account_cellphone" value="<?php echo $this->_tpl_vars['accountData']['account_cellphone']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['account_cellphone'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['account_cellphone']; ?>
</span><?php else: ?><br />e.g 0735896547<?php endif; ?>
			</td>			
          </tr>
          <tr>	
			<td>
				<h4>Telephone:</h4><br />
				<input type="text" name="account_telephone" id="account_telephone" value="<?php echo $this->_tpl_vars['accountData']['account_telephone']; ?>
" size="30" />
				<?php if (isset ( $this->_tpl_vars['errorArray']['account_telephone'] )): ?><br /><span class="error"><?php echo $this->_tpl_vars['errorArray']['account_telephone']; ?>
</span><?php else: ?><br />e.g 0215896547<?php endif; ?>
			</td>			
			<td colspan="2">
				<h4 class="error">Area code:</h4><br />
				<input type="text" name="areapost_name" id="areapost_name" value="<?php echo $this->_tpl_vars['accountData']['areapost_name']; ?>
" size="80" />
				<input type="hidden" name="areapost_code" id="areapost_code" value="<?php echo $this->_tpl_vars['accountData']['areapost_code']; ?>
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
				<?php if (! isset ( $this->_tpl_vars['accountData'] )): ?> 
					<img src="/images/avatar.jpg" width="120" />
				<?php else: ?>
					<?php if ($this->_tpl_vars['accountData']['account_image_path'] == ''): ?>
						<img src="/images/avatar.jpg" width="120" />
					<?php else: ?>
						<img src="http://www.imibutho.co.za<?php echo $this->_tpl_vars['accountData']['account_image_path']; ?>
tmb_<?php echo $this->_tpl_vars['accountData']['account_image_name']; ?>
<?php echo $this->_tpl_vars['accountData']['account_image_ext']; ?>
" />
					<?php endif; ?>
				<?php endif; ?>			
			</td>
          </tr>			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/account/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	
	$( "#account_dateofbirth" ).datepicker({ dateFormat: \'yy-mm-dd\', changeMonth: true, changeYear: true});
	
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
	
});

</script>
'; ?>

<!-- End Main Container -->
</body>
</html>