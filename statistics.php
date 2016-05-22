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
    <script type="text/javascript">
      function linkAvgEntryHour(){
        window.location = "g1.php";
      }

      function linkSumEntryDay(){
        window.location = "g2/g2";
      }

      function linkAvgTempHour(){
        window.location = "g3/g3";
      }
    </script>
</head>
<body>
<div class="container">
  <div class="row">
      <div class="col-xs-1">
          <a href="index.php"><</a>
      </div>
  </div>
  <div>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>
  <!--
  ==================== AVG Entry Link ===================
  -->
  <div class="row" id="avg-entry-hour" style="cursor: pointer;" onclick="linkAvgEntryHour()">
    <div class="col-xs-1  " style="height: 90px; line-height: 90px;">
      <span
      class="glyphicon glyphicon-stats"
      style="font-size:50px" aria-hidden="true">
      </span>
    </div>
    <div class="col-xs-6" style="height: 90px; line-height: 90px;">
      Average Entry by Hour
    </div>
  </div>
  <!--
  ==================== Summary Entry Link ===================
  -->
  <div class="row" id="avg-entry-hour" style="cursor: pointer;" onclick="linkSumEntryDay()">
    <div class="col-xs-1  " style="height: 90px; line-height: 90px;">
      <span
      class="glyphicon glyphicon-stats"
      style="font-size:50px" aria-hidden="true">
      </span>
    </div>
    <div class="col-xs-6" style="height: 90px; line-height: 90px;">
      Summation Entry by Day
    </div>
  </div>
  <!--
  ==================== AVG Temp Link ===================
  -->
  <div class="row" id="avg-entry-hour" style="cursor: pointer;" onclick="linkAvgTempHour()">
    <div class="col-xs-1  " style="height: 90px; line-height: 90px;">
      <span
      class="glyphicon glyphicon-stats"
      style="font-size:50px" aria-hidden="true">
      </span>
    </div>
    <div class="col-xs-6" style="height: 90px; line-height: 90px;">
      Average Temp by Hour
    </div>
  </div>
  <!--
  ==================== SHOW Graph ZONE ===================
  -->
  <div id="graph-zone">

  </div>
</div>
</body>
</html>
