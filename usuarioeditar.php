<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';

//Dados do formulário
$campoid = filter_input(INPUT_POST, 'id');
$campousername = filter_input(INPUT_POST, 'username');
$campoemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$campoacesso = filter_input(INPUT_POST, 'acesso');

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE usuarios SET username='" . $campousername . "', email='" . $campoemail . "', acesso='" . $campoacesso . "' WHERE id=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  include 'log.php';
  echo "Registro atualizado.";
  header( 'refresh:2;url=usuarioscontrolar.php?pag=1'); //Redireciona para o form	

    
} else {
  echo "Erro: " . $conn->error;
}


//Fecha a conexão.
	$conn->close();
	

?> 