<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imibutho Forum</title>
{include_php file='includes/css.php'}
{include_php file='includes/javascript.php'} 
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
    {include_php file='includes/header.php'}
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
 {include_php file='includes/footer.php'}
</div>
<!-- End Main Container -->
</body>
</html>
