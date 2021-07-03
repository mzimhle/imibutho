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
			<li><a href="/poll/" title="Polls">Polls</a></li>
			<li>{if isset($pollData)}{$pollData.poll_question}{else}Add a poll{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2>{if isset($pollData)}{$pollData.poll_question}{else}Add a poll{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="{if isset($pollData)}/poll/answers.php?code={$pollData.poll_code}{/if}" title="Answers">Answers</a></li>
			<li><a href="{if isset($pollData)}/poll/responses.php?code={$pollData.poll_code}{/if}" title="Responses">Responses</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/poll/details.php{if isset($pollData)}?code={$pollData.poll_code}{/if}" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Question:</h4><br />
					<textarea name="poll_question" id="poll_question" cols="120" rows="2">{$pollData.poll_question}</textarea>
					{if isset($errorArray.poll_question)}<br /><span class="error">{$errorArray.poll_question}</span>{/if}
					<p id="charcount" class="error">0 characters entered.</p>
			</td>			
          </tr>
          <tr>
			<td valign="top">
				<h4 class="error">Start Date:</h4><br />
				<input type="text" name="poll_date_start" id="poll_date_start" value="{$pollData.poll_date_start|date_format:'%Y-%m-%d'}" size="30" />
				{if isset($errorArray.poll_date_start)}<br /><span class="error">{$errorArray.poll_date_start}</span>{/if}
				<br /><br />
				<h4 class="error">End Date:</h4><br />
				<input type="text" name="poll_date_end" id="poll_date_end" value="{$pollData.poll_date_end|date_format:'%Y-%m-%d'}" size="30" />
				{if isset($errorArray.poll_date_end)}<br /><span class="error">{$errorArray.poll_date_end}</span>{/if}				
			</td>							
          </tr>		  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/poll/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	
	$("#poll_question").keyup(function () {
		var i = $("#poll_question").val().length;
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
	
	$( "#poll_date_start" ).datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true, 
		changeYear: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#poll_date_end" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	
	$( "#poll_date_end" ).datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true, 
		changeYear: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#poll_date_start" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
});

</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
