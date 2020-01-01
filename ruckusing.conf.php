<?php
date_default_timezone_set('UTC');

require __DIR__ . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'Config.php';

//----------------------------
// DATABASE CONFIGURATION
//----------------------------

/*

Valid types (adapters) are Postgres & MySQL:

'type' must be one of: 'pgsql' or 'mysql' or 'sqlite'

*/
return array(
    'db' => array(
        'development' => array(
            'type' => CONFIG_CONNECTION['type'],
            'host' => isset(CONFIG_CONNECTION['host']) ? CONFIG_CONNECTION['host'] : '',
            'port' => isset(CONFIG_CONNECTION['port']) ? CONFIG_CONNECTION['port'] : '',
            'database' => CONFIG_CONNECTION['type'] == 'sqlite' ? RUCKUSING_WORKING_BASE . '/' . CONFIG_CONNECTION['path'] : CONFIG_CONNECTION['dbname'],
            'user' => isset(CONFIG_CONNECTION['username']) ? CONFIG_CONNECTION['username'] : '',
            'password' => isset(CONFIG_CONNECTION['password']) ? CONFIG_CONNECTION['password'] : '',
            'directory' => ''
            //'charset' => 'utf8',
            //'directory' => 'custom_name',
            //'socket' => '/var/run/mysqld/mysqld.sock'
        ),
        'pg_test' => array(
            'type' => 'pgsql',
            'host' => 'localhost',
            'port' => 5432,
            'database' => 'ruckusing_migrations_test',
            'user' => 'postgres',
            'password' => '',
            //'directory' => 'custom_name',

        ),
        'mysql_test' => array(
            'type' => 'mysql',
            'host' => 'localhost',
            'port' => 3306,
            'database' => 'ruckusing_migrations_test',
            'user' => 'root',
            'password' => '',
            //'directory' => 'custom_name',
            //'socket' => '/var/run/mysqld/mysqld.sock'
        ),
        'sqlite_test' => array(
            'type' => 'sqlite',
            'database' => RUCKUSING_WORKING_BASE . '/test.sqlite3',
            'host' => 'localhost',
            'port' => '',
            'user' => '',
            'password' => ''
        )

    ),
    'migrations_dir' => array('default' => RUCKUSING_WORKING_BASE . '/migrations'),
    'db_dir' => RUCKUSING_WORKING_BASE . DIRECTORY_SEPARATOR . 'db',
    'log_dir' => RUCKUSING_WORKING_BASE . DIRECTORY_SEPARATOR . 'logs',
    'ruckusing_base' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/ruckusing/ruckusing-migrations'
);
