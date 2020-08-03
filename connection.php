<?php

$database = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $database);

echo 'Connected';

$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');