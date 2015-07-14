</div>
</div>
</div>
<div class="footer">
    <p style="margin-left: auto; margin-right: auto;">
    <a href="/main/privacy">Privacy Policy&nbsp;&nbsp;|&nbsp;&nbsp; <a href="mailto:<?php echo $this->config->item('support_email'); ?>">Contact</a>
    </p>
</div>

<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
<script src="/js/bootstrap-dropdown.js"></script>
<script src="/js/masked_input.js"></script>
<script language="javascript" src="/js/jquery.tweet.js" type="text/javascript"></script>
<script>

function sendEmailOnFinancialAid(new_action) {
    $.post('/otr/notify', { "action": new_action}, function() {
    });
}

function showReplyBox(id) {
    $('#toggle-container-'+id).show(250, 'easeOutQuart', function() {
        $('#textarea-'+id).focus();
    });
}

function createMessageReply(message_id) {

    //event.preventDefault();

    $.post('/messages/reply',$('#message-'+message_id).serializeArray(), function() {
        var new_reply_post = ["<div class='container' style='min-width: 400px;' id='reply-container-'>", 
            "<img src='<?php echo $image_url_thumbnail; ?>' class='profile-picture'/>",
            "<div class='reply-body'>",
            "<p class='body'>",
            "<a href='#' class='reply-name'><?php echo $user_name; ?></a>",
            $('#textarea-'+message_id).val(),
        "</p>",           
        "<p class='date'>Just now</p>",           
        "</div>"].join('\n');   
        $(new_reply_post).hide().appendTo("#replies-anchor-"+message_id).fadeIn();
        $('#textarea-'+message_id).val('');
    });

    return false;
}

function deleteMessageReply() {} 

$(document).ready(function() {

    <!-- Modal used for first time welcome screen -->
        <?php if(isset($show_welcome_modal)) { ?>
        $('#welcomeModal').modal('show');
    <?php } ?>

    $("#twitter").tweet({
        join_text: "auto",
            username: "<?php echo $this->config->item('twitter_username'); ?>",
            avatar_size: 24,
            count: 3,
            loading_text: "Loading from twitter.com..."
    });

    $('#textarea').blur(function() {
        $('#toggle-container').toggle(750, 'easeInQuart', function() {
        });

    });

});

// Send emails when clicking download and print
$("#otr_download").click(function() {
    sendEmailOnFinancialAid('download', '<?php echo $user['uid']; ?>');
    return false;
});
$("#otr_print").click(function() {
    sendEmailOnFinancialAid('print', '<?php echo $user['uid']; ?>');
    return false;
});

