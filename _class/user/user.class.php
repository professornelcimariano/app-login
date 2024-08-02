<?php

<?php

class User {
    private $pdo;
    private $table = 'users'; // Nome da tabela
    private $idField = 'usr_id'; // Nome do campo ID

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
            $sql = "DELETE FROM $this->table WHERE $this->idField = :id";
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
            $sql = "SELECT * FROM $this->table WHERE $this->idField = :id";
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
            $sql = "UPDATE $this->table SET $setClause WHERE $this->idField = :id";

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


// uso

// Cria uma instância da classe User
/*
$userModel = new User($pdo);
*/
// inserção
/*
$userData = [
    'usr_email' => 'davi@davi.com',
    'usr_name' => 'davi',
    'usr_pass' => 'Senac#123'
];
$userModel->insert($userData);
*/
// deleção
/*
$userModel->delete(1);
*/
// seleção de todos os usuários
/*
$users = $userModel->selectAll();
print_r($users);
*/
// seleção de um usuário específico
/*
$user = $userModel->selectOne(1);
print_r($user);
*/
// atualização de um usuário
/*
$updateData = [
    'usr_email' => 'newemail@davi.com',
    'usr_name' => 'newname'
];
$userModel->update(1, $updateData);

echo "Operações realizadas com sucesso.";
*/
