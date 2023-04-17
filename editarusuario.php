<?php
session_start();

//Verifica o acesso.

//Dados do formulário
$campoid = filter_input(INPUT_POST, 'id');
$campousername = filter_input(INPUT_POST, 'username');
$campoemail = filter_input(INPUT_POST, 'email');
$campoendereco = filter_input(INPUT_POST, 'endereco');

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE usuarios SET username='" . $campousername . "', email='" . $campoemail . "', endereco='" .$campoendereco . "'   WHERE id= " . $campoid ;
//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE ) {
    $_SESSION["username"] = $campousername;
   
}
else {
  echo "Erro: " . $conn->error;
}
    header('Location: editarperfilform.php?id='. $campoid); //Redireciona para o form	

//Fecha a conexão.
	$conn->close();
	

?>