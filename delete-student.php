<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$database = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $database);

$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$preparedStatement->bindValue(1, 2, PDO::PARAM_INT);

var_dump($preparedStatement->execute());
