<?php /* Smarty version 2.6.20, created on 2015-07-24 08:42:05
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
		<li><a href="/account/" title="Accounts" <?php if ($this->_tpl_vars['page'] == 'account'): ?> class="active"<?php endif; ?>>Accounts</a></li> 
		<li><a href="/project/" title="Projects" <?php if ($this->_tpl_vars['page'] == 'project'): ?> class="active"<?php endif; ?>>Projects</a></li>
		<li><a href="/article/" title="Article" <?php if ($this->_tpl_vars['page'] == 'article'): ?> class="active"<?php endif; ?>>Articles</a></li>
		<li><a href="/gallery/" title="gallery" <?php if ($this->_tpl_vars['page'] == 'gallery'): ?> class="active"<?php endif; ?>>Galleries</a></li> 
		<li><a href="/video/" title="video" <?php if ($this->_tpl_vars['page'] == 'video'): ?> class="active"<?php endif; ?>>Videos</a></li> 
		<li><a href="/event/" title="event" <?php if ($this->_tpl_vars['page'] == 'event'): ?> class="active"<?php endif; ?>>Events</a></li> 
		<li><a href="/poll/" title="poll" <?php if ($this->_tpl_vars['page'] == 'poll'): ?> class="active"<?php endif; ?>>Polls</a></li> 
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