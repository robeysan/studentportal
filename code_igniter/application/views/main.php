
<div class="row-fluid toprow">
    <div class="welcome-message span7 left">
        <div class="middle">
            <div class="imgHover">
                <div class="hover">
                    <a class="" data-toggle="modal" href="#updateProfileImg">Change Photo</a>
                </div>
                <?php if($has_stp) { ?>
                    <img src="<?php echo $image_url; ?>" style="float:left;">
                <?php } ?>
            </div>
            <h1><?php echo $user_name; ?></h1>
            <p>Prospective Student</p>
            <p></p>
        </div>
    </div>
    <div class="span5 right">
<?php 
switch($user_progress) {
    case 'app_only_app':
        $progress_link =  '/app';
        $progress_img = $this->config->item('app_only_app_img');
        break;
    case 'app_only_complete':
        $progress_link =  '';
        $progress_img = $this->config->item('app_only_complete_img');
        break;
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
        $progress_link = '/finaid';
        $progress_img = $this->config->item('finaid_img');
        break;
    case 'complete':
        $progress_link = '';
        $progress_img = $this->config->item('completed_img');
        break;
    default:
        $progress_link = '';
        $progress_img = '';
}?>        
        <a href="<?php echo $progress_link;?>">
        <img style="max-width: 100%;" src="<?php echo $progress_img;?>" class="call-to-action">
        </a>
    </div>    
</div>
                 
<div class="row-fluid">
    <div class="span7 left">
        <div class="wall">
            <h1>Recent Activity</h1>
            <hr>
            <div class="messages-start-anchor"></div>
            <?php foreach ($messages as $msg):?>
            <div class="entry">
            <img class="sml_icon" src="<?php echo $msg['image_url_thumbnail']; ?>">
                <div class="body">
                <a class="name"><?php echo $msg['user_name'];?></a>
                <p class="event-type"><?php echo $msg['type'];?></p><br/>
                    <p class="message"><?php echo $msg['text'];?></p>
                    <?php if ($has_ecs) { ?>
                        <span class="date"><p><?php echo $msg['ts'];?><span class="dot">·</span><a id="reply_trigger" href="#" onclick="showReplyBox('<?php echo $msg['_id']; ?>');return false;">Reply</a><!--<span class="dot">·</span><a name="fb_share" type="icon" share_url="<?php #echo $this->config->item('fb_share_path'); ?>">Share</a>--></p> 
                        <?php if(isset($msg['replies'])) { ?>
                        <?php foreach ($msg['replies'] as $reply):?>
                            <div class="container" style="min-width: 400px;" id="reply-container-<?php echo $msg['_id']; ?>">
                                <img src="<?php echo $reply['image_url_thumbnail']; ?>" class="profile-picture"/>
                                <div class="reply-body">
                                <p class="body"><a href="#" class="reply-name"><?php echo $reply['user_name']; ?></a><?php echo $reply['text']; ?></p>                                    
                                <p class="date"> <?php echo $reply['ts']; ?></p>           
                                </div>                        
                            </div> 
                        <?php endforeach;?>
                        <?php } ?>
                        <div id="replies-anchor-<?php echo $msg['_id']; ?>"></div>
                        <form id="message-<?php echo $msg['_id']; ?>" method="POST" onsubmit="createMessageReply('<?php echo $msg['_id']; ?>');return false;">
                    <?php } ?>
                    <div class="clear"></div>
                    <fieldset class="control-group" style="position: relative; top: -20px;">
                        <label class="control-label" for="input01"></label>
                        <div class="controls" style="display: block;clear:both">
                            <div class="container" style="display: none; margin-top: 20px; min-width: 400px;" id="toggle-container-<?php echo $msg['_id']; ?>">
                                <input type="hidden" name="uid" value=<?php echo $uid; ?>>
                                <input type="hidden" name="_id" value=<?php echo $msg['_id']; ?>>
                                <img src="<?php echo $image_url_thumbnail; ?>" class="profile-picture"/>
                                <textarea placeholder="Type a reply..." class="input-xlarge reply_box" name="text" id="textarea-<?php echo $msg['_id']; ?>" rows="1" onblur="if($(this).val().length == 0) { $('#toggle-container-<?php echo $msg['_id']; ?>').toggle(250, 'easeOutQuart', function() {}) };"></textarea>
                                <button type="submit" class="btn small" style="float: right; margin-right: 6px; margin-bottom: 6px;">Post</button>
                            </div>
                        </div>                                    
                    </fieldset>
                </form>
                </div>
                <hr> 
            </div>
            <?php endforeach;?>
        </div>        
    </div>

    <div class="right span5">
<?php
    echo $this->load->view("programs_block", true);
?>
<?php 
$data['ecs'] = $ecs;
if($program_has_ecs) {
    echo $this->load->view("ec_block", $data, true); 
}
?>
        <h2 style="font-size: 16px;line-height: 1.5em;margin-top: 40px; font-weight: lighter;">Latest News from Twitter</h2>
        <div id="twitter"></div>
        <!--<h2 style="font-size: 16px;line-height: 1.5em; font-weight: lighter;">Student Life At Notre Dame</h2>
        <div id="flickr_badge_uber_wrapper">
            <div id="flickr_badge_wrapper">
                <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?show_name=0&count=4&display=random&size=m&layout=x&source=user&user=52540051@N05"></script>
                    <div id="flickr_badge_source">
                    </div>
            </div>
        </div>-->
        <!-- End of Flickr Badge -->
        <script language="javascript" src="/js/jquery.tweet.js" type="text/javascript"></script>
        <script src="https://facebook.com/connect.php/js/FB.Share" type="text/javascript"></script>
    </div>    
</div>


