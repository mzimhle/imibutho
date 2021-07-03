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
			<li><a href="/project/" title="Projects">Projects</a></li>
			<li><a href="/project/view/" title="View">View</a></li>
			<li>{$projectData.project_name}</li>
			<li>Volunteer List</li>
        </ul>
	</div><!--breadcrumb--> 	
	 <div class="inner">
      <h2>{$projectData.project_name}</h2>
    <div class="clearer"><!-- --></div>	
    <div id="sidetabs">
        <ul >             
            <li><a href="/project/view/details.php?code={$projectData.project_code}" title="Details">Details</a></li>
			<li><a href="/project/view/contact.php?code={$projectData.project_code}" title="Contacts">Contacts</a></li>
			<li><a href="/project/view/subscriber.php?code={$projectData.project_code}" title="Subscribers">Subscribers</a></li>
			<li class="active"><a href="#" title="Volunteers">Volunteers</a></li>
        </ul>
    </div><!--tabs-->	
	<div class="detail_box">
	<p class="success">Volunteers are those who get all the project information but also can share their details with the project owners for communication.</p>
	<form id="addForm" name="addForm" action="/project/view/volunteer.php?code={$projectData.project_code}" method="post">
	<table width="100%" class="innertable" border="0" cellspacing="0" cellpadding="0">	
		<tbody>
			<tr>
				<th>Number</th>
				<th>Full Name</th>
				<th>Email</th>
			</tr>
		  {foreach from=$volunteerData item=item name=foo}
		  <tr>											
			<td>No. {$smarty.foreach.foo.iteration}</td>		
			<td>{$item.volunteer_name}</td>		
			<td>{$item.volunteer_email}</td>		
		  </tr>
		  {foreachelse}
			<tr><td colspan="3" class="error">There are no records on the system</td></tr>
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
<!-- End Main Container -->
</body>
</html>
