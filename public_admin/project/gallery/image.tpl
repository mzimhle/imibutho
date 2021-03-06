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
			<li><a href="/project/gallery/" title="">Gallery</a></li>
			<li><a href="/project/gallery/details.php?code={$galleryData.gallery_code}" title="">{$galleryData.gallery_name}</a></li>
			<li>Images</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2>{$galleryData.gallery_name}</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
			<li><a href="/project/gallery/details.php?code={$galleryData.gallery_code}" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Images">Images</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<form id="addForm" name="addForm" action="/project/gallery/image.php?code={$galleryData.gallery_code}" method="post" enctype="multipart/form-data">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<th colspan="4">Upload</th>
			<th></th>
		   </tr>
		<tr>
			<td colspan="4">
				<input type="file" id="imagefile[]" name="imagefile[]" multiple />
				{if isset($errorArray)}<br /><span class="error">{$errorArray}</span>{/if}
			</td>
			<td><button onclick="addItemForm(); return false;">Add Item</button></td>
		</tr>	
	   <tbody>
		  <tr>
			<th width="12%">Image</th>
			<th width="40%">Name</th>					
			<th width="10%">Primary</th>
			<th width="*" class="rgt"></th>
			<th width="*" class="rgt"></th>
		   </tr>	   
	  {foreach from=$galleryimageData item=item}
	  <tr>
		<td><a target="_blank" href="http://www.imibutho.co.za{$item.galleryimage_path}/big_{$item.galleryimage_code}{$item.galleryimage_ext}"><img src="http://www.imibutho.co.za{$item.galleryimage_path}/tny_{$item.galleryimage_code}{$item.galleryimage_ext}" /></a></td>											
		<td><input type="text" name="galleryimage_description_{$item.galleryimage_code}" id="galleryimage_description_{$item.galleryimage_code}" value="{$item.galleryimage_description}" size="60" /></td>									
		<td>
			<input type="radio" name="galleryimage_primary" id="galleryimage_primary_{$item.galleryimage_code}" value="{$item.galleryimage_code}" {if $item.galleryimage_primary eq 1} checked="checked"{/if} />
		</td>			
		<td>	
			<button onclick="javascript:updateForm('{$item.galleryimage_code}'); return false;" >Update</button>
		</td>	
		<td>
			{if $item.galleryimage_primary eq '0'}
			<button onclick="javascript:deleteForm('{$item.galleryimage_code}'); return false;" >Delete</button>
			{else}
			N/A
			{/if}		
		</td>		
	  </tr>
	  {foreachelse}
		<tr>
			<td colspan="5" class="error">There are no current items in the system.</td>
		</tr>
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
{literal}
<script type="text/javascript">
function addItemForm() {
	document.forms.addForm.submit();				 
}			
	
function updateForm(id) {
	if(confirm('Are you sure you want to update this file ?')) {
		var primary = '';
		if($('#galleryimage_primary_'+id).is(':checked')) {
			primary = id;
		}			
		
		$.ajax({ 
				type: "GET",
				url: "image.php",
				data: "code={/literal}{$galleryData.gallery_code}{literal}&galleryimage_code_update="+id+"&galleryimage_primary="+primary + "&galleryimage_description="+$('#galleryimage_description_'+id).val(),
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
					data: "code={/literal}{$galleryData.gallery_code}{literal}&galleryimage_code_delete="+id,
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