// Used to change profile pic
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
if (isset($upload) || isset($error)) {
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
<form method='post' id="passwdForm" action='/auth/change_password'>
    <div class="modal hide" id="updatePassword">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Change Your Password</h3>
        </div>
        <div class="modal-body">
            <div>
                <fieldset class="control-group">
                    <label class="control-label" for="old_password">Old Password</label>
                    <div class="controls">                
                        <input type="password" id="old_password" name="old_password" size="20" />
                    </div>
                </fieldset>   
                <fieldset class="control-group">
                    <label class="control-label" for="new_password">New Password</label>
                    <div class="controls">                
                        <input type="password" id="new_password" name="new_password" size="20" />
                    </div>
                </fieldset>    
                <fieldset class="control-group">
                    <label class="control-label" for="confirm_new_password">Confirm New Password</label>
                    <div class="controls">                
                        <input type="password" id="confirm_new_password" name="confirm_new_password" size="20" />
                    </div>
                </fieldset>                                     
            </div>    
        </div>
        <div class="modal-footer">
            <a data-dismiss="modal" class="btn">Close</a>
            <input type="submit" class="btn btn-primary" value="Change Password">
        </div>
    </div>    
</form>

<form enctype="multipart/form-data"  method="post" action="/upload/do_upload/">
    <div class="modal hide" id="updateProfileImg">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Change Your Photo</h3>
        </div>
        <div class="modal-body">
            <div>
                <input type="file" name="userfile" size="20" />
                <img src="<?php echo $image_url; ?>" style="float:left;padding-right:10px;">
                <input type="hidden" name="max_file_size" value="1000" /> 
            </div>    
        </div>
        <div class="modal-footer">
            <a data-dismiss="modal" class="btn">Close</a>
            <input type="submit" class="btn btn-primary" value="Upload Photo">
        </div>
    </div>    
</form>

<div class="modal hide" id="welcomeModal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Welcome <?php echo $user['first_name']; ?>!</h3>
    </div>
    <div class="modal-body">
        <div>
        <p>Welcome to the <?php echo $this->config->item('site_name'); ?>!</p>
<?php if(! $has_stp) { ?>
            <p>This is your personalized page to complete an online application. From here, you can fill out your online application and return at any time to complete it. Once complete, we will review your application and contact you regarding the admissions process.</p>
<?php } else { ?>
            <p>This is your personalized page to help you with the admissions process. From here, you can fill out your application, ask questions to our enrollment counselors, or get assistance with transcripts or financial aid.</p>
<?php } ?>
            <p>By connecting your Facebook account, your profile data will be used to enhance your experience.</p> 
            <a href="/facebook_connect">
                <div style="margin-top: 24px; margin-left: 112px; margin-right: auto"><img src="/img/fb-connect-large.png" />
            </a></div>
        </div>    
    </div>
    <div class="modal-footer">
        <a data-dismiss="modal" class="btn">Close</a>
    </div>
</div>    
<div class="modal hide" id="errorModal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h4>Oops! It looks like an error occured completing your application. Please login and try again.</h4>
    </div>
    <div class="modal-footer">
        <a data-dismiss="modal" class="btn" onclick="parent.location='/'">Try Again</a>
    </div>
</div>
<div class="modal hide" id="validateModal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h4>Oops! It looks like you missed these required questions:</h4>
    </div>
    <div class="modal-body">
        <div>
        <p id="validateModalBody">
        </p>
        </div>    
    </div>
    <div class="modal-footer">
        <a data-dismiss="modal" class="btn">Back</a>
    </div>
</div>
<?php 
    if(isset($ecs)) {
        foreach($ecs as $ec):
?>
<form method='post' id="msgForm" action='/messages/create'>

    <div class="modal hide" id="sendMsg-<?php echo $ec['uid']; ?>" style='z-index:999999'>
        <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Message to <?php echo $ec['first_name'] . ' ' . $ec['last_name']; ?></h3>
        </div>
        <div class="modal-body">
            <div class="msgEntity">
                <img alt="Photo" src="<?php echo $ec['image_url_thumbnail']; ?>" />
                <div class="testDetails" style="margin-top: 18px;">
                    <p class="name"><?php echo $ec['first_name'] . ' ' . $ec['last_name']; ?></p>
                    <p class="title"><?php echo $ec['title']; ?></p>
                </div>
            </div>
            <div class="msgText"> 
                <textarea name="text" style="width:100%;height:250px;overflow:auto" placeholder="Send message..."></textarea>
                <input type="hidden" name="to" value="<?php echo $ec['uid']; ?>">
                <input type="hidden" name="type" value="Message">
                <input type="hidden" name="redirect" value="/">
            </div>
        </div>
        <div class="modal-footer">
            <a data-dismiss="modal" class="btn">Close</a>
            <input type="submit" class="btn btn-primary" value="Send Message">
        </div>
    </div>
</form>

<?php 
            endforeach; 
    } 
?></div>
    <script type="text/javascript" src="/js/bootstrap-modal.js">
    </script>
    <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-31366915-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

    </script>
    <!-- Piwik --> 
    <script type="text/javascript">
    var pkBaseURL = (("https:" == document.location.protocol) ? "https://analytics.learninghouse.com/" : "http://analytics.learninghouse.com/");
    document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
    </script><script type="text/javascript">
    try {
    var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", <?php echo $this->config->item('piwik_id'); ?>);
    piwikTracker.setCustomVariable(1, "user_id", "<?php echo $user['uid']; ?>", "visit");
    piwikTracker.trackPageView();
    piwikTracker.enableLinkTracking();
    

    } catch( err ) {}
    </script><noscript><p><img src="http://analytics.learninghouse.com/piwik.php?idsite=<?php echo $this->config->item('piwik_id'); ?>" style="border:0" alt="" /></p></noscript>
    <!-- End Piwik Tracking Code -->
    </body>
</html>
