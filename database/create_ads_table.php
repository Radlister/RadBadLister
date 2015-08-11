<?php

$dbc->exec('DROP TABLE IF EXISTS ads');

$query = 'CREATE TABLE ads (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(256) NOT NULL,
    description VARCHAR() NOT NULL,
    image_url VARCHAR(256),
    price DECIMAL(10, 2),
    PRIMARY KEY (id)
)';

$result = $dbc->exec($query);

if($result !== false) {
    echo "Ads table created." . PHP_EOL;
}
