<?php
session_start();

if(!isset ($_SESSION['username']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['username']);
  unset($_SESSION['acesso']);
  header('location:index.php');
  exit;
}

$logado = $_SESSION['username'];
$acesso = $_SESSION['acesso'];
?>
<html>
<head>
<title>Cadasatro Usuario</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/tabelaadmin.css">
<style>
    *{
        margin:0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        background-color: #ddd;
    }
    .container{
        display: flex;
        flex-direction: column;
        height: 400px;
        align-items: center;
        justify-content: center;
        
    }
    form{
        background-color: #1c1c1c;
        display:flex;
        flex-direction: column;
        margin: 0;
        padding: 40px;
        border-radius: 20px;
        border: 1px solid black;
    }
    form h1{
        font-size: 40px;
        color: #c18845;
    }
    .botao-radio{
        display:flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        color: white;
        font-size: 20px;
    }
    .botao-radio input{
        height: 20px;
        width: 20px;
        border-radius: 0px;
    }
    .botao-enviar input{
        background-color: #c18845;
        border: none;
        color: white;
        width: 100%;
        height: 10%;
    }
    input{
        margin: 5px;
        padding: 15px;
    }
</style>
</head>
<body>

<?php

include 'menu.php';
?>

<?php
//Só administrador pode acessar o programa.
if($_SESSION['acesso']=="Admin"){

	if(isset($_GET["erro"])){
		if ($_GET["erro"]==1){
			echo "<h2>Caracter Proibido</h2>";
		}
		if ($_GET["erro"]==2){
			echo "<h2>Email já cadastrado</h2>";
		}
		
	}
?>
	<div class="container">
	    <form action="usuariocadastrarcodigo.php" method="post">
	        <h1>Cadastrar Usuários</h1>
	        <input type="text" name="nome" placeholder="Seu nome..." required>		
	        <input type="email" name="email" placeholder="Seu e-mail..." required>
	        <input type="password" name="senha" placeholder="Sua senha..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="A senha deve conter pelo menos um caracter maiúsculo, um minúsculo, um número e no mínimo oito caracteres" required>	
	        <div class="botao-radio">
	            <input  type="radio" name="acesso" value="Comum" required><label>Comum</label>
	            <input  type="radio" name="acesso" value="Admin"><label>Admin</label>
	        </div>	
	        <div class="botao-enviar">
	        <input type="submit" value="Enviar">
	        </div>
	    </form>
    </div>
<?php
}else{
	echo "Você não tem acesso a esta função.";
}
?>

</body>
</html>