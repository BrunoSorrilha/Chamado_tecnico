<?php

    session_start();

    require('conecta.php');

    $email = $_POST['Email'];
    $senha = md5($_POST['senha']);

    $consulta = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";

    $resultado = $conexao->query($consulta);
    $registros = $resultado->num_rows;
    $resultado_usuario = mysqli_fetch_assoc($resultado);

    if($registros == 1){
        $_SESSION['id'] = $resultado_usuario['id'];
        $_SESSION['nome'] = $resultado_usuario['nome'];
        $_SESSION['email'] = $resultado_usuario['email'];

        header('Location: ./home.html');

    }
    else{
        echo "Usuário ou senha não encontrados";        
        header('Location: ./login.html');
    }

?>