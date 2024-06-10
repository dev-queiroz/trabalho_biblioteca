<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca dos Sonhos - Registrar Usuário</title>
</head>
<body>
  <h1>Registrar Novo Usuário</h1>

  <form action="?acao=registrar" method="POST">
    <label for="nome">Nome Completo:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required><br><br>

    <label for="nascimento">Data de Nascimento:</label>
    <input type="date" id="nascimento" name="nascimento" required><br><br>

    <button type="submit">Registrar</button>
  </form>
</body>
</html>

<?php
  // Inclui o arquivo de conexão com o banco de dados
  include("conexao.php");

  // Verifica se o formulário foi submetido e se a ação é "registrar"
  if (isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "registrar") {
    // Pega os valores dos campos do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $nascimento = $_POST["nascimento"];

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (empty($nome) || empty($email) || empty($nascimento)) {
      // Se algum campo estiver vazio, exibe uma mensagem de erro
      echo "<script>alert('Preencha todos os campos obrigatórios!');</script>";
      // Interrompe a execução do código
      exit;
    }

    // Cria uma consulta SQL para inserir o novo usuário no banco de dados
    $sql = "INSERT INTO usuario (nome, email, nascimento) VALUES ('{$nome}', '{$email}', '{$nascimento}')";
    // Executa a consulta e armazena o resultado em $resultado
    $resultado = $conn->query($sql);

    // Verifica se a inserção foi bem-sucedida
    if ($resultado) {
      // Exibe uma mensagem de sucesso e redireciona para a página de lista de usuários
      echo "<script>alert('Usuário registrado com sucesso!');</script>";
      echo "<script>location.href='ver_usuarios.php';</script>";
    } else {
      // Exibe uma mensagem de erro se a inserção falhar
      echo "<script>alert('Erro ao registrar o usuário!');</script>";
    }
  }
?>
