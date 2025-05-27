<?php
        include_once("../includes/config.php");
        include('../includes/verifica_login.php');
        $stmt = mysqli_query($conexao, "SELECT idCliente, nomeCliente FROM clientes");

    if (!empty($_GET['idAgendamento'])) {

        $idAgend = $_GET['idAgendamento'];

        $sqlSelect = "SELECT * FROM agendamentos WHERE idAgendamento=$idAgend";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0) {
            while($agendData=mysqli_fetch_assoc($result)) {
                $titulo = $agendData["titulo"];
                $desc = $agendData["descricao"];
                $initialDate = $agendData["dataInicio"];
                $finalDate = $agendData["dataFim"];
                $cliente = $agendData["idCliente"];
            }
        } else {
            header('Location: gerenciar_agendamentos.php');
        };
    } else {
        header('Location: gerenciar_agendamentos.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar agendamento - Vendas Manager</title>
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
            <a href="../includes/logout.php"><i class="fi fi-rc-arrow-left-from-line"></i>Sair</a>
        </div>
    </nav>
    <main>
            <div class="create-agend-title">
                <h1>Editar agendamento</h1>
            </div>
        <div class="form-create-agend">
            <form action="../includes/salvar_edicao.php" method="POST">
                <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" value="<?php echo $titulo ?>" required>
                <label for="desc">Descrição:</label>
                    <textarea id="desc" name="desc" required><?php echo htmlspecialchars($desc); ?></textarea>
                <div class="form-date">
                    <div class="form-grid-initial">
                        <label for="initial-date">Data inicial:</label>
                            <input type="date" id="initial-date" name="initial-date" value="<?php echo $initialDate ?>"required>
                    </div>
                    <div class="form-grid-final">
                        <label for="final-date">Data final:</label>
                            <input type="date" id="final-date" name="final-date" value="<?php echo $finalDate ?>" required>
                    </div>
                </div>
                        <label for="cliente">Cliente:</label>
                            <select name="cliente" id="cliente" required>
                                <?php 
                        while ($data = $stmt->fetch_assoc()){
                            $selected = ($cliente == $data['idCliente'])?'selected':'';
                            echo '<option value="'.htmlspecialchars($data['idCliente']).'" '.$selected.'>'.htmlspecialchars($data['nomeCliente']).'</option>';
                        }
                                ?>
                        </select>
                       <input type="hidden" name="id" value="<?php echo $idAgend ?>"> 
                        <button type="submit" name="update" id="update">Editar</button>
            </form>
        </div>
        <section class="back-button">
        <a href="gerenciar_agendamentos.php"><span>Voltar</span></a>
    </section>
    </main>
</body>
</html>