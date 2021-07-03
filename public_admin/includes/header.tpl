<div id="header">
<!-- Start Heading -->
<div id="heading">
	<!-- <div id="ct_logo">
	</div> -->
</div><!-- End Heading -->
{if isset($administratorData)}
<!-- Start Top Nav -->
<div id="topnav"> 
	<ul>
		<li><a href="/" title="Home" {if $page eq 'default.php' or $page eq ''} class="active"{/if}>Home</a></li>
		<li><a href="/account/" title="Accounts" {if $page eq 'account'} class="active"{/if}>Accounts</a></li> 
		<li><a href="/project/" title="Projects" {if $page eq 'project'} class="active"{/if}>Projects</a></li>
		<li><a href="/article/" title="Article" {if $page eq 'article'} class="active"{/if}>Articles</a></li>
		<li><a href="/gallery/" title="gallery" {if $page eq 'gallery'} class="active"{/if}>Galleries</a></li> 
		<li><a href="/video/" title="video" {if $page eq 'video'} class="active"{/if}>Videos</a></li> 
		<li><a href="/event/" title="event" {if $page eq 'event'} class="active"{/if}>Events</a></li> 
		<li><a href="/poll/" title="poll" {if $page eq 'poll'} class="active"{/if}>Polls</a></li> 
	</ul>
</div><!-- End Top Nav -->
{/if}
<div class="clearer"><!-- --></div>
</div><!--header-->
{if isset($administratorData)}
<div class="logged_in">
	<ul>
		<li><a href="/logout.php" title="Logout">Logout</a></li>
	</ul>
</div><!--logged_in-->
{/if}
<br />