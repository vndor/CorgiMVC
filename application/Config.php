<?php

/* 
    HOME VIEW

    Which controller/page to go to by default
 */

define('CONFIG_HOME_VIEW', array(
    "controller" => 'HomeController',
    "method" => "index"
));

/* 
    SUB DIRECTORY

    Define a sub directory if there is one, otherwise leave blank
    Make sure you end the directory with DIRECTORY_SEPARATOR
 */

define('CONFIG_SUB_DIRECTORY', '');

/* 
    ERROR PAGES

    Path to error pages 
*/

define('CONFIG_ERRORS', array(
    "404_Page" => '/index.php/error/error404'
));

/* 
    PUBLIC FOLDERS

    Folders that you want to be public and ignored by the framework 
    Do not add a leading "/" 
*/

define('CONFIG_PUBLIC', array(
    'public'
));

/* 
    DATABASE CONNECTION

    ORM Connection to database
*/

/* SQLite */
define('CONFIG_CONNECTION', array(
    "type" => 'sqlite',
    "path" => "database.sqlite"
));

/* MYSQL Example
define('CONFIG_CONNECTION', array(
    "type" => 'mysql',
    "host" => "localhost",
    "dbname" => "testdb",
    "username" => "username",
    "password" => "password",
    "port" => "3306"
));
*/

/* 
    SESSIONS

    Session managment
*/

define('CONFIG_SESSIONS', array(
    "enable" => true
));