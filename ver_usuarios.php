<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca dos Sonhos - Listar Usuários</title>
</head>
<body>
  <h1>Lista de Usuários</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Nascimento</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Inclui o arquivo de conexão com o banco de dados
        include("conexao.php");
      
        // Cria uma consulta SQL para buscar todos os usuários cadastrados
        $sql = "SELECT * FROM usuario";
        // Executa a consulta e armazena o resultado em $resultado
        $resultado = $conn->query($sql);
      
        // Verifica se a consulta retornou algum resultado
        if ($resultado->num_rows > 0) {
          // Loop que percorre cada usuário do resultado da consulta
          while ($usuario = $resultado->fetch_object()) {
            echo "<tr>";
            echo "<td>{$usuario->id}</td>"; // Exibe o ID do usuário
            echo "<td>{$usuario->nome}</td>"; // Exibe o nome do usuário
            echo "<td>{$usuario->email}</td>"; // Exibe o email do usuário
            echo "<td>{$usuario->nascimento}</td>"; // Exibe a data de nascimento do usuário
            echo "<td>";
            // Exibe um link para editar o usuário
            echo "<a href='atualizar_usuarios.php?id={$usuario->id}'>Editar</a>";
            echo " | ";
            // Exibe um link para excluir o usuário, com confirmação antes de excluir
            echo "<a href='geral_usuarios.php?acao=excluir&id={$usuario->id}' onclick='return confirm(\"Deseja realmente excluir este usuário?\");'>Excluir</a>";
            echo "</td>";
            echo "</tr>";
          }
         } else {
          // Se não houver usuários cadastrados, exibe uma mensagem informando isso
          echo "<tr><td colspan='5'>Nenhum usuário cadastrado.</td></tr>";
         }
       ?>
    </tbody>
  </table>
</body>
</html>
