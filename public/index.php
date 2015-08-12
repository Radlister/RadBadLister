<?php

require_once '../bootstrap.php';
require_once '../models/Ad.php';

// $ads = Ad::all();

$search = Input::get('search');

$ads = Ad::categorySearch($search);

// Attempt to store new record if the form is not empty
if(Input::has('title') && Input::has('description')) {
    $ad = new Ad();
    $ad->title = Input::get('title');
    $ad->description = Input::get('description');
    $ad->save();
}

?>

<html>
<head>
    <title>edit a specific ad</title>
</head>
<body>

    <form action="index.php" method="POST" accept-charset="utf-8">

        <input type="text" value="<?= Input::get('title') ?>" name="title">
        <input type="text" name="description">

    </form>
</body>
</html>
