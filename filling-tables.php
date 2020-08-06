<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

$connection->beginTransaction();

try {
    $aStudent = new Student(
        null,
        'Amuro Ray',
        new DateTimeimmutable('1979-01-01')
    );

    $studentRepository->save($aStudent);

    $anotherStudent = new Student(
        null,
        'Fraw Bow',
        new DateTimeimmutable('1979-02-01')
    );

    $studentRepository->save($anotherStudent);

    $connection->commit();

} catch (PDOException $e) {
    echo $e->getMessage();
    $connection->rollBack();
}

$connection->exec("INSERT INTO phones (area_code, number, student_id) VALUES ('24', '999999999', 1),('21', '222222222', 1);");



