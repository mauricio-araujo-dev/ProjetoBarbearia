<?php
session_start();
//Verifica o acesso.

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM produtos";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
?>

<?php

if(!isset ($_SESSION['username']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['username']);
  unset($_SESSION['acesso']);
  header('location:index.html');
  exit;
}

$logado = $_SESSION['username'];
$acesso = $_SESSION['acesso'];
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="./css/tabelaprodutos.css">
<link rel="icon" type="image/x-icon" href="./images/favicon.png">		
<title>Prime Barber | Controle de Produtos</title>
<body>
<style>
{background-color: white
}
</style>
</head>

<body>

<?php
include 'menu.php'
?>	
	
	<h1>Lista de Produtos</h1>
<table>
<tr><th>Id</th><th>Nome</th><th>Marca</th><th>Preço</th><th>Quantidade</td></tr>
				
<?php
 while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Id"] . "</td><td>" . $row["Nome"] . "</td><td>" . $row["Marca"] . "</td><td>" . $row["Preco"] . "</td><td>" . $row["Quantidade"] . "</td>";
	  }
?>
				
</table>	
	</body>
</html>

<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}
	
	$conn->close();
//Se o usuário não usou o formulário

?> 