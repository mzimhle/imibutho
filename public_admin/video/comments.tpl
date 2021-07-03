<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imibutho Forum</title>
{include_php file='includes/css.php'}
{include_php file='includes/javascript.php'}
</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content recruiter -->
  <div id="content">
 
{include_php file='includes/header.php'}
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/video/" title="Videos">Videos</a></li>
			<li>{$videoData.video_name}</li>
			<li>Comments</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2>{$videoData.video_name}</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
            <li><a href="{if isset($videoData)}/video/comments.php?code={$videoData.video_code}{/if}" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Comments">Comments</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<p class="success">Below are comments made under the given video.</p>
	<form id="addForm" name="addForm" action="/video/comments.php?code={$videoData.video_code}" method="post">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">	
		<tbody>
		  {foreach from=$commentData item=item name=foo}
		  <tr>											
			<td>{$item.account_name}</td>		
			<td>{$item.comment_message}</td>		
			<td><button onclick="javascript:deleteComment('{$item.comment_code}'); return false;" >Delete</button></td>	
		  </tr>
		  {if !empty($item.comments)}
		  <tr>
				<td>&nbsp;&nbsp;</td>
				<td colspan="2">
					<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">	
						{foreach from=$item.comments item=comment name=boo}
						<tr>
							<td>{$comment.account_name}</td>		
							<td>{$comment.comment_message}</td>		
							<td><button onclick="javascript:deleteComment('{$item.comment_code}'); return false;" >Delete</button></td>	
						</tr>
						{/foreach}
					</table>
				</td>
		  </tr>
		  {/if}
		  {foreachelse}
			<tr><td colspan="3" class="error">There are no records on the system</td></tr>
		  {/foreach} 	  
		</tbody>						
	</table>
	</form>
	</div>
	<div class="clearer"><!-- --></div>	

    </div><!--inner-->
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 {include_php file='includes/footer.php'}
</div>
<!-- End Main Container -->
</body>
</html>
