<?php
  include("conexao.php");

  if (isset($_REQUEST["acao"])) {
    switch ($_REQUEST["acao"]) {
      case "salvar":
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $nascimento = $_POST["nascimento"];

        if (empty($nome) || empty($email) || empty($nascimento)) {
          echo "<script>alert('Preencha todos os campos obrigatórios!');</script>";
          exit;
        }

        $sql = "INSERT INTO usuario (nome, email, nascimento) VALUES ({$nome}, {$email}, {$nascimento})";
        $resultado = $conn->query($sql);

        if ($resultado) {
          echo "<script>alert('Usuário registrado com sucesso!');</script>";
          echo "<script>location.href='ver_usuarios.php';</script>";
        } else {
          echo "<script>alert('Erro ao registrar o usuário!');</script>";
        }
        break;

      case "atualizar":
        $id = $_REQUEST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $nascimento = $_POST["nascimento"];

        if (empty($nome) || empty($email) || empty($nascimento)) {
          echo "<script>alert('Preencha todos os campos obrigatórios!');</script>";
          exit;
        }

        $sql = "UPDATE usuario SET nome = '$nome', email = '$email', nascimento = '$nascimento' WHERE id = $id";
        $resultado = $conn->query($sql);

        if ($resultado == true) {
          echo "<script>alert('Usuário atualizado com sucesso!');</script>";
          echo "<script>location.href='ver_usuarios.php';</script>";
        } else {
          echo "<script>alert('Erro ao atualizar o usuário!');</script>";
        }
        break;

      case "excluir":
        $id = $_REQUEST["id"];

        $sql = "DELETE FROM usuario WHERE id = {$id}";
        $resultado = $conn->query($sql);

        if ($resultado) {
          echo "<script>alert('Usuário excluído com sucesso!');</script>";
          echo "<script>location.href='ver_usuarios.php';</script>";
        } else {
          echo "<script>alert('Erro ao excluir o usuário!');</script>";
        }
        break;
    }
  }
