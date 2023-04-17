<?php
    session_start();
    $logado='';
    if(isset($_SESSION['acesso'])){
        $logado = $_SESSION['username'];
    }
    require  'conexao.php';

    $qtd_carrinho = isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : 0;



    $sql = "SELECT * FROM produtos";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<meta name="theme-color" content="#ffffff">
    <title>Prime Barber | Produtos </title>
    <style>
        *{margin: 0;padding: 0;box-sizing: border-box;font-family: Arial, Helvetica, sans-serif;}
        body{
            background-color: #544a41;
        }
        ul{
            background-color: #1c1c1c;
        }
        .produtos-container{
            flex-direction: column;
            background-color: #1c1c1c;
            display: flex;
            height: fit-content;
            width: 100%;
            margin: 30px 0;
            border: 1px solid #c18845;
        }
        .titulo-container{
            background-color: #c18845;
            width: 100%;
            display: flex;
            font-size: 25px;
            color: #fff;
            justify-content: space-between;
            text-align: center;
            font-weight: 700;
        }
        .carrinho-qtd{
            display: flex;
            text-align: center;
            height: 100%;
            padding: 20px;
            font-size: 2rem;
            font-weight: bold;
            transition: 0.2s;
        }
        .carrinho-qtd:hover{
            color: #544a41;
        }
        .carrinho-qtd span {
            display: inline-block;
            text-align: center;
            font-size: 25px;
            position: relative;
            bottom: 10px;
            right: 0;
        }
        .grupo-produtos{
            justify-content: space-around;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }
        .caixa-produto{
            margin: 15px;
            width: 285px;
            height: fit-content;
            padding: 10px;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .titulo-produto{
            text-shadow: 2px 2px black;
            text-align: center;
            font-size: 12px;
            margin: 5px;
            color: #ddd;
        }
        .imagem-produto{
            justify-content: center;
            align-items: center;
            margin: 10px 5px 5px 5px;
        }
        .descricao-produto{
            margin: 2px;
            display: flex;
            flex-direction: column;
            font-size: 10px;
            color: #ddd;
        }
        .acao-produto{
            display: flex;
            width: 100%;
        }
        .acao-produto button{
            cursor: pointer;
            box-shadow: 1px 1px white;
            color:white;
            margin: 15px;
            background-color: green;
            padding: 15px;
            border: none;
            width: 100%;
            border-radius: 2px;
        }
        .acao-produto a{
            font-weight: 700;
            font-size: 18px;
            color: #fff;
            text-decoration: none;
        }
        .acao-produto button:hover{
            background-color: rgb(79, 245, 143);
            color: green;
            transition: 0.5s;
        }


        .flip-card {
                font-family: Arial, Helvetica, sans-serif;
                background-color: transparent;
                width: 300px;
                height: 300px;
                perspective: 1000px;
            }

            .flip-card-inner {
                position: relative;
                width: 100%;
                height: 100%;
                text-align: center;
                transition: transform 0.6s;
                transform-style: preserve-3d;
            }

            .flip-card:hover .flip-card-inner{
                transform: rotateY(180deg);
            }

            .flip-card-front , .flip-card-back {
                position: absolute;
                width: 100%;
                height: 100%;
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                border-radius: 14px;
            }

            .flip-card-front {
                background-image: 
                linear-gradient(
                    45deg, #c18845 , #544a41
                );
            }

            .flip-card-front img {
                width: 220px;
                margin-top: 2.5rem;
            }

            .flip-card-back {
                background-image: linear-gradient(
                    315deg, #c18845 , #544a41
                );
                color: #ffffff;
                transform: rotateY(180deg);
            }

            .flip-card-back img {
                width: 140px;
                margin-top: 1rem;
            }

            .flip-card-back h3 {
                font-size: 30px;
                margin-top: 15px;
            }

            .flip-card-back h1 {
                font-size: 30px;
                margin-top: 25px;
            }
    </style>
</head>
<body>
    <?php
    
    include 'menu.php'
    
    ?>
    
    <div class="produtos-container">

        <div class="titulo-container">
            <h1 style="padding: 10px;">Produtos Disponíveis</h1>
            <a class="carrinho-qtd" href="testecarrinhotela.php">
                Ver carrinho<i class="bi bi-cart4"></i>
            <span><?php echo $qtd_carrinho; ?></span></a>
        </div>

        <div class="grupo-produtos">
            
            <?php 
            
            while ($row = $result->fetch_assoc()) {
                echo'
                <div class="caixa-produto">
                    <div class="flip-card">
                    <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="./imagens/produtos/'.$row['imagem'].'"  />
                    </div>
                    <div class="flip-card-back">
                        <img src="./imagens/produtos/'.$row['imagem'].'"/>
                        <h3>'. $row['Nome'] . '</h3>
                        <h1> R$'.$row['Preco'].' </h1>
                    </div>
                </div>   
                </div>
                <div class="acao-produto">
                    <a href="adicionarcarrinho.php?id='.$row['Id'].'"><button>Adicionar ao carrinho</button></a>
                </div>
            </div>
                ';
            }
            
        
    }
            ?>
            

            
        </div>
    </div>
    
    <footer>
              <?php include 'rodape.html'; ?>
        </footer>
</body>
</html>