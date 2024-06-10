<?php
include("conexao.php");

// Cria uma consulta SQL para buscar todos os livros cadastrados
$sql = "SELECT * FROM livros";
// Executa a consulta e armazena o resultado em $resultado
$resultado = $conn->query($sql);

// Verifica se a consulta retornou algum resultado
if ($resultado->num_rows > 0) {
    // Exibe uma tabela com os dados dos livros
    echo "<table>";
    echo "<tr><th>ID</th><th>Título</th><th>Autor</th><th>Data</th><th>Ações</th></tr>";
    // Loop que percorre cada linha do resultado da consulta
    while ($linha = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $linha["id"] . "</td>"; // Exibe o ID do livro
        echo "<td>" . $linha["titulo"] . "</td>"; // Exibe o título do livro
        echo "<td>" . $linha["autor"] . "</td>"; // Exibe o autor do livro
        echo "<td>" . $linha["data"] . "</td>"; // Exibe a data de publicação do livro
        echo "<td>";
        // Exibe um link para editar o livro
        echo "<a href='editar_livro.php?id=" . $linha["id"] . "'>Editar</a> | ";
        // Exibe um link para excluir o livro, com confirmação antes de excluir
        echo "<a href='excluir_livro.php?id=" . $linha["id"] . "' onclick='return confirm(\"Deseja realmente excluir este livro?\");'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // Se não houver livros cadastrados, exibe uma mensagem informando isso
    echo "<p>Não há livros cadastrados.</p>";
}
