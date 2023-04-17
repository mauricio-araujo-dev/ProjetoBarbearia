<?php

session_start();
$campoid = filter_input(INPUT_GET, 'id');
if ($_SESSION["id"]!== $campoid){
    header('Location: editarperfilform.php?id='. $_SESSION["id"]);
}

require 'conexao.php';
$sql = "SELECT usuarios.* FROM usuarios WHERE usuarios.Id = $campoid ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
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
        
        
        <title>Prime Barber | Editar Perfil</title>
        <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        background-color: #1c1c1c;
        height: 100vh;
        width: 100vw;
    }
    
    .voltar-home{
        display: flex;
        
        width: 50%;
    }
    
    .voltar-home a{
        color: white;
        text-decoration: none;
        font-size: 25px;
        text-align: center;
    }
    
    .voltar-home a:hover{
        text-decoration: underline;
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 40px;
        height: 100%;
        font-weight: 600;
    }

    .left-box {
        width: 27%;
        height: 80%;
        background-color: #544a41;
        padding: 10px;
    }

    .left-box .title {
        font-size: 1.5rem;
        margin-top: 20px;
        color: #c18845;
    }
    
    .left-box .input-group input{
        background-color: #544a4100;
        color: #fff;
        font-size: 1.5rem;
        border-width: 0px;
        font-weight: 700;
        outline: 0;
        color: #c18845;
    }
    .left-box a{
        font-size: 1rem;
        color: white;
        font-weight: 500;
    }
    .left-box .input-group .input-box{
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        justify-content: start;
        
    }
    .left-box .input-group {
        display: flex;
        flex-direction: column;
        
    }
    .input-box a{
        font-size: 1.3rem;
    }

    .right-box .input-group {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .right-box .input-group input {
        border: none;
        background-color: transparent;
        border-bottom: 1px solid black;
        margin-top: 30px;
        padding: 10px;
        font-size: 1rem;
        outline: 0;
        width: 70%;
        color: #c18845;
        transition: 0.5s;
    }
    ::placeholder{
        color: rgba(136, 130, 130, 0.733);
    }

    .right-box .input-group input:focus {
        background-color: #1c1c1c30;
        border-bottom: 1px solid #c18845;
        color: #c18845;
    }


    .right-box {
        width: 35%;
        height: 80%;
        background-color: #544a41b7;
        padding: 10px;
    }

    .right-box .title {
        font-size: 1.5rem;
        margin-top: 20px;
        color: #fff;
    }

    .botao-salvar {
        padding: 20px;
        border: none;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .botao-salvar input {
        color: #fff;
        width: 60%;
        background-color: rgba(9, 161, 9, 0.685);
        font-size: 1rem;
        border: none;
        border-radius: 2px;
        padding: 15px 30px;
        cursor: pointer;
        font-weight: 600;
        text-align:center;
    }

    .botao-salvar input:hover {
        background-color: rgba(13, 235, 13, 0.685);
        transition: 0.1s;
    }
</style>
</head>

<body>
    <div class="voltar-home">
        <a href="index.php">Voltar</a>
    </div>
<div class="container">
    
    <div class="left-box">
        <div class="title">
            <h1>Meus Dados</h1>
        </div>
        <div class="">

        </div>

        <div class="input-group">
            <div class="input-box">
            <a>Username: </a><input type="text" name="username" value="<?php echo $row["Username"]?>" readonly>
            <a>Email: </a><input type="text" name="email" value="<?php echo $row["Email"]?>" readonly>
            <a>Endereço: </a><input type="text" name="endereco" value="<?php echo $row["Endereco"]?>" readonly>
            </div>
        </div>
    </div>
    <div class="right-box">
        <div class="title">
            <h1>Editar Dados</h1>
        </div>
        <form action="editarusuario.php" method="post">
            <div class="input-group">
                <input type="hidden" name="id" value="<?php echo $row["Id"]?>">
                <input type="text" name="username" placeholder="Seu novo @username" value="<?php echo $row["Username"]?>">
                <input type="text" name="email" placeholder="Seu novo email" value="<?php echo $row["Email"]?>">
                <input type="text" name="endereco" placeholder="Seu novo endereço" value="<?php echo $row["Endereco"]?>">
            </div>
            <div class="botao-salvar">
                <input type="submit" value="Salvar Alterações">
            </div>

        </form>

    </div>
</div>
</body>

    </html>
<?php
    //Se a consulta não tiver resultados  			
} else {
    echo "<h1>Nenhum resultado foi encontrado.</h1>";
}
//Fecha a conexão.	
$conn->close();

?>