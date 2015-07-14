
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
</head>
<body>
<div style="width: 500px; margin-left: auto; margin-right: auto; background-color: #EFECE5; padding-top: 20px; padding-bottom: 20px;">
<form style="width: 500px; margin-left: 20px;" method='post' id="create_user" action='/leadform/create_account'>
        <div class="">
            <h2>Student Portal Admin</h2>
            <h3>User Creation</h3><br/>
        </div>
        <div class="">
            <div>
                <fieldset class="control-group">
                    <label class="control-label" for="first_name">First Name</label>
                    <div class="controls">                
                        <input type="first_name" id="first_name" name="first_name" size="20" />
                    </div>
                </fieldset>   
                <fieldset class="control-group">
                    <label class="control-label" for="last_name">Last Name</label>
                    <div class="controls">                
                        <input type="last_name" id="last_name" name="last_name" size="20" />
                    </div>
                </fieldset>    
                <fieldset class="control-group">
                    <label class="control-label" for="entity_id">Entity ID</label>
                    <div class="controls">                
                        <input type="entity_id" id="entity_id" name="entity_id" size="20" />
                    </div>
                </fieldset>                                     
                <fieldset class="control-group">
                    <label class="control-label" for="request_id">Request ID</label>
                    <div class="controls">                
                        <input type="request_id" id="request_id" name="request_id" size="20" />
                    </div>
                </fieldset>                                     
                <fieldset class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">                
                        <input type="email" id="email" name="email" size="20" />
                    </div>
                </fieldset>    
                <fieldset class="control-group">
                    <label class="control-label" for="phone">Phone</label>
                    <div class="controls">                
                        <input type="phone" id="phone" name="phone" size="20" />
                    </div>
                </fieldset> 
                <fieldset class="control-group">
                    <label class="control-label" for="title">User Title</label>
                    <div class="controls">                
                        <input type="title" id="title" name="title" size="20" />
                    </div>
                </fieldset> 
                <fieldset class="control-group">
                    <label class="control-label" for="type">User Type</label>
                    <div class="controls">
                        <select class="validate" id="type" name="type">
                            <option value="">Select one</option>
                            <option value="EC - Primary">EC - Primary</option>
                            <option value="EC">EC</option>
                            <option value="Student">Student</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset class="control-group">
                    <label class="control-label" for="image_url">Image URL</label>
                    <div class="controls">                
                        <input type="image_url" id="image_url" name="image_url" size="20" />
                    </div>
                </fieldset> 
                <fieldset class="control-group">
                    <label class="control-label" for="image_url_thumbnail">Thumbnail URL</label>
                    <div class="controls">                
                        <input type="image_url_thumbnail" id="image_url_thumbnail" name="image_url_thumbnail" size="20" />
                    </div>
                </fieldset> 
                <fieldset class="control-group">
                    <label class="control-label" for="facebook_id">Facebook ID</label>
                    <div class="controls">                
                        <input type="facebook_id" id="facebook_id" name="facebook_id" size="20" />
                    </div>
                </fieldset> 
            </div>    
        </div>
        <div class="">
            <input type="submit" class="btn btn-primary" value="Create User">
        </div>
</form>
<hr/>
<form style="width: 500px; margin-left: 20px;" method='post' id="create_user" action='/leadform/create_account_from_rid'>
        <div class="">
            <h3>User Creation From Request ID</h3><br/>
        </div>
        <div class="">
            <div>
                <fieldset class="control-group">
                    <label class="control-label" for="request_id">Request ID</label>
                    <div class="controls">                
                        <input type="request_id" id="request_id" name="request_id" size="20" />
                    </div>
                </fieldset>                                     
            </div>    
        </div>
        <div class="">
            <input type="submit" class="btn btn-primary" value="Create User">
        </div>
</form>
</div>
</body>
</html>
