<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca dos Sonhos - Atualizar Usuário</title>
</head>
<body>

  <h1>Atualizar Usuário</h1>

  <?php
    include("conexao.php");

    if (isset($_REQUEST["id"])) {
      $id = intval($_REQUEST["id"]);

      $sql = "SELECT * FROM usuario WHERE id = {$id}";
      $resultado = $conn->query($sql);

      if ($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_object();

        echo "<form action='geral_usuarios.php?acao=atualizar&id={$id}' method='POST'>";

        echo "<label for='nome'>Nome Completo:</label>";
        echo "<input type='text' id='nome' name='nome' value='{$usuario->nome}' required><br><br>";

        echo "<label for='email'>Email:</label>";
        echo "<input type='text' id='email' name='email' value='{$usuario->email}' required><br><br>";

        echo "<label for='nascimento'>Data de Nascimento:</label>";
        echo "<input type='date' id='nascimento' name='nascimento' value='{$usuario->nascimento}' required><br><br>";

        echo "<label for='senha'>Senha:</label>";
        echo "<input type='text' id='senha' name='senha' value='{$usuario->senha}' required><br><br>";

        echo "<label for='telefone'>Telefone:</label>";
        echo "<input type='int' id='telefone' name='telefone' value='{$usuario->telefone}' required><br><br>";

        echo "<button type='submit'>Atualizar</button>";

        echo "</form>";
      } else {
        echo "<script>alert('Usuário não encontrado!');</script>";
        echo "<script>location.href='ver_usuarios.php';</script>";
      }
    } else {
      echo "<script>alert('ID do usuário não informado!');</script>";
      echo "<script>location.href='ver_usuarios.php';</script>";
    }
  ?>

</body>
</html>
