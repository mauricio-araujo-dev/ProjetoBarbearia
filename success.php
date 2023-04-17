<?php
session_start();
// Include configuration file 
require_once 'conexao.php';

    $session_id = $_GET['session_id'];   
    
        // Include Stripe PHP library 
        require_once 'stripe-php/init.php';
        
        // Set API key
        \Stripe\Stripe::setApiKey('sk_test_51Lps7ZEZbXquXKbDZcL5sNJ3BZE2NIaRhNl0kdgWe4WTXkBpPmcHzohTdD9Wy8LnTToZUopvvkUdSItYXMnS5yiH00WBeQMgD8');
        
        // Fetch the Checkout Session to display the JSON result on the success page
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        }
// Retrieves the details of customer
$teste = "0";
$id_cliente = $checkout_session->metadata->id_cliente;
$quantidade = json_decode($checkout_session->metadata->$teste);
$valor = $checkout_session->amount_total / 100;
$sql = "INSERT INTO vendas(total, id_usuario) VALUES($valor, $id_cliente)";
if ($conn->query($sql) === TRUE) {
    $id_compra = $conn->insert_id;
    foreach($quantidade as $produto) {
        $produtoId = $produto->produto;
        $quantidadeProduto = $produto->quantidade;
        $sql1 = "INSERT INTO produtos_em_vendas(id_venda, id_produto, quantidade) VALUES($id_compra, $produtoId, $quantidadeProduto)";
        $conn->query($sql1);
    }
    echo "<script>window.location.href = 'index.php'</script>";
}

//Fecha a conexão.
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Pagamento</title>
<meta charset="utf-8">
<!-- Stylesheet file -->
<link href="css/style.css" rel="stylesheet">
</head>
<body class="App">
	<h1></h1>
	<div class="wrapper">
		
	</div>
</body>
</html>