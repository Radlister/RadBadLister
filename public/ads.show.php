<?php

require_once '../bootstrap.php';
require_once '../models/Ad.php';

if(Input::has('id')) {
    $id = Input::get('id');
    $ad = Ad::find($id);
}


?>


<html>
<head>
    <title>Ad Details</title>
</head>
<body>
    <h1>Item is: <?= $ad->title; ?></h1>
    <p>Price is: <?= $ad->price; ?></p>
    <p>Description <?= $ad->description; ?></p>
    <img src="<?= $ad->image_url ?>">

</body>
</html>
