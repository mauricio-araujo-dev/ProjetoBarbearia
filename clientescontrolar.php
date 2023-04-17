<?php
session_start();

//Cria variáveis com a sessão.
$logado = $_SESSION['username'];


//Faz a conexão com o BD.
require 'conexao.php';

//Lê a página que será exibida
$id = $_GET["pag"];

//Quantidade de registros a serem exibidos
$total = 5;

//Indica o registro limite para paginação
if($id!=1){
    $id = $id -1;
    $id = $id * $total + 1;
}

$id--;


//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM usuarios ORDER BY id LIMIT $id, $total";

//Conta a quantidade total de registros
$sql1 = "SELECT count(*) as contagem FROM usuarios";

//Executa o SQL
$result = $conn->query($sql);
$result1 = $conn->query($sql1);

//Recupera o resultado da contagem
$row1 = $result1->fetch_assoc();
$contagem = $row1["contagem"];

if($contagem%$total==0){
    $contagem=$contagem/$total;
}else{
    $contagem=$contagem/$total + 1;    
}

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
	<title>Controle de Clientes</title>	
<body>
<style>
</style>
</head>

<body>

<?php
include 'menu.php'
?>	

<div class="content">	
	<h1>Controle de Clientes</h1>
<table>
<tr><th>Id</th><th>Nome</th><th>Cpf</th><th>Telefone</th><th>Endereço</th><th colspan="2">Ações</td></tr>
				
<?php
 while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Id"] . "</td><td>" . $row["Nome"] . "</td><td>" . $row["Cpf"] . "</td><td>" . $row["Telefone"] . "</td><td>" . $row["Endereco"] . "</td>";
echo "<td><a href='clienteditarform.php?id=" . $row["Id"] . "'><img src='imagens/pencil-square.svg'  width='35' height='35' alt='Editar Usuário'></a></td><td><a href='clientexcluir.php?id=" . $row["Id"] . "'><img src='imagens/dash-circle-fill-red.svg' width='35' height='35' alt='Excluir Usuário'</a></td></tr>";
	  }
?>
				
</table>
</div>
		<div class="pagination">
    <?php for($i=1; $i <= $contagem; $i++) {
            echo "<a href='clientescontrolar.php?pag=$i'>$i</a>";
    } 
	?>   

</div> 
		<a href="clientecadastrartela.php"><img src='imagens/plus-square-fill.svg' width="35" height="35" alt='Editar Usuário'></a>
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