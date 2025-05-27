<?php

    if (isset($_POST["submit"])) {
        include_once("../includes/config.php");

          $nome = $_POST["nome"];

            $result = $conexao->prepare("INSERT INTO clientes(nomeCliente) VALUES (?)");
            $result->bind_param("s", $nome);
            $result->execute();
            $result->close();

            header('Location: gerenciar_clientes.php');

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar cliente - Vendas Manager</title>
    <link rel="stylesheet" href="../assets/css/criar_clientes.css">
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
            <a href="login.php"><i class="fi fi-rc-arrow-left-from-line"></i>Sair</a>
        </div>
    </nav>
    <main>
            <div class="create-clients-title">
                <h1>Criar cliente</h1>
            </div>
        <div class="form-create-client">
            <form action="criar_clientes.php" method="POST">
                <label for="nome">Nome:</label>
                <div class="flex-form">
                    <input type="text" id="nome" name="nome" required>
                    <button type="submit" name="submit">Criar</button>
                </div>
            </form>
        </div>
        <section class="back-button">
        <a href="clientes.php"><span>Voltar</span></a>
    </section>
    </main>
</body>
</html>