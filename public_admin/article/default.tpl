<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SImibutho Forum</title>
{include_php file='includes/css.php'}
{include_php file='includes/javascript.php'}
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
			<li><a href="/article/" title="Articles">Articles</a></li>
			<li><a href="/article/" title="View">View</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Articles</h2>
	<a href="/article/details.php" title="Click to Add a new Article" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Article</span></a>  <br /><br /> 
    <div class="filter_double">
		<div id="searchBar" class="left">    				  
			<strong class="line fl">Search:</strong>
			<input type="text" class="small_field"  id="search" name="search" size="60" value="" />		
			<a  href="javascript:void(0);" onClick="getArticles();" class="button next fr"><span>Search</span></a>					
		 </div>
		<div class="clearer"><!-- --></div>	
    </div>	 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">
			<img src="/images/ajax_loader.gif" />
		 </div>
		 <!-- End Content Table -->	
	</div>
    <div class="clearer"><!-- --></div>
    </div><!--inner-->
  </div><!-- End Content Section -->
 {include_php file='includes/footer.php'}
</div>
{literal}
<script type="text/javascript" language="javascript">
var oJobsTable	= null;

$(document).ready(function() {
	getArticles();
});

function getArticles() {		
	var html		= '';
	
	var asInitVals 	= new Array();
	
	/* Clear table contants first. */			
	$('#tableContent').html('');
	
	$('#tableContent').html('<table cellpadding="0" cellspacing="0" width="100%" border="0" class="display" id="dataTable"><thead><tr><th>Added</th><th>Name</th><th>Description</th><th></th></tr></thead><tbody id="articlebody"><tr><td colspan="5" align="center"><img src="/images/ajax_loader.gif" /></td></tr></tbody></table>');	
		
	oJobsTable = $('#dataTable').dataTable({					
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",							
		"bSort": false,
		"bFilter": false,
		"bInfo": false,
		"iDisplayStart": 0,
		"iDisplayLength": 20,				
		"bLengthChange": false,									
		"bProcessing": true,
		"bServerSide": true,		
		"sAjaxSource": "?action=articlesearch&search="+$('#search').val(),
		"fnServerData": function ( sSource, aoData, fnCallback ) {
			$.getJSON( sSource, aoData, function (json) {
					if (json.result === false) {
							$('#articlebody').html('<tr><td colspan="4" align="center">No results</td></tr>');											
					}
					fnCallback(json)
			});
		},
		"fnDrawCallback": function(){
		}
	});	
	return false;
}

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
<!-- End Main Container -->
</body>
</html>
