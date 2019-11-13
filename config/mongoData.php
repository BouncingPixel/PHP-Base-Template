<?php
require dirname(__DIR__) . '/www/vendor/autoload.php';

// Local Connection Vars
// $uid = ''; // Username
// $pwd = ''; // Password
// $server = '127.0.0.1:27017'; // Remote Server:Port
// $database = 'fha'; // Database

// Connect to LOCAL MongoDB
// $mongoConnection = new MongoClient('mongodb://'.$server.'/'.$database);

// NEW Remote Connection Vars
$uid = 'otcuser'; // Username
$pwd = 'qiCxe5fRtn9Edcqb'; // Password
$server1 = 'portal-ssl2681-4.fha-deployment.2588855023.composedb.com:30117'; // Remote1 Server:Port
$server2 = 'portal-ssl1273-32.fha-deployment.2588855023.composedb.com:30117'; // Remote2 Server:Port
$database = 'otc-production'; // Database

use MongoDB\Client as Mongo;

// Connect to REMOTE mongodb
try {
  $mongo = new Mongo(
	  "mongodb://otcuser:qiCxe5fRtn9Edcqb@portal-ssl2681-4.fha-deployment.2588855023.composedb.com:30117,portal-ssl1273-32.fha-deployment.2588855023.composedb.com:30117/otc-production?ssl=true");

	// Defining the grantStates collection
	$collectionFHALimits = $mongo->{$database}->{"fhaLimits"};

	// Defining the vaLimits collection
	$collectionVALimits = $mongo->{$database}->{"vaLimits"};

	// Defining the fha-va-limits collection
	$collectionAllLimits = $mongo->{$database}->{"comboLimits"};


} catch (MongoConnectionException $e) {
  die("Unable to connect to database");
}
?>