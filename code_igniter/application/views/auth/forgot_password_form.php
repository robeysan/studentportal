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
        <?php
            if (SITE=='aurora') {
                ?>
                <style type="text/css">
                    body {
                        background-color: silver;
                    }
                </style>
                <?php
            }
        ?>
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
				$login = array(
					'name'	=> 'login',
					'id'	=> 'login',
					'value' => set_value('login'),
					'class' => 'loginInput'
				);
				$submit = array(
					'name'	=> 'submit',
					'id'	=> 'submit',
					'class'	=> 'btn btn-primary',
					'value' => 'Send Password'
				);
				if ($this->config->item('use_username', 'tank_auth')) {
					$login_label = 'Email or login';
				} else {
					$login_label = 'Email';
				}
				?>
				<?php echo form_open($this->uri->uri_string()); ?>
				<table>
					<tr><td><?php echo form_label($login_label, $login['id']); ?></td></tr>
					<tr></tr>
					<tr><td><?php echo form_input($login); ?></td></tr>
					<tr><td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td></tr>
					<!--<tr>
						<td><?php echo form_label($login_label, $login['id']); ?></td>
						<td><?php echo form_input($login); ?></td>
						<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
					</tr>-->
					<tr><td><?php echo form_submit($submit); ?></td></tr>
				</table>
				<?php echo form_close(); ?>
			</div>
			<div class="row">
				<div class=""style="text-align:center;margin-left:auto;margin-right:auto;width:100%">
					<p><a href="mailto:<?php echo $this->config->item('support_email'); ?>">Contact</a></p>
				</div>
			</div>
			<script>
$(function() {
    $(".imgHover").hover(
        function() {
            $(this).children("img").fadeTo(200, 0.25).end().children(".hover").show();
        },
        function() {
            $(this).children("img").fadeTo(200, 1).end().children(".hover").hide();
        });
});
function toggleDiv(divId) {
   $("#"+divId).toggle();
}

</script>
<?php 
if (isset($error)) {
    ?>
    <div class="modal" id="imgMsg">
        <div class="modal-header">
        <a class="close" href="javascript:toggleDiv('imgMsg');" data-dismiss="modal">×</a>
        <h3><?php echo $error_header; ?></h3>
        </div>
        <div class="modal-body">
        <?php
            if (isset($upload)) {
                ?>
                    <div class="alert alert-success" >
                        <p>Success!
                            <div >
                            <?php foreach ($upload as $item => $value):?>
                            <b><?php echo $item;?>:</b> <?php echo $value;?><br>
                            <?php endforeach; ?></div>
                        </p>
                    </div>  
                <?php
            } 
        ?> 
        <?php
            if (isset($error)) {
                ?>
                    <div class="alert alert-error" >
                        <p>
                            <?php echo $error; ?>
                        </p>
                    </div>
                <?php
            } 
        ?>
        </div>
        <div class="modal-footer">
        <a href="javascript:toggleDiv('imgMsg');" class="btn">Close</a>
        </div>
    </div>
<?php    
} ?>
		</div>	
		<script type="text/javascript" src="/js/bootstrap-modal.js">
</script>
	</body>
</html>			