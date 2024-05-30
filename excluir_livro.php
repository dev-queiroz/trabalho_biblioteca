<?php
include("conexao.php");

$id = $_GET["id"];

$sql = "DELETE FROM livros WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado) {
    echo "<script>alert('Livro excluído com sucesso!');</script>";
    echo "<script>location.href='ver_livros.php';</script>";
} else {
    echo "<script>alert('Erro ao excluir o livro!');</script>";
}
