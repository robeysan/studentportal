<!DOCTYPE>
<html>
	<head>
		<script src="/js/jquery-1.7.1.min.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

       
        <!--[if !IE]><!-->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/docs.css" rel="stylesheet">
        <!--<![endif]-->

        <!--[if gte IE 7]>
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/docs.css" rel="stylesheet"> 
        <![endif]-->

        <!--[if lt IE 7]>
        <link href="/css/iestyle.css" rel="stylesheet">
        <![endif]-->
    <style>
  <!--
    input {
        width: 240px;
        height: 30px;
        padding: 3px;
    }
    -->
</style>
    <?php $submit_button = array('name' => 'Change', 'value' => 'Change Password', 'class' => 'btn btn-primary'); ?>
	</head>
	<body>
		<div class="row">
			<div class="" style="text-align:center;margin-left:auto;margin-right:auto;width:100%">
				<img class="login" src="<?php echo $this->config->item('logo'); ?>">
			</div>	
		</div>	
		<div class="row">
			<div class="login" style="margin-left:auto;margin-right:auto;width:250px">
<?php
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table style="width: 400px; margin-left: -66px; ">
	<tr>
		<td><?php echo form_label('New Password', $new_password['id']); ?></td>
		<td><?php echo form_password($new_password); ?></td>
		<td style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirm', $confirm_new_password['id']); ?></td>
		<td><?php echo form_password($confirm_new_password); ?></td>
		<td style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></td>
	</tr>
</table>
<br/>
<p style="margin-left: -66px"><?php echo form_submit($submit_button); ?></p>
<?php echo form_close(); ?>
</div>
			<div class="row">
				<div class=""style="text-align:center;margin-left:auto;margin-right:auto;width:100%">
				</div>
			</div>		
		</div>
	</body>
</html>
