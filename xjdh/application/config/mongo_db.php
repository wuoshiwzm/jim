<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------------
| This file will contain the settings needed to access your Mongo database.
|
|
| ------------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| ------------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['write_concerns'] Default is 1: acknowledge write operations.  ref(http://php.net/manual/en/mongo.writeconcerns.php)
|	['journal'] Default is TRUE : journal flushed to disk. ref(http://php.net/manual/en/mongo.writeconcerns.php)
|	['read_preference'] Set the read preference for this connection. ref (http://php.net/manual/en/mongoclient.setreadpreference.php)
|	['read_preference_tags'] Set the read preference for this connection.  ref (http://php.net/manual/en/mongoclient.setreadpreference.php)
|
| The $config['mongo_db']['active'] variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
*/

$config['mongo_db']['active'] = 'default';

$config['mongo_db']['default']['no_auth'] = false;
$config['mongo_db']['default']['hostname'] = '127.0.0.1';
$config['mongo_db']['default']['port'] = '27017';
$config['mongo_db']['default']['username'] = 'dhweb';
$config['mongo_db']['default']['password'] = 'harbork4275';
$config['mongo_db']['default']['database'] = 'jim_history';
$config['mongo_db']['default']['db_debug'] = TRUE;
$config['mongo_db']['default']['return_as'] = 'object';
$config['mongo_db']['default']['write_concerns'] = (int)1;
$config['mongo_db']['default']['journal'] = TRUE;
$config['mongo_db']['default']['read_preference'] = NULL;
$config['mongo_db']['default']['read_preference_tags'] = NULL;


/* End of file database.php */
/* Location: ./application/config/database.php */
