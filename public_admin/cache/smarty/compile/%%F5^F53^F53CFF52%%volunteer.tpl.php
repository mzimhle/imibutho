<?php /* Smarty version 2.6.20, created on 2015-07-18 20:34:36
         compiled from project/view/volunteer.tpl */ ?>
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
			<li>Volunteer List</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2><?php echo $this->_tpl_vars['projectData']['project_name']; ?>
</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
            <li><a href="/project/view/details.php?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
" title="Details">Details</a></li>
			<li><a href="/project/view/contact.php?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
" title="Contacts">Contacts</a></li>
			<li><a href="/project/view/subscriber.php?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
" title="Subscribers">Subscribers</a></li>
			<li class="active"><a href="#" title="Volunteers">Volunteers</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<p class="success">Volunteers are those who get all the project information but also can share their details with the project owners for communication.</p>
	<form id="addForm" name="addForm" action="/project/view/volunteer.php?code=<?php echo $this->_tpl_vars['projectData']['project_code']; ?>
" method="post">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">	
		<tbody>
			<tr>
				<th>Number</th>
				<th>Full Name</th>
				<th>Email</th>
			</tr>
		  <?php $_from = $this->_tpl_vars['volunteerData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['foo']['iteration']++;
?>
		  <tr>											
			<td>No. <?php echo $this->_foreach['foo']['iteration']; ?>
</td>		
			<td><?php echo $this->_tpl_vars['item']['volunteer_name']; ?>
</td>		
			<td><?php echo $this->_tpl_vars['item']['volunteer_email']; ?>
</td>		
		  </tr>
		  <?php endforeach; else: ?>
			<tr><td colspan="3" class="error">There are no records on the system</td></tr>
		  <?php endif; unset($_from); ?> 	  
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
<!-- End Main Container -->
</body>
</html>