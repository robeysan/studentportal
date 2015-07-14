<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|------------------------------------------------------------------------------
| Basics
|
|------------------------------------------------------------------------------
*/

/* Variations of school names */
$config['site_name'] = "Concordia University - Saint Paul Student Portal";
$config['school_name'] = "Concordia";
$config['school_name_long'] = "Concordia University - Saint Paul";

/* This is the basic URL passed to Forms */
$config['lead_form_path'] = "/form/show/concordia-university-saint-paul/default/191/1541";
$config['fb_share_path'] = "http://online.csp.edu/";

/* ELP ID */
$config['client_entity_id'] = "7325";
$config['affiliate_id'] = "191";

/* School support email, and where emails appear to come from for students */
$config['support_email'] = "admissions@csp.edu";
$config['support_phone'] = "651-641-8230";

/* Email address for notifications when has_ecs or has_stp is false */
$config['default_notification_email_heading'] = "CSP Online App - ";

/* Basic flags */
$config['portal_active'] = "true";
$config['admin_active'] = "false";

/* Piwik site id */
$config['piwik_id'] = 3;

/*
|------------------------------------------------------------------------------
| URLS
|
|------------------------------------------------------------------------------
*/
$config['online_programs_url'] = "http://online.csp.edu/online-degree-programs/";
$config['online_undergraduate_application_url'] = "https://www2.csp.edu/form/admissions/nolij/adult.asp";
$config['online_graduate_application_url'] = "https://www2.csp.edu/form/admissions/nolij/grad.asp";
$config['online_programs_cost_url'] = "http://online.csp.edu/admissions/tuition-information/";

/*
|------------------------------------------------------------------------------
| Theming
|
|------------------------------------------------------------------------------
*/

$config['logo'] = "/img/csp/csp-large-logo.png";
$config['logo_topbar'] = "/img/csp/csp-small-logo.png";
$config['app_only_app_img'] = "/img/csp/app-only-app.png";
$config['app_only_complete_img'] = "/img/csp/app-only-complete.png";
$config['app_img'] = "/img/csp/CTAstep1.png";
$config['otr_img'] = "/img/csp/CTAstep2.png";
$config['finaid_img'] = "/img/csp/CTAstep3.png";
$config['completed_img'] = "/img/csp/CTAstep4.png";
$config['blank_step'] = "/img/csp/blank-step.png";
$config['step1'] = "/img/csp/step1.png";
$config['step2'] = "/img/csp/step2.png";
$config['step3'] = "/img/csp/step3.png";
$config['step4'] = "/img/csp/completed.png";

/*
|------------------------------------------------------------------------------
| Official Transcript Request
|
|------------------------------------------------------------------------------
*/
$config['otr_address'][] = "Concordia University - St. Paul";
$config['otr_address'][] = "C/O: The Learning House";
$config['otr_address'][] = "4620 Fritchey Street";
$config['otr_address'][] = "Harrisburg, PA 17109";
$config['otr_thumb'] = "/img/csp/otr_thumb.png";
$config['otr_fax_instructions'] = "Fax to your Enrollment Counselor at 1-800-473-2512.";

/*
|------------------------------------------------------------------------------
| Feeds
|
|------------------------------------------------------------------------------
*/
$config['twitter_username'] = "concordiastpaul";
