<php?
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

    <link rel="shortcut icon" href="flatui/img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="flatui/js/vendor/html5shiv.js"></script>
      <script src="flatui/js/vendor/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
          font: 10px sans-serif;
        }
        .axis path,
        .axis line {
          fill: none;
          stroke: #000;
          shape-rendering: crispEdges;
        }

        .x.axis path {
          display: none;
        }

        .line {
          fill: none;
          stroke: steelblue;
          stroke-width: 1.5px;
        }
    </style>
  </head>
  <body>
    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="flatui/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="flatui/js/vendor/video.js"></script>
    <script src="flatui/js/flat-ui.min.js"></script>
    <script src="//d3js.org/d3.v3.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Hello, there!</h1>
                <p>Let see the Statistics</p>
            </div>
        </div>
    <div class="row">
        <div class="col-xs-8" align="center">
    <script>
        var margin = {top: 20, right: 20, bottom: 20, left: 80},
            width = 1400 - margin.left - margin.right,
            height = 500 - margin.top - margin.bottom;

        var parseDate = d3.time.format("%Y%m%d%H").parse;

        var x = d3.time.scale()
            .range([0, width]);

        var y = d3.scale.linear()
            .range([height, 0]);

        var color = d3.scale.category10();

        var xAxis = d3.svg.axis()
            .scale(x)
            .orient("bottom");

        var yAxis = d3.svg.axis()
            .scale(y)
            .orient("left");

        var line = d3.svg.line()
            .interpolate("basis")
            .x(function(d) { return x(d.date); })
            .y(function(d) { return y(d.temperature); });

        var svg = d3.select("body").append("svg")
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
          .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

        d3.tsv("data.tsv", function(error, data) {
          if (error) throw error;

          color.domain(d3.keys(data[0]).filter(function(key) { return key !== "date"; }));

          data.forEach(function(d) {
            d.date = parseDate(d.date);
          });

          var types = color.domain().map(function(name) {
            return {
              name: name,
              values: data.map(function(d) {
                return {date: d.date, temperature: +d[name]};
              })
            };
          });

          x.domain(d3.extent(data, function(d) { return d.date; }));

          y.domain([
            d3.min(types, function(c) { return d3.min(c.values, function(v) { return v.temperature; }); }),
            d3.max(types, function(c) { return d3.max(c.values, function(v) { return v.temperature; }); })
          ]);

          svg.append("g")
              .attr("class", "x axis")
              .attr("transform", "translate(0," + height + ")")
              .call(xAxis);

          svg.append("g")
              .attr("class", "y axis")
              .call(yAxis)
            .append("text")
              .attr("transform", "rotate(-90)")
              .attr("y", 6)
              .attr("dy", ".71em")
              .style("text-anchor", "end")
              .text("Number of Entry");

          var entry_type = svg.selectAll(".entry_type")
              .data(types)
            .enter().append("g")
              .attr("class", "entry_type");

          entry_type.append("path")
              .attr("class", "line")
              .attr("d", function(d) { return line(d.values); })
              .style("stroke", function(d) { return color(d.name); });

          entry_type.append("text")
              .datum(function(d) { return {name: d.name, value: d.values[d.values.length - 1]}; })
              .attr("transform", function(d) { return "translate(" + x(d.value.date) + "," + y(d.value.temperature) + ")"; })
              .attr("x", 4)
              .attr("dy", ".35em")
              .text(function(d) { return d.name; });
        });

    </script>
        </div>
    </div>


    </div>
    <!-- /.container -->
    <script>


    </script>
  </body>
</html>
