<?php

include_once("../includes/config.php");
include('../includes/verifica_login.php');

$sqlClient = "SELECT * FROM clientes ORDER BY idCliente ASC";

$resultClient = $conexao->query($sqlClient);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar clientes - Vendas Manager</title>
    <link rel="stylesheet" href="../assets/css/gerenciar_clientes.css">
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
            <div class="manage-clients-title">
                <h1>Gerenciar clientes</h1>
            </div>
        <div class="table-manage-client">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($clientData = mysqli_fetch_assoc($resultClient)) {
                        echo "<tr>";
                        echo "<td>".$clientData['idCliente'];
                        echo "<td>".$clientData['nomeCliente'];
                        echo "<td class='action'>
                        <a href='../includes/excluir_clientes.php?idCliente={$clientData['idCliente']}' onclick=\"return confirm('Tem certeza que deseja excluir este cliente?');\">
                        <button class='excluir-btn'>Excluir</button>
                        </a>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <section class="back-button">
        <a href="clientes.php"><span>Voltar</span></a>
    </section>
    </main>
</body>
</html>