<?php
// Inclui o arquivo de conexão com o banco de dados
include("conexao.php");

// Pega o ID do livro que será editado, passado pela URL
$id = $_GET["id"];

// Cria uma consulta SQL para buscar o livro com o ID especificado
$sql = "SELECT * FROM livros WHERE id = $id";
// Executa a consulta e armazena o resultado em $resultado
$resultado = $conn->query($sql);

// Verifica se o resultado da consulta trouxe apenas 1 linha (ou seja, o livro foi encontrado)
if ($resultado->num_rows == 1) {
    // Pega a linha do resultado e armazena em $linha
    $linha = $resultado->fetch_assoc();

    // Verifica se o formulário de edição foi submetido
    if (isset($_POST["acao"])) {
        // Verifica se o botão "Salvar" foi clicado
        if ($_POST["acao"] == "salvar") {
            // Pega os valores dos campos de título, autor e data do formulário
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];
            $data = $_POST["data"];

            // Verifica se todos os campos obrigatórios foram preenchidos
            if (empty($titulo) || empty($autor) || empty($data)) {
                // Se algum campo estiver vazio, exibe uma mensagem de erro
                echo "<script>alert('Preencha todos os campos obrigatórios!');</script>";
                // Interrompe a execução do código
                exit;
            }

            // Cria uma consulta SQL para atualizar o livro com os novos valores
            $sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', data = '$data' WHERE id = $id";
            // Executa a consulta e armazena o resultado em $resultado
            $resultado = $conn->query($sql);

            // Verifica se a atualização foi bem-sucedida
            if ($resultado) {
                // Exibe uma mensagem de sucesso e redireciona para a página de lista de livros
                echo "<script>alert('Livro editado com sucesso!');</script>";
                echo "<script>location.href='ver_livros.php';</script>";
            } else {
                // Exibe uma mensagem de erro se a atualização falhar
                echo "<script>alert('Erro ao editar o livro!');</script>";
            }
        }
    }
} else {
    // Se o livro não for encontrado, exibe uma mensagem de erro
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
    <?php if ($resultado->num_rows == 1) :?>
    <form method="post" action="editar_livro.php?id=<?php echo $linha["id"];?>">
        <input type="hidden" name="id" value="<?php echo $linha["id"];?>">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $linha["titulo"];?>" required><br><br>
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" value="<?php echo $linha["autor"];?>" required><br><br>
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" value="<?php echo $linha["data"];?>" required><br><br>
        <input type="submit" name="acao" value="salvar">
    </form>
    <?php endif;?>
</body>
</html>
