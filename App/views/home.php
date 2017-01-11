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
    <table id="tabela" hidden>
      <thead>
        <td>data</td>
        <td>peso</td>
      </thead>
      <tbody>
        <?php
          $tam = count($pesagens);
          for ($i=0; $i < $tam; $i++) {
            echo '<tr>
                    <td id="data'.$i.'" class="datas-tabela">'.$pesagens[$i]['ps_data'].'</td>
                    <td id="peso'.$i.'" class="pesos-tabela">'.$pesagens[$i]['ps_peso'].'</td>
                  </tr>';
          }
        ?>
      </tbody>
    </table>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script type="text/javascript">
      var tabela = document.getElementById('tabela');
      var datas = document.getElementsByClassName('datas-tabela');
      var pesos = document.getElementsByClassName('pesos-tabela');
      var datas_valores = [];
      var pesos_valores = [];

      for (var i = 0; i < datas.length; i++) {
        datas_valores.push(datas[i].innerHTML);
        pesos_valores.push(parseFloat(pesos[i].innerHTML));
      }

      var min = Math.min.apply(null, pesos_valores);
      var max = Math.max.apply(null, pesos_valores);

      var chartData = {
        type:"line",
        title: {
          text: "Pesagem"
        },
        "scale-x": {
          "labels": datas_valores
        },
        "scale-y": {
          "min-value": min,
          "max-value": max,
          "step": 1
        },
        // legend: {},
        series: [ // valores aqui
          {values: pesos_valores} // fazer esse array receber direto da session
        ]
      };
      zingchart.render({
        id: "chartDiv",
        data: "chartData",
        height: 400,
        width: 1200
      });
    </script>
  </body>
</html>
