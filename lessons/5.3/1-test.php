<?php

require 'vendor/autoload.php';
require 'inc/header.php';

echo "<pre>";
echo "Setting up mongo client\n";

$client = new MongoDB\Client(
    'mongodb://localhost:27017/cooker'
);

echo "Connecting to database ...\n";

$db = $client->cooker;

echo "Connected Successfully!\n";

$database_name = $db->getDatabaseName();

echo "The database name is: {$database_name}\n";

echo "</pre>";

require 'inc/footer.php';