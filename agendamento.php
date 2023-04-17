<?php
    session_start();
    $logado='';
    if(isset($_SESSION['acesso'])){
        $logado = $_SESSION['username'];
    }
    require  'conexao.php';


    $sql = "SELECT * FROM profissionais";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
?>

<!DOCTYPE html>
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
    
    
    <title>Prime Barber | Agendamento</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}
ul{
    background-color: #1c1c1c;
}
body{
    background-color: #ddd;
    
}
.titulo-profissionais{
    margin-top: 40px;
    color: #c18845;
    font-size: 30px;
}
.titulo-profissionais h1{
    justify-content: center;
    text-align: center;
    align-items: center;
    text-shadow: 3px 3px rgba(0, 0, 0, 0.418);
}
.card-grupo{
    justify-content: flex-start;
    align-items: center;
    display: flex;
    flex-wrap: wrap;
    width: 90vw;
    margin: auto;
    margin-bottom: 70px;
}
.card{
    margin: 20px;
    margin-top: 20px;
    width: 260px;
    height: 274px;
    background-color: #544a41;
    border: 1px solid white;
    border-radius: 5%;
    box-shadow: 8px 8px rgba(0, 0, 0, 0.336);
}
.card-info{
    padding: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.card-imagem{
    margin-top: 20px;
    height: 120px;
    width: 120px;
    border-radius: 50%;
    align-items: center;
    justify-content: center;
}
.card-imagem img{
    height: 100%;
    width: 100%;
    border-radius: 50%;
    border: 1px solid black;
}
.card-descricao{
    display: flex;
    flex-direction: column;
}
.profissional-nome{
    font-size: 30px;
    color: white;
    font-weight: 700;
    margin-top: 10px;
}
.texto-informacao{
    text-align: center;
    color: #c18845;
    font-size: 23px;
    font-weight: 700;
}
.botao-agenda{
    width: 100%;
    margin-top: 5px;
    
}
.botao-agenda button{
    width: 100%;
    padding: 20px;
    font-weight: 800;
    color: #ddd;
    background-color: #998675;
    border: none;
    border-bottom-right-radius: 14px;
    border-bottom-left-radius: 14px;
    transition: 0.5s;
}

.botao-agenda button:hover{
    background-color: #ddd;
    color: #998675;
}
</style>
<body>
    <div class="agendamento-container">
        
        <?php 
        include 'menu.php'
        ?>
        
        
        <div class="titulo-profissionais">
            <h1>Profissionais Disponíveis</h1>
        </div>
        <div class="card-grupo">
        
        <?php 
            
            while ($row = $result->fetch_assoc()) {
                echo'
                    <div class="card">
                        <div class="card-info">
                            <div class="card-imagem">
                                <img src="imagens/AvatarBarbeiro.jpg" alt="avatar">
                            </div>
                            <div class="card-descricao">
                                <div >
                                    <p class="profissional-nome"> Profissional:</p>
                                    <p class="texto-informacao">'. $row['Nome'] . '</p>
                                </div>
                            </div>
                    
                        </div>
                        <div class="botao-agenda">
                            <a href="scripts/eventoscontrolar.php?id_profissional='. $row["Id"] . '"><button>VER AGENDA</button></a>
                        </div>
                    </div>

';
            }
            
        
    }
            ?>


        </div>
    </div>
    <?php include 'rodape.html'; ?>
</body>
</html>