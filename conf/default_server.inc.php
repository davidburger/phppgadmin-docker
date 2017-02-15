<?php

/**
 * This file is used in the case that there is no autoload/*.inc.php file or no environment variable DB_HOST is set
 */

// An example server.  Create as many of these as you wish,
// indexed from zero upwards.

$dbServerHost = getenv('DB_HOST');
$dbServerPort = getenv('DB_PORT');
$dbServerDbName = getenv('DB_NAME');
$dbServerDesc = getenv('DB_DESCRIPTION');


if (false === $dbServerDesc) {
    $dbServerDesc = $dbServerHost . ':' . ($dbServerPort ? $dbServerPort : DEFAULT_DB_PORT);
}

//simplified definition of server connection properties
return [
    // Display name for the server on the login screen
    'desc' => $dbServerDesc ? $dbServerDesc : 'PostgreSQL',

    // Hostname or IP address for server.  Use '' for UNIX domain socket.
    // use 'localhost' for TCP/IP connection on this computer
    'host' => $dbServerHost ? $dbServerHost : '',

    // Database port on server (5432 is the PostgreSQL default)
    'port' => $dbServerPort ? $dbServerPort : DEFAULT_DB_PORT,

    // Database SSL mode
    // Possible options: disable, allow, prefer, require
    // To require SSL on older servers use option: legacy
    // To ignore the SSL mode, use option: unspecified
    'sslmode' => 'prefer',

    // Change the default database only if you cannot connect to template1.
    // For a PostgreSQL 8.1+ server, you can set this to 'postgres'.
    'defaultdb' => $dbServerDbName ? $dbServerDbName : 'template1',

    // Specify the path to the database dump utilities for this server.
    // You can set these to '' if no dumper is available.
    'pg_dump_path' => '/usr/bin/pg_dump',
    'pg_dumpall_path' => '/usr/bin/pg_dumpall',
];
