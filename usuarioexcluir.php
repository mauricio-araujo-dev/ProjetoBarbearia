<?php
session_start();
if ($_SESSION['acesso']=="Admin"){

// Dados do Formulário
$campoid = $_GET["id"];

//Faz a conexão com o BD.
require 'conexao.php';

//Apagar da tabela usuários o registro com o id
$sql = "DELETE FROM usuarios WHERE id=$campoid";

 if($conn->query($sql) === TRUE) {
 echo "Usuario apagado";
          header( 'Location: usuarioscontrolar.php');
            }else{
			echo "Erro: ". $conn->error;  
            }  
			$conn->close();
} else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
?>