<?php
    include('../includes/verifica_login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Vendas Manager</title>
    <link rel="stylesheet" href="../assets/css/home.css">
    
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css'>
</head>
<body>
    <nav class="sidebar">
        <div class="nav-top">
            <img src="../assets/img/logo-menor-branca.png" alt="logo">
            <a href="home.php">Página Inicial</a>
        </div>
        <div class="nav-bottom">
            <a href="../includes/logout.php"><i class="fi fi-rc-arrow-left-from-line"></i>Sair</a>
        </div>
    </nav>
    <main>
            <div class="homepage-title">
                <h1>Bem-vindo ao Vendas Manager</h1>
                <h3>Organize seus agendamentos, gerencie seus clientes e aumente sua performance de vendas.</h3>
            </div>
        <div class="homepage-buttons">
            <a href="agendamentos.php"><span id="access-agn-btn"><img src="../assets/icons/calendario.png" alt="ícone calendário">Acessar agendamentos</span></a>
            <a href="clientes.php"><span id="access-cli-btn"><img src="../assets/icons/usuario.png" alt="ícone usuário">Acessar Clientes</span></a>
        </div>
    </main>
</body>
</html>