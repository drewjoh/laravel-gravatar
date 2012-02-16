# Gravatar for Laravel

A simple bundle to create [Gravatar](http://www.gravatar.com/) links and images.

## Installation

Drop the **Gravatar** bundle into your `/bundles` directory and register it in your `application/bundles.php` file. Optionally you can change the defaults in the `config/gravatar.php` file.

You could optionally just drop the `gravatar.php` and config file into your Laravel `/application/libraries` folder and have it load as needed.

## Generate a Gravatar

    echo Gravatar::get( 'you@example.com' );
      // http://www.gravatar.com/avatar/4fca794da0cf08804f99048d3c8b39c1?
    
    echo Gravatar::get_image( 'you@example.com' );
      // <img src="http://www.gravatar.com/avatar/4fca794da0cf08804f99048d3c8b39c1?" alt="">

## Generate a Secure Gravatar

You can create URLs and IMG tags with Gravatars secure URL.

    Gravatar::get_secure( 'you@example.com' );
    
    Gravatar::get_secure_image( 'you@example.com' );

### Configuration

See the `config/gravatar.php` file for full descriptions of config options.

Also see the `gravatar.php` file for additional arguments you can pass on a function call.

#### Thanks

Thanks to [Phill Sparks](https://github.com/sparksp/laravel-gravatar) for implementation ideas, and [Michael Owens](https://github.com/michaelowens/LaravelGravatar) who created the original.