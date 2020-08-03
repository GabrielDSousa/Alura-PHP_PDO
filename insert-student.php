<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$database = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $database);

$student = new Student(null, 'Vinicius Dias', new \DateTimeImmutable('1997-10-15'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";

var_dump($pdo->exec($sqlInsert));