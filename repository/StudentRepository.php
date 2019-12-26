<?php

require_once('autoloader.php');

class StudentRepository extends RepositoryAbstract
{

    public function __construct()
    {
        parent::__construct();
        $this->entityName = 'student';
    }


    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        foreach ($stmt as $row) {
            return new Student($row['firstname'], $row['lastname'], $row['class'], $row['id']);
        }
        return null;
    }


    public function findAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName}");
        $stmt->execute();
        $students = [];
        foreach ($stmt as $row) {
            $students[] = new Student($row['firstname'], $row['lastname'], $row['class'], $row['id']);
        }
        return $students;
    }


    public function save(Student $student)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->entityName} (firstname, lastname, class) VALUES(:firstName, :lastName, :class)");
        $stmt->execute([
            'firstName' => $student->firstName,
            'lastName' => $student->lastName,
            'class' => $student->class
        ]);
    }


    public function update(Student $student)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->entityName} SET firstname = :firstName, lastname = :lastName, class = :class WHERE id = :id");
        $stmt->execute([
            'id' => $student->id,
            'firstName' => $student->firstName,
            'lastName' => $student->lastName,
            'class' => $student->class
        ]);
    }



    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->entityName} WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public function deleteAll()
    {
        $stmt = $this->pdo->prepare("TRUNCATE TABLE $this->entityName;");
        $stmt->execute();
    }

}
