<div class="row toprow">
    <div class="welcome-message span6 left">
        <div class="middle">
            <div class="imgHover">
                <div class="hover">
                    <a class="" data-toggle="modal" href="#updateProfileImg">Change Photo</a>
                </div>
                <img src="<?php echo $image_url; ?>" style="float:left;">
            </div>
            <h1><?php echo $user_name; ?></h1>
            <p>Prospective Student</p>
            <p></p>
        </div>
    </div>
    <div class="offset1 span4 right">
 <?php 
switch($user_progress) {
    case 'application':
    case 'app':
        $progress_link =  '/app';
        $progress_img = $this->config->item('app_img');
        break;
    case 'otr':
        $progress_link = '/otr';
        $progress_img = $this->config->item('otr_img');
        break;
    case 'finaid':
        $progress_link = '/main/financial_aid';
        $progress_img = $this->config->item('finaid_img');
        break;
    case 'complete':
        $progress_link = '';
        $progress_img = $this->config->item('completed_img');
        break;
    default:
        $progress_link = '';
        $progress_img = '';
        break;
}?>        
        <a href="<?php echo $progress_link;?>">
        <img src="<?php echo $progress_img;?>" class="call-to-action">
        </a>
    </div>    
</div>
<div class="row">
    <div class="span7 left">
        <?php foreach ($programs as $program) { ?>
            <h2><a href="<?php echo $program['url']; ?>" target="_blank"><?php echo $program['name']; ?> </a></h2>
            <p><?php echo $program['desc'] ?></p>
        <?php } ?>
    </div>

    <div class="span4 right">
        <?php 
            $data['programs'] = $programs;
            echo $this->load->view('programs_block');
        ?>
        <?php
            $data['ecs'] = $ecs; 
            echo $this->load->view('ec_block', $data, true); 
        ?>
        <h2 style="font-size: 16px;line-height: 1.5em;margin-top: 40px; font-weight: lighter;">Latest Notre Dame News from Twitter</h2>
        <div id="twitter"></div>
        <!--<h2 style="font-size: 16px;line-height: 1.5em; font-weight: lighter;">Student Life At Notre Dame</h2>
        <div id="flickr_badge_uber_wrapper">
            <div id="flickr_badge_wrapper">
                <script type="text/javascript" src="https://secure.flickr.com/badge_code_v2.gne?show_name=0&count=4&display=random&size=m&layout=x&source=user&user=52540051@N05"></script>
                    <div id="flickr_badge_source">
                    </div>
            </div>
        </div>-->
        <!-- End of Flickr Badge -->
        <script language="javascript" src="./js/jquery.tweet.js" type="text/javascript"></script>
    </div>    
</div>


