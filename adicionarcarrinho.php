<?php
    session_start();
    require 'conexao.php';
    //Checa se foi recebido o id do material e se o mesmo é um numero
    if(isset($_GET['id']) && is_numeric(($_GET['id']))){
        $id_produto = $_GET['id'];

        //Busca as informações do material adicionado
        $sql = "SELECT * FROM produtos WHERE id = " . $id_produto;
        $resultado = $conn->query($sql);

        //Checa se a consulta trouxe resultados
        if($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            //Checando se o carrinho ja existe
            if(isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])){
                //Checando se o produto já foi adicionado ao carrinho anteriormente
                if(array_key_exists($id_produto, $_SESSION['carrinho'])){
                    echo '<h1> Produto já adicionado ao carrinho </h1>';
                } else {
                    //adicionando produto ao carrinho
                    $_SESSION['carrinho'][$id_produto] = $id_produto;
                    header('location: produtos.php');
                }
            } else {
                //adicionando o primeiro item ao carrinho
                $_SESSION['carrinho'] = array($id_produto => $id_produto);
                header('location: produtos.php');
            }
        } else {
            echo "<h1>Esse material não existe</h1>";
        }

    } else {
        echo "<h1>Nenhum material selecionado</h1>";
    }
    ?>