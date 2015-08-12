<?php

require_once '../bootstrap.php';
require_once 'db_connect.php';
require_once '../models/User.php';

$user = new User();
$user->first_name = $_ENV['USER_FIRST_NAME'];
$user->last_name = $_ENV['USER_LAST_NAME'];
$user->email = $_ENV['USER_EMAIL'];
$user->password = $_ENV['USER_PASSWORD'];
$user->save();

$user1 = new User();
$user1->first_name = 'Bobby';
$user1->last_name = 'Bobberson';
$user1->email = 'Bob@bobberson.media';
$user1->password = $_ENV['USER_PASSWORD'];
$user1->save();
