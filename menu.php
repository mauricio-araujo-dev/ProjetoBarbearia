<?php
if(isset($_SESSION['id'])) {
$id = $_SESSION['id'];
}
?>
<html>
    <head>
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
<link rel="stylesheet" href="css/menu.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400&display=swap');
    *{font-family: 'Josefin Sans', sans-serif;}
</style>
</head>

<body>
    <nav>
    <ul>
        <div class="logo">
            <li>
                <img src="imagens/logos/Logo_Branca.png" height="160" width="160">
            </li>
        </div>
        <div class="items">
            <li><a href="index.php">Home</a></li>
            <li><a href="servicos.php">Serviços</a></li>
            <li><a href="produtos.php">Produtos</a></li>
            <li><a href="agendamento.php">Agendamento</a></li>


<?php 
//Menu só aparece para os administradores.
if(isset($_SESSION['acesso']) && $_SESSION['acesso']=="Admin"){
    echo "<li class='dropdown'><a href='javascript:void(0)' class='dropbtn'>Administração</a>";
	echo "<div class='dropdown-content'>
	        <a href='usuarioscontrolar.php?pag=1'>Controlar Usuários</a>
	        <a href='usuariocadastrartela.php'>Cadastrar Usuário</a>
	        <a href= 'controlarprodutos.php'>Controle de Produtos</a>
	        <a href= 'veragendamentos.php'>Ver agendamentos</a>
	        </div>
	        </li>";
	}if(!isset($_SESSION['username'])){ ?>	</div>
	<li><a href="usuariologarform.html" class="items"> 
	   <i class="bi bi-person" style="font-size: 21px; margin-right: 7px;"></i>
	    Entrar</a></li>
<?php

	}else{

?>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn"><i class="bi bi-person-circle"></i> <?php echo $_SESSION["username"];?></a>
    <div class="dropdown-content">
      <a href="veragendamentosperfil.php">Meus agendamentos</a>
      <a href="<?php echo 'editarperfilform.php?id='.$id?>">Editar Perfil</a>
      <a href="Deslogar.php">Deslogar</a>
      
    </div>
  </li>
<?php }
 ?>
</ul>
</body>
</nav>
</html>
<script>
    const menu = document.querySelector('nav');
    
    function activeScroll(){
        menu.classList.toggle('ativo', scrollY > 20);
    }
    
    window.addEventListener('scroll', activeScroll);
</script>