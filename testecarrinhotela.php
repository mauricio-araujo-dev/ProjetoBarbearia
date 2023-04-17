<?php
require 'conexao.php';

session_start();
// $qtd_carrinho = isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : 0;
// echo $qtd_carrinho;

$produtos_no_carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();


// foreach ($materiais_no_carrinho as $material) {
//    echo $material . " ";
// }

$produtos_para_pesquisar = " ";
foreach ($produtos_no_carrinho as $produto) {
    $auxiliar = $produtos_para_pesquisar;
    $produtos_para_pesquisar = $produto . " , " . $auxiliar;
}
$sql = "SELECT * FROM produtos WHERE id IN (" . $produtos_para_pesquisar . "0 )";

$result = $conn->query($sql);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="apple-touch-icon" sizes="57x57" href="imagens/logos/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="imagens/logos/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="imagens/logos/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="imagens/logos/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="imagens/logos/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="imagens/logos/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="imagens/logos/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="imagens/logos/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="imagens/logos/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="imagens/logos/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="imagens/logos/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="imagens/logos/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="imagens/logos/favicon-16x16.png">
<link rel="manifest" href="imagens/logos/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="imagens/logos/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <title>Prime Barber | Carrinho</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #1c1c1c;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        body {
            height: fit-content;
        }

        .container {
            width: 100%;
            height: 100%;
        }

        .titulo {
            margin-top: 3%;
            width: 100%;
            font-size: 2.5rem;
            color: #c18845;
            text-align: center;
        }

        .tabela {
            height: 100%;
            color: #998675;
            padding: 40px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        table {
            height: 100%;
            width: 90%;
        }

        table th {
            text-align: center;
            letter-spacing: 1px;
            font-size: 2rem;
            font-weight: 500;
            border-bottom: 1px solid wheat;
        }

        table td {
            text-align: center;
            border-bottom: 1px solid wheat;
            padding: 60px;
            font-size: 1.3rem;
            justify-content: center;
        }

        .produto {
            display: flex;
        }

        .produto img {
            display: flex;
            margin-right: 15px;
        }

        .texto-produto {
            display: flex;
            flex-direction: column;
        }

        .texto-produto a {
            text-decoration: none;
            color: white;
        }

        .texto-produto a:hover {
            text-decoration: underline;
        }

        .total-compra {
            color: white;
            justify-content: space-around;
            display: flex;
            width: 100%;
            align-items: center;
        }

        .descricao-compra {
            width: 20%;
            display: flex;
            padding: 10px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .remover-item{
            font-size: 1rem;
        }

        .botao-comprar {
            font-size: 1.2rem;
            transition: 0.5s;
            width: 100%;
            padding: 20px;
            background-color: #c18845;
            color: white;
            border: 0;
            border-radius: 2px;
        }

        .botao-comprar:hover {
            background-color: wheat;
            cursor: pointer;
            color: black;
        }

        .texto-bottom {
            height: 30px;
            width: 50%;
            display: flex;
            justify-content: center;
            color: #998675;
            font-size: 1rem;
        }

        .info-compra {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .adicionar-produtos{
            color: white;
            font-size: 1.1rem;
            text-decoration:none;
        }
        .adicionar-produtos:hover{
            text-decoration: underline;
        }

        .info-compra p {
            margin: 0px 5px 5px 0px;
            font-size: 1.6rem;
        }

        .input-quantidade {
            background-color: #1c1c1c;
            border: 1px solid #998675;
            color: #998675;
            border-radius: 5px;
            height: 100%;
            width: 15%;
            text-align: center;
            font-size: 1.1rem;
        }
    </style>
    <script src="https://js.stripe.com/v3/"></script>

</head>

<body>
    <div class="container">
        <div class="titulo">
            <h2>Carrinho</h2>
        </div>
        <div class="tabela">
            <table>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                </tr>
                <?php

                if ($result->num_rows > 0) {



                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                    <td class="produto" data-id="'.$row["Id"].'" data-preco="'.$row["Preco"].'"><img src="./imagens/produtos/'.$row['imagem'].'" width="50px" height="50px"><div class="texto-produto"><p>' . $row["Nome"] . '</p> <a class="remover-item" href="removercarrinho.php?id_produto=' . $row["Id"] . '">Remover item</a></div></td>
                    <td>R$' . $row["Preco"] . '</td>
                    <td><input type="number" class="input-quantidade" id="quantidade-'.$row["Id"].'" min="1" value="1"/></td>
                    <td class="preco-calcular" id="total-'.$row["Id"].'">R$' .$row["Preco"]. '</td> 
                </tr>
                '; 
                    }
                } else {
                    echo '<td colspan="5" style="text-align:center;"> Nenhum produto adicionado.
                    <a class="adicionar-produtos" href="produtos.php">
                    <i class="bi bi-plus-circle-fill"></i> Adicionar Produto(s)</a> 
                    </td>';
                }

                ?>

            </table>
        </div>
        <div class="total-compra">
            <div class="texto-bottom">
                <p>ANTES DE FINALIZAR A SUA COMPRA, CERTIFIQUE-SE DO QUE ESTÁ COMPRANDO.</p>
            </div>
            <div class="descricao-compra">
                <div class="info-compra">
                    <p>Total a pagar: </p>
                    <p id="preco">R$ </p>
                </div>
                <input class="botao-comprar" type="submit" value="Finalizar Compra">
            </div>
        </div>



    </div>
    <script>
        let produtos = document.querySelectorAll(".produto");
        produtos.forEach((produto)=> {
            let totalproduto = document.querySelector(`#total-${produto.dataset.id}`)
            let quantidadeproduto = document.querySelector(`#quantidade-${produto.dataset.id}`)
            quantidadeproduto.addEventListener('input',()=>{
                let valorproduto = quantidadeproduto.value * produto.dataset.preco;
                totalproduto.innerHTML = `R$${valorproduto}`
                valorfinal();
            })
        } )
        let valorfinal=() => {
            let valor = 0;
            let precos = document.querySelectorAll(".preco-calcular")
            precos.forEach((preco)=>{
                valor += parseFloat(preco.textContent.substr(2))
            })
            let precodiv = document.querySelector("#preco")
            precodiv.innerHTML = `R$${valor}`
            return valor;
        }
        let retornarProdutosQuantidade = () => {
            let produtosQuantidade = [];
            produtos.forEach((produto, index) => {
                let quantidade = document.querySelector(`#quantidade-${produto.dataset.id}`);
                let produtoId = produto.dataset.id;

                const quantidadeObj = {
                    produto: produtoId,
                    quantidade: quantidade.value
                }

                produtosQuantidade.push(quantidadeObj);
            })
            console.log(produtosQuantidade)
            return produtosQuantidade;
        }
        var createCheckoutSession = function(stripe) {
            return fetch("./stripe_charge.php", {
                method: "POST",
                headers: {
                    "Content-Type": "aplication/json",
                },
                body: JSON.stringify({
                    checkoutSession: 1,
                    Price: valorfinal(),
                    quantidade: retornarProdutosQuantidade()
                }),
            }).then(function(result) {
                return result.json();
            });
        };
        var handleResult = function(result) {
            if (result.error) {
                console.log(result.error.message);
            }
        };
        var stripe = Stripe('<?php echo 'pk_test_51Lps7ZEZbXquXKbDrmg1H75YmjlMdTbfrIXaUpXxLCfnysUZNKHJDYn1fWjIOIh5fQyTkOjbb7tIeNZPpjjeGhvc001H2zAYqU'; ?>');
        let btnComprar = document.querySelector('.botao-comprar')
        btnComprar.addEventListener('click', (e) => {
            console.log('Vasco');
            
            createCheckoutSession().then(function(data) {
                if (data.sessionId) {
                    stripe.redirectToCheckout({
                        sessionId: data.sessionId,
                    }).then(handleResult);
                } else {
                    handleResult(data);
                }
            });
        })
        valorfinal();
    </script>
</body>

</html>