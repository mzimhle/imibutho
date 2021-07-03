<?php /* Smarty version 2.6.20, created on 2015-07-24 08:41:45
         compiled from default.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imibutho Forum</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>
 
<link rel="stylesheet" type="text/css" href="/library/javascript/fullcalendar-1.6.2/fullcalendar.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/library/javascript/fullcalendar-1.6.2/fullcalendar.print.css" media="screen" />
<script type="text/javascript" language="javascript" src="/library/javascript/fullcalendar-1.6.2/fullcalendar.min.js"></script>
<link href="/css/colour.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="/feeds/calendar.php"></script>
</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content Section -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

  <div class="inner">  
		<h2>Imibutho Forum Management System</h2>
		<div class="clearer"><!-- --></div>
		<!-- <div id='calendar'></div>	 	-->	
		<div class="section">
			<a href="/account/" title="Manage Accounts"><img src="/images/users.gif" alt="Manage Accounts" height="50" width="50" /></a>
			<a href="/account/" title="Manage Accounts" class="title">Manage Accounts</a>
		</div> 
		<div class="section mrg_left_50">
			<a href="/project/" title="Manage Project"><img src="/images/projects.gif" alt="Manage Project" height="50" width="50" /></a>
			<a href="/project/" title="Manage Project" class="title">Manage Project</a>
		</div>
		<div class="section mrg_left_50">
			<a href="/article/" title="Manage Articles"><img src="/images/projects.gif" alt="Manage Articles" height="50" width="50" /></a>
			<a href="/article/" title="Manage Articles" class="title">Manage Articles</a>
		</div>		
		<div class="clearer"><!-- --></div>	
		<div class="section">
			<a href="/gallery/" title="Manage Galleries"><img src="/images/users.gif" alt="Manage Galleries" height="50" width="50" /></a>
			<a href="/gallery/" title="Manage Galleries" class="title">Manage Galleries</a>
		</div>
		<div class="section mrg_left_50">
			<a href="/video/" title="Manage Videos"><img src="/images/projects.gif" alt="Manage Videos" height="50" width="50" /></a>
			<a href="/video/" title="Manage Videos" class="title">Manage Videos</a>
		</div>	
		<div class="section mrg_left_50">
			<a href="/poll/" title="Manage Polls"><img src="/images/projects.gif" alt="Manage Polls" height="50" width="50" /></a>
			<a href="/poll/" title="Manage Polls" class="title">Manage Polls</a>
		</div>		
		<div class="clearer"><!-- --></div>	
		<div class="section">
			<a href="/event/" title="Manage Events"><img src="/images/users.gif" alt="Manage Events" height="50" width="50" /></a>
			<a href="/event/" title="Manage Events" class="title">Manage Events</a>
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