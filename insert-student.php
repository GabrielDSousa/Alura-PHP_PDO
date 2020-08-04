<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$database = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $database);

$student = new Student(null, "Gabriel Ramos", new \DateTimeImmutable('1997-10-15'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

if ($statement->execute()) {
    echo "Aluno incluído";
}