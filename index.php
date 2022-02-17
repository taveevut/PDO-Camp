<?php
include('datasources/datasource.php');
include('datasources/types.php');
include('helpers/datetime_helper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
   <?php
   $data = [];
   // ดึงข้อมูลจากฐานข้อมูลออกมาแสดง
   foreach ($order as $value) {
      $data[$value['type']][] = $value['amount'];
   }

   $datasets = [];
   foreach ($types as $index => $value) {
      $datasets[$index] = [
         "label" => $value['name'],
         "backgroundColor" => $index == 0 ? 'rgb(255, 99, 132)' : 'rgb(68,155,15)',
         "borderColor" => $index == 0 ? 'rgb(255, 99, 132)' : 'rgb(68,155,15)',
         "data" => $data[$value['id']]
      ];
   }
   ?>

   <div style="width: 800px; height: 400px;">
      <canvas id="myChart"></canvas>
   </div>

   <script>
      const config = {
         type: 'bar', //รูปแบบของกราฟ
         data: {
            labels: <?php echo json_encode(array_values(thaiMonth())) ?>,
            datasets: <?php echo json_encode($datasets); ?>
         },
         options: {}
      };

      const myChart = new Chart(document.getElementById('myChart'), config);
   </script>
</body>

</html>