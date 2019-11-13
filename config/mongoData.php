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
$uid = 'user'; // Username
$pwd = 'password'; // Password
$server1 = 'portal-ssl2681-4.example.2588855023.composedb.com:30117'; // Remote1 Server:Port
$server2 = 'portal-ssl1273-32.example.2588855023.composedb.com:30117'; // Remote2 Server:Port
$database = 'example-production'; // Database

use MongoDB\Client as Mongo;

// Connect to REMOTE mongodb
try {
  $mongo = new Mongo(
	  "mongodb://user:password@portal-ssl2681-4.example.2588855023.composedb.com:30117,portal-ssl1273-32.example.2588855023.composedb.com:30117/example-production?ssl=true");

	// Defining the grantStates collection
	$collectionOne = $mongo->{$database}->{"one"};

	// Defining the vaLimits collection
	$collectionTwo = $mongo->{$database}->{"two"};

	// Defining the fha-va-limits collection
	$collectionThree = $mongo->{$database}->{"three"};


} catch (MongoConnectionException $e) {
  die("Unable to connect to database");
}
?>