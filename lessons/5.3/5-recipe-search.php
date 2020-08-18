<?php

require 'vendor/autoload.php';
require 'inc/header.php';

?>

<div class="container">
  <div class="notification">

    <form>
        <div class="field">
            <label class="label">What would you like to cook?:</label>
            <div class="control">
                <input name="search" class="input" type="text" value="<?=!empty($_GET['search'])?$_GET['search']:""?>">
            </div>
        </div>

        <div class="control">
            <button class="button is-primary">Submit</button>
        </div>

    </form>

  </div>
</div>
<?php

if (!empty($_GET['search'])) {

	$client = new MongoDB\Client(
		'mongodb://localhost:27017/cooker'
	);

	$collection = $client->cooker->recipes;

    # using a case insensitive "i" $regex search, but most normal find queries will also work.
    $query = [
        'title' => [
            '$regex' => $_GET['search'],
            '$options' => 'i'
        ]
    ];
?>
<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Searching for ... "<?=$_GET['search']?>"
            </h1>
<?php

	$options = [];
	$options['sort'] = ['title' => 1];

	$recipes = $collection->find($query, $options);

    foreach ($recipes as $recipe) {
		# combine prep and cook times
		$total_time = $recipe['prep_time']+$recipe['cook_time'];

?>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title has-text-black"><?=$recipe["title"]?></p>
                    <p class="subtitle has-text-black"><?=$recipe['desc']?></p>
                    <div class="content">
                        <p>
                            This recipe will take about <?=$total_time?> minutes and
                            be ~<?=$recipe['calories_per_serving']?> calories per serving.
                        </p>
                    </div>
                </article>
            </div>
<?php

    }

}
?>
        </div>
    </div>
</section>
<?php
require 'inc/footer.php';