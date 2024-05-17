<?php

require_once __DIR__ . '/var.php';

$dsn = "mysql:host=" . APP_DB_HOST . ";port=3306" . APP_DB_PORT . ";dbname=" . APP_DB_NAME;


$pdo = new PDO($dsn, APP_DB_USER, APP_DB_PASSWORD);


?>