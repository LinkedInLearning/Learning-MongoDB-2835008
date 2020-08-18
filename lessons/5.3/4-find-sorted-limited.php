<?php

require 'vendor/autoload.php';
require 'inc/header.php';

echo "<pre>";

$client = new MongoDB\Client(
	'mongodb://localhost:27017/cooker'
);

$collection = $client->cooker->recipes;

$options = [];
$options['sort'] = ['title' => 1];
$options['limit'] = 3;

$recipes = $collection->find([], $options);

foreach ($recipes as $recipe) {
	echo $recipe['title'] . "\n";
}

echo "</pre>";

require 'inc/footer.php';