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
			<li><a href="/account/" title="Members">Members</a></li>
			<li><a href="/account/view/" title="Members">View</a></li>
			<li>{if isset($accountData)}{$accountData.account_name} {$accountData.account_surname}{else}Add a Member{/if}</li>
        </ul>
	</div><!--breadcrumb--> 
	<div class="inner"> 
    <h2>{if isset($accountData)}{$accountData.account_name} {$accountData.account_surname}{else}Add a Member{/if}</h2>
    <div id="sidetabs">
        <ul> 
            <li class="active"><a href="#" title="Details">Details</a></li>
			<li><a href="{if isset($accountData)}/account/view/login.php?code={$accountData.account_code}{/if}" title="Login">Login</a></li>
			<li><a href="{if isset($accountData)}/account/view/mail.php?code={$accountData.account_code}{/if}" title="Mailers">Mailers</a></li>
        </ul>
    </div><!--tabs-->
	<div class="detail_box">
      <form id="detailsForm" name="detailsForm" action="/account/view/details.php{if isset($accountData)}?code={$accountData.account_code}{/if}" method="post" enctype="multipart/form-data">
        <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="form">
          <tr>
			<td>
				<h4 class="error">Name:</h4><br />
				<input type="text" name="account_name" id="account_name" value="{$accountData.account_name}" size="30" />
				{if isset($errorArray.account_name)}<br /><span class="error">{$errorArray.account_name}</span>{else}<br />Members name(s){/if}
			</td>		
			<td>
				<h4 class="error">Email:</h4><br />
				<input type="text" name="account_email" id="account_email" value="{$accountData.account_email}" size="30" />
				{if isset($errorArray.account_email)}<br /><span class="error">{$errorArray.account_email}</span>{/if}
			</td>
			<td>
				<h4>Cellphone:</h4><br />
				<input type="text" name="account_cellphone" id="account_cellphone" value="{$accountData.account_cellphone}" size="30" />
				{if isset($errorArray.account_cellphone)}<br /><span class="error">{$errorArray.account_cellphone}</span>{else}<br />e.g 0735896547{/if}
			</td>			
          </tr>
          <tr>	
			<td>
				<h4>Telephone:</h4><br />
				<input type="text" name="account_telephone" id="account_telephone" value="{$accountData.account_telephone}" size="30" />
				{if isset($errorArray.account_telephone)}<br /><span class="error">{$errorArray.account_telephone}</span>{else}<br />e.g 0215896547{/if}
			</td>			
			<td colspan="2">
				<h4 class="error">Area code:</h4><br />
				<input type="text" name="areapost_name" id="areapost_name" value="{$accountData.areapost_name}" size="80" />
				<input type="hidden" name="areapost_code" id="areapost_code" value="{$accountData.areapost_code}" />
				{if isset($errorArray.areapost_code)}<br /><span class="error">{$errorArray.areapost_code}</span>{/if}
			</td>				
          </tr>  
          <tr>
			<td valign="top">
				<h4 {if isset($errorArray.profileimage)}class="error"{/if} >User Image:</h4> Images to upload: gif, png, jpg and jpeg<br /><br />
				<input type="file" id="profileimage" name="profileimage" />
				{if isset($errorArray.profileimage)}<br /><br /><span class="error">{$errorArray.profileimage}</span>{/if}
			</td>
			<td colspan="2">
				{if !isset($accountData)} 
					<img src="/images/avatar.jpg" width="120" />
				{else}
					{if $accountData.account_image_path eq ''}
						<img src="/images/avatar.jpg" width="120" />
					{else}
						<img src="http://www.imibutho.co.za{$accountData.account_image_path}tmb_{$accountData.account_image_name}{$accountData.account_image_ext}" />
					{/if}
				{/if}			
			</td>
          </tr>			  
        </table>
      </form>
	</div>
    <div class="clearer"><!-- --></div>
        <div class="mrg_top_10">
          <a href="/account/view/" class="button cancel mrg_left_147 fl"><span>Cancel</span></a>
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
	
	$( "#account_dateofbirth" ).datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true});
	
	$( "#areapost_name" ).autocomplete({
		source: "/feeds/areapost.php",
		minLength: 2,
		select: function( event, ui ) {
		
			if(ui.item.id == '') {
				$('#areapost_name').html('');
				$('#areapost_code').val('');					
			} else {
				$('#areapost_name').html('<b>' + ui.item.value + '</b>');
				$('#areapost_code').val(ui.item.id);	
			}
			$('#areapost_name').val('');										
		}
	});
	
});

</script>
{/literal}
<!-- End Main Container -->
</body>
</html>
