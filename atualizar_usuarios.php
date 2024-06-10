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
    // Incluir arquivo de conexão com o banco de dados
    include("conexao.php");

    // Verificar se o ID do usuário foi passado na URL
    if (isset($_REQUEST["id"])) {
      // Converter o ID para inteiro
      $id = intval($_REQUEST["id"]);

      // Criar consulta SQL para buscar o usuário pelo ID
      $sql = "SELECT * FROM usuario WHERE id = {$id}";

      // Executar a consulta SQL
      $resultado = $conn->query($sql);

      // Verificar se a consulta retornou um único resultado
      if ($resultado->num_rows == 1) {
        // Armazenar os dados do usuário em uma variável
        $usuario = $resultado->fetch_object();

        // Criar formulário para atualizar o usuário
        echo "<form action='geral_usuarios.php?acao=atualizar&id={$id}' method='POST'>";

        // Campo para o nome completo
        echo "<label for='nome'>Nome Completo:</label>";
        echo "<input type='text' id='nome' name='nome' value='{$usuario->nome}' required><br><br>";

        // Campo para o email
        echo "<label for='email'>Email:</label>";
        echo "<input type='email' id='email' name='email' value='{$usuario->email}' required><br><br>";

        // Campo para a data de nascimento
        echo "<label for='nascimento'>Data de Nascimento:</label>";
        echo "<input type='date' id='nascimento' name='nascimento' value='{$usuario->nascimento}' required><br><br>";

        // Botão para enviar o formulário
        echo "<button type='submit'>Atualizar</button>";

        echo "</form>";
      } else {
        // Exibir mensagem de erro se o usuário não for encontrado
        echo "<script>alert('Usuário não encontrado!');</script>";
        echo "<script>location.href='ver_usuarios.php';</script>";
      }
    } else {
      // Exibir mensagem de erro se o ID do usuário não for informado
      echo "<script>alert('ID do usuário não informado!');</script>";
      echo "<script>location.href='ver_usuarios.php';</script>";
    }
  ?>

</body>
</html>
