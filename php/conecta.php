<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "chamado_tecnico";

    $conexao = new mysqli($servidor,$usuario,$senha,$banco);

    if(mysqli_connect_error()){
        echo "ERRO DE CONEXÃO!";
    }
    else{
        echo "CONECTADO AO BANCO COM SUCESSO!";
    }
?>