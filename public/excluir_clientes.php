<?php
    include_once("../includes/config.php");

    if (!empty($_GET['idCliente'])) {

        $idCliente = $_GET['idCliente'];

        $sqlSelect = "SELECT * FROM clientes WHERE idCliente=$idCliente";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0) {
            $sqlDelete = "DELETE FROM clientes where idCliente=$idCliente";
            $resultDelete = $conexao->query($sqlDelete);
            header('Location: gerenciar_clientes.php');
            }
        } else {
            header('Location: gerenciar_clientes.php');
        };
   
?>