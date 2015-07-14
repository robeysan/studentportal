<div class="person">
    <ul class="testimonials">
        <li>
        <div class="test">
            <img alt="Photo of Officer" src="<?php echo $ec['image_url_thumbnail'] ?>" />
            <div class="testDetails">
            <p class="name"><?php echo $ec['first_name'] . ' ' . $ec['last_name'];?></p><span class="dot">·</span><a class="send-message" data-toggle="modal" href="#sendMsg-<?php echo $ec['uid']; ?>">Send Message</a>
                <p class="title"><?php echo $ec['title'];?></p>
            </div>
        </div>
        </li>
    </ul>
</div>
