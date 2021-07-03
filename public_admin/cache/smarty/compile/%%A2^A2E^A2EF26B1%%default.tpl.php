<?php /* Smarty version 2.6.20, created on 2015-07-24 08:42:05
         compiled from account/view/default.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SImibutho Forum</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</head>

<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content Section -->
  <div id="content">
    <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/account/" title="Jobs">Members</a></li>
			<li><a href="/account/view/" title="Jobs">View</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Members</h2>
	<a href="/account/view/details.php" title="Click to Add a new Member" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Member</span></a>  <br /><br /> 
    <div class="filter_double">
		<div id="searchBar" class="left">    				  
			<strong class="line fl">Search:</strong>
			<input type="text" class="small_field"  id="search" name="search" size="60" value="" />		
			<a  href="javascript:void(0);" onClick="getAccounts();" class="button next fr"><span>Search</span></a>					
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
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<?php echo '
<script type="text/javascript" language="javascript">
var oJobsTable	= null;

$(document).ready(function() {
	getAccounts();
});

function getAccounts() {		
	var html		= \'\';
	
	var asInitVals 	= new Array();
	
	/* Clear table contants first. */			
	$(\'#tableContent\').html(\'\');
	
	$(\'#tableContent\').html(\'<table cellpadding="0" cellspacing="0" width="100%" border="0" class="display" id="dataTable"><thead><tr><th></th><th>Added</th><th>Area name</th><th>Name</th><th>Email</th><th></th></tr></thead><tbody id="accountbody"><tr><td colspan="6" align="center"><img src="/images/ajax_loader.gif" /></td></tr></tbody></table>\');	
		
	oJobsTable = $(\'#dataTable\').dataTable({					
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
		"sAjaxSource": "?action=accountsearch&search="+$(\'#search\').val(),
		"fnServerData": function ( sSource, aoData, fnCallback ) {
			$.getJSON( sSource, aoData, function (json) {
					if (json.result === false) {
							$(\'#accountbody\').html(\'<tr><td colspan="6" align="center">No results</td></tr>\');											
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
	if(confirm(\'Are you sure you want to delete this item?\')) {
		$.ajax({ 
				type: "GET",
				url: "default.php",
				data: "delete_code="+id,
				dataType: "json",
				success: function(data){
						if(data.result == 1) {
							alert(\'Item deleted!\');
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
'; ?>

<!-- End Main Container -->
</body>
</html>