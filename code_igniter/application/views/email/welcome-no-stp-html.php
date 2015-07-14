<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Application Account Information from <?php echo $school_name; ?></title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Thank you for starting your application for admission to <?php echo $school_name; ?>!</h2>
Here is your personalized account information that can be used to access the online application:<br />
<?php if (strlen($username) > 0) { ?>Your username: <?php echo $username; ?><br /><?php } ?>
Your email address: <?php echo $email; ?><br />
Your password: <?php echo $password; ?><br /> 
<br />
<big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/login/'); ?>" style="color: #3366cc;">Complete the application now!</a></b></big><br />
<br />
Link doesn't work? Copy the following link to your browser address bar:<br />
<nobr><a href="<?php echo site_url('/auth/login/'); ?>" style="color: #3366cc;"><?php echo site_url('/auth/login/'); ?></a></nobr><br />
<br />
<br />
<b>You can always log back in to finish your online application! We save your progress.</b><br />
<br />
<br />
We recommend changing your password after your first login by accessing the Settings panel, visible in the top right corner.
<br />
<br />
Questions?  Contact the Office of Admissions at <?php echo $support_email; ?> or <?php echo $support_phone; ?>.
</td>
</tr>
</table>
</div>
</body>
</html>
