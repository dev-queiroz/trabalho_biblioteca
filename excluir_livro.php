<?php
include("conexao.php");

// Pega o ID do livro que será excluído, passado pela URL
$id = $_GET["id"];

// Cria uma consulta SQL para excluir o livro com o ID especificado
$sql = "DELETE FROM livros WHERE id = $id";
// Executa a consulta e armazena o resultado em $resultado
$resultado = $conn->query($sql);

// Verifica se a exclusão foi bem-sucedida
if ($resultado) {
    // Exibe uma mensagem de sucesso e redireciona para a página de lista de livros
    echo "<script>alert('Livro excluído com sucesso!');</script>";
    echo "<script>location.href='ver_livros.php';</script>";
} else {
    // Exibe uma mensagem de erro se a exclusão falhar
    echo "<script>alert('Erro ao excluir o livro!');</script>";
}
