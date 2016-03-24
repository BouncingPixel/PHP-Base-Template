<?php

// A place to configure global parameters for the site
global $PIECES;

// Setting the Site Session Name, if needed
$GLOBALS[ "piecesSessionName" ] = "A Session Name for the Site";

// Setting the Time Zone
date_default_timezone_set('America/Chicago');

// Set the global database connection values
$PIECES[ 'database' ] = "db-name";
$PIECES[ 'databaseLocation' ] = "db-server-endpoint";
$PIECES[ 'databaseUserName' ] = "db-user-name";
$PIECES[ 'databasePassword' ] = "db-user-password";

?>
