<?php

/* 
    HOME VIEW

    Which controller/page to go to by default
 */

define('CONFIG_HOME_VIEW', array(
    "controller" => 'Home',
    "method" => "index"
));

/* 
    ERROR PAGES

    Path to error pages 
*/

define('CONFIG_ERRORS', array(
    "404_Page" => '/index.php/Errors/Error404'
));

/* 
    PUBLIC FOLDERS
    Folders that you want to be public and ignored by the framework 
    Do not add a leading "/" 
*/

define('CONFIG_PUBLIC', array(
    'public'
));
