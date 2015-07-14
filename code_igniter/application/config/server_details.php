<?php 
$config['path'] 					= substr(dirname(__FILE__),0,-7);
$config['full_server_name'] 		= $_SERVER['HTTP_HOST'];
$config['subdomain'] 				= strstr($config['full_server_name'], '.', true);
$config['server_name_without_sub'] 	= substr($config['full_server_name'], strlen($config['subdomain']));
$config['ci_tlh_log_path'] 			= $config['path'].'/logs/';
$config['ci_tlh_cache_path'] 		= $config['path'].'/cache/';
$config['ci_tlh_siteurl']			= 'http://'.$config['full_server_name'];
$config['ci_tlh_home']				= 'http://'.$config['full_server_name'];
