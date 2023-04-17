<?php
    session_start();
    $logado='';
    if(isset($_SESSION['acesso'])){
        $logado = $_SESSION['username'];
    }
    require  'conexao.php';

    $id = $_SESSION["id"];

    $sql = "SELECT profissionais.Nome as profissionais_nome , agendamentos.Horario , usuarios.Nome as usuario_nome , servicos.Nome as servico_nome FROM agendamentos INNER JOIN profissionais on profissionais.id = agendamentos.Id_profissional INNER JOIN servicos on servicos.id = agendamentos.Servico INNER JOIN usuarios WHERE usuarios.Id = $id";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
?>

<html lang="pt-br">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="apple-touch-icon" sizes="57x57" href="imagens/logos/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="imagens/logos/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="imagens/logos/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="imagens/logos/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="imagens/logos/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="imagens/logos/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="imagens/logos/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="imagens/logos/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="imagens/logos/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="imagens/logos/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="imagens/logos/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="imagens/logos/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="imagens/logos/favicon-16x16.png">
        <link rel="manifest" href="imagens/logos/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="imagens/logos/ms-icon-144x144.png">
    <title>Ver agendamentos</title>
    <style>
        body{
            background-color: #544a41;
            font-family: Arial;
        }
        ul{
            background-color: #1c1c1c;
        }
        table{
            margin: 20px auto;
            width: 90%;
            background-color: #ddd;
            padding: 10px;
            border-radius: 20px;
            border: 2px solid #c18845;
            box-shadow: 10px 10px rgba(0, 0, 0, 0.355);
        }
        th{
            font-size: 30px;
        }
        td{
            text-align: center;
            padding: 10px 0px;
            font-size: 20px;
            color
        }
        
    </style>
    <body>
        
        <?php
    
    include 'menu.php'
    
    ?>
        
        <table>
            <tr>
                <th>Eu</th>
                <th>Barbeiro</th>
                <th>Serviço</th>
                <th>Data/Horário</th>
            </tr>
                
                <?php

                if ($result->num_rows > 0) {



                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                    
                    <td>' . $row["$id"] . '</td>
                    
                    <td>' . $row["profissionais_nome"] . '</td>
                    
                    <td>'.$row["servico_nome"].'</td>
                    
                    <td>'.$row["Horario"].'</td> 
                </tr>
                '; 
                    
                }
                } else {
                    echo '<td colspan="5" style="text-align:center;"> 
                            Nenhum serviço agendado.
                            <a class="adicionar-produtos" href="agendamento.php">
                                <i class="bi bi-calendar-plus"></i> Agendar serviço
                            </a> 
                           </td>';
                }
    }
                ?>
</table>


    </body>
</html>