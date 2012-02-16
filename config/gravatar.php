<?php

return array(
	
	/*
	|--------------------------------------------------------------------------
	| Size of Gravatar image
	|--------------------------------------------------------------------------
	|
	| Default size of the image returned by Gravatar. 
	| 
	| False = 80 x 80 pixels (Gravatar default)
	| Values can be from 1 - 512
	|
	*/

	'size' => false,
	
	/*
	|--------------------------------------------------------------------------
	| Default Gravatar Image
	|--------------------------------------------------------------------------
	|
	| Default image to be returned by Gravatar if none are available for the
	| given user. 
	| False = Gravatar default ("G")
	| 
	| Options are:
	| 404: do not load any image if none is associated with the email hash, instead return an HTTP 404 (File Not Found) response
	| mm: (mystery-man) a simple, cartoon-style silhouetted outline of a person (does not vary by email hash)
	| identicon: a geometric pattern based on an email hash
	| monsterid: a generated 'monster' with different colors, faces, etc
	| wavatar: generated faces with differing features and backgrounds
	| retro: awesome generated, 8-bit arcade-style pixelated faces
	|
	*/

	'default_image' => false,
	
	/*
	|--------------------------------------------------------------------------
	| Force Default Image
	|--------------------------------------------------------------------------
	|
	| If for some reason you want the default Gravatar image to load, set this
	| to true.
	|
	*/

	'force_default' => false,
	
	/*
	|--------------------------------------------------------------------------
	| Sie of gravatar image
	|--------------------------------------------------------------------------
	|
	| Default size of the image returned by gravatar.
	| False = "g"
	|
	| Options are:
	| g: suitable for display on all websites with any audience type.
	| pg: may contain rude gestures, provocatively dressed individuals, the lesser swear words, or mild violence.
	| r: may contain such things as harsh profanity, intense violence, nudity, or hard drug use.
	| x: may contain hardcore sexual imagery or extremely disturbing violence.
	|
	*/

	'max_rating' => false,
	
	/*
	|--------------------------------------------------------------------------
	| Use Secure URL
	|--------------------------------------------------------------------------
	|
	| Whether or not to use the https:// Gravatar image URL by default.
	|
	*/

	'use_secure_url' => false,
	
	/*
	|--------------------------------------------------------------------------
	| Auto Detect SSL
	|--------------------------------------------------------------------------
	|
	| This will attempt to detect whether the current URL is using https and 
	| will automatically use the https:// Gravatar image URL. This will
	| override the "use_secure_url" config option.
	|
	*/

	'auto_detect_ssl' => false,
	
);