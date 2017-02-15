<?php

//simplified definition of server connection properties
return [
    // Display name for the server on the login screen
    'desc' => 'Sample PostgreSQL server 2',

    // Hostname or IP address for server.  Use '' for UNIX domain socket.
    // use 'localhost' for TCP/IP connection on this computer
    'host' => '10.0.0.231',

    // Database port on server (5432 is the PostgreSQL default)
    'port' => DEFAULT_DB_PORT,

    // Database SSL mode
    // Possible options: disable, allow, prefer, require
    // To require SSL on older servers use option: legacy
    // To ignore the SSL mode, use option: unspecified
    'sslmode' => 'prefer',

    // Change the default database only if you cannot connect to template1.
    // For a PostgreSQL 8.1+ server, you can set this to 'postgres'.
    'defaultdb' => 'template1',

    // Specify the path to the database dump utilities for this server.
    // You can set these to '' if no dumper is available.
    'pg_dump_path' => '/usr/bin/pg_dump',
    'pg_dumpall_path' => '/usr/bin/pg_dumpall',
];