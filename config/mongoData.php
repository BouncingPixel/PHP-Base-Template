<?php

// Setting Up Twig Templates
require_once './vendor/autoload.php';

// Local Connection Vars
// $uid = ''; // Username
// $pwd = ''; // Password
// $server = '127.0.0.1:27017'; // Remote Server:Port
// $database = 'fha'; // Database

// Connect to LOCAL MongoDB
// $mongoConnection = new MongoClient('mongodb://'.$server.'/'.$database);

// NEW Remote Connection Vars
$uid = 'bpadmin'; // Username
$pwd = 't3mpp455'; // Password
$server1 = 'portal-ssl2681-4.fha-deployment.2588855023.composedb.com:30117'; // Remote1 Server:Port
$server2 = 'portal-ssl1273-32.fha-deployment.2588855023.composedb.com:30117'; // Remote2 Server:Port
$database = 'fha-production'; // Database

// Connect to REMOTE mongodb
$client = new MongoDB\Client(
    "mongodb://bpadmin:t3mpp455@portal-ssl2681-4.fha-deployment.2588855023.composedb.com:30117,portal-ssl1273-32.fha-deployment.2588855023.composedb.com:30117/fha-production?ssl=true");

// Defining the grantStates collection
$collectionStates = $client->{$database}->{"grantStates"};

// Defining the grants collection
$collectionGrants = $client->{$database}->{"grants"};

// Defining the OTCBuilders collection
$collectionOTCBuilders = $client->{$database}->{"OTCBuilders"};
?>
