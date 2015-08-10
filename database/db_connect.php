<?php

require_once '../bootstrap.php';

/**
 * Get new instance of PDO object
 * DB_* Constants should be defined in the script before db_connect.php is required.
 */
$dbc = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS']);

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
