<?php

use Laravel\Config;
use Laravel\HTML;

/**
 * Gravatar bundle for the Laravel PHP framework.
 *
 * @author      frowhy
 * @copyright   (c) 2016 - frowhy
 * 
 * More info at: http://github.com/frowhy/laravel-gravatar
 */

class Gravatar
{
	/**
	 * @var string - A temporary internal cache of the URL parameters to use.
	 */
	protected static $config_cache = null;

	/*
	 * @var string - URL constants for the avatar images
	 */
	const HTTP_URL = 'http://www.gravatar.com/avatar/';
	const HTTPS_URL = 'https://secure.gravatar.com/avatar/';
	
	/**
	 * Get a specific config option value
	 * @return string - the request config option if exists.
	 */
	public static function config($item)
	{
		return(Config::has('gravatar.'.$item)) ? Config::get('gravatar.'.$item) : null;
	}

	/**
	 * Build the avatar URL based on the provided email address and optional arguments.
	 * 
	 * @param string $email - The email to get the gravatar for.
	 * @return string - The XHTML-safe URL to the gravatar.
	 */
	public static function build_url($email, $size = null, $secure = null)
	{
		// If we haven't used this class yet, pre-load our config cache
		if (self::$config_cache === null)
			self::$config_cache = Config::get('common::gravatar');
		
		// Start building the URL, and deciding if we're doing this via HTTPS or HTTP.
		if (
			(self::$config_cache['auto_detect_ssl'] AND
			(isset($_SERVER['HTTPS']) AND $_SERVER['HTTPS'])) OR
			self::$config_cache['use_secure_url'] OR 
			$secure == true
		) {
			$url = static::HTTPS_URL;
		} else {
			$url = static::HTTP_URL;
		}

		// Tack the email hash onto the end of our Gravatar URL, then add our additional options.
		$url .= self::get_email_hash($email)
			.'?'
			.(self::$config_cache['force_default'] != false ? '&f=y' : '')
			.(self::$config_cache['max_rating'] != false ? '&r='.self::$config_cache['max_rating'] : '')
			.((self::$config_cache['size'] != false OR $size != null) ? '&s='.($size !== null ? $size : self::$config_cache['size']) : '')
			.(self::$config_cache['default_image'] != false ? '&d='.self::$config_cache['default_image'] : '');

		return $url;
	}

	/**
	 * Get the email hash to use (after cleaning the string).
	 * 
	 * @param string $email - The email to get the hash for.
	 * @return string - The hashed form of the email, post cleaning.
	 */
	public static function get_email_hash($email)
	{
		// Hash created based on gravatar docs.
		return hash('md5', strtolower(trim($email)));
	}
	
	/**
	 * Get the gravatar
	 */
	public static function get($email, $size = null)
	{
		return self::build_url($email, $size);
	}
	
	/**
	 * Get the gravatar with forced secure connection
	 */
	public static function get_secure($email, $size = null)
	{
		return self::build_url($email, $size, true);
	}
	
	/**
	 * Get the gravatar and return as image
	 */
	public static function get_image($email, $size = null, $alt = '', $attributes = array())
	{
		return HTML::image(self::build_url($email, $size), $alt, $attributes);
	}
	
	/**
	 * Get the gravatar with forced secure connection and return as image
	 */
	public static function get_secure_image($email, $size = null, $alt = '', $attributes = array())
	{
		return HTML::image(self::build_url($email, $size, true), $alt, $attributes);
	}
	
}
