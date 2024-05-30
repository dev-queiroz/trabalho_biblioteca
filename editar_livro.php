<?php
include("conexao.php");

$id = $_GET["id"];

$sql = "SELECT * FROM livros WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
    $linha = $resultado->fetch_assoc();

    if (isset($_POST["acao"])) {
        if ($_POST["acao"] == "salvar") {
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];
            $data = $_POST["data"];

            if (empty($titulo) || empty($autor) || empty($data)) {
                echo "<script>alert('Preencha todos os campos obrigatórios!');</script>";
                exit;
            }

            $sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', data = '$data' WHERE id = $id";
            $resultado = $conn->query($sql);

            if ($resultado) {
                echo "<script>alert('Livro editado com sucesso!');</script>";
                echo "<script>location.href='ver_livros.php';</script>";
            } else {
                echo "<script>alert('Erro ao editar o livro!');</script>";
            }
        }
    }
} else {
    echo "<p>Livro não encontrado.</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
</head>
<body>
    <h1>Editar Livro</h1>
    <?php if ($resultado->num_rows == 1) : ?>
    <form method="post" action="editar_livro.php?id=<?php echo $linha["id"]; ?>">
        <input type="hidden" name="id" value="<?php echo $linha["id"]; ?>">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $linha["titulo"]; ?>" required><br><br>
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" value="<?php echo $linha["autor"]; ?>" required><br><br>
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" value="<?php echo $linha["data"]; ?>" required><br><br>
        <input type="submit" name="acao" value="salvar">
    </form>
    <?php endif; ?>
</body>
</html>
