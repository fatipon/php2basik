<?php
require_once('autoloader.php');
  
  
class FamilyRepository extends RepositoryAbstract
{
    protected $entityName = 'family';

    /**
     * @return Family[] array
     */
    public function findAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName}");
        $stmt->execute();
        $families = [];
        foreach ($stmt as $row) {
            $families[] = new Family($row['firstname'], $row['lastname'], $row['address'], $row['id']);
        }
        return $families;
    }

    /**
     * @param $id
     * @return null|Family
     */
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->entityName} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        foreach ($stmt as $row) {
            return new Family($row['firstname'], $row['lastname'], $row['address'], $row['id']);
        }
        return null;
    }

    public function save(Family $family)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->entityName} (firstname, lastname, address) VALUES(:firstName, :lastName, :address)");
        $stmt->execute([
            'firstName' => $family->firstName,
            'lastName' => $family->lastName,
            'address' => $family->address
        ]);
    }

    public function update(Family $family)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->entityName} SET firstname = :firstName, lastname = :lastName, address = :address WHERE id = :id");
        $stmt->execute([
            'id' => $family->id,
            'firstName' => $family->firstName,
            'lastName' => $family->lastName,
            'address' => $family->address
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
