<?php
    // Define constantes para detalhes de conexão com o banco de dados
    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("BASE", "biblioteca_sonhos");

    // Cria a conexão com o banco de dados
    $conn = new mysqli(HOST, USER, PASS, BASE);

    // Verifica se há erros de conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
