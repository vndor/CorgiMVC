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
<<<<<<< Updated upstream:application/Config.php
=======

/* 
    DATABASE CONNECTION

    ORM Connection to database
*/

/* SQLite */
define('CONFIG_CONNECTION', array(
    "type" => 'sqlite',
    "path" => "database.sqlite",
    "username" => "", // Optional
    "password" => "" // Optional
));

/* MYSQL Example
define('CONFIG_CONNECTION', array(
    "type" => 'mysql',
    "host" => "localhost",
    "dbname" => "testdb",
    "username" => "username",
    "password" => "password"
));
*/
>>>>>>> Stashed changes:application/config.php
