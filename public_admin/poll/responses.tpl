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
			<li><a href="/poll/" title="Polls">Polls</a></li>
			<li>{$pollData.poll_question}</li>
			<li>Response List</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2>{$pollData.poll_question}</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
            <li><a href="/poll/details.php?code={$pollData.poll_code}" title="Details">Details</a></li>
			<li><a href="/poll/answers.php?code={$pollData.poll_code}" title="Answers">Answers</a></li>
			<li class="active"><a href="#" title="Responses">Responses</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<form id="addForm" name="addForm" action="/poll/answers.php?code={$pollData.poll_code}" method="post">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">	
	   <tbody>
		  <tr>
			<th>Respondant</th>
			<th>Answer</th>
			<th></th>
			<th></th>
		   </tr>	   
	  {foreach from=$pollresponseData item=item}
	  <tr>											
		<td>
			<input type="text" name="pollresponse_text_{$item.pollresponse_code}" id="pollresponse_text_{$item.pollresponse_code}" value="{$item.pollresponse_text}" size="80" />
		</td>		
		<td>
			<input type="radio" name="pollresponse_correct" id="pollresponse_correct_{$item.pollresponse_code}" value="{$item.pollresponse_code}" {if $item.pollresponse_correct eq 1} checked="checked"{/if} />
		</td>		
		<td>	
			<button onclick="javascript:updateForm('{$item.pollresponse_code}'); return false;" >Update</button>
		</td>	
		<td>
			{if $item.pollresponse_correct eq '0'}
			<button onclick="javascript:deleteForm('{$item.pollresponse_code}'); return false;" >Delete</button>
			{else}
			N/A
			{/if}		
		</td>		
	  </tr>
	  {foreachelse}
		<tr>
			<td colspan="7" class="error">There are no current items in the system.</td>
		</tr>
	  {/foreach} 
		  <tr>
			<th>Optional Response</th>
			<th colspan="3"></th>
		   </tr>
		<tr>
			<td>
				<input type="text" id="pollresponse_text" name="pollresponse_text" size="80" />
				{if isset($errorArray.pollresponse_text)}<br /><span class="error">{$errorArray.pollresponse_text}</span>{/if}
			</td>		
			<td colspan="3"><button onclick="addItemForm(); return false;">Add Item</button></td>
		</tr>	  
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
{literal}
<script type="text/javascript">
function addItemForm() {
	document.forms.addForm.submit();				 
}			
	
function updateForm(id) {
	if(confirm('Are you sure you want to update this file ?')) {
		var primary = '';
		if($('#pollresponse_correct_'+id).is(':checked')) {
			primary = id;
		}			
		
		$.ajax({ 
				type: "GET",
				url: "answers.php",
				data: "code={/literal}{$pollData.poll_code}{literal}&pollresponse_code_update="+id+"&pollresponse_correct="+primary + "&pollresponse_text="+$('#pollresponse_text_'+id).val(),
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert('Updated');
							window.location.href = window.location.href;
						} else {
							alert(data.error);
						}
				}
		});							
	}
	
	return false;
}	
	
function deleteForm(id) {	
	if(confirm('Are you sure you want to delete this file?')) {
			$.ajax({ 
					type: "GET",
					url: "image.php",
					data: "code={/literal}{$pollData.poll_code}{literal}&pollresponse_code_delete="+id,
					dataType: "json",
					success: function(data){
							if(data.result == 1) {
								alert('Deleted');
								window.location.href = window.location.href;
							} else {
								alert(data.error);
							}
					}
			});								
		}
	return false;
}
</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
