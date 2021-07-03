<?php /* Smarty version 2.6.20, created on 2015-07-21 00:14:43
         compiled from /home/imibuthoco/public_html/templates/account_register.html */ ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imibutho</title>
<?php echo '
<style type="text/css">
/* Client-specific Styles */
#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */
body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */
/* Reset Styles */
body{margin:0; padding:0; background-color: #343434; font-size: 20px;}
img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
table td{border-collapse:collapse;}
#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
a{color: #4c4c4c;text-decoration: none;}
</style>
'; ?>

</head>
<body style="margin: 0; padding: 0; text-align: center; background-image: url(http://www.imibutho.co.za/templates/images/back.jpg)">
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="http://www.imibutho.co.za/templates/images/back.jpg">
	<tr>
    	<td>
            <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="box-shadow: 1px 2px 4px #222222;">
                <tr>
                    <td valign="top" style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif;" bgcolor="#FFFFFF">
                    	<img src="http://www.imibutho.co.za/templates/images/head.gif" width="600" height="103" border="0" alt="Imibutho" style="display: block">
                    </td>
				</tr>
                <tr>
                    <td valign="top" align="left" >
                    	<table width="600" border="0" align="left" cellpadding="25" cellspacing="0">
                        	<tr>
                            	<td valign="top" align="left" style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif;" bgcolor="#FFFFFF">
                                	<span style="font-family: 'Century Gothic', Helvetica, Verdana, Arial, sans-serif; font-size: 24px; font-weight: bold; color: #2a398e;">
										Good day <?php echo $this->_tpl_vars['accountData']['account_name']; ?>
</span><br />
										<p>Thank you for registering on our website. Before you login, please click on the link below to verify your email address. Without verification you will not be able to access your Imibutho Forum member account.</p>
										<p>
										<a style="text-decoration: none; font-family: Helvetica, Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold; color: #0d1959;" href="http://www.imibutho.co.za/mailers/activate/member/<?php echo $this->_tpl_vars['accountData']['account_hashcode']; ?>
">Click here to confirm your email address</a>
										<br /><br />If the above link does not open, then copy and paste the url below into your browser address bar:
										<p style="font-family: Helvetica, Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold; color: #0d1959;">http://www.imibutho.co.za/mailers/activate/member/<?php echo $this->_tpl_vars['accountData']['account_hashcode']; ?>
</p>
										<p>We will send you your log in details after the website has been launched.</p>								
									<p><a style="text-decoration: none; font-family: Helvetica, Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold; color: #0d1959;" href="http://www.imibutho.co.za/mailers/view/<?php echo $this->_tpl_vars['tracking']; ?>
">If you cannot see this email properly, please click here to view it on a browser</a></p>
									<br />
                                    <p style="font-family: Helvetica, Verdana, Arial, sans-serif; font-size: 12px; font-weight: bold; color: #2a398e;">Regards<br />The Imibutho Team</p>
                                </td>
                            </tr>
                        </table>
					</td>
				</tr>
                <tr> 
					<td align="left" >
                        <table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                                <td bgcolor="#FFFFFF" valign="bottom" height="15"><img src="http://www.imibutho.co.za/templates/images/footer.gif" width="600" height="126" border="0" alt="" style="display: block"></td>
                            </tr>
                        </table>
                    </td>
				</tr>
            </table>
            <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="400" height="50" align="left" valign="bottom" align="left" style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif; color: #FFFFFF;">
                        <a href="http://www.imibuthohub.co.za/" target="_blank" style="color: #FFFFFF;">www.imibuthohub.co.za</a><br />Mantrose Ave, Northgate, Randburg, 2188
                    </td>
                    <td width="200" valign="bottom" align="right" style="font-size: 12px; font-family: Helvetica, Verdana, Arial, sans-serif;">
                        <a href="https://www.facebook.com/imibutho" target="_blank"><img src="http://www.imibutho.co.za/templates/images/fb_icon.png" width="27" height="29" border="0" alt="Facebook" /></a>&nbsp;&nbsp;
                        <a href="https://twitter.com/imibutho" target="_blank"><img src="http://www.imibutho.co.za/templates/images/tw_icon.png" width="27" height="29" border="0" alt="Twitter" /></a>
                    </td>
                </tr>
            </table>
            <br /><br />
		</td>
	</tr>
</table>
</body>
</html>