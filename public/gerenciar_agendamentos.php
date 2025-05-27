<?php
include_once("../includes/config.php");
include('../includes/verifica_login.php');

$today = date('Y-m-d');
$filtro = isset($_GET['filterTime']) ? $_GET['filterTime'] : '';

if ($filtro == 'Antes') {
  $sql = "SELECT * FROM agendamentos JOIN clientes ON agendamentos.idCliente = clientes.idCliente WHERE dataInicio < '$today' ORDER BY idAgendamento ASC";
} elseif ($filtro == "Depois") {
  $sql = "SELECT * FROM agendamentos JOIN clientes ON agendamentos.idCliente = clientes.idCliente WHERE dataInicio >= '$today' ORDER BY idAgendamento ASC";
} else {
  $sql = $sql = "SELECT * FROM agendamentos JOIN clientes  ON agendamentos.idCliente = clientes.idCliente ORDER BY idAgendamento ASC ";
}

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
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <script src="../assets/js/scripts.js" defer></script>
  </head>
  <body>
    <nav class="sidebar">
      <div class="nav-top">
        <img src="../assets/img/logo-menor-branca.png" alt="logo" />
        <a href="home.php">Página Inicial</a>
      </div>
      <div class="nav-bottom">
        <a href="../includes/logout.php"
          ><i class="fi fi-rc-arrow-left-from-line"></i>Sair</a
        >
      </div>
    </nav>
    <main>
      <div class="manage-agend-title">
        <h1>Gerenciar agendamentos</h1>
        <i class="fi fi-br-search" id="lupa-button"></i>
      </div>
      <div class="popup-filter">
        <h4>Filtrar Agendamentos</h4>
        <form method="GET">
          <div class="flex-filter">
            <div class="today-info">
              <label for="today">Hoje</label>
              <input type="date" name="today" id="today" value="<?php echo $today; ?>" readonly >
            </div>
            <div class="filter-radio">
              <div class="first-fr">
                <input type="radio" name="filterTime" id="before" value="Antes" <?php if ($filtro == 'Antes') echo 'checked'?>>
                <label for="before">Antes</label>
              </div>
              <div class="second-fr">
                <input type="radio" name="filterTime" id="after" value="Depois" <?php if ($filtro == 'Depois') echo 'checked'?>>
                <label for="after">Depois</label>
              </div>
            </div>
          </div>
          <div class="filter-button">
            <button>Buscar <i class="fi fi-br-search"></i></button>
          </div>
        </form>
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
              <a href='../includes/excluir_agendamentos.php?idAgendamento={$agendData['idAgendamento']}'onclick=\"return confirm('Tem certeza que deseja excluir este agendamento?');\">
              <button class='excluir-btn'>Excluir</button>
              </a>
              </td>";
            }

            ?>
          </tbody>
        </table>
      </div>
      <section class="back-button">
        <a href="agendamentos.php"><span>Voltar</span></a>
      </section>
    </main>
  </body>
</html>
