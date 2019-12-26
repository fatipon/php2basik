<?php

require_once('autoloader.php');


class TeacherRepository extends RepositoryAbstract
{
    public function __construct()
    {
        parent::__construct();
        $this->entityName = 'teacher';
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        foreach ($stmt as $row) {
            return new Teacher($row['firstname'], $row['lastname'], $row['teach'],$row['classroom'],  $row['id']);
        }
        return null;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName}");
        $stmt->execute();
        $teachers = [];
        foreach ($stmt as $row) {
            $teachers[] = new Teacher($row['firstname'], $row['lastname'], $row['teach'], $row['classroom'], $row['id']);
        }
        return $teachers;
    }



    public function save(Teacher $teacher)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->entityName} (firstname, lastname, teach, classroom) VALUES(:firstName, :lastName, :teach, :classroom)");
        $stmt->execute([
            'firstName' => $teacher->firstName,
            'lastName' => $teacher->lastName,
            'teach' => $teacher->teach,
            'classroom' => $teacher->classroom
        ]);
    }

    public function update(Teacher $teacher)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->entityName} SET firstname = :firstName, lastname = :lastName, teach = :teach, classroom = :classroom WHERE id = :id");
        $stmt->execute([
            'id' => $teacher->id,
            'firstName' => $teacher->firstName,
            'lastName' => $teacher->lastName,
            'teach' => $teacher->teach,
            'classroom' => $teacher->classroom
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