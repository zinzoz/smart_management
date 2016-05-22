<?php
include 'connectdb.php';
$result = $conn->query("SELECT HOUR(ts) as hour , count(*) FROM entry group by hour") or trigger_error($conn->error);
while ($row = $result->fetch_array()){
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Smart Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="g2/g2/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="g2/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <!-- Plotly.js -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></scripzt>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="flatui/js/vendor/html5shiv.js"></script>
      <script src="flatui/js/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-xs-1">
        <a href="statistics.php"><</a>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="row">
<div class="form-group">
        <label for="dtp_input2" class="col-md-2 control-label">Date Start</label>
        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
            <input class="form-control" name="startdate "size="16" type="text" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
  <input type="hidden" id="dtp_input2" value="" /><br/>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="row" align="center">
  <div id="graph" style="width: 70%; height: 600px;"></div>
</div>
<script type="text/javascript" src="g2/g2/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="g2/g2/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="g2/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="g2/js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript">
  $('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0,
    format: "yyyy-mm-dd"
    });

var trace1 = {
  x: [8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21],
  y: [2, 3, null, 17, 14,2, 3, null, 17, 14, 12, 10, null, 15],
  mode: 'lines+markers',
  connectgaps: true
};

var trace2 = {
  x: [8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21],
  y: [16, null, 13, 10, 8, null, 11, 12,13, 10, 8, null, 11, 12],
  mode: 'lines',
  connectgaps: true
};

var trace3 = {
  x: [8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21],
  y: [13, 5, null, 16, 19, 16, 17, null, 15,13, 10, 8, null, 11, 12],
  mode: 'lines+markers',
  connectgaps: true
};

var trace4 = {
  x: [8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21],
  y: [13, null, 23, 10, 8, null, 11, 12,13, 10, 8, null, 11, 12],
  mode: 'lines',
  connectgaps: true
};


var data = [trace1, trace2,trace3, trace4];

var layout = {
  title: 'Summation Entry By Hour',
  showlegend: false
};


Plotly.newPlot('graph', data, layout);
</script>
</div>
</body>
</html>
