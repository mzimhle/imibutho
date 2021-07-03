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
  	<br />
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/project/" title="Projects">Projects</a></li>
			<li><a href="/project/video/" title="Video">Video</a></li>
			<li>{if isset($videoData)}{$videoData.video_name}{else}Add an Video{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2>{if isset($videoData)}{$videoData.video_name}{else}Add an Video{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="{if isset($videoData)}/project/video/comments.php?code={$videoData.video_code}{/if}" title="Comments">Comments</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/project/video/details.php{if isset($videoData)}?code={$videoData.video_code}{/if}" method="post" >
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Name:</h4><br />
				<input type="text" name="video_name" id="video_name" value="{$videoData.video_name}" size="120" />
				{if isset($errorArray.video_name)}<br /><span class="error">{$errorArray.video_name}</span>{else}<br />Video description{/if}
			</td>			
          </tr>
		  <tr>
			<td colspan="3">				
				<h4>Project:</h4><br />
				{if !isset($videoData)} 
				<input type="text" name="project_name" id="project_name" value="{$videoData.project_name}" size="120" />
				<input type="hidden" name="project_code" id="project_code" value="{$videoData.project_code}" />
				{else}
				<span class="success">{$videoData.project_name}</span>
				<input type="hidden" name="project_code" id="project_code" value="{$videoData.project_code}" />				
				{/if}
				{if isset($errorArray.project_code)}<br /><span class="error">{$errorArray.project_code}</span>{else}<br />Project owner of the video{/if}
			</td>			  
		  </tr>		  
          <tr>
			<td>
				<h4 class="error">URL link:</h4><br />
				<input type="text" name="video_url" id="video_url" value="{$videoData.video_url}" size="120" />
				{if isset($errorArray.video_url)}<br /><span class="error">{$errorArray.video_url}</span>{else}<br />Please add a valid video link, i.e. http://www.youtube.com/embed/CY_r9jcFajg{/if}
			</td>			
          </tr>
		  {if isset($videoData)}
			<tr>
				<td>
					<h4>YouTube video:</h4><br />
					<iframe title="{$videoData.video_name}" class="youtube-player" type="text/html" width="640" height="390" src="{$videoData.video_url}" frameborder="0" allowFullScreen></iframe>
				</td>			
			</tr>	
			{/if}			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/project/video/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
          <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
        </div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
 </div> 	
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 {include_php file='includes/footer.php'}
</div>
{literal}
<script type="text/javascript" language="javascript">

function submitForm() {
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
	{/literal}{if !isset($videoData)} {literal}
	$( "#project_name" ).autocomplete({
		source: "/feeds/project.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == '') {
				$('#project_name').html('');
				$('#project_code').val('');					
			} else {
				$('#project_name').html('<b>' + ui.item.value + '</b>');
				$('#project_code').val(ui.item.id);	
			}
			$('#project_name').val('');										
		}
	});
	{/literal}{/if} {literal}
});

</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
