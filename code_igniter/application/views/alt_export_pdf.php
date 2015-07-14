<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>PDF alt_export</title>
		<style>
			body {
				font-family: sans-serif;
			}
			#content {
				font-size: 10px;
				width: 600px;
			}
		</style>
</head>
<body>
	<div id="header">
		<h1>Student Portal Application Export</h1>
		<strong>Applicant:</strong> <?php echo $post['first_name']; ?> <?php echo $post['last_name']; ?>
	</div>
	<div id="content">
		<h2>Contact Information</h2>
		Emergency Contact Name: <?php echo $post['emergency_contact_name']; ?><br />
		Emergency Contact Phone: <?php echo $post['emergency_contact_main_phone']; ?><br />
		Current Employer: <?php echo $post['current_employer']; ?><br />
		Current Employer City: <?php echo $post['current_employer_city']; ?><br />
		Current Employer State: <?php echo $post['current_employer_state']; ?><br />
		<h2>Resume and Personal Statement</h2>
		<strong>Resume</strong><br />
		<?php echo nl2br($post['resume']); ?><br /><br />
		<strong>Personal Statement</strong><br />
		<?php echo nl2br($post['personal_statement']); ?><br /><br />
		<strong>Other Colleges Applied</strong><br />
		<?php echo nl2br($post['other_college_applications']); ?><br /><br />
		<strong>Additional Information</strong><br />
		<?php echo nl2br($post['other_information']); ?>
	</div>
</body>
</html>
