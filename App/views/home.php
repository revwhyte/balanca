<!DOCTYPE html>
<html lang="pt-br">
  <?php include('../includes/HEAD.INC'); ?>
  <body>
    <?php include('../includes/header.php'); ?>
    <div id="chartDiv"></div>
    <!-- importar dados do banco -->
    <div id="valores-pesagem">
      <?php
        require_once('../models/Pesagem.php');
        require_once('../models/Database.php');
        require_once('../models/Utils.php');

        $conn = Database::openConn();
        $pesagens = Pesagem::retornaPesagens($conn);
        $conn = Database::closeConn();
        $_SESSION['pesagens'] = $pesagens;
        //Utils::debugarVariavel($_SESSION);
      ?>
    </div>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script type="text/javascript">
      var chartData = {
        type:"line",
        title: {
          text: "Pesagem"
        },
        // legend: {},
        series: [ // valores aqui
          {values: [1, 4, 3, 5, 2, 6]} // fazer esse array receber direto da session
        ]
      };
      zingchart.render({
        id: "chartDiv",
        data: "chartData",
        height: 400,
        width: 600
      });
    </script>
  </body>
</html>
