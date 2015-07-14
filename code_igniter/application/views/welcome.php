        <title>Loading...</title>
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
        <script type="text/javascript">
        <!--
            function delayer(){
                window.location = "<?php echo $redirect_url; ?>"
            }
        //-->
        </script>

	</head>
	<body onLoad="setTimeout('delayer()', 5000)">
		<div class="row">
			<div class="" style="text-align:center;margin-left:auto;margin-right:auto;width:100%">
				<img class="login" src="<?php echo $this->config->item('logo'); ?>">
			</div>	
		</div>
		<div class="row">
			<div class="login" style="margin-left:auto;margin-right:auto;width:250px;text-align:center">	
                <h2>Welcome</h2>
<?php if($redirect_url == '/app') { ?>
                <p>Please wait - your application will load momentarily</p>
<?php } else { ?>
                <p>Please wait while your Student Portal is generated...</p>
<?php } ?>
                <p><img src="/img/loading.gif"></p>
			</div>
			<div class="row">
				<div class=""style="text-align:center;margin-left:auto;margin-right:auto;width:100%">
					<p><a href="#">Privacy Policy</a> | <a href="mailto:<?php echo $this->config->item('support_email'); ?>">Contact</a></p>
				</div>
			</div>
		</div>

