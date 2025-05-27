<?php

include_once("../includes/config.php");

$sql = "SELECT * FROM agendamentos JOIN clientes  ON agendamentos.idCliente = clientes.idCliente ORDER BY idAgendamento ASC ";

$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gerenciar agendamentos - Vendas Manager</title>
    <link rel="stylesheet" href="../assets/css/gerenciar_agendamentos.css" />
    <link rel="stylesheet" href="../assets/css/header.css" />
    <link rel="stylesheet" href="../assets/css/base.css" />
    <link
      rel="stylesheet"
      href="https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css"
    />
  </head>
  <body>
    <nav class="sidebar">
      <div class="nav-top">
        <img src="../assets/img/logo-menor-branca.png" alt="logo" />
        <a href="home.php">Página Inicial</a>
      </div>
      <div class="nav-bottom">
        <a href="login.php"
          ><i class="fi fi-rc-arrow-left-from-line"></i>Sair</a
        >
      </div>
    </nav>
    <main>
      <div class="manage-agend-title">
        <h1>Gerenciar agendamentos</h1>
      </div>
      <div class="table-manage-agend">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Descrição</th>
              <th>Cliente</th>
              <th>Data Inicio</th>
              <th>Data Fim</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($agendData = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo"<td>".$agendData['idAgendamento'];
              echo"<td>".$agendData['titulo'];
              echo"<td>".$agendData['descricao'];
              echo"<td>".$agendData['nomeCliente'];
              echo"<td>".$agendData['dataInicio'];
              echo"<td>".$agendData['dataFim'];
              echo "<td class='action'>
              <a href='editar_agendamentos.php?idAgendamento=$agendData[idAgendamento]'>
              <button class='editar-btn'>Editar</button>
              </a>
              <a href='excluir_agendamentos.php?idAgendamento={$agendData['idAgendamento']}'onclick=\"return confirm('Tem certeza que deseja excluir este agendamento?');\">
              <button class='excluir-btn'>Excluir</button>
              </a>
              </td>";
            }

            ?>
          </tbody>
          <!-- <tr>
            <td>1</td>
            <td>Agendamento do Marcelinho</td>
            <td>Reunião com Marcelinho, a fim de alinhar a situação</td>
            <td>Marcelinho</td>
            <td>25/05/2025</td>
            <td class="action">
              <button class="editar-btn">Editar</button
              ><button class="excluir-btn">Excluir</button>
            </td>
          </tr> -->
        </table>
      </div>
      <section class="back-button">
        <a href="clientes.php"><span>Voltar</span></a>
      </section>
    </main>
  </body>
</html>
