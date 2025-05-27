<?php
    include_once("../includes/config.php");

    if (!empty($_GET['idAgendamento'])) {

        $idAgend = $_GET['idAgendamento'];

        $sqlSelect = "SELECT * FROM agendamentos WHERE idAgendamento=$idAgend";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0) {
            $sqlDelete = "DELETE FROM agendamentos where idAgendamento=$idAgend";
            $resultDelete = $conexao->query($sqlDelete);
            header('Location: ../public/gerenciar_agendamentos.php');
            }
        } else {
            header('Location: ../public/gerenciar_agendamentos.php');
        };
   
?>