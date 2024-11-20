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
          ['Tareas', 'Hours per Day'],
          ['Trabajo',     10],
          ['Comer',      2],
          ['Caminar',  2],
          ['Ver TV', 2],
          ['Dormir',    20]
        ]);

        var options = {
          title: 'Mis Actividades Diarias',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico'));
        chart.draw(data, options);

        document.getElementById('variable').value=chart.getImageURI();
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
        <input type="hidden" name="variable" id="variable" >
        
        <!-- div donde se mostrará el gráfico -->
        <div id="grafico" style="width: 100%; height: 500px;"></div>
        <!-- Boton para enviar la variable -->
      <input type="submit" value="Generar PDF" class="btn btn-danger mt-5 mr-5 float-right"/>

    </form>

    </div>
  </body>
</html>