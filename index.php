<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
    echo MD5('Informatica#123');
?>

    <!-- <div class="logo">
         <img src="img/login2.svg" alt="">               
    </div> -->

    <div class="container">
        <p> Bem Vindo ao Sistema </p> <hr>
        <form action="logar.php" method="post">
            <label>
                E-mail
            </label>
            </br>
            <input type="email" name="email" id="email" required>
            </br>
            <label>
                Senha
            </label>
            </br>
            <input type="password" id="password" name="password" id="password" required>
            </br>
            <input type="submit" value="Logar">
        </form>
    </div>
    <!-- <a href="#" id="passView" onclick="togglePasswordVisibility()"> Ver Senha </a> -->
    <script>
        // let click = document.getElementById('passView');

        // function togglePasswordVisibility() {
        //     var passwordField = document.getElementById("password");
        //     if (passwordField.type === "password") {
        //         passwordField.type = "text";
        //     } else {
        //         passwordField.type = "password";
        //     }
        // }
    </script>
</body>

</html>