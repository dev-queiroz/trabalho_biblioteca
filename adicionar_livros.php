<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Livro</title>
</head>
<body>
    <h1>Adicionar Livro</h1>
    <form method="post" action="adicionar_livros.php">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required><br><br>
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" required><br><br>
        <input type="submit" name="acao" value="salvar">
    </form>
</body>
</html>

<?php
include("conexao.php");

if (isset($_POST["acao"])) {
    if ($_POST["acao"] == "salvar") {
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $data = $_POST["data"];

        if (empty($titulo) || empty($autor) || empty($data)) {
            echo "<script>alert('Preencha todos os campos obrigatórios!');</script>";
            exit;
        }

        $sql = "INSERT INTO livros (titulo, autor, data) VALUES ('$titulo', '$autor', '$data')";
        $resultado = $conn->query($sql);

        if ($resultado) {
            echo "<script>alert('Livro adicionado com sucesso!');</script>";
            echo "<script>location.href='ver_livros.php';</script>";
        } else {
            echo "<script>alert('Erro ao adicionar o livro!');</script>";
        }
    }
}
?>
