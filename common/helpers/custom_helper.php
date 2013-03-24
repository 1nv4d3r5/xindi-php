<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * I format a MySQL timestamp
 *
 * @access	public
 * @param	string   date to be formatted
 * @param	string   format
 * @return	string   formatted date
 */
if(! function_exists('format_date')) 
{
    function format_date($date, $format ='d/m/Y H:i') 
    {
    	if(is_timestamp($date))
		{
	    	return date($format , strtotime($date));
		}
		else
		{
			return '';
		}
    }
}

/**
 * I validate a timestamp
 *
 * @access	public
 * @param	string    date to be validated
 * @return	boolean   true if timestamp
 */
if(! function_exists('is_timestamp'))
{
	function is_timestamp($str)
	{
		return preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/', trim($str)) === 1;
	}
}

/**
 * I render a message
 *
 * @access	public
 * @param	array    user session
 * @param	array    message
 * @return	string   the message
 */
if(! function_exists('render_message'))
{
	function render_message($userdata=array(), $message=array())
	{
		$result = '';

		if(array_key_exists('flash:old:type', $userdata) && array_key_exists('flash:old:text', $userdata))
		{
			$message = array('type'=>$userdata['flash:old:type'], 'text'=>$userdata['flash:old:text']);
		}
		
		if(!empty($message) && array_key_exists('type', $message) && array_key_exists('text', $message))
		{
			$result = '<div class="alert alert-'.$message['type'].' fade in">';
			$result .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			$result .= $message['text'];
			$result .= '</div>';
		} 
		
		return $result;
	}
}