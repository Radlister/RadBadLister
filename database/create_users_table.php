<?php

$dbc->exec('DROP TABLE IF EXISTS users');

$query = 'CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(256) NOT NULL,
    last_name VARCHAR(256) NOT NULL,
    email VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    created_at DATETIME,
    modified_at DATETIME,
    PRIMARY KEY (id),
    UNIQUE (email)
)';

$result = $dbc->exec($query);

if($result !== false) {
    echo "Users table created successfully." . PHP_EOL;
}
