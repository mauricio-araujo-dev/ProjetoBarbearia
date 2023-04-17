<?php
session_start();

//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela clientes)
$sql = "SELECT * FROM clientes WHERE Id = $campoid";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/estilo.css">
        <title>Editar Cliente</title>
    </head>
    <body>
        <form action="clienteditar.php" method="post">
            <h3>Editar Cliente Id: <?php echo $row["Id"]; ?></h3>
            <input type="hidden" name="id" value="<?php echo $row["Id"]; ?>">
            <input type="text" name="cpf" value="<?php echo $row["Cpf"]; ?>" placeholder="Seu Cpf..." required>
            <input type="text" name="endereco" value="<?php echo $row["Endereco"]; ?>" placeholder="Seu Endereço..." required>
             <input type="text" name="telefone" value="<?php echo $row["Telefone"]; ?>" placeholder="Seu Número..." required>
        <?php if ($row["Acesso"]=="Admin"){ ?>
            <input type="radio" name="acesso" value="Comum" required><label>Comum</label>
            <input type="radio" name="acesso" value="Admin" checked="true"><label>Admin</label>        
        <?php }else{ ?>
            <input type="radio" name="acesso" value="Comum" required checked="true"><label>Comum</label>
            <input type="radio" name="acesso" value="Admin"><label>Admin</label>        
        <?php } ?>      
            <input type="submit" value="Editar">
        </form>
    </body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}

	//Fecha a conexão.	
	$conn->close();
	
//Se o usuário não tem acesso.

?> 