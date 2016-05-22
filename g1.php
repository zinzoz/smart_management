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
<script type="text/javascript">

      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();

      function pad (str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
      }
      function dateChange() {
      var date = document.getElementById("startdate").value;
      $.ajax({
        type: "POST",
        url: "g1graph.php",
        data: "date="+date,
        cache: false,
        success: function(html) {
        var man_data = html.split('*')[0];
        var woman_data = html.split('*')[1];
        var boy_data = html.split('*')[2];
        var girl_data = html.split('*')[3];

        var man_data_int = man_data.split(',').map(function(item) {
            return parseInt(item, 10);
        });

        var woman_data_int = woman_data.split(',').map(function(item) {
            return parseInt(item, 10);
        });

        var boy_data_int = boy_data.split(',').map(function(item) {
            return parseInt(item, 10);
        });

        var girl_data_int = girl_data.split(',').map(function(item) {
            return parseInt(item, 10);
        });

var man = {
  x: [8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21],
  y: man_data_int,
  name: 'Man',
  mode: 'lines+markers',
  connectgaps: true
};

var woman = {
  x: [8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21],
  y: woman_data_int,
  name: 'Woman',
  mode: 'lines+markers',
  connectgaps: true
};

var boy = {
  x: [8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21],
  y: boy_data_int,
  name: 'Boy',
  mode: 'lines+markers',
  connectgaps: true
};

var girl = {
  x: [8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21],
  y: girl_data_int,
  name: 'Girl',
  mode: 'lines+markers',
  connectgaps: true
};


var data = [man, woman,boy, girl];

var layout = {
  title: 'Summation Entry By Hour',
  showlegend: false,
  xaxis: {
    title: 'Time',
    showgrid: false,
    zeroline: false
  },
  yaxis: {
    title: 'Number of Entry',
    showline: false
  }
};
Plotly.newPlot('graph', data, layout);
        }
    });
  }
    </script>
</head>
<body id="l">
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
            <input class="form-control" id="startdate" name="startdate "size="16" type="text" readonly onchange="dateChange()">
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
  <div id="graph" style="width: 100%; height: 600px;"></div>
</div>
<script type="text/javascript" src="g2/g2/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="g2/g2/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="g2/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="g2/js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript">
  document.getElementById("startdate").value = yyyy + "-" + pad(mm, 2) + "-" + pad(dd, 2);

  dateChange();

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

</script>
</div>
</body>
</html>
