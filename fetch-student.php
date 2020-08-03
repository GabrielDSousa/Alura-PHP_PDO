<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$database = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $database);

$statement = $pdo->query('SELECT * FROM students;');
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach ($studentDataList as $studentData) {
    try {
        $studentList[] = new Student(
            $studentData['id'],
            $studentData['name'],
            new \DateTimeImmutable($studentData['birth_date'])
        );
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

var_dump($studentList);