<?php
    include_once("config.php");

    if (!empty($_GET['idCliente'])) {

        $idCliente = $_GET['idCliente'];

        $sqlSelect = "SELECT * FROM clientes WHERE idCliente=$idCliente";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0) {
            $sqlDelete = "DELETE FROM clientes where idCliente=$idCliente";
            $resultDelete = $conexao->query($sqlDelete);
            header('Location: ../public/gerenciar_clientes.php');
            }
        } else {
            header('Location: ../public/gerenciar_clientes.php');
        };
   
?>