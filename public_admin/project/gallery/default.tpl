<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imibutho Forum</title>
{include_php file='includes/css.php'}
{include_php file='includes/javascript.php'}
<script type="text/javascript" language="javascript" src="default.js"></script>
</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content Section -->
  <div id="content">
    {include_php file='includes/header.php'}
	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/project/" title="Project">Project</a></li>
			<li><a href="/project/gallery/" title="Gallery">Gallery</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Galleries</h2>
	<a href="/project/gallery/details.php" title="Click to Add a new Gallery" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Gallery</span></a> <br /> 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">			
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Project</th>						
						<th>Image</th>
						<th>Name</th>
						<th>Description</th>
						<th></th>
					</tr>
			   </thead>
			   <tbody> 
			  {foreach from=$galleryData item=item}
				  <tr>
					<td>{$item.project_name}</td>
					<td>{if $item.galleryimage_filename neq ''}<img src="http://www.imibutho.co.za{$item.galleryimage_path}/tny_{$item.galleryimage_code}{$item.galleryimage_ext}" width="50" height="50" />{else}<img src="http://www.imibutho.co.za/images/no-logo.jpg" width="50px"/>{/if}</td>					
					<td align="left"><a href="/project/gallery/details.php?code={$item.gallery_code}">{$item.gallery_name}</a></td>
					<td align="left">{$item.gallery_description}</td>					
					<td align="left"><button onclick="deleteitem('{$item.gallery_code}')">Delete</button></td>		
				  </tr>
			  {/foreach}     
			  </tbody>
			</table>
		 </div>
		 <!-- End Content Table -->	
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
  </div><!-- End Content Section -->
 {include_php file='includes/footer.php'}
</div>
<!-- End Main Container -->
{literal}
<script type="text/javascript" language="javascript">
function deleteitem(id) {					
	if(confirm('Are you sure you want to delete this item?')) {
		$.ajax({ 
				type: "GET",
				url: "default.php",
				data: "delete_code="+id,
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert('Item deleted!');
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
</body>
</html>
