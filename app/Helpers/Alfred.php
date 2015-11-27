<?php 
namespace App\Helpers;

class Alfred{

	/**
	 * Convert any string into a formated slug
	 * @param  string
	 * @return [string]
	 */
   	public static function toSlug( $string = '' ) {

    	if (function_exists('iconv')) {
	        $string = @iconv('UTF-8', 'ASCII//TRANSLIT', $string);
	    }
	    $string = preg_replace("/[^a-zA-Z0-9 -]/", "", $string);
	    $string = strtolower($string);
	    $string = str_replace(" ", "-", $string);
	    $string = strtolower($string);

    	return $string;

    }


    /**
	 * Return formatted value within print_r
	 * @param  string
	 * @return [string]
	 */
   	public static function debugThis( $value = '' ) {

    	if ( empty($value) ) {
	        return "informe um valor";
	    }

	    echo "<pre>";
	    print_r( $value );
	    echo "</pre>";
	    exit;    	

    }


    /**
	 * Same as DIE n' DUMP
	 * @param  string
	 * @return [string]
	 */
   	public static function dd( $value = '' ) {

    	if ( empty($value) ) {
	        return "informe um valor";
	    }

	    dd($value);  	

    }

}