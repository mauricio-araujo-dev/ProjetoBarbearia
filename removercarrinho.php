<?php 
session_start();
require 'conexao.php';
//Checa se foi recebido o id do material, se o mesmo é um numero, se existe um carrinho e se o produto está no carrinho
if(isset($_GET['id_produto']) && is_numeric(($_GET['id_produto'])) && isset($_SESSION['carrinho']) && isset($_SESSION['carrinho'][$_GET['id_produto']])){
    unset($_SESSION['carrinho'][$_GET['id_produto']]);
    header('location: testecarrinhotela.php');
}
?>