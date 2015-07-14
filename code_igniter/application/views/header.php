<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
"https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Student Portal from The Learning House, Inc</title>
<meta property="og:title" content="The Learning House" />
<meta property="og:description" content="It's a beauty filled world" />
<meta property="og:image" content="<?php echo $this->config->item('logo_topbar'); ?>" />

        <script src="/js/jquery-1.7.1.min.js"></script>

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
        <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

       
        <!--[if !IE]><!-->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/docs.css" rel="stylesheet">
        <link href="/css/datepicker.css" rel="stylesheet">
        <!--<![endif]-->

        <!--[if gte IE 7]>
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/docs.css" rel="stylesheet"> 
        <![endif]-->

        <!--[if lt IE 7]>
        <link href="/css/iestyle.css" rel="stylesheet">
        <![endif]-->
        <?php 
            if (isset($scripts)) {
                echo($scripts); 
            }
        ?>
        
        <style type="text/css">
            body {
                padding-top: 0px;
            }
        </style>
    </head>
    
    <body>
        
    <div class="container wrap">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner" data-dropdown="dropdown">
                <div class="container">
                    <img src="<?php echo $this->config->item('logo_topbar'); ?>" style="max-width:93px; max-height:30px; float:left; margin-left: 6px; margin-right: 12px; margin-top: 2px;">
<?php if(isset($has_stp)) { ?>
    <?php if ($has_stp) { ?>
                    <ul class="nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="<?php echo $this->config->item('online_programs_url'); ?>" target="_blank">Our Online Programs</a></li>
                    </ul>
    <?php } } ?>
                    <div class="nav account" style="float: right; color:white;">
                        <li class="dropdown" data-dropdown="dropdown" >
                        <a href="#" class="settings dropdown-toggle">Settings</a>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="modal" href="#updatePassword">Change Password</a></li>
                            <?php if ($has_stp) { ?>
                            <li><a data-toggle="modal" href="#welcomeModal">Facebook Connect</a></li>
                            <li><a data-toggle="modal" href="#updateProfileImg">Change Photo</a></li>                            
                            <?php } ?>
                        </ul>
                        </li>
                        <li><a href="/auth/logout">Logout</a></li>
                    </div>
                    <?php if ($has_stp) { ?>
                    <img src="<?php echo $image_url_thumbnail; ?>" class="thumb navbarthumb"/>
                    <?php } ?>
                </div>
            </div>
        </div>
        </div>
<?php 
    switch($user_progress) {

    // We used 'app_only_app' here to ensure we grab the right 
    // step 1 image if the program chooser dropdown
    // chooses a new program with a STP
    case 'application':
    case 'app':
        $step_progress_link =  '/app';
        $step_progress_img = $this->config->item('step1');
        break;
    case 'otr':
        $step_progress_link = '/otr';
        $step_progress_img = $this->config->item('step2');
        break;
    case 'finaid':
        $step_progress_link = '/main/financial_aid';
        $step_progress_img = $this->config->item('step3');
        break;
    case 'complete':
        $step_progress_link = '';
        $step_progress_img = $this->config->item('step4');
        break;
    default:
        $step_progress_link = '';
        $step_progress_img = '';
}?> 

<!-- If has_stp is on -->

<?php if(isset($has_stp)) { ?>
    <?php if ($has_stp) { ?>
        <div class="stepheader">
        <div class="container wrap">
            <a href="/"><img style="position: relative; float: left;" src="<?php echo $this->config->item('logo'); ?>"></a>
            <img style="position: relative; top: 2px; float: right;" src="<?php echo $step_progress_img;?>"/>
            </div>
        <?php } else { ?>
                <!--<a href="/"><img src="<?php echo $this->config->item('logo'); ?>"></a>
                <img style="margin-left: 47px; position: relative; top: 2px;" src="<?php echo $this->config->item('blank_step'); ?>"/></div>-->
        <?php } ?>
<?php } ?>
        </div>
        </div>
    <div class="container wrap">

