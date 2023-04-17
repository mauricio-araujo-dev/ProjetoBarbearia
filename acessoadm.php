<?php
//Verifica se o usuário logou.
if(!isset ($_SESSION['username']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['username']);
  unset($_SESSION['acesso']);
  header('location:index.php');
  exit;
}else{
//Verifica se o acesso é Admin
	if($_SESSION['acesso']=!"Admin"){
		    header('location:index.php'); //Redireciona para o form
			exit; // Interrompe o Script
	}
}
?>