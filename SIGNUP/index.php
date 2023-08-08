<html>

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="qfc-dark.css">
  <!-- <link rel="stylesheet" href="qfc-light.css"> -->

</head>



<body>
  <div class="qfc-container">
    <h2>CT Foco Stream</h2>
    <label>Crie sua nova conta preenchendo seus dados.</label>
    <form action="addUser.php" method="post">
      <div>
        <div>
            <input name="givenName" placeholder="Nome" type="text" required>
        </div>
        <div>
            <input name="sn" placeholder="Sobrenome" type="text" required>
        </div>
        <div>
            <input name="mail" placeholder="Email" type="email" required>
        </div>
        <div>
            <input name="mail" placeholder="Repita o email" type="email" required>
        </div>
        <div>
            <input name="userPassword" placeholder="Senha" type="password" required>
        </div>


        <div>
          <button type="submit">Criar usuário</button>
        </div>
      </div>

      <?php
        $server_name = $_SERVER['HTTP_HOST'];
        $url = 'http://' . $server_name . ':8080';
    ?>

    <p>Já possui conta? <a href="<?php echo $url; ?>">Faça login</a></p>
    </form>
  </div>
</body>
<style>
  a {
    color :#00bcd4;
    text-decoration: none;
  }
</style>
</html>
