<?php /* Smarty version 2.6.20, created on 2015-04-23 21:00:10
         compiled from participant/subscribe/default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'participant/subscribe/default.tpl', 46, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMB COUNCIL</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<script type="text/javascript" language="javascript" src="default.js"></script>
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
			<li><a href="/participant/" title="Members">Members</a></li>
			<li><a href="/participant/subscribe/" title="Subscribers">Subscribers</a></li>
        </ul>
	</div><!--breadcrumb-->  
	<div class="inner">     
    <h2>Manage Subscribers</h2>
	<a href="/participant/subscribe/details.php" title="Click to Add a new Subscriber" class="blue_button fr mrg_bot_10"><span style="float:right;">Add a new Subscriber</span></a>  <br /> 
    <div class="clearer"><!-- --></div>
    <div id="tableContent" align="center">
		<!-- Start Content Table -->
		<div class="content_table">
			<table id="dataTable" border="0" cellspacing="0" cellpadding="0">
				<thead>
				<tr>				
				<th>Added</th>				
				<th>Full Name</th>
				<th>Cellphone</th>
				<th>Email</th>
				<th>Area</th>
				<th></th>
				<th></th>
				</tr>
			   </thead>
			   <tbody> 
			  <?php $_from = $this->_tpl_vars['mailinglistData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
			  <tr>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['mailinglist_added'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>				
				<td align="left"><a href="/participant/subscribe/details.php?code=<?php echo $this->_tpl_vars['item']['mailinglist_code']; ?>
"><?php echo $this->_tpl_vars['item']['mailinglist_name']; ?>
 <?php echo $this->_tpl_vars['item']['mailinglist_surname']; ?>
</a></td>
				<td align="left"><?php echo $this->_tpl_vars['item']['mailinglist_cellphone']; ?>
</td>
				<td align="left"><?php echo $this->_tpl_vars['item']['mailinglist_email']; ?>
</td>
				<td align="left"><?php if ($this->_tpl_vars['item']['areapost_code'] != ''): ?><?php echo $this->_tpl_vars['item']['areapost_suburb']; ?>
, <?php echo $this->_tpl_vars['item']['areapost_city']; ?>
, <?php echo $this->_tpl_vars['item']['areapost_box']; ?>
<?php else: ?>N/A<?php endif; ?></td>
				<td align="left"><?php if ($this->_tpl_vars['item']['mailinglist_active'] == '1'): ?><span style="color: green;">Active</span><?php else: ?><span style="color: red;">Not Active</span><?php endif; ?></td> 
				<td align="right"><button onclick="deleteitem('<?php echo $this->_tpl_vars['item']['mailinglist_code']; ?>
')">Delete</button></td>
			  </tr>
			  <?php endforeach; endif; unset($_from); ?>     
			  </tbody>
			</table>
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