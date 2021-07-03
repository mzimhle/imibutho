<?php /* Smarty version 2.6.20, created on 2015-07-21 18:48:09
         compiled from project/default.tpl */ ?>
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
		<h2>Manage Projects</h2>
		<div class="section">
			<a href="/project/view/" title="View Projects"><img src="/images/users.gif" alt="View Projects" height="50" width="50" /></a>
			<a href="/project/view/" title="View Projects" class="title">View Projects</a>
		</div>
		<div class="section mrg_left_50">
			<a href="/project/gallery/" title="Project Galleries"><img src="/images/projects.gif" alt="Project Galleries" height="50" width="50" /></a>
			<a href="/project/gallery/" title="Project Galleries" class="title">Project Galleries</a>
		</div>
		<div class="section mrg_left_50">
			<a href="/project/article/" title="Project Articles"><img src="/images/projects.gif" alt="Project Articles" height="50" width="50" /></a>
			<a href="/project/article/" title="Project Articles" class="title">Project Articles</a>
		</div>
		<div class="clearer"><!-- --></div>	
		<div class="section">
			<a href="/project/event/" title="Project Events"><img src="/images/users.gif" alt="Project Events" height="50" width="50" /></a>
			<a href="/project/event/" title="Project Events" class="title">Project Events</a>
		</div>
		<div class="section mrg_left_50">
			<a href="/project/video/" title="Project Videos"><img src="/images/projects.gif" alt="Project Videos" height="50" width="50" /></a>
			<a href="/project/video/" title="Project Videos" class="title">Project Videos</a>
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