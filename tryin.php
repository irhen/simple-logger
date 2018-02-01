<?php

use Logger\LoggerToFile;

$loader = require_once __DIR__ . '/vendor/autoload.php';

$logger = new LoggerToFile();
$logger->setPath("./logs/my-awesome-log.txt");
$logger->log("Hiiii! My next line!");

echo "still on it.\n";
