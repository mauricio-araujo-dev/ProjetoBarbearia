<?php
    session_start();
    $logado='';
    if(isset($_SESSION['acesso'])){
    $logado = $_SESSION['username'];
    }
    require  'conexao.php';

    $sqlCortes = "SELECT * FROM servicos WHERE Tipo='Cortes'";
    $resultCortes = $conn->query($sqlCortes);
    $sqlBarbas = "SELECT * FROM servicos WHERE Tipo='Barbas'";
    $resultBarbas = $conn->query($sqlBarbas);
    $sqlCombos = "SELECT * FROM servicos WHERE Tipo='Combos'";
    $resultCombos = $conn->query($sqlCombos);
    
?>

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
<title>Prime Barber | Serviços</title>
    <style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
body {
  font-family: "Poppins", sans-serif;
  font-size: 16px;
  line-height: 22px;
  color: #fff;
  background-color: #544a41;
}
ul{
    background-color: #1c1c1c;
}
.main {
  width: 100%;
  margin-top: 40px;
}
.section-title {
  text-align: center;
  margin-bottom: 1.5rem;
}
.section-title h2 {
  text-transform: capitalize;
  font-size: 40px;
  position: relative;
  display: inline-block;
  padding-bottom: 20px;
  margin-bottom: 10px;
}
.section-title h2:before {
  content: "";
  position: absolute;
  width: 200px;
  height: 3px;
  background-color: #c18845;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}

.menus {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}
.menu-column {
  width: 30%;
  margin-left: 40px;
}
.menu-column h4 {
  text-transform: capitalize;
  font-size: 24px;
  font-weight: 500;
  margin-bottom: 20px;
  position: relative;
  padding-bottom: 10px;
}
.menu-column h4:before {
  content: "";
  position: absolute;
  width: 60px;
  height: 2px;
  background-color: #c18845;
  bottom: 0;
}
.single-menu {
  display: flex;
  align-items: center;
  margin-top: 20px;
}
.single-menu img {
  max-width: 120px;
  max-height: 120px;
  border: 1px solid #c18845;
  padding: 3px;
  margin-right: 15px;
  transition: 0.2s;
}
.single-menu img:hover {
    box-shadow: 0px 10px 5px 0px rgba(0, 0, 0, 0.548);
}
.single-menu .menu-content h5 {
  text-transform: capitalize;
  font-size: 20px;
  font-weight: 500;
  border-bottom: 1px dashed #222;
  padding-bottom: 5px;
  margin-bottom: 10px;
}
.single-menu .menu-content h5 span {
  color: #c18845;
  margin-left: 10px;
  float: right;
  font-weight: 600;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.single-menu .menu-content p{
    font-size: 15px;
}
    </style>
</head>
<body>
    
        <?php
    
    include 'menu.php'
    
    ?>
    
    <div class="main">
        <div class="section-title">
            <h2>Nossos serviços</h2>
            <p>Veja os cortes disponíveis e agende já o seu!</p>
        </div>
        <div class="menus">
            <div class="menu-column">
                <h4>Cortes</h4>
                <?php
                if ($resultCortes->num_rows > 0) {
                while ($rowCortes = $resultCortes->fetch_assoc()) {
                    echo'<div class="single-menu">
                    <img src="'. $rowCortes['ImagemURL'] . '">
                    <div class="menu-content">
                        <h5>'. $rowCortes['Nome'] . '<span> R$'.$rowCortes['Valor'].' </span></h5>
                        <p>'. $rowCortes['Descricao'] . '</p>
                    </div>
                </div>';
                    }
                }   
                ?>       
            </div>
            
            <div class="menu-column">
                <h4>Barbas</h4>
                <?php
                if ($resultBarbas->num_rows > 0) {
                while ($rowBarbas = $resultBarbas->fetch_assoc()) {
                    echo'<div class="single-menu">
                    <img src="'. $rowBarbas['ImagemURL'] . '">
                    <div class="menu-content">
                        <h5>'. $rowBarbas['Nome'] . '<span> R$'.$rowBarbas['Valor'].' </span></h5>
                        <p>'. $rowBarbas['Descricao'] . '</p>
                    </div>
                </div>';
                }
            }
                ?>
            </div>
            <div class="menu-column">
                <h4>Combos</h4>
                    <?php
                if ($resultCombos->num_rows > 0) {
                while ($rowCombos = $resultCombos->fetch_assoc()) {
                    echo'<div class="single-menu">
                    <img src="'. $rowCombos['ImagemURL'] . '">
                    <div class="menu-content">
                        <h5>'. $rowCombos['Nome'] . '<span> R$'.$rowCombos['Valor'].' </span></h5>
                        <p>'. $rowCombos['Descricao'] . '</p>
                    </div>
                </div>';
                }
            }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>