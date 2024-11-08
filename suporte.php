<?php

session_start()

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Byte Amigo</title>
    <link rel="stylesheet" href="./css/suporte.css">
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

</head>
<body>

    <body>
   
        <div class="container">
            <div class="content">
                <img src="./img/LOGO/download (1).png" alt="Logo" class="logo">

            <section>
                <h2 style="padding-right: 7px;">Podemos te ajudar com</h2> 
                <div class="dropping-texts">
                <div style="color: #198754;">Consultoria</div>
                <div style="color: #198754;">Manutencao de infraestrutura</div>
                <div style="color: #198754;">manutencao de pcs</div>
            </section>        
                
                <div class="form-container" style="padding-right: 7px ;">

                    <form action="registrar_pedido.php" method="POST">
                        <select id="servico" name="servico">
                            <option value="default">Escolha um servico...</option>
                            <option value="infraestrutura">Manutenção de Infraestrutura</option>
                            <option value="software">Manutenção de Software</option>
                            <option value="consultoria">Consultoria</option>
                        </select>
                        
                        <textarea id="descricao" name="descricao" placeholder="Descreva com detalhes seu problema"></textarea>
                        
                        <button type="submit">ENVIAR</button>
                    </form>  
                
                </div>
            </div>
        </div>
    
   
        <script src="js/script.js"></script>
</body>
</html>
