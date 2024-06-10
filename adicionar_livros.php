<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Livro</title>
</head>
<body>
    <h1>Adicionar Livro</h1>

    **Formulário para adicionar um novo livro:**

    <form method="post" action="adicionar_livros.php">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required><br><br>

        <label for="data">Data de publicação:</label>
        <input type="date" id="data" name="data" required><br><br>

        <input type="submit" name="acao" value="Salvar">
    </form>
</body>
</html>

<?php
include("conexao.php"); // Inclui o arquivo de conexão com o banco de dados

if (isset($_POST["acao"])) { // Verifica se o formulário foi enviado
    if ($_POST["acao"] == "salvar") { // Verifica se o valor do botão de envio é "salvar"
        $titulo = $_POST["titulo"]; // Recupera o valor do campo "titulo"
        $autor = $_POST["autor"]; // Recupera o valor do campo "autor"
        $data = $_POST["data"]; // Recupera o valor do campo "data"

        if (empty($titulo) || empty($autor) || empty($data)) { // Verifica se todos os campos foram preenchidos
            echo "<script>alert('Preencha todos os campos obrigatórios!');</script>";
            exit; // Interrompe a execução do código
        }

        $sql = "INSERT INTO livros (titulo, autor, data) VALUES ('$titulo', '$autor', '$data')"; // Cria a consulta SQL para inserir o novo livro no banco de dados
        $resultado = $conn->query($sql); // Executa a consulta SQL

        if ($resultado) { // Se a consulta for bem-sucedida
            echo "<script>alert('Livro adicionado com sucesso!');</script>";
            echo "<script>location.href='ver_livros.php';</script>"; // Redireciona para a página "ver_livros.php"
        } else { // Se a consulta falhar
            echo "<script>alert('Erro ao adicionar o livro!');</script>";
        }
    }
}
?>
