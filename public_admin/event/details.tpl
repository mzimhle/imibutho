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
			<li><a href="/event/" title="Events">Events</a></li>
			<li>{if isset($eventData)}{$eventData.event_name}{else}Add an Event{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2>{if isset($eventData)}{$eventData.event_name}{else}Add an Event{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="{if isset($eventData)}/event/comments.php?code={$eventData.event_code}{/if}" title="Comments">Comments</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/event/details.php{if isset($eventData)}?code={$eventData.event_code}{/if}" method="post" >
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td colspan="3">
				<h4 class="error">Name:</h4><br />
				<input type="text" name="event_name" id="event_name" value="{$eventData.event_name}" size="60" />
				{if isset($errorArray.event_name)}<br /><span class="error">{$errorArray.event_name}</span>{else}<br />Event full name(s){/if}
			</td>			
          </tr>
          <tr>	
			<td colspan="3" valign="top">
				<h4 class="error">Short Description:</h4><br />
				<textarea name="event_description" id="event_description" cols="80" rows="4">{$eventData.event_description}</textarea>
				{if isset($errorArray.event_description)}<br /><span class="error">{$errorArray.event_description}</span>{/if}
				<p id="charcount" class="error">0 characters entered.</p>
			</td>						
          </tr>
          <tr>
			<td valign="top">
				<h4 class="error">Start Date:</h4><br />
				<input type="text" name="event_date_start" id="event_date_start" value="{$eventData.event_date_start|date_format:'%Y-%m-%d %H:%M'}" size="30" />
				{if isset($errorArray.event_date_start)}<br /><span class="error">{$errorArray.event_date_start}</span>{/if}
				<br /><br />
				<h4 class="error">End Date:</h4><br />
				<input type="text" name="event_date_end" id="event_date_end" value="{$eventData.event_date_end|date_format:'%Y-%m-%d %H:%M'}" size="30" />
				{if isset($errorArray.event_date_end)}<br /><span class="error">{$errorArray.event_date_end}</span>{/if}				
			</td>							
          </tr>		  
          <tr>
			<td colspan="3">
				<h4 class="error">Event Page:</h4><br />
				<textarea id="event_page" name="event_page" cols="130" rows="50">{$eventData.event_page}</textarea>
				{if isset($errorArray.event_page)}<br /><span class="error">{$errorArray.event_page}</span>{/if}
			</td>
          </tr>			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/event/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	nicEditors.findEditor('event_page').saveContent();
	document.forms.detailsForm.submit();					 
}

$( document ).ready(function() {
		
	new nicEditor({
		iconsPath	: '/library/javascript/nicedit/nicEditorIcons.gif',
		uploadURI : '/library/javascript/nicedit/nicUpload.php',
	}).panelInstance('event_page');				


	$("#event_description").keyup(function () {
		var i = $("#event_description").val().length;
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
	
	$( "#event_date_start" ).datetimepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true, 
		changeYear: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#event_date_end" ).datetimepicker( "option", "minDate", selectedDate );
		}
	});
	
	$( "#event_date_end" ).datetimepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true, 
		changeYear: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#event_date_start" ).datetimepicker( "option", "maxDate", selectedDate );
		}
	});
	
});

</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
