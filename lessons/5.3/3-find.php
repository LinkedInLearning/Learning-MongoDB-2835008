<?php

require 'vendor/autoload.php';
require 'inc/header.php';

echo "<pre>";

$client = new MongoDB\Client(
	'mongodb://localhost:27017/cooker'
);

$collection = $client->cooker->recipes;

$recipes = $collection->find();

foreach ($recipes as $recipe) {
	echo $recipe['title'] . "\n";
}

echo "</pre>";

require 'inc/footer.php';