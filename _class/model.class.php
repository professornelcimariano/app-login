<?php

class GenericModel {
    private $pdo;
    private $table;
    private $idField;

    public function __construct($pdo, $table, $idField) {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->idField = $idField;
    }

    public function insert(array $data) {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
            $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";

            $sth = $this->pdo->prepare($sql);

            foreach ($data as $key => $value) {
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

    public function update($id, array $data) {
        try {
            $updates = [];
            foreach ($data as $key => $value) {
                $updates[] = "$key = :$key";
            }
            $setClause = implode(', ', $updates);
            $sql = "UPDATE $this->table SET $setClause WHERE $this->idField = :id";

            $sth = $this->pdo->prepare($sql);

            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }
            $sth->bindValue(':id', $id, PDO::PARAM_INT);

            $sth->execute();
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }
}

// Exemplo de uso
try {
    // Configurações do banco de dados
    $dsn = 'mysql:host=localhost;dbname=app-login;charset=utf8';
    $username = 'root';
    $password = '';
    
    // Cria uma instância de PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cria uma instância da classe GenericModel para a tabela 'users' com o campo ID 'usr_id'
    $userModel = new GenericModel($pdo, 'users', 'usr_id');

    // Exemplo de inserção
    $userData = [
        'usr_email' => 'davi@davi.com',
        'usr_name' => 'davi',
        'usr_pass' => 'Senac#123'
    ];
    $userModel->insert($userData);

    // Exemplo de deleção
    $userModel->delete(1);

    // Exemplo de seleção de todos os usuários
    $users = $userModel->selectAll();
    print_r($users);

    // Exemplo de seleção de um usuário específico
    $user = $userModel->selectOne(1);
    print_r($user);

    // Exemplo de atualização de um usuário
    $updateData = [
        'usr_email' => 'newemail@davi.com',
        'usr_name' => 'newname'
    ];
    $userModel->update(1, $updateData);

    echo "Operações realizadas com sucesso.";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
