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
			<li><a href="/article/" title="Articles">Articles</a></li>
			<li>{if isset($articleData)}{$articleData.article_name}{else}Add an Article{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2>{if isset($articleData)}{$articleData.article_name}{else}Add an Article{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="{if isset($articleData)}/article/comments.php?code={$articleData.article_code}{/if}" title="Comments">Comments</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/article/details.php{if isset($articleData)}?code={$articleData.article_code}{/if}" method="post" >
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td colspan="3">
				<h4 class="error">Name:</h4><br />
				<input type="text" name="article_name" id="article_name" value="{$articleData.article_name}" size="120" />
				{if isset($errorArray.article_name)}<br /><span class="error">{$errorArray.article_name}</span>{else}<br />Article full name(s){/if}
			</td>			
          </tr>
          <tr>	
			<td colspan="3" valign="top">
				<h4 class="error">Short Description:</h4><br />
				<textarea name="article_description" id="article_description" cols="80" rows="4">{$articleData.article_description}</textarea>
				{if isset($errorArray.article_description)}<br /><span class="error">{$errorArray.article_description}</span>{/if}
				<p id="charcount" class="error">0 characters entered.</p>
			</td>						
          </tr>
          <tr>
			<td colspan="3">
				<h4 class="error">Article Page:</h4><br />
				<textarea id="article_page" name="article_page" cols="130" rows="50">{$articleData.article_page}</textarea>
				{if isset($errorArray.article_page)}<br /><span class="error">{$errorArray.article_page}</span>{/if}
			</td>
          </tr>			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/article/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	nicEditors.findEditor('article_page').saveContent();
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
		
	new nicEditor({
		iconsPath	: '/library/javascript/nicedit/nicEditorIcons.gif',
		uploadURI : '/library/javascript/nicedit/nicUpload.php',
	}).panelInstance('article_page');				


	$("#article_description").keyup(function () {
		var i = $("#article_description").val().length;
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
	
	{/literal}{if !isset($articleData)} {literal}
	$( "#account_name" ).autocomplete({
		source: "/feeds/account.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == '') {
				$('#account_name').html('');
				$('#account_code').val('');					
			} else {
				$('#account_name').html('<b>' + ui.item.value + '</b>');
				$('#account_code').val(ui.item.id);	
			}
			$('#account_name').val('');										
		}
	});
	{/literal}{/if} {literal}
});

</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
