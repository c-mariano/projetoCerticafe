<?php
        include_once("../includes/config.php");

        $stmt = mysqli_query($conexao, "SELECT idCliente, nomeCliente FROM clientes");

    if (isset($_POST["submit"])) {

        $titulo = $_POST["titulo"];
        $desc = $_POST["desc"];
        $initialDate = $_POST["initial-date"];
        $finalDate = $_POST["final-date"];
        $cliente = $_POST["cliente"];

        $stmtInsert = $conexao->prepare("INSERT INTO agendamentos(titulo, descricao, dataInicio, dataFim, idCliente) VALUES (?, ?, ?, ?, ?)");
        $stmtInsert->bind_param("ssssi", $titulo, $desc, $initialDate, $finalDate, $cliente);
        $stmtInsert->execute();
        $stmtInsert->close();

        header('Location: gerenciar_agendamentos.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar agendamento - Vendas Manager</title>
    <link rel="stylesheet" href="../assets/css/criar_agendamentos.css">
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
            <div class="create-agend-title">
                <h1>Criar agendamento</h1>
            </div>
        <div class="form-create-agend">
            <form action="criar_agendamentos.php" method="POST">
                <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" required>
                <label for="desc">Descrição:</label>
                    <textarea id="desc" name="desc" required></textarea>
                <div class="form-date">
                    <div class="form-grid-initial">
                        <label for="initial-date">Data inicial:</label>
                            <input type="date" id="initial-date" name="initial-date" required>
                    </div>
                    <div class="form-grid-final">
                        <label for="final-date">Data final:</label>
                            <input type="date" id="final-date" name="final-date" required>
                    </div>
                </div>
                        <label for="cliente">Cliente:</label>
                            <select name="cliente" id="cliente" required>
                                <option value="" disabled selected>Selecione um cliente</option>
                                <?php 
                        while ($data = $stmt->fetch_assoc()){
                            echo '<option value="'.htmlspecialchars($data['idCliente']).'">'.htmlspecialchars($data['nomeCliente']).'</option>';
                        }
                                ?>
                        </select>
                        <button type="submit" name="submit">Criar</button>
            </form>
        </div>
        <section class="back-button">
        <a href="agendamentos.php"><span>Voltar</span></a>
    </section>
    </main>
</body>
</html>