<?php /* Smarty version 2.6.20, created on 2015-07-18 13:11:36
         compiled from campaign/default.tpl */ ?>
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
    <!-- Start Content Section -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

  <div class="inner">  
		<h2>Manage Campaigns</h2>
		<div class="section">
			<a href="/campaign/view/" title="View Campaigns"><img src="/images/users.gif" alt="View Campaigns" height="50" width="50" /></a>
			<a href="/campaign/view/" title="View Campaigns" class="title">View Campaigns</a>
		</div>
		<div class="section mrg_left_50">
			<a href="/campaign/article/" title="Campaign Articles"><img src="/images/projects.gif" alt="Campaign Articles" height="50" width="50" /></a>
			<a href="/campaign/article/" title="Campaign Articles" class="title">Campaign Articles</a>
		</div>
		<div class="section mrg_left_50">
			<a href="/campaign/video/" title="Campaign Video"><img src="/images/projects.gif" alt="Campaign Video" height="50" width="50" /></a>
			<a href="/campaign/video/" title="Campaign Video" class="title">Campaign Video</a>
		</div>
		<div class="clearer"><!-- --></div>	
		<div class="section">
			<a href="/campaign/event/" title="Campaign Event"><img src="/images/users.gif" alt="Campaign Event" height="50" width="50" /></a>
			<a href="/campaign/event/" title="Campaign Event" class="title">Campaign Event</a>
		</div>	
		<div class="clearer"><!-- --></div>		
    </div><!--inner-->
  </div><!-- End Content Section -->
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<!-- End Main Container -->
</body>
</html>