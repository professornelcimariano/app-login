<?php
include_once '../../conn/conect.php';

function insertUser($pdo)
{
    // insert into users (usr_email, usr_name, usr_pass) values ('maria@maria.com', 'Maria', 'Senac#123')
    try {
        $sth = $pdo->prepare('insert into users (usr_email, usr_name, usr_pass) 
    values (:usr_email, :usr_name, :usr_pass)');
        $sth->bindValue('usr_email', 'davi@davi.com');
        $sth->bindValue('usr_name', 'davi');
        $sth->bindValue('usr_pass', 'Senac#123');
        $sth->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
echo "<h1> Inserir Registro </h1> ";
insertUser($pdo);
echo "<hr>";

function selectUser($pdo)
{
    //select *from users where usr_email = "nelcijunior@yahoo.com.br" and usr_pass = "Senac#1"
    try {
        $sth = $pdo->prepare('select *from users where usr_email = :usr_email and usr_pass = :usr_pass ');
        $sth->bindValue("usr_email", "JJ@J.com");
        $sth->bindValue("usr_pass", MD5("Senac#123"));
        $sth->execute();
        if ($sth->rowCount() > 0) :
            echo "Usuário Encontrado na Base de Dados";
        else :
            echo "Não existe o Usuário na Base de Dados";
        endif;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
// echo "<h1> Seleciona 1 registro para o Logar </h1> ";
// selectUser($pdo);
// echo "<hr>";


function selectAllUsers($pdo)
{
    $sth = $pdo->prepare('select *from users');
    $sth->execute();
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    // $data = $sth->fetch();
    print_r($data);
}

// echo "<h1> Seleciona todos os usuários </h1> ";
// selectAllUsers($pdo);
// echo "<hr>";
