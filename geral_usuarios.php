<?php
  include("conexao.php");

  // Verifica se uma ação foi solicitada (salvar, atualizar ou excluir)
  if (isset($_REQUEST["acao"])) {
    // Verifica qual ação foi solicitada e executa o código correspondente
    switch ($_REQUEST["acao"]) {
      // Caso a ação seja "salvar"
      case "salvar":
        // Pega os valores dos campos de nome, email e nascimento do formulário
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

        // Cria uma consulta SQL para inserir um novo usuário no banco de dados
        $sql = "INSERT INTO usuario (nome, email, nascimento) VALUES ({$nome}, {$email}, {$nascimento})";
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
        break;

      // Caso a ação seja "atualizar"
      case "atualizar":
        // Pega o ID do usuário que será atualizado
        $id = $_REQUEST["id"];
        // Pega os valores dos campos de nome, email e nascimento do formulário
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

        // Cria uma consulta SQL para atualizar o usuário no banco de dados
        $sql = "UPDATE usuario SET nome = '$nome', email = '$email', nascimento = '$nascimento' WHERE id = $id";
        // Executa a consulta e armazena o resultado em $resultado
        $resultado = $conn->query($sql);

        // Verifica se a atualização foi bem-sucedida
        if ($resultado == true) {
          // Exibe uma mensagem de sucesso e redireciona para a página de lista de usuários
          echo "<script>alert('Usuário atualizado com sucesso!');</script>";
          echo "<script>location.href='ver_usuarios.php';</script>";
        } else {
          // Exibe uma mensagem de erro se a atualização falhar
          echo "<script>alert('Erro ao atualizar o usuário!');</script>";
        }
        break;

      // Caso a ação seja "excluir"
      case "excluir":
        // Pega o ID do usuário que será excluído
        $id = $_REQUEST["id"];

        // Cria uma consulta SQL para excluir o usuário do banco de dados
        $sql = "DELETE FROM usuario WHERE id = {$id}";
        // Executa a consulta e armazena o resultado em $resultado
        $resultado = $conn->query($sql);

        // Verifica se a exclusão foi bem-sucedida
        if ($resultado) {
          // Exibe uma mensagem de sucesso e redireciona para a página de lista de usuários
          echo "<script>alert('Usuário excluído com sucesso!');</script>";
          echo "<script>location.href='ver_usuarios.php';</script>";
        } else {
          // Exibe uma mensagem de erro se a exclusão falhar
          echo "<script>alert('Erro ao excluir o usuário!');</script>";
        }
        break;
    }
  }
