<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "chamado_tecnico";

    $conexao = new mysqli($servidor,$usuario,$senha,$banco);

    try {
        $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro ao conectar: " . $e->getMessage();
    }
?>