<?php

    include_once("../includes/config.php");

    if (isset($_POST['update'])) {
        $titulo = $_POST["titulo"];
        $desc = $_POST["desc"];
        $initialDate = $_POST["initial-date"];
        $finalDate = $_POST["final-date"];
        $cliente = $_POST["cliente"];
        $idAgend = $_POST["id"];

        $sqlUpdate = "UPDATE agendamentos SET titulo='$titulo', descricao='$desc', dataInicio='$initialDate', dataFim='$finalDate', idCliente='$cliente' WHERE idAgendamento='$idAgend'";

        $result = $conexao->query($sqlUpdate);
    }

    header('Location: ../public/gerenciar_agendamentos.php');

?>