<?php
include 'connectdb.php';
$result = $conn->query("SELECT HOUR(ts) as hour , count(*) FROM entry group by hour") or trigger_error($conn->error);
while ($row = $result->fetch_array()){
  var_dump($row); echo '</br>';
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Smart Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="flatui/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="flatui/css/flat-ui.min.css" rel="stylesheet">
<!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link rel="shortcut icon" href="flatui/img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="flatui/js/vendor/html5shiv.js"></script>
      <script src="flatui/js/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
 <div id="myDiv" style="width: 100%; height: 100%;"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
 
var trace1 = {
  x: [8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21],
  y: [2, 3, null, 17, 14,2, 3, null, 17, 14, 12, 10, null, 15],
  mode: 'lines',
  connectgaps: true
};

var trace2 = {
  x: [8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21],
  y: [16, null, 13, 10, 8, null, 11, 12,13, 10, 8, null, 11, 12],
  mode: 'lines',
  connectgaps: true
};



var data = [trace1, trace2];

var layout = {
  title: 'Summary Different Temperature IN vs Temperature Out ',
  showlegend: false
};

Plotly.newPlot('myDiv', data, layout);
  </script>
</div>
</body>
</html>
