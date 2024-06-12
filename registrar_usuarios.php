<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca dos Sonhos - Registrar Bibliotecário</title>
</head>
<body>
  <h1>Registrar Novo Bibliotecário</h1>

  <form action="?acao=registrar" method="POST">
    <label for="nome">Nome Completo:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required><br><br>

    <label for="nascimento">Data de Nascimento:</label>
    <input type="date" id="nascimento" name="nascimento" required><br><br>

    <label for="senha">Senha:</label>
    <input type="text" id="senha" name="senha" required><br><br>

   <label for="telefone">Telefone:</label>
    <input type="int" id="telefone" name="telefone" required><br><br>

    <button type="submit">Registrar</button>
  </form>
</body>
</html>

<?php
  include("conexao.php");

  if (isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "registrar") {
    // Pega os valores dos campos do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $nascimento = $_POST["nascimento"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];

    if (empty($nome) || empty($email) || empty($nascimento)) || empty($senha) || empty($telefone)){
      echo "<script>alert('Preencha todos os campos obrigatórios!');</script>";
      exit;
    }

    $sql = "INSERT INTO usuario (nome, email, nascimento, senha, telefone) VALUES ('{$nome}', '{$email}', '{$nascimento}', '{senha}', '{telefone}')";
    $resultado = $conn->query($sql);

    if ($resultado) {
      echo "<script>alert('Usuário registrado com sucesso!');</script>";
      echo "<script>location.href='ver_usuarios.php';</script>";
    } else {
      echo "<script>alert('Erro ao registrar o usuário!');</script>";
    }
  }
?>
