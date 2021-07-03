<?php /* Smarty version 2.6.20, created on 2015-04-23 22:25:27
         compiled from participant/view/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'participant/view/login.tpl', 53, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMB COUNCIL</title>
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
			<li><a href="/participant/" title="Members">Members</a></li>
			<li><a href="/participant/view/" title="Members">View</a></li>
			<li><?php echo $this->_tpl_vars['participantData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['participantData']['participant_surname']; ?>
</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2><?php echo $this->_tpl_vars['participantData']['participant_name']; ?>
 <?php echo $this->_tpl_vars['participantData']['participant_surname']; ?>
</h2>
    <div id="sidetabs">
        <ul> 
            <li><a href="/participant/view/details.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" title="Details">Details</a></li>
			<li class="active"><a href="" title="LOGIN">LOGIN</a></li>
			<li><a href="/participant/view/mail.php?code=<?php echo $this->_tpl_vars['participantData']['participant_code']; ?>
" title="Mailers">Mailers</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
	<h4>Login Types for the user:</h4><br>
	<form method="post" action="#" name="itemaddForm" id="itemaddForm">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="innertable">
		<thead>
		<tr>
			<th>Added</th>
			<th>Image</th>
			<th>Fullname</th>
			<th>Location</th>			
			<th>Email</th>
			<th>Password</th>			
			<th>type</th>
			<th>Account ID</th>
			<th>Status</th>
		</tr>
		</thead>
		<tbody>
		<?php $_from = $this->_tpl_vars['participantloginData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		  <tr>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['participantlogin_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
			<td align="left"><img src="<?php if ($this->_tpl_vars['item']['participantlogin_image'] == ''): ?>/images/avatar.jpg<?php else: ?><?php echo $this->_tpl_vars['item']['participantlogin_image']; ?>
<?php endif; ?>" width="60" /></td>
			<td align="left"><?php echo $this->_tpl_vars['item']['participantlogin_name']; ?>
 <?php echo $this->_tpl_vars['item']['participantlogin_surname']; ?>
</td>
			<td align="left"><?php echo $this->_tpl_vars['item']['participantlogin_location']; ?>
</td>			
			<td align="left"><?php echo $this->_tpl_vars['item']['participantlogin_username']; ?>
</td>
			<td align="left"><?php echo $this->_tpl_vars['item']['participantlogin_password']; ?>
</td>
			<td align="left"><?php echo $this->_tpl_vars['item']['participantlogin_type']; ?>
</td>
			<td align="left"><?php echo $this->_tpl_vars['item']['participantlogin_id']; ?>
</td>
			<td align="left"><?php if ($this->_tpl_vars['item']['participantlogin_active'] == '1'): ?><span style="color: green;">Active</span><?php else: ?><span style="color: red;">Not Active</span><?php endif; ?></td>
		  </tr>
		  <?php endforeach; endif; unset($_from); ?>  		
		</tbody>						
	</table>
	</form>	
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<!-- End Main Container -->
</body>
</html>