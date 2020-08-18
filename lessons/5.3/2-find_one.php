<?php

require 'vendor/autoload.php';
require 'inc/header.php';

echo "<pre>";

$client = new MongoDB\Client(
	'mongodb://localhost:27017/cooker'
);

$collection = $client->cooker->recipes;

$recipe = $collection->findOne();

echo json_encode($recipe, JSON_PRETTY_PRINT);

echo "</pre>";

require 'inc/footer.php';