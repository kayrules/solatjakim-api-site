<?php
namespace App\Classes;

class helper {

	public static function site_domain()
	{
		return 'http://' . $_SERVER['HTTP_HOST'];
		// return 'http://' . $_SERVER['HTTP_HOST'] . '/solatjakim';
	}

	public static function format_12hour($timestamp)
	{
		return date('g:i a', $timestamp);
	}

	public static function breadcrumb($index)
	{
		$uri = explode('/', $_SERVER['REQUEST_URI']);
		if (count($uri) > $index) {
			return $uri[$index];
		} else {
			return false;
		}
	}

	// function set_active($route, $active = 'active')
	// {
	// 	$menus = explode('.', Theme::getMenu());
	// 	return (($route == $menus[0]) || $route == Theme::getMenu()) ? $active : '';
	// }

	public static function format_24hour($timestamp)
	{
		return date('H:i', $timestamp);
	}

	public static function json_formatter($json)
	{
	    $result = '';
	    $level = 0;
	    $in_quotes = false;
	    $in_escape = false;
	    $ends_line_level = NULL;
	    $json_length = strlen( $json );

	    for( $i = 0; $i < $json_length; $i++ ) {
	        $char = $json[$i];
	        $new_line_level = NULL;
	        $post = "";
	        if( $ends_line_level !== NULL ) {
	            $new_line_level = $ends_line_level;
	            $ends_line_level = NULL;
	        }
	        if ( $in_escape ) {
	            $in_escape = false;
	        } else if( $char === '"' ) {
	            $in_quotes = !$in_quotes;
	        } else if( ! $in_quotes ) {
	            switch( $char ) {
	                case '}': case ']':
	                    $level--;
	                    $ends_line_level = NULL;
	                    $new_line_level = $level;
	                    break;

	                case '{': case '[':
	                    $level++;
	                case ',':
	                    $ends_line_level = $level;
	                    break;

	                case ':':
	                    $post = " ";
	                    break;

	                case " ": case "\t": case "\n": case "\r":
	                    $char = "";
	                    $ends_line_level = $new_line_level;
	                    $new_line_level = NULL;
	                    break;
	            }
	        } else if ( $char === '\\' ) {
	            $in_escape = true;
	        }
	        if( $new_line_level !== NULL ) {
	            $result .= "\n".str_repeat( "    ", $new_line_level );
	        }
	        $result .= $char.$post;
	    }

	    return $result;
	}

}
