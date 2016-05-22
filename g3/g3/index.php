
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	  <link href="flatui/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="flatui/css/flat-ui.min.css" rel="stylesheet">
<!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link rel="shortcut icon" href="flatui/img/favicon.ico">



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
<div class="container">
    <form action="" class="form-horizontal"  role="form">
        <fieldset>
            <legend>Graph Summary Number Customer </legend>
            <!--<div class="form-group">
                <label for="dtp_input1" class="col-md-2 control-label">DateTime Picking</label>
                <div class="input-group date form_datetime col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" /><br/>
            </div>-->
			<div class="form-group">
                <label for="dtp_input2" class="col-md-2 control-label">Date Picking 1</label>
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" name="startdate "size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
			<div class="form-group">
                <label for="dtp_input2" class="col-md-2 control-label">Date Picking 2</label>
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" name="enddate" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
			<!--<div class="form-group">
                <label for="dtp_input3" class="col-md-2 control-label">Time Picking</label>
                <div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
				<input type="hidden" id="dtp_input3" value="" /><br/>
            </div>-->
        </fieldset>
    </form>
</div>

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

<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/locales/bootstrap-datetimepicker.en.js" charset="UTF-8"></script>
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
	
</script>

</body>
</html>