<?php
include("conexao.php");

$sql = "SELECT * FROM livros";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Título</th><th>Autor</th><th>Data</th><th>Ações</th></tr>";
    while ($linha = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $linha["id"] . "</td>";
        echo "<td>" . $linha["titulo"] . "</td>";
        echo "<td>" . $linha["autor"] . "</td>";
        echo "<td>" . $linha["data"] . "</td>";
        echo "<td>";
        echo "<a href='editar_livro.php?id=" . $linha["id"] . "'>Editar</a> | ";
        echo "<a href='excluir_livro.php?id=" . $linha["id"] . "' onclick='return confirm(\"Deseja realmente excluir este livro?\");'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Não há livros cadastrados.</p>";
}
