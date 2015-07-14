<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Send email message when error occurs
 *
 * @param	string
 * @param	string
 * @return	void
 */
function send_error_email($error, $message)
{
    $CI =& get_instance();
    $CI->load->library('email');
    $CI->config->load('error_email');
    $CI->email->from($CI->config->item('from_email'), 'Student Portal Errors');
    $CI->email->to($CI->config->item('developer_email'));
    $CI->email->subject("(" . $_SERVER['HTTP_HOST'] . ") " . $error);
    $CI->email->message($message);
    $CI->email->send();
}
