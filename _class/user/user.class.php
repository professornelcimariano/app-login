<?php

class User {
    private $pdo;
    private $table = 'user';
   

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function insert(array $userData) {
        try {
            $columns = implode(', ', array_keys($userData));
            $placeholders = ':' . implode(', :', array_keys($userData));
            $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";

            $sth = $this->pdo->prepare($sql);

            foreach ($userData as $key => $value) {
                $sth->bindValue(":$key", $value);
            }

            $sth->execute();
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }

    public function selectAll() {
        try {
            $sql = "SELECT * FROM $this->table";
            $sth = $this->pdo->query($sql);
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
        return [];
    }

    public function selectOne($id) {
        try {
            $sql = "SELECT * FROM $this->table WHERE id = :id";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            return $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
        return null;
    }

    public function update($id, array $userData) {
        try {
            $updates = [];
            foreach ($userData as $key => $value) {
                $updates[] = "$key = :$key";
            }
            $setClause = implode(', ', $updates);
            $sql = "UPDATE $this->table SET $setClause WHERE id = :id";

            $sth = $this->pdo->prepare($sql);

            foreach ($userData as $key => $value) {
                $sth->bindValue(":$key", $value);
            }
            $sth->bindValue(':id', $id, PDO::PARAM_INT);

            $sth->execute();
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }
}
?>


/*
$userModel = new User($pdo);

$userData = [
    'usr_email' => 'davi@davi.com',
    'usr_name' => 'davi',
    'usr_pass' => 'Senac#123'
];
$userModel->insert($userData);

$userModel->delete(1);

$users = $userModel->selectAll();
print_r($users);

$user = $userModel->selectOne(1);
print_r($user);

$updateData = [
    'usr_email' => 'newemail@davi.com',
    'usr_name' => 'newname'
];
$userModel->update(1, $updateData);

*/
