<?php /* Smarty version 2.6.20, created on 2015-07-19 17:39:20
         compiled from project/article/comments.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imibutho Forum</title>
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/css.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/javascript.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</head>
<body>
<!-- Start Main Container -->
<div id="container">
    <!-- Start Content recruiter -->
  <div id="content">
 
<?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/header.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

	<div id="breadcrumb">
        <ul>
            <li><a href="/" title="Home">Home</a></li>
			<li><a href="/project/" title="Projects">Projects</a></li>
			<li><a href="/project/article/" title="Articles">Articles</a></li>
			<li><?php echo $this->_tpl_vars['articleData']['article_name']; ?>
</li>
			<li>Comments</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2><?php echo $this->_tpl_vars['articleData']['article_name']; ?>
</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
            <li><a href="<?php if (isset ( $this->_tpl_vars['articleData'] )): ?>/project/article/comments.php?code=<?php echo $this->_tpl_vars['articleData']['article_code']; ?>
<?php endif; ?>" title="Details">Details</a></li>
			<li class="active"><a href="#" title="Comments">Comments</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<p class="success">Below are comments made under the given article.</p>
	<form id="addForm" name="addForm" action="/project/article/comments.php?code=<?php echo $this->_tpl_vars['articleData']['article_code']; ?>
" method="post">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">	
		<tbody>
		  <?php $_from = $this->_tpl_vars['commentData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['foo']['iteration']++;
?>
		  <tr>											
			<td><?php echo $this->_tpl_vars['item']['project_name']; ?>
</td>		
			<td><?php echo $this->_tpl_vars['item']['comment_message']; ?>
</td>		
			<td><button onclick="javascript:deleteComment('<?php echo $this->_tpl_vars['item']['comment_code']; ?>
'); return false;" >Delete</button></td>	
		  </tr>
		  <?php if (! empty ( $this->_tpl_vars['item']['comments'] )): ?>
		  <tr>
				<td>&nbsp;&nbsp;</td>
				<td colspan="2">
					<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">	
						<?php $_from = $this->_tpl_vars['item']['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['boo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['boo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['comment']):
        $this->_foreach['boo']['iteration']++;
?>
						<tr>
							<td><?php echo $this->_tpl_vars['comment']['project_name']; ?>
</td>		
							<td><?php echo $this->_tpl_vars['comment']['comment_message']; ?>
</td>		
							<td><button onclick="javascript:deleteComment('<?php echo $this->_tpl_vars['item']['comment_code']; ?>
'); return false;" >Delete</button></td>	
						</tr>
						<?php endforeach; endif; unset($_from); ?>
					</table>
				</td>
		  </tr>
		  <?php endif; ?>
		  <?php endforeach; else: ?>
			<tr><td colspan="3" class="error">There are no records on the system</td></tr>
		  <?php endif; unset($_from); ?> 	  
		</tbody>						
	</table>
	</form>
	</div>
	<div class="clearer"><!-- --></div>	

    </div><!--inner-->
<!-- End Content recruiter -->
 </div><!-- End Content recruiter -->
 <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => 'includes/footer.php', 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<!-- End Main Container -->
</body>
</html>