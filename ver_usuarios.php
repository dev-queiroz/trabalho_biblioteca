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
        include("conexao.php");

        $sql = "SELECT * FROM usuario";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
          while ($usuario = $resultado->fetch_object()) {
            echo "<tr>";
            echo "<td>{$usuario->id}</td>";
            echo "<td>{$usuario->nome}</td>";
            echo "<td>{$usuario->email}</td>";
            echo "<td>{$usuario->nascimento}</td>";
            echo "<td>";
            echo "<a href='atualizar_usuarios.php?id={$usuario->id}'>Editar</a>";
            echo " | ";
            echo "<a href='geral_usuarios.php?acao=excluir&id={$usuario->id}' onclick='return confirm(\"Deseja realmente excluir este usuário?\");'>Excluir</a>";
            echo "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='5'>Nenhum usuário cadastrado.</td></tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>
