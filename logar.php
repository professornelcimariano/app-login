<?php
include_once './conn/conect.php';
// Essa validação é quando acessa a url diretamente: localhost/app-login/logar.php
if (empty($_POST)) {
    echo "Acesso Restrito";
    die();
}
// Essa validação é quando remove o required do html e clica no submite sem inserir e-mail
if (empty($_POST['email'])) :
    header("LOCATION: ../app-login/");
    die();
endif;

//Recebe os dados do Formulário
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$pass = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

if (checkComplexPass($pass)) :
    try {
        $sth = $pdo->prepare('select *from users where usr_email = :usr_email and usr_pass = :usr_pass ');
        $sth->bindValue("usr_email", $email);
        $sth->bindValue("usr_pass", MD5($pass));
        $sth->execute();
        if ($sth->rowCount() > 0) :
            echo "Usuário Encontrado na Base de Dados";
        else :
            echo "Não existe o Usuário na Base de Dados";
        endif;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

else :
    echo "Sua senha não atende os Requisitos de Complexidade";
endif;

// if(checkComplexPass($pass)) {
//     echo " <p> A senha é obedece os Requisitos </p>";
// } else {
//     echo " <p> A senha NÃO obedece </p>";
// }

function checkComplexPass($pass)
{
    // Verifica se a senha tem pelo menos 8 caracteres
    if (strlen($pass) < 8) {
        return false;
    }

    // Verifica se a senha contém pelo menos uma letra maiúscula
    if (!preg_match('/[A-Z]/', $pass)) {
        return false;
    }

    // Verifica se a senha contém pelo menos uma letra minúscula
    if (!preg_match('/[a-z]/', $pass)) {
        return false;
    }

    // Verifica se a senha contém pelo menos um número
    if (!preg_match('/[0-9]/', $pass)) {
        return false;
    }

    // Verifica se a senha contém pelo menos um caractere especial
    if (!preg_match('/[\W_]/', $pass)) {
        return false;
    }

    // A senha atende a todos os requisitos de complexidade
    return true;
}
