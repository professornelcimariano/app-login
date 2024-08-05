<?php

require_once '../Model.php';  // Ajuste o caminho conforme a estrutura do seu projeto

class User extends Model
{
    private $table = 'users';  // Nome da tabela
    private $nameField = 'name';  // Nome do campo de nome

    public function __construct($pdo)
    {
        parent::__construct($pdo, $this->table);
    }

    public function insert(array $data, $file)
    {
        // Verifica se o nome já existe
        if (isset($data[$this->nameField]) && $this->nameExists($data[$this->nameField])) {
            throw new Exception("O nome '{$data[$this->nameField]}' já existe.");
        }

        // Adiciona o slug automaticamente
        if (isset($data[$this->nameField])) {
            $data['slug'] = $this->generateSlug($data[$this->nameField]);
        }

        // Lida com o upload da imagem
        if ($file['error'] === UPLOAD_ERR_OK) {
            $imageName = $this->uploadImage($file);
            $data['image'] = $imageName;
        }

        // Chama o método insert da classe pai
        parent::insert($data);
    }

    private function nameExists($name)
    {
        try {
            $sql = "SELECT COUNT(*) FROM $this->table WHERE $this->nameField = :name";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':name', $name);
            $sth->execute();
            return $sth->fetchColumn() > 0;
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
        return false;
    }

    private function generateSlug($name)
    {
        // Função para gerar slug a partir do nome
        return strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $name));
    }

    private function uploadImage($file)
    {
        $uploadDir = '../uploads/';  // Diretório onde as imagens serão salvas
        $fileName = basename($file['name']);
        $uploadFile = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            return $fileName;
        } else {
            throw new Exception("Erro ao fazer upload da imagem.");
        }
    }
}
?>
