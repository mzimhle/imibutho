<?php /* Smarty version 2.6.20, created on 2015-07-16 19:17:59
         compiled from includes/header.tpl */ ?>
<div id="header">
<!-- Start Heading -->
<div id="heading">
	<!-- <div id="ct_logo">
	</div> -->
</div><!-- End Heading -->
<?php if (isset ( $this->_tpl_vars['administratorData'] )): ?>
<!-- Start Top Nav -->
<div id="topnav"> 
	<ul>
		<li><a href="/" title="Home" <?php if ($this->_tpl_vars['page'] == 'default.php' || $this->_tpl_vars['page'] == ''): ?> class="active"<?php endif; ?>>Home</a></li>
		<li><a href="/participant/" title="Members" <?php if ($this->_tpl_vars['page'] == 'participant'): ?> class="active"<?php endif; ?>>Members</a></li> <!--
		<li><a href="/campaign/" title="Campaign" <?php if ($this->_tpl_vars['page'] == 'campaign'): ?> class="active"<?php endif; ?>>Campaign</a></li>
		<li><a href="/calendar/" title="Calendar" <?php if ($this->_tpl_vars['page'] == 'calendar'): ?> class="active"<?php endif; ?>>Calendar</a></li>
		<li><a href="/communication/" title="communication" <?php if ($this->_tpl_vars['page'] == 'communication'): ?> class="active"<?php endif; ?>>Communication</a></li> -->
	</ul>
</div><!-- End Top Nav -->
<?php endif; ?>
<div class="clearer"><!-- --></div>
</div><!--header-->
<?php if (isset ( $this->_tpl_vars['administratorData'] )): ?>
<div class="logged_in">
	<ul>
		<li><a href="/logout.php" title="Logout">Logout</a></li>
	</ul>
</div><!--logged_in-->
<?php endif; ?>
<br />