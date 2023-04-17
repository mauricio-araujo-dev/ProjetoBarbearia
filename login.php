<?php
session_start();
//Se o usuário não usou o formulário
if (!isset($_POST['senha'])){
    header('Location: index.php'); //Redireciona para o form
    exit; // Interrompe o Script
}
// Dados do Formulário
$campoemail = filter_input(INPUT_POST, 'email');
$camposenha = filter_input(INPUT_POST, 'senha');

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "SELECT * FROM usuarios where Email='$campoemail' and Status = 'ativo'";

//Executa o SQL
$result = $conn->query($sql);

// Cria uma matriz com o resultado da consulta
$row = $result->fetch_assoc(); 
 
 if ($result->num_rows > 0) {
 
//$verificado = password_verify($camposenha, $row["Senha"]);
			//if($verificado){	
        if($camposenha == $row["Senha"]){
			$_SESSION['username'] = $row["Username"];
            $_SESSION['acesso'] = $row["Acesso"];
            $_SESSION['id'] = $row["Id"];
			$_SESSION['email'] = $row["Email"];	
            header('Location: index.php');
            exit;
        }else{
          header( "refresh:3;url=usuariologarform.html" );
            echo 'Senha Invalida';  
            exit;  
        }

if ($campoemail == $row["Email"]){
    trigger_error("Usuario não encontrado", E_USER_ERROR);
}
    
 else {
    header('Location: index.php'); //Redireciona para o form
    exit; // Interrompe o Script
}
 }

$conn->close();
?> 