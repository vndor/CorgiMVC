# CorgiMVC

## What is it?
CorgiMVC is featured just like the dog it's named after, lightweight, small, but with tons of personality. We built this framework because there was no other MVC framework that was this small, (only one file makes up the framework) does classes and namespaces correctly, has ORM built in, and has support for both MySQL and SQLite.

## What's its purpose?
CorgiMVC is great for applications that need a small footprint. We use it for the GUIs for our server scripts and desktop applications.

## Features
- MVC
- OOP/Class/Namespaces Enabled
- ORM Enabled (Thanks to https://github.com/GonistLelatel/xpdo)
- No RewriteEngine required for friendly URLs
- Only need composer to install initially on a dev machine

# Documentation

## Installation

1. Clone or copy CorgiMVC to a PHP 7.0+ server
1. Run `composer install`
1. Edit `application/Config.php` to your likings

## Models

Models are automatically loaded. Make sure you define the namespaces and class names properly. If you want to use ORM refer to: https://github.com/GonistLelatel/xpdo

## Controllers

### Functions/Parameters

With CorgiMVC, there is no configuration. As long as you name your folders, functions, and files correctly, it'll just work. The URL structure is: `/index.php/{controllerClass}/{controllerMethod}/{param1}/{param2}`

- Public functions are accessible via the URL above
- The `$corgi` argument is needed for URL params that you access via Array.
- The `$corgi` argument is an Array of all of the paramaters AFTER the method in the URL like shown above. `$corgi[0]` would output `{param1}` for example.

### Framework Helpers

Make sure you include `use CorgiMVC;` in all controllers to give the framework access to the controller

- `CorgiMVC::getView($with='', $layout='default')` is optional but it renders the view. It has two optional parameters: `$with` which passes any variables into the view. We recommend passing in a named array. `$layout`: The name of the layout you want the view to be loaded in.
- `CorgiMVC::redirect()` is just a simple redirect function. We recommend passing in `CORGI['http']` if you're redirecting to the app.

## Views

Views are only attached to controller methods the return `CorgiMVC::getView()`. That controller will then render the view it belongs to. That view will live at `/Views/{controllerClass}/{controllerMethod}.php`

### Accessing the Controller Variables

To access the variables you passed into `CorgiMVC::getView()` in the controller, simple just access the views `$corgi` variable. So if your controller looks like this `CorgiMVC::getView(['pets'=>'dogs'])` you'll be able to output `pets` by calling `$corgi['pets']` in your view. 

Note: There is no template engine so you'll have to echo your variables. `<?php echo $corgi['pets'] ?>`


## Layouts

CorgiMVC allows you to use as many layouts as you want. This is useful if you have different themes for different pages. To create a new layout, just create a new folder in `/Layouts`. In that folder create a file called `default.php`, this will be your main layout file that CorgiMVC will load. Make sure you also include `require_once $viewBody;` inside of your new `defualt.php` where you want your views to load.

Note: To define which layout you want to use, make sure you define the layout in your controller using `CorgiMVC::getView();` This variable defaults to `default`. Example: `CorgiMVC::getView('', 'new_layout');`
