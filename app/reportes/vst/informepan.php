<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reportes Graficos</title>
    <!-- CDN de bootstrap pal estilo -->
    <!-- Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Script para crear el grafico -->
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['GRUPO ETARIOS', 'Hours per Day'],
          ['51-60 Y MAS', 3],
          ['41-50',    16],
          ['31-40', 19],
          ['21-30',    10],
          ['15-20',  2]
        ]);
        var options = {
          title: 'GRUPO ETARIOS',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('gragrueta'));
        chart.draw(data, options);
        document.getElementById('vargrueta').value=chart.getImageURI();
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['GRUPO POR SEXO', 'Hours per Day'],
          ['FEMENINO', 39],
          ['MASCULINO',    11]
        ]);
        var options = {
          title: 'GRUPO POR SEXO',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('gragrusex'));
        chart.draw(data, options);
        document.getElementById('vargrusex').value=chart.getImageURI();
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Grado de Instruccion', 'Hours per Day'],
          ['ANALFABETA', 0],
          ['PRIMARIA',    4],
          ['BACHILLER', 8],
          ['TSU',    7],
          ['UNIVERSITARIO',  31],
          ['POSTGRADO',   0],
          ['OTROS',  0]
        ]);
        var options = {
          title: 'GRADO DE INSTRUCCION',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('grafico'));
        chart.draw(data, options);
        document.getElementById('vargrains').value=chart.getImageURI();
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['MOTIVO DE CONSULTA', 'Hours per Day'],
          ['EGRESO', 0],
          ['PERIODICO',    4],
          ['INGRESO', 0],
          ['PRE-VACACIONAL',    46],
          ['POST-VACACIONAL',  0],
          ['PRE-EMPLEO',   0]
        ]);
        var options = {
          title: 'MOTIVO DE CONSULTA',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('gramotcon'));
        chart.draw(data, options);
        document.getElementById('varmotcon').value=chart.getImageURI();
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['RESULTADO DE LA CONSULTA', 'Hours per Day'],
          ['APTO', 49],
          ['APTO CON LIMITACIONES',    0],
          ['NO APTO', 1]
        ]);
        var options = {
          title: 'RESULTADO DE LA CONSULTA',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('grarescon'));
        chart.draw(data, options);
        document.getElementById('varrescon').value=chart.getImageURI();
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Enfermedades Comunes', 'Hours per Day'],
          <?php
          $rowenfpac = $mreportes->listaenfermedadpaciente();
          foreach ($rowenfpac as $ep) { ?>
            ['<?php echo $ep->enf_descrip ?>', <?php echo $ep->CantPaciEnfe ?>],
          <?php 
          }
          ?>
        ]);
        var options = {
          title: 'ENFERMEDADES COMUNES',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('gragruenf'));
        chart.draw(data, options);
        document.getElementById('vargruenf').value=chart.getImageURI();
      }
    </script>

  </head>

  <body>
      <!-- Titulo -->
    <h1 class="mt-5 text-center border border-dark">Reportes Gráficos</h1>
    <!-- Contenedor -->
    <div class="container mt-5">
    <!-- FORMULARIO -->
    <form method="post" id="hacer_pdf" action="/umsl/app/reportes/vst/informepdf.php" target="_black">
      <!-- esta variable contendrá la imagen más adelante -->
      <input type="hidden" name="vargrueta" id="vargrueta" >  
      <!-- div donde se mostrará el gráfico -->
      <div id="gragrueta" style="width: 50%; height: 400px;" class="col-sm-6"></div>

      <!-- esta variable contendrá la imagen más adelante -->
      <input type="hidden" name="vargrusex" id="vargrusex" >  
      <!-- div donde se mostrará el gráfico -->
      <div id="gragrusex" style="width: 50%; height: 400px;" class="col-sm-6"></div>

      <!-- esta variable contendrá la imagen más adelante -->
      <input type="hidden" name="vargrains" id="vargrains" >  
      <!-- div donde se mostrará el gráfico -->
      <div id="grafico" style="width: 50%; height: 400px;" class="col-sm-6"></div>

      <!-- esta variable contendrá la imagen más adelante -->
      <input type="hidden" name="varmotcon" id="varmotcon" >  
      <!-- div donde se mostrará el gráfico -->
      <div id="gramotcon" style="width: 50%; height: 400px;" class="col-sm-6"></div>

      <!-- esta variable contendrá la imagen más adelante -->
      <input type="hidden" name="varrescon" id="varrescon" >  
      <!-- div donde se mostrará el gráfico -->
      <div id="grarescon" style="width: 50%; height: 400px;" class="col-sm-12"></div>

      <!-- esta variable contendrá la imagen más adelante -->
      <input type="hidden" name="vargruenf" id="vargruenf" >  
      <!-- div donde se mostrará el gráfico -->
      <div id="gragruenf" style="width: 75%; height: 1200px;" class="col-sm-12"></div>

      <!-- Boton para enviar la variable -->
      <input type="submit" value="Generar PDF" class="btn btn-danger col-xs-12 col-sm-12"/>
    </form>

    </div>
  </body>
</html>