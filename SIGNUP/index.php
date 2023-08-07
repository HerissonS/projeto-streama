<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CT Foco Stream</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>CT Foco Stream</h1>
    <h2>Crie sua conta</h2>
    <form action="addUser.php" method="post">
        <label for="givenName">Nome:</label>
        <input type="text" name="givenName" required><br>

        <label for="sn">Sobrenome:</label>
        <input type="text" name="sn" required><br>

        <label for="mail">E-mail:</label>
        <input type="email" name="mail" required><br>

        <label for="cn">Repita o E-mail:</label>
        <input type="text" name="cn" required><br>

        <label for="userPassword">Senha:</label>
        <input type="password" name="userPassword" required><br>

        <input type="submit" value="Criar Usuário">
    </form>

    <?php
        $server_name = $_SERVER['HTTP_HOST'];
        $url = 'http://' . $server_name . ':8080';
    ?>

    <p>Já possui conta? <a href="<?php echo $url; ?>">Faça login</a></p>


</body>
</html>