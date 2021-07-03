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
			<li><a href="/project/" title="Project">Project</a></li>
			<li><a href="/project/gallery/" title="Gallery">Gallery</a></li>
			<li>{if isset($galleryData)}Edit Gallery{else}Add a Gallery{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
<div class="inner"> 
      <h2>{if isset($galleryData)}Edit Gallery{else}Add a Gallery{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="{if isset($galleryData)}/project/gallery/image.php?code={$galleryData.gallery_code}{else}#{/if}" title="Images">Images</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/project/gallery/details.php{if isset($galleryData)}?code={$galleryData.gallery_code}{/if}" method="post">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td><h4 class="error">Name:</h4>
				<br /><input type="text" name="gallery_name" id="gallery_name" value="{$galleryData.gallery_name}" size="60" />
				{if isset($errorArray.gallery_name)}<br /><em class="error">{$errorArray.gallery_name}<em>{else}<br /><em>Gallery name</em>{/if}
			</td>	
		</tr>
		<tr>
			<td>
				<h4 class="error">Project Name:</h4><br />
				{if !isset($galleryData)}
				<input type="text" name="project_name" id="project_name" value="{$galleryData.project_name}" size="120" />
				<input type="hidden" name="project_code" id="project_code" value="{$galleryData.project_code}" />
				{else}
				<span class="success">{$galleryData.project_name}</span>
				<input type="hidden" name="project_code" id="project_code" value="{$galleryData.project_code}" />				
				{/if}				
				{if isset($errorArray.project_code)}<br /><span class="error">{$errorArray.project_code}</span>{else}<br />Project name of the gallery{/if}
			</td>			
		</tr>
		<tr>
			<td><h4 class="error">Description:</h4><br />
				<textarea id="gallery_description" name="gallery_description" cols="100" rows="2">{$galleryData.gallery_description}</textarea>
				{if isset($errorArray.gallery_description)}<br /><em id="charcount" class="error">{$errorArray.gallery_description}<em>{else}<br /><em id="charcount" class="error">0 characters entered.</em>{/if}
			</td>		
		</tr>
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
	<div class="mrg_top_10">
	  <a href="/project/gallery/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
	  <a href="javascript:submitForm();" class="blue_button mrg_left_20 fl"><span>Save &amp; Complete</span></a>   
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 {include_php file='includes/footer.php'}
</div>
{literal}
<script type="text/javascript" language="javascript">

function submitForm() {
	document.forms.detailsForm.submit();					 
}

$(document).ready(function() {
	
	$("#gallery_description").keyup(function () {
		var i = $("#gallery_description").val().length;
		$("#charcount").html(i+' characters entered.');
		if (i > 255) {
			$('#charcount').removeClass('success');
			$('#charcount').addClass('error');
		} else if(i == 0) {
			$('#charcount').removeClass('success');
			$('#charcount').addClass('error');
		} else {
			$('#charcount').removeClass('error');
			$('#charcount').addClass('success');
		} 
	});
	{/literal}{if !isset($galleryData)}{literal}
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
	{/literal}{/if}{literal}
});

</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
