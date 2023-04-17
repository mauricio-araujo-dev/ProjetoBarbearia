<?php
session_start();
$logado='';
if(isset($_SESSION['acesso'])){
    $logado = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Prime Barber | Home</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/principal.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="/imagens/Artboard-1-copy-3-8.ico">
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
</head>
<style>
*{margin:0; padding:0;}
body{
    background-image: url('imagens/imagens-de-fundo/imagem-home.jpg');
    flex-direction: column;
    width: 100%;
    position: absolute;
    background-repeat: no-repeat;
}
 .row1{
    position: fixed;
    width: 100%;
    z-index: 10;
}
.bemvindo{
    margin-top: 30vh;
    height: 50vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.texto-bemvindo{
    text-shadow: 4px 4px black;
    color: 	#C0C0C0;
    margin: 30px;
    display: flex;
    flex-direction: column;
    font-size: 50px;
    font-weight: 800;
    justify-content: center;
    text-align: center;
    align-items: center;
}
.texto-bemvindo h1, .texto-bemvindo h4{
    margin: 15px;
    font-weight: 500;
}
.botao-bemvindo button{
    min-height: 5.5rem;
    border:none;
    background-color: #c18845;
    text-shadow: 2px 2px black;
    height: 5.8rem;
    width: 23.2rem;
    border-radius: 2px;
}
.botao-bemvindo{
    flex-direction: column;
    display: flex;
    box-shadow: 2px 2px black;
}
.botao-bemvindo button:hover{
    box-shadow: 0;
    border: none;
    color: silver;
    background-color: #544a41;
    transition: 0.6s;
}
.botao-bemvindo button a{
    
    border: 2px solid #fff;
    padding: 1.5rem;
    padding-left: 5rem;
    padding-right: 5rem;
    font-size: 30px;
    text-decoration: none;
}
.sobre{
    height: 63vh;
    margin-top: 8%;
    padding: 15px;
    background-color: #1c1c1c ;
    width: 100%;
    display: flex;
}
.texto-sobre{
    margin-top: 10px;
    font-weight: 600;
    margin: 15px;
    display: flex;
    flex-direction: column;
    width: 100%;
    color: #c18845;
}
.texto-sobre h1{
    align-items: center;
    justify-content: center;
    text-align: center;
}
.texto-sobre h3{
    line-height: 1.5;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-size: 25px;
    margin-top: 40px;
}
.texto-sobre h1{
    font-size: 40px;
}
.texto-sobre h1::after{
    font-weight: 800;
    content: '';
    display: block;
    width: 80rem;
    height: 0.2rem;
    background-color: #c18845;
    margin: 0 auto;
    position: absolute;
    border-radius: 12px;
}
.sobre-cadastrar{
    margin-top: 35px;
    font-size: 28px;
}
.row2{
    background: rgb(193,136,69);
    background: linear-gradient(90deg, rgba(193,136,69,1) 0%, rgba(0,0,0,1) 50%, rgba(84,74,65,1) 100%);
    display: flex;
    flex-direction: column;
    position: relative;
    height: 65vh;
    width: 100%;
}
.texto{
    margin-bottom: 20px;
    justify-content: center;
    text-align: center;
    color: #c18845;
    display: flex;
    margin-top: 20px;
}
.texto h1::after{
    justify-content: center;
    font-weight: 800;
    content: '';
    display: flex;
    width: 15rem;
    height: 0.2rem;
    background-color: #c18845;
    margin: 0 auto;
    border-radius: 12px;
}
.fotos{
    display: flex;
    justify-content: space-around;
    align-items: center;
    text-align: center;
}
.row3{
    background-color: #F5F5F5;
    display: flex;
    flex-direction: row;
    position: relative;
    height: 50%;
    width: 100%;
}
.formulario{
    font-size: 25px;
    padding: 60px;
    width: 50%;
    align-items:center;
}
.input-group{
    margin: 1rem;
}
.formulario input{
    border: 0px solid #544a41;
    border-radius: 5px;
    margin: 0.5rem;
    padding: 0.6rem;
    width: 50%;
}
.input-group button{
    cursor: pointer;
    border-radius: 5px;
    background-color: #c18845;
    margin: 0.5rem;
    padding: 0.5rem;
    height: 2.5rem;
    width: 12rem;
    border: none;
}
.input-group button a{
    font-size: 15px;
    font-weight: 700;
}
.input-group button:hover{
    background-color: #544a41;
    transition: 1s;
}
.row4{
    position: relative;
    height: 30%;
    width: 100%;
    bottom: 0;
}
footer{
    z-index: 50;
}

.linha{
    display: flex;
    justify-content: center;
    align-items: center;
}
.linha::after{
    font-weight: 800;
    content: '';
    display: block;
    width: 0.3rem;
    height: 24rem;
    background-color: #c18845;
    margin: 0 auto;
    position: absolute;
    border-radius: 12px;
    }
.mapa{
    padding: 60px;
    display: flex;
    flex-direction: column;
    width: 50%;
}
.container-mapa{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80%;
    margin: 15px;
    margin-top: 30px;
    padding-left: 20px;
}
.mapa h1{
    margin-bottom: 20px;
    font-size: 40px;
    text-align: left;
}
</style>
<body>

        <div class="row1">
                 <?php include 'menu.php';?>
        </div>
        
        <div class="bemvindo">
            <div class="texto-bemvindo">
            <h1>BEM-VINDO</h1>
            <h4>Você merece a melhor experiência
        </h4>
            </div>
            <div class="botao-bemvindo">
                <button><a href="agendamento.php">Agende agora!</a></button>
            </div>
        </div>
        
        <div class="sobre">
            <div class="texto-sobre">
                <h1> Sobre nós: </h1>
                <h3> A <strong>The Prime Barber</strong> é a barbearia da sua época, tendo tudo que o homem
		moderno precisa. Um ambiente familiar, descontraído e exclusivamente masculino,
		com cuidados para todos os estilos de barba e cabelo. Uma barbearia premium, para cuidar do visual,
		tomar uma cerveja gelada, assistir aos seus esportes favoritos ou botar o papo em dia.
		<div class="sobre-cadastrar">Cadastre-se AGORA e receba as novidades, eventos e condições especiais da The Prime Barber.</div></h3>
            </div>
        </div>

       <div class="row2">
        <div class="texto"><h1>Conheça a nossa equipe:</h1></div>
             <div class="fotos">
               <img src= "imagens/IMG-Bruno.jpg" width="225" height="300">
               <img src= "imagens/IMG-Kadu.jpeg" width="225" height="300">
               <img src= "imagens/IMG-Ester.jpeg" width="225" height="300">
               <img src= "imagens/IMG-Mauricio.jpg" width="225" height="300">
    	       <img src= "imagens/IMG-Wernner.jfif " width="225" height="300">
    	       <img src= "imagens/Luiz.jpg" width="225" height="300">
             </div>
         </div>

        <div class="row3">
            <div class="formulario">
                <form action="">
                    <h1> Fale conosco !</h1>
                    <div class="input-group">
                      <label for="nome">Nome:</label><br>
                      <input type="text" id="nome" name="nome" placeholder="Ex: 'Maumau' "><br>
                      <label for="email">Email:</label><br>
                      <input type="text" id="email" name="email" placeholder="Ex: '@gmail.com' "><br>
                      <label for=mensagem id="mensagem" name="mensagem"> Mensagem:</label><br>
                      <input type="text" name="mensagem" rows="8"><br>
                      <button><a href="">Enviar</a></button>
                    </div>
                </form>
            </div>
           
            <div class="linha"></div>

            <div class="mapa">
                <h1>Encontre-nos:</h1>
                <div class="container-mapa">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1837.4902199345502!2d-43.21991384199767!3d-22.91409229625201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997e5687b2ff25%3A0xae34c2c599c57146!2sAlegria%20Da%20Tijuca!5e0!3m2!1spt-BR!2sbr!4v1654542767984!5m2!1spt-BR!2sbr" width="650" height="320"; loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            </div>
             
        </div>

        
        <footer>
              <?php include 'rodape.html'; ?>
        </footer>
</body>
</html>